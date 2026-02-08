<?php
/**
 * Features Showcase Section - Alternating Image/Text Layout
 *
 * @package Navegar_Sistemas
 * @since 5.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$features = array(
    array(
        'badge'       => __( 'Ambientes Críticos', 'navegar-sistemas' ),
        'title'       => __( 'Sistemas para operações de alta exigência', 'navegar-sistemas' ),
        'description' => __( 'Projetamos sistemas corporativos com foco em continuidade do negócio, alta disponibilidade e performance consistente. A tecnologia suporta a operação, em vez de se tornar um ponto de risco.', 'navegar-sistemas' ),
        'features'    => array(
            __( 'Continuidade do negócio garantida', 'navegar-sistemas' ),
            __( 'Performance consistente sob carga', 'navegar-sistemas' ),
            __( 'Evolução controlada sem impacto', 'navegar-sistemas' ),
            __( 'Clareza de responsabilidades', 'navegar-sistemas' ),
        ),
        'image'       => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=600&q=80',
        'image_alt'   => __( 'Sistemas para ambientes críticos', 'navegar-sistemas' ),
    ),
    array(
        'badge'       => __( 'Governança', 'navegar-sistemas' ),
        'title'       => __( 'Segurança e conformidade desde a concepção', 'navegar-sistemas' ),
        'description' => __( 'Desenvolvemos soluções considerando segurança da informação, controle de acesso, rastreabilidade e preparação para auditorias. Apoiamos empresas no atendimento a normas e exigências regulatórias.', 'navegar-sistemas' ),
        'features'    => array(
            __( 'Segurança da informação integrada', 'navegar-sistemas' ),
            __( 'Controle de acesso e segregação', 'navegar-sistemas' ),
            __( 'Rastreabilidade de operações', 'navegar-sistemas' ),
            __( 'Preparação para auditorias', 'navegar-sistemas' ),
        ),
        'image'       => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?w=600&q=80',
        'image_alt'   => __( 'Segurança e conformidade', 'navegar-sistemas' ),
    ),
    array(
        'badge'       => __( 'Estratégia', 'navegar-sistemas' ),
        'title'       => __( 'Clareza técnica para decisões executivas', 'navegar-sistemas' ),
        'description' => __( 'Atuamos de forma próxima às lideranças de tecnologia e negócio, fornecendo avaliação de ambientes, identificação de riscos e apoio na tomada de decisão em arquitetura e investimentos.', 'navegar-sistemas' ),
        'features'    => array(
            __( 'Avaliação de ambientes existentes', 'navegar-sistemas' ),
            __( 'Identificação de riscos técnicos', 'navegar-sistemas' ),
            __( 'Apoio à tomada de decisão', 'navegar-sistemas' ),
            __( 'Planos de evolução tecnológica', 'navegar-sistemas' ),
        ),
        'image'       => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&q=80',
        'image_alt'   => __( 'Consultoria estratégica', 'navegar-sistemas' ),
    ),
);
?>

<section class="section-features" id="features">
    <?php foreach ( $features as $index => $feature ) : ?>
        <div class="feature-block <?php echo $index % 2 === 1 ? 'feature-reverse' : ''; ?>">
            <div class="container">
                <div class="feature-wrapper">
                    <!-- Content -->
                    <div class="feature-content reveal-up">
                        <span class="feature-badge"><?php echo esc_html( $feature['badge'] ); ?></span>
                        <h2 class="feature-title"><?php echo esc_html( $feature['title'] ); ?></h2>
                        <p class="feature-description"><?php echo esc_html( $feature['description'] ); ?></p>

                        <ul class="feature-list">
                            <?php foreach ( $feature['features'] as $item ) : ?>
                                <li>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    <span><?php echo esc_html( $item ); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <a href="#contact" class="btn btn-primary btn-animated">
                            <span class="btn-text"><?php esc_html_e( 'Saiba Mais', 'navegar-sistemas' ); ?></span>
                            <span class="btn-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </span>
                        </a>
                    </div>

                    <!-- Image -->
                    <div class="feature-image reveal-fade">
                        <img
                            src="<?php echo esc_url( $feature['image'] ); ?>"
                            alt="<?php echo esc_attr( $feature['image_alt'] ); ?>"
                            loading="lazy"
                        />
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</section>
