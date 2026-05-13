<?php
/**
 * Functions which augment the front-end content.
 *
 * @package School_Theme
 */

function school_theme_body_classes( $classes ) {
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }
    if ( is_active_sidebar( 'sidebar-1' ) && ( is_singular() || is_archive() || is_home() || is_search() ) && ! is_front_page() ) {
        $classes[] = 'has-sidebar';
    } else {
        $classes[] = 'no-sidebar';
    }
    if ( is_front_page() ) {
        $classes[] = 'home-front';
    }
    return $classes;
}
add_filter( 'body_class', 'school_theme_body_classes' );

function school_theme_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'school_theme_pingback_header' );

function school_theme_excerpt_more( $more ) {
    if ( is_admin() ) {
        return $more;
    }
    return ' &hellip;';
}
add_filter( 'excerpt_more', 'school_theme_excerpt_more' );

function school_theme_excerpt_length( $length ) {
    if ( is_admin() ) {
        return $length;
    }
    return 28;
}
add_filter( 'excerpt_length', 'school_theme_excerpt_length' );
