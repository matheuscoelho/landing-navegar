<?php
/**
 * Contact Section - Dark Premium
 *
 * @package Navegar_Sistemas
 * @since 6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section class="section-contact" id="contact">
    <div class="container">
        <div class="contact-wrapper">
            <div class="contact-info" data-animate="fade-right">
                <span class="section-label">
                    <?php esc_html_e( 'Contato', 'navegar-sistemas' ); ?>
                </span>

                <h2 class="section-title">
                    <?php esc_html_e( 'Vamos Conversar', 'navegar-sistemas' ); ?>
                </h2>

                <p class="contact-desc">
                    <?php esc_html_e( 'Descreva brevemente seu cenário. Nossa equipe entrará em contato em até 2 dias úteis.', 'navegar-sistemas' ); ?>
                </p>

                <div class="contact-details">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                        </div>
                        <div class="contact-text">
                            <span class="contact-label"><?php esc_html_e( 'Email', 'navegar-sistemas' ); ?></span>
                            <a href="mailto:contato@navegarsistemas.com.br">contato@navegarsistemas.com.br</a>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                        </div>
                        <div class="contact-text">
                            <span class="contact-label"><?php esc_html_e( 'Telefone', 'navegar-sistemas' ); ?></span>
                            <a href="tel:+5511969662203">+55 11 96966-2203</a>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                        </div>
                        <div class="contact-text">
                            <span class="contact-label"><?php esc_html_e( 'Localização', 'navegar-sistemas' ); ?></span>
                            <span><?php esc_html_e( 'São Paulo/SP', 'navegar-sistemas' ); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-form-wrapper" data-animate="fade-left">
                <form id="contact-form" class="contact-form" method="post">
                    <?php wp_nonce_field( 'navegar_contact_form', 'navegar_nonce' ); ?>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact-name"><?php esc_html_e( 'Nome', 'navegar-sistemas' ); ?></label>
                            <input type="text" id="contact-name" name="name" placeholder="<?php esc_attr_e( 'Seu nome completo', 'navegar-sistemas' ); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="contact-email"><?php esc_html_e( 'Email', 'navegar-sistemas' ); ?></label>
                            <input type="email" id="contact-email" name="email" placeholder="<?php esc_attr_e( 'seu@email.com', 'navegar-sistemas' ); ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contact-message"><?php esc_html_e( 'Mensagem', 'navegar-sistemas' ); ?></label>
                        <textarea id="contact-message" name="message" rows="5" placeholder="<?php esc_attr_e( 'Descreva brevemente seu cenário ou necessidade...', 'navegar-sistemas' ); ?>" required></textarea>
                    </div>

                    <div class="form-submit">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <?php esc_html_e( 'Enviar Mensagem', 'navegar-sistemas' ); ?>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="22" y1="2" x2="11" y2="13"/>
                                <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                            </svg>
                        </button>
                    </div>

                    <div id="form-message" class="form-message"></div>
                </form>
            </div>
        </div>
    </div>
</section>
