<?php
/**
 * The template for displaying all single posts.
 *
 * @package School_Theme
 */

get_header(); ?>

<div class="page-banner">
    <div class="container">
        <h1 class="page-banner-title"><?php the_title(); ?></h1>
        <?php school_theme_breadcrumbs(); ?>
    </div>
</div>

<div class="container content-with-sidebar">
    <main id="primary" class="site-main">
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-article' ); ?>>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="entry-thumbnail">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-meta">
                    <span class="posted-on"><i class="ti ti-calendar" aria-hidden="true"></i><?php echo esc_html( get_the_date() ); ?></span>
                    <span class="byline"><i class="ti ti-user" aria-hidden="true"></i><?php the_author(); ?></span>
                    <?php if ( has_category() ) : ?>
                        <span class="cat-links"><i class="ti ti-folder" aria-hidden="true"></i><?php the_category( ', ' ); ?></span>
                    <?php endif; ?>
                    <span class="comment-count"><i class="ti ti-message" aria-hidden="true"></i><?php comments_number(); ?></span>
                </div>

                <div class="entry-content">
                    <?php the_content(); ?>
                    <?php wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'school-theme' ),
                        'after'  => '</div>',
                    ) ); ?>
                </div>

                <?php if ( has_tag() ) : ?>
                <footer class="entry-footer">
                    <div class="tag-links"><?php the_tags( '<span class="tag-label">' . esc_html__( 'Tags:', 'school-theme' ) . '</span> ', ' ' ); ?></div>
                </footer>
                <?php endif; ?>
            </article>

            <nav class="post-navigation" aria-label="<?php esc_attr_e( 'Post navigation', 'school-theme' ); ?>">
                <div class="nav-previous"><?php previous_post_link( '%link', '<span class="nav-direction">' . esc_html__( '« Previous', 'school-theme' ) . '</span><span class="nav-title">%title</span>' ); ?></div>
                <div class="nav-next"><?php next_post_link( '%link', '<span class="nav-direction">' . esc_html__( 'Next »', 'school-theme' ) . '</span><span class="nav-title">%title</span>' ); ?></div>
            </nav>

            <?php if ( comments_open() || get_comments_number() ) : ?>
                <?php comments_template(); ?>
            <?php endif; ?>
        <?php endwhile; ?>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
