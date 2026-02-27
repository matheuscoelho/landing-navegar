<?php
/**
 * Hero Section - Dark Premium com Social Proof
 *
 * @package Navegar_Sistemas
 * @since 6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section class="section-hero" id="hero">
    <div class="hero-bg-elements">
        <div class="hero-gradient"></div>
        <div class="hero-grid-pattern"></div>
    </div>

    <div class="container">
        <div class="hero-content">
            <!-- Main Content -->
            <div class="hero-main">
                <span class="hero-tagline" data-animate="fade-up"><?php esc_html_e( 'direção, não impulso.', 'navegar-sistemas' ); ?></span>
                <h1 class="hero-title" data-animate="fade-up">
                    <?php esc_html_e( 'O Futuro da Tecnologia com Inovação Estratégica', 'navegar-sistemas' ); ?>
                </h1>

                <p class="hero-subtitle" data-animate="fade-up" data-delay="100">
                    <?php esc_html_e( 'Soluções técnicas para ambientes críticos. Leve sua operação ao próximo nível com arquitetura robusta e governança inteligente.', 'navegar-sistemas' ); ?>
                </p>

                <!-- Dual CTAs -->
                <div class="hero-actions" data-animate="fade-up" data-delay="200">
                    <a href="#contact" class="btn btn-primary btn-lg">
                        <?php esc_html_e( 'Começar Agora', 'navegar-sistemas' ); ?>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"/>
                            <polyline points="12 5 19 12 12 19"/>
                        </svg>
                    </a>
                    <a href="#services" class="btn btn-outline btn-lg">
                        <?php esc_html_e( 'Explorar Serviços', 'navegar-sistemas' ); ?>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
