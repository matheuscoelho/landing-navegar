<?php
/**
 * Language Detection Functions
 *
 * Handles automatic language detection via GeoIP and manual language switching.
 *
 * @package Navegar_Sistemas
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Cookie name for language preference
 */
define( 'NAVEGAR_LANG_COOKIE', 'navegar_lang' );

/**
 * Cookie expiration (30 days)
 */
define( 'NAVEGAR_LANG_COOKIE_EXPIRY', 30 * DAY_IN_SECONDS );

/**
 * Initialize language detection
 */
function navegar_init_language() {
    // Handle language switch via URL parameter
    if ( isset( $_GET['lang'] ) ) {
        $lang = sanitize_text_field( wp_unslash( $_GET['lang'] ) );
        $available = navegar_get_available_languages();

        if ( isset( $available[ $lang ] ) ) {
            navegar_set_language_cookie( $lang );
            navegar_switch_locale( $lang );
            return;
        }
    }

    // Check for existing cookie
    if ( isset( $_COOKIE[ NAVEGAR_LANG_COOKIE ] ) ) {
        $lang = sanitize_text_field( wp_unslash( $_COOKIE[ NAVEGAR_LANG_COOKIE ] ) );
        $available = navegar_get_available_languages();

        if ( isset( $available[ $lang ] ) ) {
            navegar_switch_locale( $lang );
            return;
        }
    }

    // Auto-detect language based on IP
    $detected_lang = navegar_detect_language_from_ip();
    navegar_set_language_cookie( $detected_lang );
    navegar_switch_locale( $detected_lang );
}
add_action( 'after_setup_theme', 'navegar_init_language', 5 );

/**
 * Get current language
 *
 * @return string Language code (pt_BR or en_US)
 */
function navegar_get_current_language() {
    // First check URL parameter
    if ( isset( $_GET['lang'] ) ) {
        $lang = sanitize_text_field( wp_unslash( $_GET['lang'] ) );
        $available = navegar_get_available_languages();

        if ( isset( $available[ $lang ] ) ) {
            return $lang;
        }
    }

    // Then check cookie
    if ( isset( $_COOKIE[ NAVEGAR_LANG_COOKIE ] ) ) {
        $lang = sanitize_text_field( wp_unslash( $_COOKIE[ NAVEGAR_LANG_COOKIE ] ) );
        $available = navegar_get_available_languages();

        if ( isset( $available[ $lang ] ) ) {
            return $lang;
        }
    }

    // Default language
    return navegar_get_default_language();
}

/**
 * Set language cookie
 *
 * @param string $lang Language code.
 */
function navegar_set_language_cookie( $lang ) {
    if ( ! headers_sent() ) {
        setcookie(
            NAVEGAR_LANG_COOKIE,
            $lang,
            time() + NAVEGAR_LANG_COOKIE_EXPIRY,
            COOKIEPATH,
            COOKIE_DOMAIN,
            is_ssl(),
            true
        );
    }
}

/**
 * Switch WordPress locale
 *
 * @param string $lang Language code.
 */
function navegar_switch_locale( $lang ) {
    $available = navegar_get_available_languages();

    if ( isset( $available[ $lang ] ) ) {
        switch_to_locale( $available[ $lang ]['locale'] );
    }
}

/**
 * Detect language based on visitor's IP address
 *
 * Uses MaxMind GeoLite2 database if available, falls back to API.
 *
 * @return string Language code
 */
function navegar_detect_language_from_ip() {
    $ip = navegar_get_visitor_ip();

    // Skip for local/private IPs
    if ( navegar_is_local_ip( $ip ) ) {
        return navegar_get_default_language();
    }

    // Try MaxMind GeoLite2 database first
    $country = navegar_geoip_lookup_maxmind( $ip );

    // Fallback to API if MaxMind not available
    if ( empty( $country ) ) {
        $country = navegar_geoip_lookup_api( $ip );
    }

    // Map country to language
    return navegar_map_country_to_language( $country );
}

/**
 * Get visitor's IP address
 *
 * @return string
 */
function navegar_get_visitor_ip() {
    $ip = '';

    // Check for proxy headers
    $headers = array(
        'HTTP_CF_CONNECTING_IP', // Cloudflare
        'HTTP_X_FORWARDED_FOR',
        'HTTP_X_REAL_IP',
        'REMOTE_ADDR',
    );

    foreach ( $headers as $header ) {
        if ( ! empty( $_SERVER[ $header ] ) ) {
            $ip = sanitize_text_field( wp_unslash( $_SERVER[ $header ] ) );

            // Handle comma-separated IPs (X-Forwarded-For)
            if ( strpos( $ip, ',' ) !== false ) {
                $ips = explode( ',', $ip );
                $ip = trim( $ips[0] );
            }

            break;
        }
    }

    return filter_var( $ip, FILTER_VALIDATE_IP ) ? $ip : '';
}

/**
 * Check if IP is local/private
 *
 * @param string $ip IP address.
 * @return bool
 */
function navegar_is_local_ip( $ip ) {
    if ( empty( $ip ) ) {
        return true;
    }

    // Check for localhost
    if ( in_array( $ip, array( '127.0.0.1', '::1' ), true ) ) {
        return true;
    }

    // Check for private IP ranges
    return ! filter_var(
        $ip,
        FILTER_VALIDATE_IP,
        FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
    );
}

/**
 * Lookup country using MaxMind GeoLite2 database
 *
 * @param string $ip IP address.
 * @return string Country code or empty string.
 */
function navegar_geoip_lookup_maxmind( $ip ) {
    $db_path = NAVEGAR_THEME_DIR . '/assets/geoip/GeoLite2-Country.mmdb';

    // Check if database file exists
    if ( ! file_exists( $db_path ) ) {
        return '';
    }

    // Check if MaxMind Reader class is available
    if ( ! class_exists( 'MaxMind\Db\Reader' ) ) {
        // Try to include a simple MMDB reader
        return navegar_simple_mmdb_lookup( $db_path, $ip );
    }

    try {
        $reader = new MaxMind\Db\Reader( $db_path );
        $record = $reader->get( $ip );
        $reader->close();

        if ( isset( $record['country']['iso_code'] ) ) {
            return strtoupper( $record['country']['iso_code'] );
        }
    } catch ( Exception $e ) {
        // Log error if WP_DEBUG is enabled
        if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
            error_log( 'Navegar GeoIP MaxMind Error: ' . $e->getMessage() );
        }
    }

    return '';
}

/**
 * Simple MMDB lookup without external dependencies
 *
 * This is a simplified reader for MaxMind DB format.
 * For production, consider using the official MaxMind PHP library.
 *
 * @param string $db_path Path to MMDB file.
 * @param string $ip IP address.
 * @return string Country code or empty string.
 */
function navegar_simple_mmdb_lookup( $db_path, $ip ) {
    // For a full implementation, use the MaxMind GeoIP2-php library
    // This is a placeholder that falls back to API
    return '';
}

/**
 * Lookup country using free API (fallback)
 *
 * Uses ip-api.com which allows 45 requests per minute for free.
 *
 * @param string $ip IP address.
 * @return string Country code or empty string.
 */
function navegar_geoip_lookup_api( $ip ) {
    // Check transient cache first
    $cache_key = 'navegar_geoip_' . md5( $ip );
    $cached = get_transient( $cache_key );

    if ( false !== $cached ) {
        return $cached;
    }

    // Make API request
    $response = wp_remote_get(
        'http://ip-api.com/json/' . $ip . '?fields=countryCode',
        array(
            'timeout' => 3,
            'sslverify' => false,
        )
    );

    if ( is_wp_error( $response ) ) {
        return '';
    }

    $body = wp_remote_retrieve_body( $response );
    $data = json_decode( $body, true );

    if ( isset( $data['countryCode'] ) ) {
        $country = strtoupper( $data['countryCode'] );

        // Cache for 24 hours
        set_transient( $cache_key, $country, DAY_IN_SECONDS );

        return $country;
    }

    return '';
}

/**
 * Map country code to language
 *
 * @param string $country Country code (ISO 3166-1 alpha-2).
 * @return string Language code.
 */
function navegar_map_country_to_language( $country ) {
    // Portuguese-speaking countries
    $portuguese_countries = array(
        'BR', // Brazil
        'PT', // Portugal
        'AO', // Angola
        'MZ', // Mozambique
        'CV', // Cape Verde
        'GW', // Guinea-Bissau
        'ST', // Sao Tome and Principe
        'TL', // Timor-Leste
    );

    if ( in_array( $country, $portuguese_countries, true ) ) {
        return 'pt_BR';
    }

    // Default to English for all other countries
    return 'en_US';
}

/**
 * Add language attribute to html tag
 *
 * @param string $output Language attributes.
 * @return string
 */
function navegar_language_attributes( $output ) {
    $lang = navegar_get_current_language();

    if ( 'pt_BR' === $lang ) {
        return 'lang="pt-BR"';
    }

    return 'lang="en-US"';
}
add_filter( 'language_attributes', 'navegar_language_attributes' );

/**
 * Remove lang parameter from URL for SEO
 *
 * @param string $url URL.
 * @return string
 */
function navegar_clean_language_url( $url ) {
    return remove_query_arg( 'lang', $url );
}
