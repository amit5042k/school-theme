<?php
/**
 * Front page hero section.
 *
 * @package School_Theme
 */

$subtitle = get_theme_mod( 'school_hero_subtitle', __( 'Welcome to our school', 'school-theme' ) );
$title    = get_theme_mod( 'school_hero_title', __( 'Learn, Grow, Lead — Your Future Starts Here', 'school-theme' ) );
$text     = get_theme_mod( 'school_hero_text', __( 'A modern learning experience for curious minds. Discover courses taught by experts, world-class facilities, and a community that believes in you.', 'school-theme' ) );
$btn1     = get_theme_mod( 'school_hero_btn1_text', __( 'Browse Courses', 'school-theme' ) );
$btn1_url = get_theme_mod( 'school_hero_btn1_url', '#' );
$btn2     = get_theme_mod( 'school_hero_btn2_text', __( 'About Us', 'school-theme' ) );
$btn2_url = get_theme_mod( 'school_hero_btn2_url', '#' );
$image    = get_theme_mod( 'school_hero_image', '' );
$style    = $image ? 'style="background-image:linear-gradient(135deg, rgba(15,30,60,.78), rgba(31,111,235,.55)), url(' . esc_url( $image ) . ');"' : '';
?>
<section class="hero-section" <?php echo $style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
    <div class="container hero-inner">
        <div class="hero-content">
            <?php if ( $subtitle ) : ?><span class="hero-subtitle"><?php echo esc_html( $subtitle ); ?></span><?php endif; ?>
            <h1 class="hero-title"><?php echo esc_html( $title ); ?></h1>
            <?php if ( $text ) : ?><p class="hero-text"><?php echo wp_kses_post( $text ); ?></p><?php endif; ?>
            <div class="hero-buttons">
                <?php if ( $btn1 ) : ?><a class="btn btn-primary btn-lg" href="<?php echo esc_url( $btn1_url ); ?>"><?php echo esc_html( $btn1 ); ?></a><?php endif; ?>
                <?php if ( $btn2 ) : ?><a class="btn btn-outline-light btn-lg" href="<?php echo esc_url( $btn2_url ); ?>"><?php echo esc_html( $btn2 ); ?></a><?php endif; ?>
            </div>
        </div>
        <div class="hero-decor" aria-hidden="true">
            <span class="hero-circle hero-circle-1"></span>
            <span class="hero-circle hero-circle-2"></span>
        </div>
    </div>
</section>
