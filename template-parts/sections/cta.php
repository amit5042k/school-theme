<?php
/**
 * CTA banner section.
 *
 * @package School_Theme
 */

if ( ! get_theme_mod( 'school_section_cta', true ) ) {
    return;
}
?>
<section class="cta-section">
    <div class="container cta-inner">
        <div class="cta-content">
            <h2 class="cta-title"><?php esc_html_e( 'Ready to take the next step in your education?', 'school-theme' ); ?></h2>
            <p class="cta-text"><?php esc_html_e( 'Applications are open for the new academic year. Talk to our admissions team today.', 'school-theme' ); ?></p>
        </div>
        <div class="cta-actions">
            <a class="btn btn-accent btn-lg" href="#"><?php esc_html_e( 'Apply Now', 'school-theme' ); ?></a>
            <a class="btn btn-outline-light btn-lg" href="#"><?php esc_html_e( 'Contact Us', 'school-theme' ); ?></a>
        </div>
    </div>
</section>
