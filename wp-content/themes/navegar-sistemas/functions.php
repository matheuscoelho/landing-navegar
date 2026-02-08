<?php
/**
 * Navegar Sistemas Theme Functions
 *
 * @package Navegar_Sistemas
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Define theme constants
 */
define( 'NAVEGAR_THEME_VERSION', '1.0.0' );
define( 'NAVEGAR_THEME_DIR', get_template_directory() );
define( 'NAVEGAR_THEME_URI', get_template_directory_uri() );

/**
 * Include required files
 */
require_once NAVEGAR_THEME_DIR . '/inc/theme-setup.php';
require_once NAVEGAR_THEME_DIR . '/inc/language-detection.php';
require_once NAVEGAR_THEME_DIR . '/inc/contact-form.php';

/**
 * Theme setup
 */
function navegar_theme_setup() {
    // Load text domain for translations
    load_theme_textdomain( 'navegar-sistemas', NAVEGAR_THEME_DIR . '/languages' );

    // Add theme support
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'navegar-sistemas' ),
        'footer'  => __( 'Footer Menu', 'navegar-sistemas' ),
    ) );
}
add_action( 'after_setup_theme', 'navegar_theme_setup' );

/**
 * Enqueue scripts and styles
 */
function navegar_enqueue_assets() {
    // Google Fonts - Inter (Modern, Clean)
    wp_enqueue_style(
        'navegar-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap',
        array(),
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'navegar-main-style',
        NAVEGAR_THEME_URI . '/assets/css/main.css',
        array( 'navegar-google-fonts' ),
        NAVEGAR_THEME_VERSION
    );

    // Theme stylesheet
    wp_enqueue_style(
        'navegar-style',
        get_stylesheet_uri(),
        array( 'navegar-main-style' ),
        NAVEGAR_THEME_VERSION
    );

    // Main JavaScript
    wp_enqueue_script(
        'navegar-main-script',
        NAVEGAR_THEME_URI . '/assets/js/main.js',
        array(),
        NAVEGAR_THEME_VERSION,
        true
    );

    // Localize script with data
    wp_localize_script( 'navegar-main-script', 'navegarData', array(
        'ajaxUrl'      => admin_url( 'admin-ajax.php' ),
        'nonce'        => wp_create_nonce( 'navegar_nonce' ),
        'currentLang'  => navegar_get_current_language(),
        'strings'      => array(
            'sending'     => __( 'Enviando...', 'navegar-sistemas' ),
            'success'     => __( 'Mensagem enviada com sucesso!', 'navegar-sistemas' ),
            'error'       => __( 'Ocorreu um erro. Tente novamente.', 'navegar-sistemas' ),
            'required'    => __( 'Este campo é obrigatório.', 'navegar-sistemas' ),
            'invalidEmail'=> __( 'Por favor, insira um email válido.', 'navegar-sistemas' ),
        ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'navegar_enqueue_assets' );

/**
 * Add custom body classes
 */
function navegar_body_classes( $classes ) {
    $classes[] = 'navegar-theme';
    $classes[] = 'lang-' . navegar_get_current_language();

    if ( is_front_page() ) {
        $classes[] = 'front-page';
    }

    return $classes;
}
add_filter( 'body_class', 'navegar_body_classes' );

/**
 * Custom excerpt length
 */
function navegar_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'navegar_excerpt_length' );

/**
 * Custom excerpt more
 */
function navegar_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'navegar_excerpt_more' );

/**
 * Disable WordPress admin bar for non-admins
 */
function navegar_disable_admin_bar() {
    if ( ! current_user_can( 'manage_options' ) ) {
        add_filter( 'show_admin_bar', '__return_false' );
    }
}
add_action( 'after_setup_theme', 'navegar_disable_admin_bar' );

/**
 * Remove WordPress version from head
 */
remove_action( 'wp_head', 'wp_generator' );

/**
 * Add security headers
 */
function navegar_security_headers() {
    if ( ! is_admin() ) {
        header( 'X-Content-Type-Options: nosniff' );
        header( 'X-Frame-Options: SAMEORIGIN' );
        header( 'X-XSS-Protection: 1; mode=block' );
    }
}
add_action( 'send_headers', 'navegar_security_headers' );
