<?php
/**
 * Features section.
 *
 * @package School_Theme
 */

if ( ! get_theme_mod( 'school_section_features', true ) ) {
    return;
}

$features = array(
    array( 'icon' => 'ti-school',           'title' => __( 'Expert Teachers', 'school-theme' ),    'text' => __( 'Learn from qualified, passionate educators who care about your success.', 'school-theme' ) ),
    array( 'icon' => 'ti-book',             'title' => __( 'Diverse Courses', 'school-theme' ),    'text' => __( 'From core academics to electives, choose the path that fits your goals.', 'school-theme' ) ),
    array( 'icon' => 'ti-certificate',      'title' => __( 'Certifications', 'school-theme' ),     'text' => __( 'Earn recognized certificates as you complete your learning journey.', 'school-theme' ) ),
    array( 'icon' => 'ti-headphones',       'title' => __( 'Student Support', 'school-theme' ),    'text' => __( 'Caring counselors and mentors are here whenever you need a hand.', 'school-theme' ) ),
);
?>
<section class="features-section section-pad">
    <div class="container">
        <div class="features-grid">
            <?php foreach ( $features as $f ) : ?>
                <div class="feature-card">
                    <div class="feature-icon"><i class="ti <?php echo esc_attr( $f['icon'] ); ?>" aria-hidden="true"></i></div>
                    <h3 class="feature-title"><?php echo esc_html( $f['title'] ); ?></h3>
                    <p class="feature-text"><?php echo esc_html( $f['text'] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
