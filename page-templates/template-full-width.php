<?php
/**
 * Template Name: Full Width
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

<div class="container no-sidebar-content">
    <main id="primary" class="site-main full-width">
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'page-article' ); ?>>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </main>
</div>

<?php get_footer(); ?>
