<?php
/**
 * Starter content — one-click setup for the school site.
 *
 * Used by add_theme_support( 'starter-content', ... ). When the theme is
 * activated on a fresh site, the Customizer offers to publish all of
 * these pages, the primary menu, and reasonable widget defaults.
 *
 * @package School_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function school_theme_starter_content() {
    return array(
        'posts' => array(
            'home' => array(
                'post_type'  => 'page',
                'post_title' => __( 'Home', 'school-theme' ),
                'template'   => '', /* uses front-page.php */
            ),
            'about' => array(
                'post_type'  => 'page',
                'post_title' => __( 'About Us', 'school-theme' ),
                'post_content' => __( 'Tell visitors who you are, your mission, and what makes the school unique. Use child pages for Vision & Mission, History, and Management.', 'school-theme' ),
            ),
            'principal-message' => array(
                'post_type'  => 'page',
                'post_title' => __( "Principal's Message", 'school-theme' ),
                'post_excerpt' => __( 'Principal', 'school-theme' ),
                'post_content' => __( "Welcome to our school. Replace this placeholder with the Principal's message to students, parents, and visitors.", 'school-theme' ),
                'template'   => 'page-templates/template-message.php',
            ),
            'academics' => array(
                'post_type'  => 'page',
                'post_title' => __( 'Academics', 'school-theme' ),
                'post_content' => __( 'Outline the curriculum, departments, and teaching approach. Link to Faculty and Courses from here.', 'school-theme' ),
            ),
            'admissions' => array(
                'post_type'  => 'page',
                'post_title' => __( 'Admissions', 'school-theme' ),
                'post_content' => __( 'Edit this page with your admission process, important dates, and fee details.', 'school-theme' ),
                'template'   => 'page-templates/template-admissions.php',
            ),
            'faculty' => array(
                'post_type'  => 'page',
                'post_title' => __( 'Faculty', 'school-theme' ),
                'post_content' => __( 'Meet the teachers. Add faculty members from the Teachers menu in the admin.', 'school-theme' ),
                'template'   => 'page-templates/template-faculty.php',
            ),
            'infrastructure' => array(
                'post_type'  => 'page',
                'post_title' => __( 'Infrastructure', 'school-theme' ),
                'post_content' => __( 'Add child pages under Infrastructure (Library, Labs, Sports, Transport, Cafeteria) and they will appear automatically.', 'school-theme' ),
                'template'   => 'page-templates/template-infrastructure.php',
            ),
            'gallery' => array(
                'post_type'  => 'page',
                'post_title' => __( 'Gallery', 'school-theme' ),
                'post_content' => __( 'Showcase photos from school life. Upload items under the Gallery menu and organise them into Albums.', 'school-theme' ),
                'template'   => 'page-templates/template-gallery.php',
            ),
            'notice-board' => array(
                'post_type'  => 'page',
                'post_title' => __( 'Notice Board', 'school-theme' ),
                'post_content' => __( 'Important announcements, circulars, and notices from the school administration.', 'school-theme' ),
                'template'   => 'page-templates/template-notices.php',
            ),
            'achievements' => array(
                'post_type'  => 'page',
                'post_title' => __( 'Achievements', 'school-theme' ),
                'post_content' => __( 'Celebrate student and school accomplishments. Add new entries under the Achievements menu in the admin.', 'school-theme' ),
                'template'   => 'page-templates/template-achievements.php',
            ),
            'results' => array(
                'post_type'  => 'page',
                'post_title' => __( 'Results', 'school-theme' ),
                'post_content' => __( 'Board examination results and academic outcomes. Filter by year using the controls above the table.', 'school-theme' ),
                'template'   => 'page-templates/template-results.php',
            ),
            'downloads' => array(
                'post_type'  => 'page',
                'post_title' => __( 'Downloads', 'school-theme' ),
                'post_content' => __( 'Forms, prospectus, and other documents available for download.', 'school-theme' ),
                'template'   => 'page-templates/template-downloads.php',
            ),
            'events' => array(
                'post_type'  => 'page',
                'post_title' => __( 'Events', 'school-theme' ),
                'post_content' => __( 'Open days, workshops, sports days, and other upcoming events.', 'school-theme' ),
            ),
            'blog' => array(
                'post_type'  => 'page',
                'post_title' => __( 'Blog', 'school-theme' ),
            ),
            'contact' => array(
                'post_type'  => 'page',
                'post_title' => __( 'Contact Us', 'school-theme' ),
                'post_content' => __( 'Reach out for admissions, queries, or feedback.', 'school-theme' ),
                'template'   => 'page-templates/template-contact.php',
            ),
            'privacy' => array(
                'post_type'  => 'page',
                'post_title' => __( 'Privacy Policy', 'school-theme' ),
                'post_content' => __( 'Replace with your privacy policy.', 'school-theme' ),
            ),
        ),

        'options' => array(
            'show_on_front'  => 'page',
            'page_on_front'  => '{{home}}',
            'page_for_posts' => '{{blog}}',
        ),

        'theme_mods' => array(
            'school_topbar_phone'  => '+91 00000 00000',
            'school_topbar_email'  => 'info@example.org',
            'school_topbar_hours'  => __( 'Mon - Sat: 8:00 AM - 2:30 PM', 'school-theme' ),
            'school_header_cta_text' => __( 'Admissions Open', 'school-theme' ),
            'school_header_cta_url'  => '{{admissions}}',
            'school_hero_subtitle' => __( 'Welcome to our school', 'school-theme' ),
            'school_hero_title'    => __( 'Empowering tomorrow’s leaders today', 'school-theme' ),
            'school_hero_text'     => __( 'A nurturing environment where academic rigour meets character building. Discover programmes designed to help every student thrive.', 'school-theme' ),
            'school_hero_btn1_text' => __( 'Apply Now', 'school-theme' ),
            'school_hero_btn1_url'  => '{{admissions}}',
            'school_hero_btn2_text' => __( 'About Us', 'school-theme' ),
            'school_hero_btn2_url'  => '{{about}}',
        ),

        'nav_menus' => array(
            'primary' => array(
                'name'  => __( 'Primary Menu', 'school-theme' ),
                'items' => array(
                    'page_home'         => array( 'type' => 'post_type', 'object' => 'page', 'object_id' => '{{home}}' ),
                    'page_about'        => array( 'type' => 'post_type', 'object' => 'page', 'object_id' => '{{about}}' ),
                    'page_academics'    => array( 'type' => 'post_type', 'object' => 'page', 'object_id' => '{{academics}}' ),
                    'page_admissions'   => array( 'type' => 'post_type', 'object' => 'page', 'object_id' => '{{admissions}}' ),
                    'page_faculty'      => array( 'type' => 'post_type', 'object' => 'page', 'object_id' => '{{faculty}}' ),
                    'page_infrastructure' => array( 'type' => 'post_type', 'object' => 'page', 'object_id' => '{{infrastructure}}' ),
                    'page_gallery'      => array( 'type' => 'post_type', 'object' => 'page', 'object_id' => '{{gallery}}' ),
                    'page_notice_board' => array( 'type' => 'post_type', 'object' => 'page', 'object_id' => '{{notice-board}}' ),
                    'page_results'      => array( 'type' => 'post_type', 'object' => 'page', 'object_id' => '{{results}}' ),
                    'page_contact'      => array( 'type' => 'post_type', 'object' => 'page', 'object_id' => '{{contact}}' ),
                ),
            ),
            'footer' => array(
                'name'  => __( 'Footer Menu', 'school-theme' ),
                'items' => array(
                    'page_about'      => array( 'type' => 'post_type', 'object' => 'page', 'object_id' => '{{about}}' ),
                    'page_admissions' => array( 'type' => 'post_type', 'object' => 'page', 'object_id' => '{{admissions}}' ),
                    'page_contact'    => array( 'type' => 'post_type', 'object' => 'page', 'object_id' => '{{contact}}' ),
                    'page_privacy'    => array( 'type' => 'post_type', 'object' => 'page', 'object_id' => '{{privacy}}' ),
                ),
            ),
        ),

        'widgets' => array(
            'sidebar-1' => array(
                'school_notices_widget',
                'search',
                'recent-posts',
                'categories',
            ),
            'footer-1' => array(
                'text_about' => array( 'text', array(
                    'title' => __( 'About the School', 'school-theme' ),
                    'text'  => __( 'A short paragraph describing the school. Replace this widget with your own text or image.', 'school-theme' ),
                ) ),
            ),
            'footer-2' => array(
                'text_quick_links' => array( 'text', array(
                    'title' => __( 'Quick Links', 'school-theme' ),
                    'text'  => '<ul><li><a href="#">' . esc_html__( 'About Us', 'school-theme' ) . '</a></li><li><a href="#">' . esc_html__( 'Admissions', 'school-theme' ) . '</a></li><li><a href="#">' . esc_html__( 'Faculty', 'school-theme' ) . '</a></li><li><a href="#">' . esc_html__( 'Contact', 'school-theme' ) . '</a></li></ul>',
                ) ),
            ),
            'footer-3' => array(
                'text_contact' => array( 'text', array(
                    'title' => __( 'Contact', 'school-theme' ),
                    'text'  => __( "Address\nPhone: +91 00000 00000\nEmail: info@example.org", 'school-theme' ),
                ) ),
            ),
            'footer-4' => array(
                'school_notices_widget',
            ),
        ),
    );
}
