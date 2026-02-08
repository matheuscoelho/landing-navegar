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
            <!-- Floating Badges -->
            <div class="hero-badges">
                <div class="badge badge-float badge-top-left" data-animate="fade-in">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                    <span><?php esc_html_e( 'Segurança', 'navegar-sistemas' ); ?></span>
                </div>
                <div class="badge badge-float badge-top-right" data-animate="fade-in">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
                    </svg>
                    <span>99.9% Uptime</span>
                </div>
                <div class="badge badge-float badge-bottom-left" data-animate="fade-in">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                    </svg>
                    <span><?php esc_html_e( 'Escalável', 'navegar-sistemas' ); ?></span>
                </div>
            </div>

            <!-- Main Content -->
            <div class="hero-main">
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

                <!-- Social Proof -->
                <div class="hero-social-proof" data-animate="fade-up" data-delay="300">
                    <div class="rating">
                        <div class="stars">
                            <?php for ( $i = 0; $i < 5; $i++ ) : ?>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="#F59E0B">
                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                                </svg>
                            <?php endfor; ?>
                        </div>
                        <span class="rating-text">
                            <strong>4.9</strong> <?php esc_html_e( 'de 5 estrelas', 'navegar-sistemas' ); ?>
                        </span>
                    </div>
                    <span class="divider"></span>
                    <span class="reviews-count">
                        <?php esc_html_e( 'Baseado em', 'navegar-sistemas' ); ?> <strong>50+</strong> <?php esc_html_e( 'avaliações', 'navegar-sistemas' ); ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
