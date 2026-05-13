<?php
/**
 * The template for displaying all pages.
 *
 * @package School_Theme
 */

get_header(); ?>

<?php if ( ! is_front_page() ) : ?>
<div class="page-banner">
    <div class="container">
        <h1 class="page-banner-title"><?php the_title(); ?></h1>
        <?php school_theme_breadcrumbs(); ?>
    </div>
</div>
<?php endif; ?>

<div class="container content-with-sidebar">
    <main id="primary" class="site-main">
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'page-article' ); ?>>
                <?php if ( has_post_thumbnail() && ! is_front_page() ) : ?>
                    <div class="entry-thumbnail">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>
                <div class="entry-content">
                    <?php the_content(); ?>
                    <?php wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'school-theme' ),
                        'after'  => '</div>',
                    ) ); ?>
                </div>
            </article>
            <?php if ( comments_open() || get_comments_number() ) : ?>
                <?php comments_template(); ?>
            <?php endif; ?>
        <?php endwhile; ?>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
