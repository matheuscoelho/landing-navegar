<?php
/**
 * Benefits Section - Split Layout com Gráficos
 *
 * @package Navegar_Sistemas
 * @since 6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$benefits = array(
    array(
        'title' => __( 'Redução de 40% em incidentes', 'navegar-sistemas' ),
        'desc'  => __( 'Arquitetura proativa que previne problemas antes que afetem a operação.', 'navegar-sistemas' ),
    ),
    array(
        'title' => __( 'Time-to-market 3x mais rápido', 'navegar-sistemas' ),
        'desc'  => __( 'Processos ágeis e automação que aceleram entregas sem sacrificar qualidade.', 'navegar-sistemas' ),
    ),
    array(
        'title' => __( 'ROI mensurável em 6 meses', 'navegar-sistemas' ),
        'desc'  => __( 'Investimentos em tecnologia com retorno visível e rastreável.', 'navegar-sistemas' ),
    ),
    array(
        'title' => __( 'Conformidade garantida', 'navegar-sistemas' ),
        'desc'  => __( 'Sistemas prontos para auditorias e requisitos regulatórios.', 'navegar-sistemas' ),
    ),
);
?>

<section class="section-benefits" id="benefits">
    <div class="container">
        <div class="benefits-wrapper">
            <!-- Charts Side -->
            <div class="benefits-charts" data-animate="fade-right">
                <div class="chart-card">
                    <div class="chart-header">
                        <span class="chart-label"><?php esc_html_e( 'Performance', 'navegar-sistemas' ); ?></span>
                        <span class="chart-value">+127%</span>
                    </div>
                    <div class="chart-bars">
                        <div class="chart-bar" style="--height: 40%;"><span>Q1</span></div>
                        <div class="chart-bar" style="--height: 55%;"><span>Q2</span></div>
                        <div class="chart-bar" style="--height: 75%;"><span>Q3</span></div>
                        <div class="chart-bar chart-bar-accent" style="--height: 90%;"><span>Q4</span></div>
                    </div>
                </div>

                <div class="chart-card chart-card-secondary">
                    <div class="chart-header">
                        <span class="chart-label"><?php esc_html_e( 'Disponibilidade', 'navegar-sistemas' ); ?></span>
                        <span class="chart-value">99.9%</span>
                    </div>
                    <div class="chart-ring">
                        <svg viewBox="0 0 100 100">
                            <circle cx="50" cy="50" r="40" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="8"/>
                            <circle cx="50" cy="50" r="40" fill="none" stroke="#FD6800" stroke-width="8" stroke-dasharray="251.2" stroke-dashoffset="2.5" transform="rotate(-90 50 50)"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Content Side -->
            <div class="benefits-content" data-animate="fade-left">
                <span class="section-label"><?php esc_html_e( 'Resultados', 'navegar-sistemas' ); ?></span>
                <h2 class="section-title">
                    <?php esc_html_e( 'Impacto Real no Seu Negócio', 'navegar-sistemas' ); ?>
                </h2>

                <ul class="benefits-list">
                    <?php foreach ( $benefits as $benefit ) : ?>
                        <li class="benefit-item">
                            <div class="benefit-check">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                            </div>
                            <div class="benefit-text">
                                <strong><?php echo esc_html( $benefit['title'] ); ?></strong>
                                <span><?php echo esc_html( $benefit['desc'] ); ?></span>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <a href="#contact" class="btn btn-primary">
                    <?php esc_html_e( 'Falar com Especialista', 'navegar-sistemas' ); ?>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="5" y1="12" x2="19" y2="12"/>
                        <polyline points="12 5 19 12 12 19"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
