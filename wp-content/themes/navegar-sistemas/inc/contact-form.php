<?php
/**
 * Contact Form Handler
 *
 * Handles contact form submission, validation, and email sending.
 *
 * @package Navegar_Sistemas
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register contact form AJAX handlers
 */
function navegar_register_contact_handlers() {
    add_action( 'wp_ajax_navegar_contact_form', 'navegar_handle_contact_form' );
    add_action( 'wp_ajax_nopriv_navegar_contact_form', 'navegar_handle_contact_form' );
}
add_action( 'init', 'navegar_register_contact_handlers' );

/**
 * Handle contact form submission
 */
function navegar_handle_contact_form() {
    // Verify nonce
    if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'navegar_nonce' ) ) {
        wp_send_json_error( array(
            'message' => __( 'Security verification failed. Please refresh the page and try again.', 'navegar-sistemas' ),
        ) );
    }

    // Honeypot check (anti-spam)
    if ( ! empty( $_POST['website'] ) ) {
        wp_send_json_error( array(
            'message' => __( 'Spam detected.', 'navegar-sistemas' ),
        ) );
    }

    // Get and sanitize form data
    $name = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
    $email = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
    $message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

    // Validate required fields
    $errors = array();

    if ( empty( $name ) ) {
        $errors['name'] = __( 'Please enter your name.', 'navegar-sistemas' );
    } elseif ( strlen( $name ) < 2 ) {
        $errors['name'] = __( 'Name must be at least 2 characters.', 'navegar-sistemas' );
    } elseif ( strlen( $name ) > 100 ) {
        $errors['name'] = __( 'Name must be less than 100 characters.', 'navegar-sistemas' );
    }

    if ( empty( $email ) ) {
        $errors['email'] = __( 'Please enter your email address.', 'navegar-sistemas' );
    } elseif ( ! is_email( $email ) ) {
        $errors['email'] = __( 'Please enter a valid email address.', 'navegar-sistemas' );
    }

    if ( empty( $message ) ) {
        $errors['message'] = __( 'Please enter your message.', 'navegar-sistemas' );
    } elseif ( strlen( $message ) < 10 ) {
        $errors['message'] = __( 'Message must be at least 10 characters.', 'navegar-sistemas' );
    } elseif ( strlen( $message ) > 5000 ) {
        $errors['message'] = __( 'Message must be less than 5000 characters.', 'navegar-sistemas' );
    }

    // Return validation errors
    if ( ! empty( $errors ) ) {
        wp_send_json_error( array(
            'message' => __( 'Please correct the errors below.', 'navegar-sistemas' ),
            'errors'  => $errors,
        ) );
    }

    // Rate limiting
    $ip = navegar_get_visitor_ip();
    $rate_limit_key = 'navegar_contact_' . md5( $ip );
    $rate_limit = get_transient( $rate_limit_key );

    if ( false !== $rate_limit && $rate_limit >= 3 ) {
        wp_send_json_error( array(
            'message' => __( 'Too many requests. Please try again later.', 'navegar-sistemas' ),
        ) );
    }

    // Prepare email
    $to = get_option( 'admin_email' );
    $subject = sprintf(
        /* translators: %s: sender name */
        __( '[Navegar Sistemas] Contact from %s', 'navegar-sistemas' ),
        $name
    );

    $body = navegar_get_email_template( $name, $email, $message );

    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        sprintf( 'From: %s <%s>', $name, $email ),
        sprintf( 'Reply-To: %s <%s>', $name, $email ),
    );

    // Send email
    $sent = wp_mail( $to, $subject, $body, $headers );

    if ( $sent ) {
        // Update rate limit
        $rate_limit = $rate_limit ? $rate_limit + 1 : 1;
        set_transient( $rate_limit_key, $rate_limit, HOUR_IN_SECONDS );

        wp_send_json_success( array(
            'message' => __( 'Thank you for your message. We will get back to you soon.', 'navegar-sistemas' ),
        ) );
    } else {
        wp_send_json_error( array(
            'message' => __( 'Failed to send message. Please try again or contact us directly.', 'navegar-sistemas' ),
        ) );
    }
}

/**
 * Get email template
 *
 * @param string $name Sender name.
 * @param string $email Sender email.
 * @param string $message Message content.
 * @return string
 */
function navegar_get_email_template( $name, $email, $message ) {
    $site_name = get_bloginfo( 'name' );
    $site_url = home_url();
    $date = wp_date( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ) );

    ob_start();
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body style="margin: 0; padding: 0; font-family: Arial, sans-serif; font-size: 16px; line-height: 1.6; color: #333333; background-color: #f5f5f5;">
        <table role="presentation" style="width: 100%; border-collapse: collapse;">
            <tr>
                <td align="center" style="padding: 40px 0;">
                    <table role="presentation" style="width: 600px; max-width: 100%; border-collapse: collapse; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                        <!-- Header -->
                        <tr>
                            <td style="padding: 30px 40px; background-color: #1a365d; text-align: center;">
                                <h1 style="margin: 0; color: #ffffff; font-size: 24px; font-weight: 600;">
                                    <?php echo esc_html( $site_name ); ?>
                                </h1>
                            </td>
                        </tr>

                        <!-- Content -->
                        <tr>
                            <td style="padding: 40px;">
                                <h2 style="margin: 0 0 20px; color: #1a365d; font-size: 20px;">
                                    <?php esc_html_e( 'New Contact Message', 'navegar-sistemas' ); ?>
                                </h2>

                                <table role="presentation" style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                                    <tr>
                                        <td style="padding: 10px 0; border-bottom: 1px solid #eee;">
                                            <strong><?php esc_html_e( 'Name:', 'navegar-sistemas' ); ?></strong>
                                        </td>
                                        <td style="padding: 10px 0; border-bottom: 1px solid #eee;">
                                            <?php echo esc_html( $name ); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px 0; border-bottom: 1px solid #eee;">
                                            <strong><?php esc_html_e( 'Email:', 'navegar-sistemas' ); ?></strong>
                                        </td>
                                        <td style="padding: 10px 0; border-bottom: 1px solid #eee;">
                                            <a href="mailto:<?php echo esc_attr( $email ); ?>" style="color: #3182ce;">
                                                <?php echo esc_html( $email ); ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 10px 0; border-bottom: 1px solid #eee;">
                                            <strong><?php esc_html_e( 'Date:', 'navegar-sistemas' ); ?></strong>
                                        </td>
                                        <td style="padding: 10px 0; border-bottom: 1px solid #eee;">
                                            <?php echo esc_html( $date ); ?>
                                        </td>
                                    </tr>
                                </table>

                                <div style="padding: 20px; background-color: #f7fafc; border-radius: 4px; margin-top: 20px;">
                                    <strong style="display: block; margin-bottom: 10px; color: #1a365d;">
                                        <?php esc_html_e( 'Message:', 'navegar-sistemas' ); ?>
                                    </strong>
                                    <p style="margin: 0; white-space: pre-wrap;"><?php echo esc_html( $message ); ?></p>
                                </div>
                            </td>
                        </tr>

                        <!-- Footer -->
                        <tr>
                            <td style="padding: 20px 40px; background-color: #f7fafc; text-align: center; font-size: 14px; color: #718096;">
                                <p style="margin: 0;">
                                    <?php
                                    printf(
                                        /* translators: %s: site URL */
                                        esc_html__( 'This message was sent from %s', 'navegar-sistemas' ),
                                        '<a href="' . esc_url( $site_url ) . '" style="color: #3182ce;">' . esc_html( $site_name ) . '</a>'
                                    );
                                    ?>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
    </html>
    <?php
    return ob_get_clean();
}

/**
 * Get contact form HTML
 *
 * @return string
 */
function navegar_get_contact_form() {
    ob_start();
    ?>
    <form id="contact-form" class="contact-form" method="post" novalidate>
        <div class="form-group">
            <label for="contact-name" class="form-label">
                <?php esc_html_e( 'Name', 'navegar-sistemas' ); ?>
                <span class="required">*</span>
            </label>
            <input
                type="text"
                id="contact-name"
                name="name"
                class="form-input"
                required
                minlength="2"
                maxlength="100"
                placeholder="<?php esc_attr_e( 'Your name', 'navegar-sistemas' ); ?>"
            >
            <span class="form-error" data-field="name"></span>
        </div>

        <div class="form-group">
            <label for="contact-email" class="form-label">
                <?php esc_html_e( 'Email', 'navegar-sistemas' ); ?>
                <span class="required">*</span>
            </label>
            <input
                type="email"
                id="contact-email"
                name="email"
                class="form-input"
                required
                placeholder="<?php esc_attr_e( 'your@email.com', 'navegar-sistemas' ); ?>"
            >
            <span class="form-error" data-field="email"></span>
        </div>

        <div class="form-group">
            <label for="contact-message" class="form-label">
                <?php esc_html_e( 'Message', 'navegar-sistemas' ); ?>
                <span class="required">*</span>
            </label>
            <textarea
                id="contact-message"
                name="message"
                class="form-input form-textarea"
                required
                minlength="10"
                maxlength="5000"
                rows="5"
                placeholder="<?php esc_attr_e( 'How can we help you?', 'navegar-sistemas' ); ?>"
            ></textarea>
            <span class="form-error" data-field="message"></span>
        </div>

        <!-- Honeypot field (hidden, anti-spam) -->
        <div class="form-group" style="display: none;" aria-hidden="true">
            <label for="contact-website">Website</label>
            <input type="text" id="contact-website" name="website" tabindex="-1" autocomplete="off">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary form-submit">
                <?php esc_html_e( 'Send Message', 'navegar-sistemas' ); ?>
            </button>
        </div>

        <div class="form-message" role="alert" aria-live="polite"></div>
    </form>
    <?php
    return ob_get_clean();
}
