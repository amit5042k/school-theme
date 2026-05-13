<?php
/**
 * Template for nothing found.
 *
 * @package School_Theme
 */
?>
<section class="no-results not-found">
    <h2 class="page-title"><?php esc_html_e( 'Nothing found', 'school-theme' ); ?></h2>
    <?php if ( is_search() ) : ?>
        <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'school-theme' ); ?></p>
        <?php get_search_form(); ?>
    <?php else : ?>
        <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'school-theme' ); ?></p>
        <?php get_search_form(); ?>
    <?php endif; ?>
</section>
