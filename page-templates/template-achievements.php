<?php
/**
 * Template Name: Achievements
 *
 * @package School_Theme
 */

get_header();

$query = new WP_Query( array(
    'post_type'      => 'school_achievement',
    'posts_per_page' => 12,
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
            <div class="achievements-grid">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <article class="achievement-card">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="achievement-thumb"><?php the_post_thumbnail( 'medium' ); ?></div>
                        <?php endif; ?>
                        <div class="achievement-body">
                            <h3 class="achievement-title"><?php the_title(); ?></h3>
                            <div class="achievement-excerpt"><?php the_excerpt(); ?></div>
                            <span class="achievement-date"><?php echo esc_html( get_the_date() ); ?></span>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p class="section-empty"><?php esc_html_e( 'Add achievements from Achievements → Add New.', 'school-theme' ); ?></p>
        <?php endif; ?>
    </main>
</div>

<?php get_footer(); ?>
