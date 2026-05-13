<?php
/**
 * Testimonials section.
 *
 * @package School_Theme
 */

if ( ! get_theme_mod( 'school_section_testimonials', true ) ) {
    return;
}

$query = new WP_Query( array(
    'post_type'      => 'school_testimonial',
    'posts_per_page' => 6,
    'no_found_rows'  => true,
) );
?>
<section class="testimonials-section section-pad section-alt">
    <div class="container">
        <header class="section-header">
            <span class="section-subtitle"><?php esc_html_e( 'Voices From Our Community', 'school-theme' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'What students and parents say', 'school-theme' ); ?></h2>
        </header>

        <?php if ( $query->have_posts() ) : ?>
            <div class="testimonials-slider" data-testimonials-slider>
                <div class="testimonials-track">
                    <?php while ( $query->have_posts() ) : $query->the_post();
                        $author = get_post_meta( get_the_ID(), '_school_testimonial_author', true );
                        $role   = get_post_meta( get_the_ID(), '_school_testimonial_role', true );
                        $rating = (int) get_post_meta( get_the_ID(), '_school_testimonial_rating', true );
                    ?>
                        <article class="testimonial-card">
                            <div class="testimonial-quote">
                                <?php the_content(); ?>
                            </div>
                            <?php if ( $rating > 0 ) : ?>
                                <div class="testimonial-rating" aria-label="<?php
                                    /* translators: %d: rating value. */
                                    printf( esc_attr__( 'Rated %d out of 5', 'school-theme' ), $rating ); ?>">
                                    <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
                                        <span class="<?php echo $i <= $rating ? 'star filled' : 'star'; ?>">&#9733;</span>
                                    <?php endfor; ?>
                                </div>
                            <?php endif; ?>
                            <div class="testimonial-author">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="testimonial-avatar"><?php the_post_thumbnail( 'thumbnail' ); ?></div>
                                <?php endif; ?>
                                <div class="testimonial-meta">
                                    <strong class="testimonial-name"><?php echo esc_html( $author ? $author : get_the_title() ); ?></strong>
                                    <?php if ( $role ) : ?><span class="testimonial-role"><?php echo esc_html( $role ); ?></span><?php endif; ?>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
                <div class="testimonials-controls">
                    <button class="testi-prev" aria-label="<?php esc_attr_e( 'Previous testimonial', 'school-theme' ); ?>">&larr;</button>
                    <button class="testi-next" aria-label="<?php esc_attr_e( 'Next testimonial', 'school-theme' ); ?>">&rarr;</button>
                </div>
            </div>
        <?php else : ?>
            <p class="section-empty"><?php esc_html_e( 'Add testimonials from the Testimonials menu in the admin.', 'school-theme' ); ?></p>
        <?php endif; ?>
    </div>
</section>
