<?php
/**
 * About section.
 *
 * @package School_Theme
 */

if ( ! get_theme_mod( 'school_about_enable', true ) ) {
    return;
}

$subtitle = get_theme_mod( 'school_about_subtitle', __( 'About Our School', 'school-theme' ) );
$title    = get_theme_mod( 'school_about_title', __( 'A community of curious, capable, confident learners.', 'school-theme' ) );
$text     = get_theme_mod( 'school_about_text', __( 'We blend rigorous academics with creative exploration so students leave ready to engage thoughtfully with the world. Our small class sizes, dedicated educators, and supportive environment help every student find their path.', 'school-theme' ) );
$image    = get_theme_mod( 'school_about_image', '' );
?>
<section class="about-section section-pad">
    <div class="container about-grid">
        <div class="about-media">
            <?php if ( $image ) : ?>
                <img src="<?php echo esc_url( $image ); ?>" alt="">
            <?php else : ?>
                <div class="about-media-placeholder"></div>
            <?php endif; ?>
            <div class="about-experience">
                <span class="num">15+</span>
                <span class="label"><?php esc_html_e( 'Years of Excellence', 'school-theme' ); ?></span>
            </div>
        </div>
        <div class="about-content">
            <span class="section-subtitle"><?php echo esc_html( $subtitle ); ?></span>
            <h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
            <p class="about-text"><?php echo wp_kses_post( $text ); ?></p>
            <ul class="about-bullets">
                <li><i class="ti ti-check" aria-hidden="true"></i><?php esc_html_e( 'Small class sizes with personalized attention', 'school-theme' ); ?></li>
                <li><i class="ti ti-check" aria-hidden="true"></i><?php esc_html_e( 'Accredited curriculum and qualified faculty', 'school-theme' ); ?></li>
                <li><i class="ti ti-check" aria-hidden="true"></i><?php esc_html_e( 'Modern labs, libraries, and creative spaces', 'school-theme' ); ?></li>
                <li><i class="ti ti-check" aria-hidden="true"></i><?php esc_html_e( 'Scholarships and financial aid available', 'school-theme' ); ?></li>
            </ul>
            <a class="btn btn-primary" href="#"><?php esc_html_e( 'Learn More', 'school-theme' ); ?></a>
        </div>
    </div>
</section>
