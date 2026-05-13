<?php
/**
 * Template Name: Leader's Message (Principal / Director)
 *
 * Renders the page's featured image on the left with name/role overlay
 * and the page content on the right. Use the page excerpt for role/title.
 *
 * @package School_Theme
 */

get_header();
?>

<div class="page-banner">
    <div class="container">
        <h1 class="page-banner-title"><?php the_title(); ?></h1>
        <?php school_theme_breadcrumbs(); ?>
    </div>
</div>

<div class="container">
    <main id="primary" class="site-main">
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'message-article' ); ?>>
                <div class="message-grid">
                    <aside class="message-photo">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'large' ); ?>
                        <?php else : ?>
                            <div class="message-photo-placeholder"></div>
                        <?php endif; ?>
                        <?php $role = get_the_excerpt(); ?>
                        <?php if ( $role ) : ?>
                            <div class="message-meta">
                                <strong><?php the_title(); ?></strong>
                                <span><?php echo esc_html( wp_strip_all_tags( $role ) ); ?></span>
                            </div>
                        <?php endif; ?>
                    </aside>
                    <div class="message-body entry-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </article>
        <?php endwhile; ?>
    </main>
</div>

<?php get_footer(); ?>
