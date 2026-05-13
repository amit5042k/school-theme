<?php
/**
 * School Theme Customizer.
 *
 * @package School_Theme
 */

function school_theme_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    /* Topbar */
    $wp_customize->add_section( 'school_topbar', array(
        'title'    => __( 'Topbar', 'school-theme' ),
        'priority' => 30,
    ) );
    $wp_customize->add_setting( 'school_topbar_enable', array( 'default' => true, 'sanitize_callback' => 'school_theme_sanitize_bool' ) );
    $wp_customize->add_control( 'school_topbar_enable', array( 'label' => __( 'Enable Topbar', 'school-theme' ), 'section' => 'school_topbar', 'type' => 'checkbox' ) );

    $wp_customize->add_setting( 'school_topbar_phone', array( 'default' => '+1 (800) 123-4567', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'school_topbar_phone', array( 'label' => __( 'Phone', 'school-theme' ), 'section' => 'school_topbar' ) );

    $wp_customize->add_setting( 'school_topbar_email', array( 'default' => 'info@example.com', 'sanitize_callback' => 'sanitize_email' ) );
    $wp_customize->add_control( 'school_topbar_email', array( 'label' => __( 'Email', 'school-theme' ), 'section' => 'school_topbar' ) );

    $wp_customize->add_setting( 'school_topbar_hours', array( 'default' => 'Mon - Fri: 8:00 AM - 5:00 PM', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'school_topbar_hours', array( 'label' => __( 'Working Hours', 'school-theme' ), 'section' => 'school_topbar' ) );

    /* Header */
    $wp_customize->add_section( 'school_header', array(
        'title'    => __( 'Header', 'school-theme' ),
        'priority' => 35,
    ) );
    $wp_customize->add_setting( 'school_header_cta_text', array( 'default' => __( 'Apply Now', 'school-theme' ), 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'school_header_cta_text', array( 'label' => __( 'CTA Button Text', 'school-theme' ), 'section' => 'school_header' ) );
    $wp_customize->add_setting( 'school_header_cta_url', array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'school_header_cta_url', array( 'label' => __( 'CTA Button URL', 'school-theme' ), 'section' => 'school_header' ) );

    /* Colors */
    $wp_customize->add_setting( 'school_primary_color', array( 'default' => '#1f6feb', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'school_primary_color', array(
        'label'   => __( 'Primary Color', 'school-theme' ),
        'section' => 'colors',
    ) ) );

    $wp_customize->add_setting( 'school_accent_color', array( 'default' => '#ffb400', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'school_accent_color', array(
        'label'   => __( 'Accent Color', 'school-theme' ),
        'section' => 'colors',
    ) ) );

    /* Hero */
    $wp_customize->add_section( 'school_hero', array(
        'title'    => __( 'Front Page: Hero', 'school-theme' ),
        'priority' => 40,
    ) );
    $wp_customize->add_setting( 'school_hero_subtitle', array( 'default' => __( 'Welcome to our school', 'school-theme' ), 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'school_hero_subtitle', array( 'label' => __( 'Hero Subtitle', 'school-theme' ), 'section' => 'school_hero' ) );

    $wp_customize->add_setting( 'school_hero_title', array( 'default' => __( 'Learn, Grow, Lead — Your Future Starts Here', 'school-theme' ), 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'school_hero_title', array( 'label' => __( 'Hero Title', 'school-theme' ), 'section' => 'school_hero' ) );

    $wp_customize->add_setting( 'school_hero_text', array( 'default' => __( 'A modern learning experience for curious minds. Discover courses taught by experts, world-class facilities, and a community that believes in you.', 'school-theme' ), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'school_hero_text', array( 'label' => __( 'Hero Text', 'school-theme' ), 'section' => 'school_hero', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'school_hero_btn1_text', array( 'default' => __( 'Browse Courses', 'school-theme' ), 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'school_hero_btn1_text', array( 'label' => __( 'Primary Button Text', 'school-theme' ), 'section' => 'school_hero' ) );
    $wp_customize->add_setting( 'school_hero_btn1_url', array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'school_hero_btn1_url', array( 'label' => __( 'Primary Button URL', 'school-theme' ), 'section' => 'school_hero' ) );

    $wp_customize->add_setting( 'school_hero_btn2_text', array( 'default' => __( 'About Us', 'school-theme' ), 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'school_hero_btn2_text', array( 'label' => __( 'Secondary Button Text', 'school-theme' ), 'section' => 'school_hero' ) );
    $wp_customize->add_setting( 'school_hero_btn2_url', array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'school_hero_btn2_url', array( 'label' => __( 'Secondary Button URL', 'school-theme' ), 'section' => 'school_hero' ) );

    $wp_customize->add_setting( 'school_hero_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'school_hero_image', array(
        'label'   => __( 'Hero Background Image', 'school-theme' ),
        'section' => 'school_hero',
    ) ) );

    /* About Section */
    $wp_customize->add_section( 'school_about', array(
        'title'    => __( 'Front Page: About', 'school-theme' ),
        'priority' => 41,
    ) );
    $wp_customize->add_setting( 'school_about_enable', array( 'default' => true, 'sanitize_callback' => 'school_theme_sanitize_bool' ) );
    $wp_customize->add_control( 'school_about_enable', array( 'label' => __( 'Enable About Section', 'school-theme' ), 'section' => 'school_about', 'type' => 'checkbox' ) );
    $wp_customize->add_setting( 'school_about_subtitle', array( 'default' => __( 'About Our School', 'school-theme' ), 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'school_about_subtitle', array( 'label' => __( 'Subtitle', 'school-theme' ), 'section' => 'school_about' ) );
    $wp_customize->add_setting( 'school_about_title', array( 'default' => __( 'A community of curious, capable, confident learners.', 'school-theme' ), 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'school_about_title', array( 'label' => __( 'Title', 'school-theme' ), 'section' => 'school_about' ) );
    $wp_customize->add_setting( 'school_about_text', array( 'default' => __( 'We blend rigorous academics with creative exploration so students leave ready to engage thoughtfully with the world. Our small class sizes, dedicated educators, and supportive environment help every student find their path.', 'school-theme' ), 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'school_about_text', array( 'label' => __( 'Text', 'school-theme' ), 'section' => 'school_about', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'school_about_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'school_about_image', array(
        'label'   => __( 'About Image', 'school-theme' ),
        'section' => 'school_about',
    ) ) );

    /* Sections toggles */
    $wp_customize->add_section( 'school_sections', array(
        'title'    => __( 'Front Page: Sections', 'school-theme' ),
        'priority' => 45,
    ) );
    foreach ( array(
        'features'     => __( 'Features', 'school-theme' ),
        'courses'      => __( 'Courses', 'school-theme' ),
        'notices'      => __( 'Notice Board', 'school-theme' ),
        'cta'          => __( 'CTA Banner', 'school-theme' ),
        'teachers'     => __( 'Teachers', 'school-theme' ),
        'testimonials' => __( 'Testimonials', 'school-theme' ),
        'events'       => __( 'Events', 'school-theme' ),
        'blog'         => __( 'Latest Blog', 'school-theme' ),
    ) as $key => $label ) {
        $wp_customize->add_setting( 'school_section_' . $key, array( 'default' => true, 'sanitize_callback' => 'school_theme_sanitize_bool' ) );
        $wp_customize->add_control( 'school_section_' . $key, array(
            /* translators: %s: section name. */
            'label'   => sprintf( __( 'Enable %s Section', 'school-theme' ), $label ),
            'section' => 'school_sections',
            'type'    => 'checkbox',
        ) );
    }

    /* Contact */
    $wp_customize->add_section( 'school_contact', array(
        'title'    => __( 'Contact Details', 'school-theme' ),
        'priority' => 50,
    ) );
    $wp_customize->add_setting( 'school_contact_address', array( 'default' => '', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'school_contact_address', array( 'label' => __( 'Address', 'school-theme' ), 'section' => 'school_contact', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'school_contact_map', array( 'default' => '', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'school_contact_map', array( 'label' => __( 'Google Map Embed (iframe)', 'school-theme' ), 'section' => 'school_contact', 'type' => 'textarea' ) );

    /* Notice ticker */
    $wp_customize->add_setting( 'school_ticker_enable', array( 'default' => true, 'sanitize_callback' => 'school_theme_sanitize_bool' ) );
    $wp_customize->add_control( 'school_ticker_enable', array( 'label' => __( 'Show Notice Ticker', 'school-theme' ), 'section' => 'school_contact', 'type' => 'checkbox' ) );

    /* Footer */
    $wp_customize->add_section( 'school_footer', array(
        'title'    => __( 'Footer', 'school-theme' ),
        'priority' => 60,
    ) );
    $wp_customize->add_setting( 'school_footer_copyright', array( 'default' => '', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'school_footer_copyright', array( 'label' => __( 'Copyright Text', 'school-theme' ), 'section' => 'school_footer', 'type' => 'textarea' ) );
}
add_action( 'customize_register', 'school_theme_customize_register' );

function school_theme_sanitize_bool( $val ) {
    return (bool) $val;
}

function school_theme_customizer_css() {
    $primary = get_theme_mod( 'school_primary_color', '#1f6feb' );
    $accent  = get_theme_mod( 'school_accent_color', '#ffb400' );
    ?>
    <style id="school-theme-customizer-css">
        :root {
            --st-primary: <?php echo esc_html( $primary ); ?>;
            --st-accent: <?php echo esc_html( $accent ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'school_theme_customizer_css' );
