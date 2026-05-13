<?php
/**
 * The template for displaying comments.
 *
 * @package School_Theme
 */

if ( post_password_required() ) {
    return;
}
?>
<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            $count = get_comments_number();
            if ( '1' === $count ) {
                esc_html_e( '1 Comment', 'school-theme' );
            } else {
                /* translators: %s: comment count. */
                printf( esc_html( _nx( '%s Comment', '%s Comments', $count, 'comments title', 'school-theme' ) ), esc_html( number_format_i18n( $count ) ) );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size' => 60,
            ) );
            ?>
        </ol>

        <?php the_comments_navigation(); ?>
    <?php endif; ?>

    <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'school-theme' ); ?></p>
    <?php endif; ?>

    <?php comment_form(); ?>
</div>
