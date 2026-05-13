<?php
/**
 * The template for displaying archive pages.
 *
 * @package School_Theme
 */

get_header(); ?>

<div class="page-banner">
    <div class="container">
        <h1 class="page-banner-title"><?php the_archive_title(); ?></h1>
        <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
        <?php school_theme_breadcrumbs(); ?>
    </div>
</div>

<div class="container content-with-sidebar">
    <main id="primary" class="site-main">
        <?php if ( have_posts() ) : ?>
            <div class="post-grid">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php
                    if ( get_post_type() === 'school_course' ) {
                        get_template_part( 'template-parts/content', 'course' );
                    } elseif ( get_post_type() === 'school_teacher' ) {
                        get_template_part( 'template-parts/content', 'teacher' );
                    } else {
                        get_template_part( 'template-parts/content', get_post_format() );
                    }
                    ?>
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
