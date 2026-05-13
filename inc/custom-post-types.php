<?php
/**
 * Custom post types: Courses, Teachers, Testimonials, Events.
 *
 * @package School_Theme
 */

function school_theme_register_post_types() {
    register_post_type( 'school_course', array(
        'labels' => array(
            'name'               => __( 'Courses', 'school-theme' ),
            'singular_name'      => __( 'Course', 'school-theme' ),
            'add_new_item'       => __( 'Add New Course', 'school-theme' ),
            'edit_item'          => __( 'Edit Course', 'school-theme' ),
            'new_item'           => __( 'New Course', 'school-theme' ),
            'view_item'          => __( 'View Course', 'school-theme' ),
            'search_items'       => __( 'Search Courses', 'school-theme' ),
            'not_found'          => __( 'No courses found', 'school-theme' ),
            'menu_name'          => __( 'Courses', 'school-theme' ),
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-welcome-learn-more',
        'rewrite'       => array( 'slug' => 'courses' ),
        'show_in_rest'  => true,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
    ) );

    register_taxonomy( 'course_category', 'school_course', array(
        'labels' => array(
            'name'          => __( 'Course Categories', 'school-theme' ),
            'singular_name' => __( 'Course Category', 'school-theme' ),
        ),
        'public'       => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite'      => array( 'slug' => 'course-category' ),
    ) );

    register_post_type( 'school_teacher', array(
        'labels' => array(
            'name'               => __( 'Teachers', 'school-theme' ),
            'singular_name'      => __( 'Teacher', 'school-theme' ),
            'add_new_item'       => __( 'Add New Teacher', 'school-theme' ),
            'edit_item'          => __( 'Edit Teacher', 'school-theme' ),
            'menu_name'          => __( 'Teachers', 'school-theme' ),
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-groups',
        'rewrite'       => array( 'slug' => 'teachers' ),
        'show_in_rest'  => true,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    ) );

    register_post_type( 'school_testimonial', array(
        'labels' => array(
            'name'               => __( 'Testimonials', 'school-theme' ),
            'singular_name'      => __( 'Testimonial', 'school-theme' ),
            'add_new_item'       => __( 'Add Testimonial', 'school-theme' ),
            'menu_name'          => __( 'Testimonials', 'school-theme' ),
        ),
        'public'        => true,
        'has_archive'   => false,
        'menu_icon'     => 'dashicons-format-quote',
        'show_in_rest'  => true,
        'supports'      => array( 'title', 'editor', 'thumbnail' ),
    ) );

    register_post_type( 'school_event', array(
        'labels' => array(
            'name'               => __( 'Events', 'school-theme' ),
            'singular_name'      => __( 'Event', 'school-theme' ),
            'menu_name'          => __( 'Events', 'school-theme' ),
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-calendar-alt',
        'rewrite'       => array( 'slug' => 'events' ),
        'show_in_rest'  => true,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    ) );

    register_post_type( 'school_notice', array(
        'labels' => array(
            'name'               => __( 'Notices', 'school-theme' ),
            'singular_name'      => __( 'Notice', 'school-theme' ),
            'add_new_item'       => __( 'Add New Notice', 'school-theme' ),
            'edit_item'          => __( 'Edit Notice', 'school-theme' ),
            'menu_name'          => __( 'Notices', 'school-theme' ),
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-megaphone',
        'rewrite'       => array( 'slug' => 'notices' ),
        'show_in_rest'  => true,
        'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
    ) );

    register_taxonomy( 'notice_category', 'school_notice', array(
        'labels' => array(
            'name'          => __( 'Notice Categories', 'school-theme' ),
            'singular_name' => __( 'Notice Category', 'school-theme' ),
        ),
        'public'       => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite'      => array( 'slug' => 'notice-category' ),
    ) );

    register_post_type( 'school_gallery', array(
        'labels' => array(
            'name'               => __( 'Gallery', 'school-theme' ),
            'singular_name'      => __( 'Gallery Item', 'school-theme' ),
            'add_new_item'       => __( 'Add New Gallery Item', 'school-theme' ),
            'edit_item'          => __( 'Edit Gallery Item', 'school-theme' ),
            'menu_name'          => __( 'Gallery', 'school-theme' ),
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-format-gallery',
        'rewrite'       => array( 'slug' => 'gallery' ),
        'show_in_rest'  => true,
        'supports'      => array( 'title', 'editor', 'thumbnail' ),
    ) );

    register_taxonomy( 'gallery_album', 'school_gallery', array(
        'labels' => array(
            'name'          => __( 'Albums', 'school-theme' ),
            'singular_name' => __( 'Album', 'school-theme' ),
        ),
        'public'       => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite'      => array( 'slug' => 'album' ),
    ) );

    register_post_type( 'school_achievement', array(
        'labels' => array(
            'name'               => __( 'Achievements', 'school-theme' ),
            'singular_name'      => __( 'Achievement', 'school-theme' ),
            'menu_name'          => __( 'Achievements', 'school-theme' ),
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-awards',
        'rewrite'       => array( 'slug' => 'achievements' ),
        'show_in_rest'  => true,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    ) );

    register_post_type( 'school_download', array(
        'labels' => array(
            'name'               => __( 'Downloads', 'school-theme' ),
            'singular_name'      => __( 'Download', 'school-theme' ),
            'menu_name'          => __( 'Downloads', 'school-theme' ),
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-download',
        'rewrite'       => array( 'slug' => 'downloads' ),
        'show_in_rest'  => true,
        'supports'      => array( 'title', 'editor' ),
    ) );
}
add_action( 'init', 'school_theme_register_post_types' );

function school_theme_course_meta_boxes() {
    add_meta_box( 'school_course_details', __( 'Course Details', 'school-theme' ), 'school_theme_course_meta_callback', 'school_course', 'side', 'default' );
    add_meta_box( 'school_teacher_details', __( 'Teacher Details', 'school-theme' ), 'school_theme_teacher_meta_callback', 'school_teacher', 'side', 'default' );
    add_meta_box( 'school_event_details', __( 'Event Details', 'school-theme' ), 'school_theme_event_meta_callback', 'school_event', 'side', 'default' );
    add_meta_box( 'school_testimonial_details', __( 'Author Details', 'school-theme' ), 'school_theme_testimonial_meta_callback', 'school_testimonial', 'side', 'default' );
    add_meta_box( 'school_notice_details', __( 'Notice Details', 'school-theme' ), 'school_theme_notice_meta_callback', 'school_notice', 'side', 'default' );
    add_meta_box( 'school_download_details', __( 'Download File', 'school-theme' ), 'school_theme_download_meta_callback', 'school_download', 'normal', 'default' );
}

function school_theme_notice_meta_callback( $post ) {
    wp_nonce_field( 'school_theme_meta', 'school_theme_meta_nonce' );
    $date     = get_post_meta( $post->ID, '_school_notice_date', true );
    $is_new   = get_post_meta( $post->ID, '_school_notice_new', true );
    $file     = get_post_meta( $post->ID, '_school_notice_file', true );
    $external = get_post_meta( $post->ID, '_school_notice_url', true );
    ?>
    <p><label><?php esc_html_e( 'Notice Date', 'school-theme' ); ?> <input type="date" name="school_notice_date" value="<?php echo esc_attr( $date ); ?>" class="widefat"></label></p>
    <p><label><input type="checkbox" name="school_notice_new" value="1" <?php checked( $is_new, '1' ); ?>> <?php esc_html_e( 'Mark as New', 'school-theme' ); ?></label></p>
    <p><label><?php esc_html_e( 'Attachment URL', 'school-theme' ); ?> <input type="url" name="school_notice_file" value="<?php echo esc_attr( $file ); ?>" class="widefat" placeholder="https://…/file.pdf"></label></p>
    <p><label><?php esc_html_e( 'External Link', 'school-theme' ); ?> <input type="url" name="school_notice_url" value="<?php echo esc_attr( $external ); ?>" class="widefat"></label></p>
    <?php
}

function school_theme_download_meta_callback( $post ) {
    wp_nonce_field( 'school_theme_meta', 'school_theme_meta_nonce' );
    $file = get_post_meta( $post->ID, '_school_download_file', true );
    ?>
    <p><label><?php esc_html_e( 'File URL', 'school-theme' ); ?> <input type="url" name="school_download_file" value="<?php echo esc_attr( $file ); ?>" class="widefat" placeholder="https://…/file.pdf"></label></p>
    <p class="description"><?php esc_html_e( 'Upload the file via Media Library, then copy its URL here.', 'school-theme' ); ?></p>
    <?php
}
add_action( 'add_meta_boxes', 'school_theme_course_meta_boxes' );

function school_theme_course_meta_callback( $post ) {
    wp_nonce_field( 'school_theme_meta', 'school_theme_meta_nonce' );
    $price    = get_post_meta( $post->ID, '_school_course_price', true );
    $duration = get_post_meta( $post->ID, '_school_course_duration', true );
    $lessons  = get_post_meta( $post->ID, '_school_course_lessons', true );
    $level    = get_post_meta( $post->ID, '_school_course_level', true );
    $students = get_post_meta( $post->ID, '_school_course_students', true );
    ?>
    <p><label><?php esc_html_e( 'Price', 'school-theme' ); ?> <input type="text" name="school_course_price" value="<?php echo esc_attr( $price ); ?>" class="widefat"></label></p>
    <p><label><?php esc_html_e( 'Duration', 'school-theme' ); ?> <input type="text" name="school_course_duration" value="<?php echo esc_attr( $duration ); ?>" class="widefat"></label></p>
    <p><label><?php esc_html_e( 'Lessons', 'school-theme' ); ?> <input type="number" name="school_course_lessons" value="<?php echo esc_attr( $lessons ); ?>" class="widefat"></label></p>
    <p><label><?php esc_html_e( 'Level', 'school-theme' ); ?> <input type="text" name="school_course_level" value="<?php echo esc_attr( $level ); ?>" class="widefat"></label></p>
    <p><label><?php esc_html_e( 'Students', 'school-theme' ); ?> <input type="number" name="school_course_students" value="<?php echo esc_attr( $students ); ?>" class="widefat"></label></p>
    <?php
}

function school_theme_teacher_meta_callback( $post ) {
    wp_nonce_field( 'school_theme_meta', 'school_theme_meta_nonce' );
    $role     = get_post_meta( $post->ID, '_school_teacher_role', true );
    $email    = get_post_meta( $post->ID, '_school_teacher_email', true );
    $phone    = get_post_meta( $post->ID, '_school_teacher_phone', true );
    $facebook = get_post_meta( $post->ID, '_school_teacher_facebook', true );
    $twitter  = get_post_meta( $post->ID, '_school_teacher_twitter', true );
    $linkedin = get_post_meta( $post->ID, '_school_teacher_linkedin', true );
    ?>
    <p><label><?php esc_html_e( 'Role / Subject', 'school-theme' ); ?> <input type="text" name="school_teacher_role" value="<?php echo esc_attr( $role ); ?>" class="widefat"></label></p>
    <p><label><?php esc_html_e( 'Email', 'school-theme' ); ?> <input type="email" name="school_teacher_email" value="<?php echo esc_attr( $email ); ?>" class="widefat"></label></p>
    <p><label><?php esc_html_e( 'Phone', 'school-theme' ); ?> <input type="text" name="school_teacher_phone" value="<?php echo esc_attr( $phone ); ?>" class="widefat"></label></p>
    <p><label><?php esc_html_e( 'Facebook', 'school-theme' ); ?> <input type="url" name="school_teacher_facebook" value="<?php echo esc_attr( $facebook ); ?>" class="widefat"></label></p>
    <p><label><?php esc_html_e( 'Twitter', 'school-theme' ); ?> <input type="url" name="school_teacher_twitter" value="<?php echo esc_attr( $twitter ); ?>" class="widefat"></label></p>
    <p><label><?php esc_html_e( 'LinkedIn', 'school-theme' ); ?> <input type="url" name="school_teacher_linkedin" value="<?php echo esc_attr( $linkedin ); ?>" class="widefat"></label></p>
    <?php
}

function school_theme_event_meta_callback( $post ) {
    wp_nonce_field( 'school_theme_meta', 'school_theme_meta_nonce' );
    $date     = get_post_meta( $post->ID, '_school_event_date', true );
    $time     = get_post_meta( $post->ID, '_school_event_time', true );
    $location = get_post_meta( $post->ID, '_school_event_location', true );
    ?>
    <p><label><?php esc_html_e( 'Date', 'school-theme' ); ?> <input type="date" name="school_event_date" value="<?php echo esc_attr( $date ); ?>" class="widefat"></label></p>
    <p><label><?php esc_html_e( 'Time', 'school-theme' ); ?> <input type="text" name="school_event_time" value="<?php echo esc_attr( $time ); ?>" class="widefat" placeholder="10:00 AM - 12:00 PM"></label></p>
    <p><label><?php esc_html_e( 'Location', 'school-theme' ); ?> <input type="text" name="school_event_location" value="<?php echo esc_attr( $location ); ?>" class="widefat"></label></p>
    <?php
}

function school_theme_testimonial_meta_callback( $post ) {
    wp_nonce_field( 'school_theme_meta', 'school_theme_meta_nonce' );
    $author = get_post_meta( $post->ID, '_school_testimonial_author', true );
    $role   = get_post_meta( $post->ID, '_school_testimonial_role', true );
    $rating = get_post_meta( $post->ID, '_school_testimonial_rating', true );
    ?>
    <p><label><?php esc_html_e( 'Author Name', 'school-theme' ); ?> <input type="text" name="school_testimonial_author" value="<?php echo esc_attr( $author ); ?>" class="widefat"></label></p>
    <p><label><?php esc_html_e( 'Role', 'school-theme' ); ?> <input type="text" name="school_testimonial_role" value="<?php echo esc_attr( $role ); ?>" class="widefat"></label></p>
    <p><label><?php esc_html_e( 'Rating (1-5)', 'school-theme' ); ?> <input type="number" min="1" max="5" name="school_testimonial_rating" value="<?php echo esc_attr( $rating ); ?>" class="widefat"></label></p>
    <?php
}

function school_theme_save_meta( $post_id ) {
    if ( ! isset( $_POST['school_theme_meta_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['school_theme_meta_nonce'] ) ), 'school_theme_meta' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $fields = array(
        '_school_course_price'        => 'school_course_price',
        '_school_course_duration'     => 'school_course_duration',
        '_school_course_lessons'      => 'school_course_lessons',
        '_school_course_level'        => 'school_course_level',
        '_school_course_students'     => 'school_course_students',
        '_school_teacher_role'        => 'school_teacher_role',
        '_school_teacher_email'       => 'school_teacher_email',
        '_school_teacher_phone'       => 'school_teacher_phone',
        '_school_teacher_facebook'    => 'school_teacher_facebook',
        '_school_teacher_twitter'     => 'school_teacher_twitter',
        '_school_teacher_linkedin'    => 'school_teacher_linkedin',
        '_school_event_date'          => 'school_event_date',
        '_school_event_time'          => 'school_event_time',
        '_school_event_location'      => 'school_event_location',
        '_school_testimonial_author'  => 'school_testimonial_author',
        '_school_testimonial_role'    => 'school_testimonial_role',
        '_school_testimonial_rating'  => 'school_testimonial_rating',
        '_school_notice_date'         => 'school_notice_date',
        '_school_notice_new'          => 'school_notice_new',
        '_school_notice_file'         => 'school_notice_file',
        '_school_notice_url'          => 'school_notice_url',
        '_school_download_file'       => 'school_download_file',
    );

    foreach ( $fields as $meta_key => $post_key ) {
        if ( isset( $_POST[ $post_key ] ) ) {
            update_post_meta( $post_id, $meta_key, sanitize_text_field( wp_unslash( $_POST[ $post_key ] ) ) );
        }
    }
}
add_action( 'save_post', 'school_theme_save_meta' );
