<?php
/**
 * Header Template - Dark Premium
 *
 * @package Navegar_Sistemas
 * @since 6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- SEO Meta Tags -->
    <meta name="description" content="<?php echo esc_attr__( 'Soluções técnicas para ambientes críticos. Parceira estratégica para organizações de alta dependência tecnológica.', 'navegar-sistemas' ); ?>">
    <meta name="keywords" content="consultoria tecnológica, sistemas corporativos, arquitetura, integração, segurança, sustentação">
    <meta name="author" content="Navegar Sistemas">
    <meta name="robots" content="index, follow">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo esc_url( home_url( '/' ) ); ?>">
    <meta property="og:title" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> - <?php echo esc_attr__( 'Tecnologia para Ambientes Críticos', 'navegar-sistemas' ); ?>">
    <meta property="og:description" content="<?php echo esc_attr__( 'Soluções técnicas para ambientes críticos e regulados.', 'navegar-sistemas' ); ?>">
    <meta property="og:image" content="<?php echo esc_url( NAVEGAR_THEME_URI . '/assets/images/og-image.png' ); ?>">
    <meta property="og:locale" content="<?php echo esc_attr( str_replace( '-', '_', get_locale() ) ); ?>">
    <meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Navegar Sistemas",
        "url": "<?php echo esc_js( home_url( '/' ) ); ?>",
        "logo": "<?php echo esc_js( NAVEGAR_THEME_URI . '/assets/images/logo.svg' ); ?>",
        "description": "<?php echo esc_js( __( 'Parceira técnica para ambientes de alta dependência tecnológica', 'navegar-sistemas' ) ); ?>",
        "foundingDate": "2019",
        "contactPoint": {
            "@type": "ContactPoint",
            "contactType": "Customer Service",
            "email": "contato@navegarsistemas.com.br",
            "telephone": "+5511969662203"
        }
    }
    </script>

    <?php wp_head(); ?>
</head>

<body <?php body_class( 'dark-theme' ); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main-content">
    <?php esc_html_e( 'Pular para o conteúdo', 'navegar-sistemas' ); ?>
</a>

<header class="site-header" id="site-header">
    <div class="container">
        <div class="header-inner">
            <!-- Logo -->
            <div class="site-branding">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" rel="home">
                    <img src="<?php echo esc_url( NAVEGAR_THEME_URI . '/assets/images/logo.svg' ); ?>" alt="Navegar Sistemas" class="logo-img">
                </a>
            </div>

            <!-- Navigation -->
            <nav class="main-navigation" id="main-navigation" aria-label="<?php esc_attr_e( 'Menu Principal', 'navegar-sistemas' ); ?>">
                <!-- Mobile Menu Toggle -->
                <button
                    class="menu-toggle"
                    id="menu-toggle"
                    aria-controls="menu-container"
                    aria-expanded="false"
                    aria-label="<?php esc_attr_e( 'Abrir menu', 'navegar-sistemas' ); ?>"
                >
                    <span class="hamburger">
                        <span class="hamburger-line"></span>
                        <span class="hamburger-line"></span>
                        <span class="hamburger-line"></span>
                    </span>
                </button>

                <!-- Menu Container -->
                <div class="menu-container" id="menu-container">
                    <ul class="nav-menu" id="primary-menu">
                        <li class="menu-item">
                            <a href="#services"><?php esc_html_e( 'Serviços', 'navegar-sistemas' ); ?></a>
                        </li>
                        <li class="menu-item">
                            <a href="#benefits"><?php esc_html_e( 'Resultados', 'navegar-sistemas' ); ?></a>
                        </li>
                        <li class="menu-item">
                            <a href="#process"><?php esc_html_e( 'Metodologia', 'navegar-sistemas' ); ?></a>
                        </li>
                        <li class="menu-item">
                            <a href="#integrations"><?php esc_html_e( 'Tecnologias', 'navegar-sistemas' ); ?></a>
                        </li>
                    </ul>

                    <div class="header-cta">
                        <a href="#contact" class="btn btn-primary btn-sm">
                            <?php esc_html_e( 'Contato', 'navegar-sistemas' ); ?>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>

<main id="main-content" class="site-main">
