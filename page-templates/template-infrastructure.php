<?php
/**
 * Template Name: Infrastructure / Facilities
 *
 * Renders the page content followed by a grid of facility cards.
 * Each facility is a child page of this page; featured image + title
 * + excerpt are used as the card.
 *
 * @package School_Theme
 */

get_header();
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

        <?php
        $facilities = new WP_Query( array(
            'post_type'      => 'page',
            'post_parent'    => get_the_ID(),
            'posts_per_page' => -1,
            'orderby'        => 'menu_order title',
            'order'          => 'ASC',
            'no_found_rows'  => true,
        ) );
        if ( $facilities->have_posts() ) : ?>
            <div class="facilities-grid">
                <?php while ( $facilities->have_posts() ) : $facilities->the_post(); ?>
                    <article class="facility-card">
                        <a class="facility-thumb" href="<?php the_permalink(); ?>">
                            <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail( 'medium_large' );
                            } else {
                                echo '<div class="facility-thumb-placeholder"></div>';
                            } ?>
                        </a>
                        <div class="facility-body">
                            <h3 class="facility-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="facility-excerpt"><?php the_excerpt(); ?></div>
                            <a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more →', 'school-theme' ); ?></a>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <p class="section-empty"><?php esc_html_e( 'Add child pages under this page (Library, Labs, Sports, Transport, etc.) and they will appear here automatically with their featured images and excerpts.', 'school-theme' ); ?></p>
        <?php endif; ?>
    </main>
</div>

<?php get_footer(); ?>
