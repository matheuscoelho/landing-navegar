<?php
/**
 * Testimonials Section - Client Reviews
 *
 * @package Navegar_Sistemas
 * @since 5.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$testimonials = array(
    array(
        'quote'    => __( 'A Navegar Sistemas transformou completamente nossa operação. O sistema desenvolvido reduziu em 40% o tempo de processamento de pedidos e eliminou erros manuais. Parceria de verdade.', 'navegar-sistemas' ),
        'author'   => 'Ricardo Mendes',
        'role'     => __( 'Diretor de Operações', 'navegar-sistemas' ),
        'company'  => 'LogTech Solutions',
        'image'    => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop&crop=face&q=80',
    ),
    array(
        'quote'    => __( 'Profissionalismo e competência técnica impressionantes. Entregaram nosso e-commerce integrado com ERP no prazo e com qualidade superior ao esperado. Recomendo fortemente.', 'navegar-sistemas' ),
        'author'   => 'Carla Oliveira',
        'role'     => __( 'CEO', 'navegar-sistemas' ),
        'company'  => 'Moda Express',
        'image'    => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop&crop=face&q=80',
    ),
    array(
        'quote'    => __( 'A consultoria técnica da Navegar nos ajudou a modernizar toda nossa infraestrutura. Migramos para cloud com zero downtime e reduzimos custos em 35%. Excelente trabalho!', 'navegar-sistemas' ),
        'author'   => 'Fernando Costa',
        'role'     => __( 'CTO', 'navegar-sistemas' ),
        'company'  => 'DataFlow Inc.',
        'image'    => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&crop=face&q=80',
    ),
);
?>

<section class="section-testimonials" id="testimonials">
    <div class="container">
        <!-- Header -->
        <header class="section-header">
            <span class="section-badge reveal-fade">
                <?php esc_html_e( 'Depoimentos', 'navegar-sistemas' ); ?>
            </span>
            <h2 class="section-title reveal-up">
                <?php esc_html_e( 'O que nossos clientes dizem', 'navegar-sistemas' ); ?>
            </h2>
            <p class="section-subtitle reveal-fade">
                <?php esc_html_e( 'Resultados reais de empresas que confiaram em nosso trabalho.', 'navegar-sistemas' ); ?>
            </p>
        </header>

        <!-- Testimonials Carousel -->
        <div class="testimonials-carousel">
            <div class="testimonials-track">
                <?php foreach ( $testimonials as $index => $testimonial ) : ?>
                    <div class="testimonial-card" data-delay="<?php echo $index * 0.15; ?>">
                        <!-- Quote Icon -->
                        <div class="testimonial-quote-icon">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                            </svg>
                        </div>

                        <!-- Quote Text -->
                        <blockquote class="testimonial-text">
                            <?php echo esc_html( $testimonial['quote'] ); ?>
                        </blockquote>

                        <!-- Author Info -->
                        <div class="testimonial-author">
                            <img
                                src="<?php echo esc_url( $testimonial['image'] ); ?>"
                                alt="<?php echo esc_attr( $testimonial['author'] ); ?>"
                                class="testimonial-avatar"
                                loading="lazy"
                            />
                            <div class="testimonial-author-info">
                                <strong class="testimonial-name"><?php echo esc_html( $testimonial['author'] ); ?></strong>
                                <span class="testimonial-role"><?php echo esc_html( $testimonial['role'] ); ?></span>
                                <span class="testimonial-company"><?php echo esc_html( $testimonial['company'] ); ?></span>
                            </div>
                        </div>

                        <!-- Rating Stars -->
                        <div class="testimonial-rating">
                            <?php for ( $i = 0; $i < 5; $i++ ) : ?>
                                <svg viewBox="0 0 24 24" fill="currentColor" class="star-icon">
                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                </svg>
                            <?php endfor; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Carousel Controls -->
            <div class="carousel-controls">
                <button class="carousel-prev" aria-label="<?php esc_attr_e( 'Anterior', 'navegar-sistemas' ); ?>">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>
                <div class="carousel-dots"></div>
                <button class="carousel-next" aria-label="<?php esc_attr_e( 'Próximo', 'navegar-sistemas' ); ?>">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>
