<?php
/**
 * Process Section - Timeline Visual
 *
 * @package Navegar_Sistemas
 * @since 6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$steps = array(
    array(
        'number' => '01',
        'title'  => __( 'Diagnóstico', 'navegar-sistemas' ),
        'desc'   => __( 'Avaliação do ambiente existente. Identificação de riscos e oportunidades.', 'navegar-sistemas' ),
        'icon'   => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>',
    ),
    array(
        'number' => '02',
        'title'  => __( 'Arquitetura', 'navegar-sistemas' ),
        'desc'   => __( 'Definição de padrões técnicos e organização de domínios.', 'navegar-sistemas' ),
        'icon'   => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>',
    ),
    array(
        'number' => '03',
        'title'  => __( 'Implementação', 'navegar-sistemas' ),
        'desc'   => __( 'Desenvolvimento com foco em segurança e conformidade.', 'navegar-sistemas' ),
        'icon'   => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>',
    ),
    array(
        'number' => '04',
        'title'  => __( 'Sustentação', 'navegar-sistemas' ),
        'desc'   => __( 'Manutenção contínua e evolução controlada do sistema.', 'navegar-sistemas' ),
        'icon'   => '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"/><path d="M22 12A10 10 0 0 0 12 2v10z"/></svg>',
    ),
);
?>

<section class="section-process" id="process">
    <div class="container">
        <header class="section-header" data-animate="fade-up">
            <span class="section-label">
                <?php esc_html_e( 'Metodologia', 'navegar-sistemas' ); ?>
            </span>
            <h2 class="section-title">
                <?php esc_html_e( 'Processo Previsível e Auditável', 'navegar-sistemas' ); ?>
            </h2>
            <p class="section-desc">
                <?php esc_html_e( 'Uma abordagem sistemática que minimiza riscos e maximiza resultados.', 'navegar-sistemas' ); ?>
            </p>
        </header>

        <div class="process-timeline">
            <?php foreach ( $steps as $index => $step ) : ?>
                <div class="process-step" data-animate="fade-up" data-delay="<?php echo esc_attr( $index * 100 ); ?>">
                    <div class="step-connector"></div>
                    <div class="step-icon">
                        <?php echo $step['icon']; ?>
                    </div>
                    <div class="step-content">
                        <span class="step-number"><?php echo esc_html( $step['number'] ); ?></span>
                        <h3 class="step-title"><?php echo esc_html( $step['title'] ); ?></h3>
                        <p class="step-desc"><?php echo esc_html( $step['desc'] ); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
