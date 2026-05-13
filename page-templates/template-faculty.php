<?php
/**
 * Template Name: Faculty / Teachers
 *
 * @package School_Theme
 */

get_header();

$query = new WP_Query( array(
    'post_type'      => 'school_teacher',
    'posts_per_page' => 24,
    'paged'          => max( 1, get_query_var( 'paged' ) ),
) );
?>

<div class="page-banner">
    <div class="container">
        <h1 class="page-banner-title"><?php the_title(); ?></h1>
        <?php school_theme_breadcrumbs(); ?>
    </div>
</div>

<div class="container">
    <main id="primary" class="site-main">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php if ( get_the_content() ) : ?>
                <div class="entry-content page-intro"><?php the_content(); ?></div>
            <?php endif; ?>
        <?php endwhile; ?>

        <?php if ( $query->have_posts() ) : ?>
            <div class="teachers-grid">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php get_template_part( 'template-parts/content', 'teacher' ); ?>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p class="section-empty"><?php esc_html_e( 'Add faculty members from Teachers → Add New.', 'school-theme' ); ?></p>
        <?php endif; ?>
    </main>
</div>

<?php get_footer(); ?>
