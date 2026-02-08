<?php
/**
 * Theme Setup Functions
 *
 * @package Navegar_Sistemas
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Get available languages
 *
 * @return array
 */
function navegar_get_available_languages() {
    return array(
        'pt_BR' => array(
            'code'   => 'pt_BR',
            'name'   => 'Português',
            'flag'   => 'br',
            'locale' => 'pt_BR',
        ),
        'en_US' => array(
            'code'   => 'en_US',
            'name'   => 'English',
            'flag'   => 'us',
            'locale' => 'en_US',
        ),
    );
}

/**
 * Get default language
 *
 * @return string
 */
function navegar_get_default_language() {
    return 'pt_BR';
}

/**
 * Get language switcher HTML
 *
 * @return string
 */
function navegar_get_language_switcher() {
    $languages    = navegar_get_available_languages();
    $current_lang = navegar_get_current_language();
    $current_url  = home_url( add_query_arg( array() ) );

    ob_start();
    ?>
    <div class="language-switcher">
        <button class="language-switcher__toggle" aria-expanded="false" aria-haspopup="true">
            <span class="language-switcher__current">
                <?php echo esc_html( $languages[ $current_lang ]['name'] ); ?>
            </span>
            <svg class="language-switcher__arrow" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 4.5L6 7.5L9 4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <ul class="language-switcher__dropdown" role="menu">
            <?php foreach ( $languages as $code => $lang ) : ?>
                <?php
                $lang_url = add_query_arg( 'lang', $code, $current_url );
                $is_active = ( $code === $current_lang );
                ?>
                <li role="menuitem">
                    <a href="<?php echo esc_url( $lang_url ); ?>"
                       class="language-switcher__link <?php echo $is_active ? 'is-active' : ''; ?>"
                       data-lang="<?php echo esc_attr( $code ); ?>"
                       <?php echo $is_active ? 'aria-current="true"' : ''; ?>>
                        <?php echo esc_html( $lang['name'] ); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Custom walker for primary menu
 */
class Navegar_Menu_Walker extends Walker_Nav_Menu {
    /**
     * Start element
     */
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $output .= '<li' . $class_names . '>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target ) ? $item->target : '';
        $atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
        $atts['href']   = ! empty( $item->url ) ? $item->url : '';

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

/**
 * Fallback menu if no menu is assigned
 */
function navegar_fallback_menu() {
    $current_lang = navegar_get_current_language();

    $menu_items = array(
        'home' => array(
            'pt_BR' => 'Início',
            'en_US' => 'Home',
            'url'   => '#home',
        ),
        'services' => array(
            'pt_BR' => 'Serviços',
            'en_US' => 'Services',
            'url'   => '#services',
        ),
        'about' => array(
            'pt_BR' => 'Sobre',
            'en_US' => 'About',
            'url'   => '#about',
        ),
        'contact' => array(
            'pt_BR' => 'Contato',
            'en_US' => 'Contact',
            'url'   => '#contact',
        ),
    );

    echo '<ul class="nav-menu">';
    foreach ( $menu_items as $key => $item ) {
        $label = isset( $item[ $current_lang ] ) ? $item[ $current_lang ] : $item['en_US'];
        printf(
            '<li class="menu-item"><a href="%s">%s</a></li>',
            esc_url( $item['url'] ),
            esc_html( $label )
        );
    }
    echo '</ul>';
}

/**
 * Get service items with translations
 *
 * @return array
 */
function navegar_get_services() {
    return array(
        array(
            'icon'  => 'code',
            'title' => __( 'Custom Software Development', 'navegar-sistemas' ),
            'desc'  => __( 'Tailored software solutions designed to meet your specific business requirements.', 'navegar-sistemas' ),
        ),
        array(
            'icon'  => 'server',
            'title' => __( 'Backend Systems & APIs', 'navegar-sistemas' ),
            'desc'  => __( 'Robust backend architectures and RESTful APIs for scalable applications.', 'navegar-sistemas' ),
        ),
        array(
            'icon'  => 'link',
            'title' => __( 'System Integration', 'navegar-sistemas' ),
            'desc'  => __( 'Seamless integration between different systems and third-party services.', 'navegar-sistemas' ),
        ),
        array(
            'icon'  => 'lightbulb',
            'title' => __( 'Technical Consulting', 'navegar-sistemas' ),
            'desc'  => __( 'Expert guidance on technology decisions and software architecture.', 'navegar-sistemas' ),
        ),
        array(
            'icon'  => 'tool',
            'title' => __( 'Legacy System Maintenance', 'navegar-sistemas' ),
            'desc'  => __( 'Support and modernization of existing legacy systems.', 'navegar-sistemas' ),
        ),
        array(
            'icon'  => 'layers',
            'title' => __( 'Other Technology Services', 'navegar-sistemas' ),
            'desc'  => __( 'Additional technology services tailored to your needs.', 'navegar-sistemas' ),
        ),
    );
}

/**
 * Get SVG icon
 *
 * @param string $icon Icon name.
 * @return string
 */
function navegar_get_icon( $icon ) {
    $icons = array(
        'code' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>',
        'server' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>',
        'link' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>',
        'lightbulb' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="9" y1="18" x2="15" y2="18"></line><line x1="10" y1="22" x2="14" y2="22"></line><path d="M15.09 14c.18-.98.65-1.74 1.41-2.5A4.65 4.65 0 0 0 18 8 6 6 0 0 0 6 8c0 1 .23 2.23 1.5 3.5A4.61 4.61 0 0 1 8.91 14"></path></svg>',
        'tool' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>',
        'layers' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>',
        'menu' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>',
        'close' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
    );

    return isset( $icons[ $icon ] ) ? $icons[ $icon ] : '';
}
