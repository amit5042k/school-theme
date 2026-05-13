<?php
/**
 * Latest blog posts section.
 *
 * @package School_Theme
 */

if ( ! get_theme_mod( 'school_section_blog', true ) ) {
    return;
}

$query = new WP_Query( array(
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'no_found_rows'  => true,
    'ignore_sticky_posts' => true,
) );
?>
<section class="blog-section section-pad section-alt">
    <div class="container">
        <header class="section-header">
            <span class="section-subtitle"><?php esc_html_e( 'From Our Blog', 'school-theme' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'News, stories & insights', 'school-theme' ); ?></h2>
        </header>

        <?php if ( $query->have_posts() ) : ?>
            <div class="blog-grid">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php get_template_part( 'template-parts/content' ); ?>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <div class="section-cta-row">
                <a class="btn btn-outline" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ?: home_url( '/' ) ); ?>"><?php esc_html_e( 'View All Posts', 'school-theme' ); ?></a>
            </div>
        <?php else : ?>
            <p class="section-empty"><?php esc_html_e( 'No posts yet. Publish a few from the WordPress admin.', 'school-theme' ); ?></p>
        <?php endif; ?>
    </div>
</section>
