<?php
/**
 * Template Name: Downloads
 *
 * @package School_Theme
 */

get_header();

$query = new WP_Query( array(
    'post_type'      => 'school_download',
    'posts_per_page' => 30,
    'paged'          => max( 1, get_query_var( 'paged' ) ),
) );
?>

<div class="page-banner">
    <div class="container">
        <h1 class="page-banner-title"><?php the_title(); ?></h1>
        <?php school_theme_breadcrumbs(); ?>
    </div>
</div>

<div class="container content-with-sidebar">
    <main id="primary" class="site-main">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php if ( get_the_content() ) : ?>
                <div class="entry-content page-intro"><?php the_content(); ?></div>
            <?php endif; ?>
        <?php endwhile; ?>

        <?php if ( $query->have_posts() ) : ?>
            <ul class="downloads-list">
                <?php while ( $query->have_posts() ) : $query->the_post();
                    $file = get_post_meta( get_the_ID(), '_school_download_file', true );
                    if ( ! $file ) { continue; } ?>
                    <li class="download-item">
                        <i class="ti ti-file" aria-hidden="true"></i>
                        <span class="download-title"><?php the_title(); ?></span>
                        <a class="btn btn-outline btn-sm" href="<?php echo esc_url( $file ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Download', 'school-theme' ); ?></a>
                    </li>
                <?php endwhile; ?>
            </ul>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p class="section-empty"><?php esc_html_e( 'No downloads available yet.', 'school-theme' ); ?></p>
        <?php endif; ?>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
