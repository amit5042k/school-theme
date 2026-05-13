<?php
/**
 * Default content template.
 *
 * @package School_Theme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <a class="post-card-thumb" href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail( 'medium_large' ); ?>
        </a>
    <?php endif; ?>
    <div class="post-card-body">
        <?php if ( has_category() ) : ?>
            <div class="post-card-cats"><?php the_category( ' ' ); ?></div>
        <?php endif; ?>
        <h2 class="post-card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php school_theme_post_meta(); ?>
        <div class="post-card-excerpt"><?php the_excerpt(); ?></div>
        <a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more →', 'school-theme' ); ?></a>
    </div>
</article>
