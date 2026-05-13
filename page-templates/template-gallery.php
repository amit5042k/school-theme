<?php
/**
 * Template Name: Gallery
 *
 * @package School_Theme
 */

get_header();

$albums = get_terms( array(
    'taxonomy'   => 'gallery_album',
    'hide_empty' => true,
) );

$current = isset( $_GET['album'] ) ? sanitize_title( wp_unslash( $_GET['album'] ) ) : '';

$args = array(
    'post_type'      => 'school_gallery',
    'posts_per_page' => 24,
    'paged'          => max( 1, get_query_var( 'paged' ) ),
);
if ( $current ) {
    $args['tax_query'] = array( array(
        'taxonomy' => 'gallery_album',
        'field'    => 'slug',
        'terms'    => $current,
    ) );
}
$query = new WP_Query( $args );
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

        <?php if ( ! empty( $albums ) && ! is_wp_error( $albums ) ) : ?>
            <div class="gallery-filter">
                <a class="gallery-filter-link <?php echo $current ? '' : 'is-active'; ?>" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'All', 'school-theme' ); ?></a>
                <?php foreach ( $albums as $album ) : ?>
                    <a class="gallery-filter-link <?php echo $current === $album->slug ? 'is-active' : ''; ?>" href="<?php echo esc_url( add_query_arg( 'album', $album->slug, get_permalink() ) ); ?>"><?php echo esc_html( $album->name ); ?></a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ( $query->have_posts() ) : ?>
            <div class="gallery-grid">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <a class="gallery-item" href="<?php echo esc_url( has_post_thumbnail() ? get_the_post_thumbnail_url( null, 'large' ) : get_permalink() ); ?>" data-lightbox>
                        <?php if ( has_post_thumbnail() ) {
                            the_post_thumbnail( 'medium_large' );
                        } ?>
                        <span class="gallery-caption"><?php the_title(); ?></span>
                    </a>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p class="section-empty"><?php esc_html_e( 'No gallery items yet.', 'school-theme' ); ?></p>
        <?php endif; ?>
    </main>
</div>

<?php get_footer(); ?>
