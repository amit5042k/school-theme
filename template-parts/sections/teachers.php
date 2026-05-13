<?php
/**
 * Teachers section.
 *
 * @package School_Theme
 */

if ( ! get_theme_mod( 'school_section_teachers', true ) ) {
    return;
}

$query = new WP_Query( array(
    'post_type'      => 'school_teacher',
    'posts_per_page' => 4,
    'no_found_rows'  => true,
) );
?>
<section class="teachers-section section-pad">
    <div class="container">
        <header class="section-header">
            <span class="section-subtitle"><?php esc_html_e( 'Meet Our Faculty', 'school-theme' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'Teachers who care, mentors who inspire', 'school-theme' ); ?></h2>
        </header>

        <?php if ( $query->have_posts() ) : ?>
            <div class="teachers-grid">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php get_template_part( 'template-parts/content', 'teacher' ); ?>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <p class="section-empty"><?php esc_html_e( 'No teachers added yet. Create some from Teachers → Add New in the WordPress admin.', 'school-theme' ); ?></p>
        <?php endif; ?>
    </div>
</section>
