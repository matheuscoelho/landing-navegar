<?php
/**
 * Services Section - Cards com Ícones
 *
 * @package Navegar_Sistemas
 * @since 6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$services = array(
    array(
        'title' => __( 'Sistemas Corporativos', 'navegar-sistemas' ),
        'desc'  => __( 'Plataformas críticas desenvolvidas sob medida para sua operação.', 'navegar-sistemas' ),
        'icon'  => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>',
    ),
    array(
        'title' => __( 'Integração de Sistemas', 'navegar-sistemas' ),
        'desc'  => __( 'Conexão segura entre plataformas, parceiros e fornecedores.', 'navegar-sistemas' ),
        'icon'  => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>',
    ),
    array(
        'title' => __( 'Arquitetura e Escalabilidade', 'navegar-sistemas' ),
        'desc'  => __( 'Design de sistemas preparados para crescimento e mudanças.', 'navegar-sistemas' ),
        'icon'  => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>',
    ),
    array(
        'title' => __( 'Segurança e Conformidade', 'navegar-sistemas' ),
        'desc'  => __( 'Proteção desde a concepção. Auditoria e rastreabilidade.', 'navegar-sistemas' ),
        'icon'  => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    ),
    array(
        'title' => __( 'Consultoria Estratégica', 'navegar-sistemas' ),
        'desc'  => __( 'Avaliação técnica e apoio à tomada de decisão.', 'navegar-sistemas' ),
        'icon'  => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>',
    ),
    array(
        'title' => __( 'Sustentação e Evolução', 'navegar-sistemas' ),
        'desc'  => __( 'Manutenção contínua e evolução controlada de sistemas.', 'navegar-sistemas' ),
        'icon'  => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"/><path d="M22 12A10 10 0 0 0 12 2v10z"/></svg>',
    ),
);
?>

<section class="section-services" id="services">
    <div class="container">
        <header class="section-header" data-animate="fade-up">
            <span class="section-label">
                <?php esc_html_e( 'Serviços', 'navegar-sistemas' ); ?>
            </span>
            <h2 class="section-title">
                <?php esc_html_e( 'Soluções para Ambientes Críticos', 'navegar-sistemas' ); ?>
            </h2>
            <p class="section-desc">
                <?php esc_html_e( 'Do desenvolvimento à sustentação, apoiamos organizações na estruturação de ambientes tecnológicos robustos e auditáveis.', 'navegar-sistemas' ); ?>
            </p>
        </header>

        <div class="services-grid">
            <?php foreach ( $services as $index => $service ) : ?>
                <article class="service-card" data-animate="fade-up" data-delay="<?php echo esc_attr( $index * 50 ); ?>">
                    <div class="service-icon">
                        <?php echo $service['icon']; ?>
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">
                            <?php echo esc_html( $service['title'] ); ?>
                        </h3>
                        <p class="service-desc">
                            <?php echo esc_html( $service['desc'] ); ?>
                        </p>
                    </div>
                    <div class="service-arrow">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="7" y1="17" x2="17" y2="7"/>
                            <polyline points="7 7 17 7 17 17"/>
                        </svg>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
