<?php
/**
 * The header for our theme.
 *
 * @package School_Theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'school-theme' ); ?></a>

    <?php if ( get_theme_mod( 'school_topbar_enable', true ) ) : ?>
    <div class="site-topbar">
        <div class="container topbar-inner">
            <div class="topbar-info">
                <?php $phone = get_theme_mod( 'school_topbar_phone', '+1 (800) 123-4567' ); ?>
                <?php $email = get_theme_mod( 'school_topbar_email', 'info@example.com' ); ?>
                <?php $hours = get_theme_mod( 'school_topbar_hours', 'Mon - Fri: 8:00 AM - 5:00 PM' ); ?>
                <?php if ( $phone ) : ?>
                    <span class="topbar-item"><i class="ti ti-phone" aria-hidden="true"></i><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></span>
                <?php endif; ?>
                <?php if ( $email ) : ?>
                    <span class="topbar-item"><i class="ti ti-mail" aria-hidden="true"></i><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></span>
                <?php endif; ?>
                <?php if ( $hours ) : ?>
                    <span class="topbar-item topbar-hours"><i class="ti ti-clock" aria-hidden="true"></i><?php echo esc_html( $hours ); ?></span>
                <?php endif; ?>
            </div>
            <?php if ( has_nav_menu( 'social' ) ) : ?>
            <nav class="topbar-social" aria-label="<?php esc_attr_e( 'Social Menu', 'school-theme' ); ?>">
                <?php wp_nav_menu( array(
                    'theme_location' => 'social',
                    'menu_class'     => 'social-links',
                    'depth'          => 1,
                    'container'      => false,
                ) ); ?>
            </nav>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <header id="masthead" class="site-header">
        <div class="container header-inner">
            <div class="site-branding">
                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <?php if ( is_front_page() && is_home() ) : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php endif; ?>
                    <?php $description = get_bloginfo( 'description', 'display' ); ?>
                    <?php if ( $description || is_customize_preview() ) : ?>
                        <p class="site-description"><?php echo esc_html( $description ); ?></p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'school-theme' ); ?>">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <span class="menu-toggle-bar"></span>
                    <span class="menu-toggle-bar"></span>
                    <span class="menu-toggle-bar"></span>
                    <span class="screen-reader-text"><?php esc_html_e( 'Primary Menu', 'school-theme' ); ?></span>
                </button>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'fallback_cb'    => 'school_theme_menu_fallback',
                ) );
                ?>
            </nav>

            <div class="header-actions">
                <button class="header-search-toggle" aria-expanded="false" aria-controls="header-search" aria-label="<?php esc_attr_e( 'Toggle search', 'school-theme' ); ?>">
                    <span class="ti ti-search" aria-hidden="true"></span>
                </button>
                <?php $cta_url = get_theme_mod( 'school_header_cta_url', '' ); ?>
                <?php $cta_text = get_theme_mod( 'school_header_cta_text', __( 'Apply Now', 'school-theme' ) ); ?>
                <?php if ( $cta_url && $cta_text ) : ?>
                    <a class="btn btn-primary header-cta" href="<?php echo esc_url( $cta_url ); ?>"><?php echo esc_html( $cta_text ); ?></a>
                <?php endif; ?>
            </div>

            <div id="header-search" class="header-search" hidden>
                <?php get_search_form(); ?>
            </div>
        </div>
    </header>

    <div id="content" class="site-content">
