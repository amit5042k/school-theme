<?php
/**
 * School Theme functions and definitions.
 *
 * @package School_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'SCHOOL_THEME_VERSION', '1.0.0' );
define( 'SCHOOL_THEME_DIR', get_template_directory() );
define( 'SCHOOL_THEME_URI', get_template_directory_uri() );

if ( ! function_exists( 'school_theme_setup' ) ) :
    function school_theme_setup() {
        load_theme_textdomain( 'school-theme', SCHOOL_THEME_DIR . '/languages' );

        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'custom-logo', array(
            'height'      => 80,
            'width'       => 240,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
        add_theme_support( 'custom-background', array(
            'default-color' => 'ffffff',
        ) );
        add_theme_support( 'custom-header', array(
            'default-image' => '',
            'width'         => 1920,
            'height'        => 600,
            'flex-width'    => true,
            'flex-height'   => true,
        ) );
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
            'navigation-widgets',
        ) );
        add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio' ) );
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'align-wide' );
        add_theme_support( 'editor-styles' );
        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'woocommerce' );

        add_image_size( 'school-course', 600, 400, true );
        add_image_size( 'school-teacher', 400, 400, true );
        add_image_size( 'school-hero', 1920, 800, true );

        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Menu', 'school-theme' ),
            'footer'  => esc_html__( 'Footer Menu', 'school-theme' ),
            'social'  => esc_html__( 'Social Menu', 'school-theme' ),
        ) );

        add_editor_style( 'assets/css/editor.css' );

        add_theme_support( 'starter-content', school_theme_starter_content() );
    }
endif;
add_action( 'after_setup_theme', 'school_theme_setup' );

function school_theme_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'school_theme_content_width', 1200 );
}
add_action( 'after_setup_theme', 'school_theme_content_width', 0 );

function school_theme_scripts() {
    wp_enqueue_style( 'school-theme-style', get_stylesheet_uri(), array(), SCHOOL_THEME_VERSION );
    wp_enqueue_style( 'school-theme-main', SCHOOL_THEME_URI . '/assets/css/main.css', array(), SCHOOL_THEME_VERSION );
    wp_enqueue_style( 'school-theme-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Lora:ital,wght@0,400;0,500;0,600;1,400&display=swap', array(), null );

    wp_enqueue_script( 'school-theme-navigation', SCHOOL_THEME_URI . '/assets/js/navigation.js', array(), SCHOOL_THEME_VERSION, true );
    wp_enqueue_script( 'school-theme-main', SCHOOL_THEME_URI . '/assets/js/main.js', array( 'jquery' ), SCHOOL_THEME_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'school_theme_scripts' );

function school_theme_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Main Sidebar', 'school-theme' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Appears on posts and pages.', 'school-theme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    for ( $i = 1; $i <= 4; $i++ ) {
        register_sidebar( array(
            /* translators: %d is the footer column number. */
            'name'          => sprintf( esc_html__( 'Footer Column %d', 'school-theme' ), $i ),
            'id'            => 'footer-' . $i,
            'description'   => esc_html__( 'Footer widget area.', 'school-theme' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );
    }
}
add_action( 'widgets_init', 'school_theme_widgets_init' );

require_once SCHOOL_THEME_DIR . '/inc/custom-post-types.php';
require_once SCHOOL_THEME_DIR . '/inc/customizer.php';
require_once SCHOOL_THEME_DIR . '/inc/template-tags.php';
require_once SCHOOL_THEME_DIR . '/inc/template-functions.php';
require_once SCHOOL_THEME_DIR . '/inc/notices.php';
require_once SCHOOL_THEME_DIR . '/inc/starter-content.php';

if ( class_exists( 'WooCommerce' ) ) {
    require_once SCHOOL_THEME_DIR . '/inc/woocommerce.php';
}
