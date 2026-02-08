<?php
/**
 * Front Page Template - Dark Premium
 *
 * @package Navegar_Sistemas
 * @since 6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main class="front-page-content">
    <?php
    // 1. Hero - Dark premium com badges e social proof
    get_template_part( 'template-parts/section', 'hero' );

    // 2. Stats - Números de impacto
    get_template_part( 'template-parts/section', 'stats' );

    // 3. Services - Grid de cards com ícones
    get_template_part( 'template-parts/section', 'services' );

    // 4. Benefits - Split layout com gráficos
    get_template_part( 'template-parts/section', 'benefits' );

    // 5. Process - Metodologia
    get_template_part( 'template-parts/section', 'process' );

    // 6. Integrations - Tecnologias
    get_template_part( 'template-parts/section', 'integrations' );

    // 7. CTA - Chamada para ação
    get_template_part( 'template-parts/section', 'cta' );

    // 8. Contact - Formulário
    get_template_part( 'template-parts/section', 'contact' );
    ?>
</main>

<?php
get_footer();
