<?php
/**
 * CTA Section - Dark Premium
 *
 * @package Navegar_Sistemas
 * @since 6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section class="section-cta" id="cta">
    <div class="cta-bg">
        <div class="cta-gradient"></div>
    </div>
    <div class="container">
        <div class="cta-wrapper" data-animate="fade-up">
            <h2 class="cta-title">
                <?php esc_html_e( 'Da Ideia à Produção em Semanas', 'navegar-sistemas' ); ?>
            </h2>

            <p class="cta-desc">
                <?php esc_html_e( 'Acelere sua operação com nossa tecnologia. Reduza riscos e otimize custos com soluções robustas e escaláveis.', 'navegar-sistemas' ); ?>
            </p>

            <div class="cta-actions">
                <a href="#contact" class="btn btn-accent btn-lg">
                    <?php esc_html_e( 'Agendar Consultoria', 'navegar-sistemas' ); ?>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="5" y1="12" x2="19" y2="12"/>
                        <polyline points="12 5 19 12 12 19"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
