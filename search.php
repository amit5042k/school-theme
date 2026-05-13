<?php
/**
 * The template for displaying search results.
 *
 * @package School_Theme
 */

get_header(); ?>

<div class="page-banner">
    <div class="container">
        <h1 class="page-banner-title">
            <?php
            /* translators: %s: search query. */
            printf( esc_html__( 'Search results for: %s', 'school-theme' ), '<span>' . esc_html( get_search_query() ) . '</span>' );
            ?>
        </h1>
        <?php school_theme_breadcrumbs(); ?>
    </div>
</div>

<div class="container content-with-sidebar">
    <main id="primary" class="site-main">
        <?php if ( have_posts() ) : ?>
            <div class="post-grid">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'template-parts/content', 'search' ); ?>
                <?php endwhile; ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <?php get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; ?>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
