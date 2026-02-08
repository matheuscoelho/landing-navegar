<?php
/**
 * Main Template File
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 *
 * @package Navegar_Sistemas
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<div class="content-area">
    <div class="container">
        <?php if ( have_posts() ) : ?>

            <?php if ( is_home() && ! is_front_page() ) : ?>
                <header class="page-header">
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                </header>
            <?php endif; ?>

            <div class="posts-list">
                <?php
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-item' ); ?>>
                        <header class="entry-header">
                            <?php
                            if ( is_singular() ) :
                                the_title( '<h1 class="entry-title">', '</h1>' );
                            else :
                                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                            endif;
                            ?>
                        </header>

                        <div class="entry-content">
                            <?php
                            if ( is_singular() ) :
                                the_content();
                            else :
                                the_excerpt();
                            endif;
                            ?>
                        </div>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>

            <?php
            the_posts_navigation( array(
                'prev_text' => __( '&larr; Older posts', 'navegar-sistemas' ),
                'next_text' => __( 'Newer posts &rarr;', 'navegar-sistemas' ),
            ) );
            ?>

        <?php else : ?>

            <div class="no-results">
                <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'navegar-sistemas' ); ?></h1>
                <p><?php esc_html_e( 'It seems we can\'t find what you\'re looking for.', 'navegar-sistemas' ); ?></p>
            </div>

        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
