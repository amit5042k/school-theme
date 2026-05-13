<?php
/**
 * Course card template.
 *
 * @package School_Theme
 */

$price    = get_post_meta( get_the_ID(), '_school_course_price', true );
$duration = get_post_meta( get_the_ID(), '_school_course_duration', true );
$lessons  = get_post_meta( get_the_ID(), '_school_course_lessons', true );
$level    = get_post_meta( get_the_ID(), '_school_course_level', true );
$students = get_post_meta( get_the_ID(), '_school_course_students', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'course-card' ); ?>>
    <a class="course-thumb" href="<?php the_permalink(); ?>">
        <?php if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'school-course' );
        } else {
            echo '<div class="course-thumb-placeholder"></div>';
        } ?>
        <?php if ( $price ) : ?>
            <span class="course-price"><?php echo esc_html( $price ); ?></span>
        <?php endif; ?>
    </a>
    <div class="course-body">
        <?php $cats = get_the_term_list( get_the_ID(), 'course_category', '', ' ' ); ?>
        <?php if ( $cats && ! is_wp_error( $cats ) ) : ?>
            <div class="course-cats"><?php echo wp_kses_post( $cats ); ?></div>
        <?php endif; ?>
        <h3 class="course-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <div class="course-meta">
            <?php if ( $duration ) : ?><span><i class="ti ti-clock" aria-hidden="true"></i><?php echo esc_html( $duration ); ?></span><?php endif; ?>
            <?php if ( $lessons ) : ?><span><i class="ti ti-book" aria-hidden="true"></i><?php
                /* translators: %s: lesson count. */
                printf( esc_html__( '%s lessons', 'school-theme' ), esc_html( $lessons ) ); ?></span><?php endif; ?>
            <?php if ( $level ) : ?><span><i class="ti ti-chart-bar" aria-hidden="true"></i><?php echo esc_html( $level ); ?></span><?php endif; ?>
            <?php if ( $students ) : ?><span><i class="ti ti-user" aria-hidden="true"></i><?php
                /* translators: %s: student count. */
                printf( esc_html__( '%s students', 'school-theme' ), esc_html( $students ) ); ?></span><?php endif; ?>
        </div>
        <div class="course-excerpt"><?php the_excerpt(); ?></div>
        <a class="btn btn-outline" href="<?php the_permalink(); ?>"><?php esc_html_e( 'View Course', 'school-theme' ); ?></a>
    </div>
</article>
