<?php
/**
 * Courses section.
 *
 * @package School_Theme
 */

if ( ! get_theme_mod( 'school_section_courses', true ) ) {
    return;
}

$query = new WP_Query( array(
    'post_type'      => 'school_course',
    'posts_per_page' => 6,
    'no_found_rows'  => true,
) );
?>
<section class="courses-section section-pad section-alt">
    <div class="container">
        <header class="section-header">
            <span class="section-subtitle"><?php esc_html_e( 'Popular Courses', 'school-theme' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'Explore our top programs', 'school-theme' ); ?></h2>
            <p class="section-lead"><?php esc_html_e( 'Hand-picked courses across disciplines, designed to spark curiosity and build real-world skills.', 'school-theme' ); ?></p>
        </header>

        <?php if ( $query->have_posts() ) : ?>
            <div class="courses-grid">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php get_template_part( 'template-parts/content', 'course' ); ?>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <div class="section-cta-row">
                <a class="btn btn-outline" href="<?php echo esc_url( get_post_type_archive_link( 'school_course' ) ); ?>"><?php esc_html_e( 'View All Courses', 'school-theme' ); ?></a>
            </div>
        <?php else : ?>
            <p class="section-empty"><?php esc_html_e( 'No courses yet. Add a few from the WordPress admin to populate this section.', 'school-theme' ); ?></p>
        <?php endif; ?>
    </div>
</section>
