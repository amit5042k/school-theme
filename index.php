<?php
/**
 * The main template file.
 *
 * @package School_Theme
 */

get_header(); ?>

<div class="container content-with-sidebar">
    <main id="primary" class="site-main">
        <?php if ( have_posts() ) : ?>

            <?php if ( is_home() && ! is_front_page() ) : ?>
                <header class="page-header">
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                </header>
            <?php endif; ?>

            <div class="post-grid">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
                <?php endwhile; ?>
            </div>

            <?php the_posts_pagination( array(
                'prev_text' => esc_html__( 'Previous', 'school-theme' ),
                'next_text' => esc_html__( 'Next', 'school-theme' ),
            ) ); ?>

        <?php else : ?>
            <?php get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; ?>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
