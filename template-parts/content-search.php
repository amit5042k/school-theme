<?php
/**
 * Search result template.
 *
 * @package School_Theme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card search-result' ); ?>>
    <div class="post-card-body">
        <h2 class="post-card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="post-card-excerpt"><?php the_excerpt(); ?></div>
        <a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e( 'View result →', 'school-theme' ); ?></a>
    </div>
</article>
