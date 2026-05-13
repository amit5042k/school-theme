<?php
/**
 * Teacher card template.
 *
 * @package School_Theme
 */

$role     = get_post_meta( get_the_ID(), '_school_teacher_role', true );
$facebook = get_post_meta( get_the_ID(), '_school_teacher_facebook', true );
$twitter  = get_post_meta( get_the_ID(), '_school_teacher_twitter', true );
$linkedin = get_post_meta( get_the_ID(), '_school_teacher_linkedin', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'teacher-card' ); ?>>
    <a class="teacher-thumb" href="<?php the_permalink(); ?>">
        <?php if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'school-teacher' );
        } else {
            echo '<div class="teacher-thumb-placeholder"></div>';
        } ?>
    </a>
    <div class="teacher-body">
        <h3 class="teacher-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php if ( $role ) : ?>
            <p class="teacher-role"><?php echo esc_html( $role ); ?></p>
        <?php endif; ?>
        <?php if ( $facebook || $twitter || $linkedin ) : ?>
            <div class="teacher-social">
                <?php if ( $facebook ) : ?><a href="<?php echo esc_url( $facebook ); ?>" aria-label="Facebook"><i class="ti ti-brand-facebook" aria-hidden="true"></i></a><?php endif; ?>
                <?php if ( $twitter ) : ?><a href="<?php echo esc_url( $twitter ); ?>" aria-label="Twitter"><i class="ti ti-brand-twitter" aria-hidden="true"></i></a><?php endif; ?>
                <?php if ( $linkedin ) : ?><a href="<?php echo esc_url( $linkedin ); ?>" aria-label="LinkedIn"><i class="ti ti-brand-linkedin" aria-hidden="true"></i></a><?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</article>
