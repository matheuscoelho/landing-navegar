<?php
/**
 * Footer Template - Dark Premium
 *
 * @package Navegar_Sistemas
 * @since 6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

</main><!-- #main-content -->

<footer class="site-footer" id="site-footer">
    <div class="container">
        <div class="footer-grid">
            <!-- Brand Column -->
            <div class="footer-brand">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo-link">
                    <img src="<?php echo esc_url( NAVEGAR_THEME_URI . '/assets/images/logo.svg' ); ?>" alt="Navegar Sistemas" class="footer-logo-img">
                </a>
                <p class="footer-tagline">
                    <?php esc_html_e( 'Parceira técnica estratégica para organizações que operam em ambientes críticos e regulados.', 'navegar-sistemas' ); ?>
                </p>
            </div>

            <!-- Company Links -->
            <div class="footer-links">
                <h4 class="footer-title"><?php esc_html_e( 'Empresa', 'navegar-sistemas' ); ?></h4>
                <nav class="footer-nav">
                    <a href="#about"><?php esc_html_e( 'Sobre', 'navegar-sistemas' ); ?></a>
                    <a href="#services"><?php esc_html_e( 'Serviços', 'navegar-sistemas' ); ?></a>
                    <a href="#process"><?php esc_html_e( 'Metodologia', 'navegar-sistemas' ); ?></a>
                    <a href="#contact"><?php esc_html_e( 'Contato', 'navegar-sistemas' ); ?></a>
                </nav>
            </div>

            <!-- Services Links -->
            <div class="footer-links">
                <h4 class="footer-title"><?php esc_html_e( 'Serviços', 'navegar-sistemas' ); ?></h4>
                <nav class="footer-nav">
                    <a href="#services"><?php esc_html_e( 'Sistemas Corporativos', 'navegar-sistemas' ); ?></a>
                    <a href="#services"><?php esc_html_e( 'Integração', 'navegar-sistemas' ); ?></a>
                    <a href="#services"><?php esc_html_e( 'Arquitetura', 'navegar-sistemas' ); ?></a>
                    <a href="#services"><?php esc_html_e( 'Consultoria', 'navegar-sistemas' ); ?></a>
                </nav>
            </div>

            <!-- Contact Info -->
            <div class="footer-contact">
                <h4 class="footer-title"><?php esc_html_e( 'Contato', 'navegar-sistemas' ); ?></h4>
                <div class="contact-info">
                    <a href="mailto:contato@navegarsistemas.com.br">contato@navegarsistemas.com.br</a>
                    <a href="tel:+5511969662203">+55 11 96966-2203</a>
                    <span><?php esc_html_e( 'São Paulo/SP', 'navegar-sistemas' ); ?></span>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="footer-bottom">
            <p class="copyright">
                &copy; <?php echo esc_html( date( 'Y' ) ); ?> Navegar Sistemas LTDA. CNPJ 62.036.640/0001-09. <?php esc_html_e( 'Todos os direitos reservados.', 'navegar-sistemas' ); ?>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
