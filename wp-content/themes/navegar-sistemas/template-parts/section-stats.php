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
        'number' => '100+',
        'label'  => __( 'Projetos Entregues', 'navegar-sistemas' ),
        'icon'   => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
    ),
    array(
        'number' => '15+',
        'label'  => __( 'Anos de Experiência', 'navegar-sistemas' ),
        'icon'   => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
    ),
    array(
        'number' => '99.9%',
        'label'  => __( 'Disponibilidade Garantida', 'navegar-sistemas' ),
        'icon'   => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>',
    ),
    array(
        'number' => '50+',
        'label'  => __( 'Clientes Ativos', 'navegar-sistemas' ),
        'icon'   => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
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
