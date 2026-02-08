<?php
/**
 * Stats Section - Números de Impacto
 *
 * @package Navegar_Sistemas
 * @since 6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$stats = array(
    array(
        'number' => '3x',
        'label'  => __( 'Mais Rápido no Time-to-Market', 'navegar-sistemas' ),
        'icon'   => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>',
    ),
    array(
        'number' => '99.9%',
        'label'  => __( 'Disponibilidade Garantida', 'navegar-sistemas' ),
        'icon'   => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>',
    ),
    array(
        'number' => '40%',
        'label'  => __( 'Redução em Incidentes', 'navegar-sistemas' ),
        'icon'   => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    ),
);
?>

<section class="section-stats" id="stats">
    <div class="container">
        <div class="stats-grid">
            <?php foreach ( $stats as $index => $stat ) : ?>
                <div class="stat-card" data-animate="fade-up" data-delay="<?php echo esc_attr( $index * 100 ); ?>">
                    <div class="stat-icon">
                        <?php echo $stat['icon']; ?>
                    </div>
                    <div class="stat-content">
                        <span class="stat-number" data-count="<?php echo esc_attr( preg_replace( '/[^0-9.]/', '', $stat['number'] ) ); ?>">
                            <?php echo esc_html( $stat['number'] ); ?>
                        </span>
                        <span class="stat-label"><?php echo esc_html( $stat['label'] ); ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
