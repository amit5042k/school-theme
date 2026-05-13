<?php
/**
 * Template Name: Notice Board
 *
 * @package School_Theme
 */

get_header();

$paged = max( 1, get_query_var( 'paged' ) );
$query = new WP_Query( array(
    'post_type'      => 'school_notice',
    'posts_per_page' => 15,
    'paged'          => $paged,
    'meta_key'       => '_school_notice_date',
    'orderby'        => 'meta_value',
    'order'          => 'DESC',
) );
?>

<div class="page-banner">
    <div class="container">
        <h1 class="page-banner-title"><?php the_title(); ?></h1>
        <?php school_theme_breadcrumbs(); ?>
    </div>
</div>

<div class="container content-with-sidebar">
    <main id="primary" class="site-main">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php if ( get_the_content() ) : ?>
                <div class="entry-content page-intro"><?php the_content(); ?></div>
            <?php endif; ?>
        <?php endwhile; ?>

        <?php if ( $query->have_posts() ) : ?>
            <ul class="notice-list">
                <?php while ( $query->have_posts() ) : $query->the_post();
                    $ndate    = get_post_meta( get_the_ID(), '_school_notice_date', true );
                    $is_new   = get_post_meta( get_the_ID(), '_school_notice_new', true );
                    $file     = get_post_meta( get_the_ID(), '_school_notice_file', true );
                    $external = get_post_meta( get_the_ID(), '_school_notice_url', true );
                    $link     = $external ? $external : ( $file ? $file : get_permalink() );
                    $ts       = $ndate ? strtotime( $ndate ) : get_the_date( 'U' );
                ?>
                <li class="notice-item">
                    <div class="notice-date-box">
                        <span class="d"><?php echo esc_html( date_i18n( 'd', $ts ) ); ?></span>
                        <span class="m"><?php echo esc_html( date_i18n( 'M', $ts ) ); ?></span>
                        <span class="y"><?php echo esc_html( date_i18n( 'Y', $ts ) ); ?></span>
                    </div>
                    <div class="notice-content">
                        <h3 class="notice-title">
                            <a href="<?php echo esc_url( $link ); ?>" <?php if ( $external || $file ) echo 'target="_blank" rel="noopener"'; ?>><?php the_title(); ?></a>
                            <?php if ( $is_new ) : ?><span class="badge-new"><?php esc_html_e( 'New', 'school-theme' ); ?></span><?php endif; ?>
                        </h3>
                        <?php if ( get_the_excerpt() ) : ?>
                            <p class="notice-excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
                        <?php endif; ?>
                        <?php if ( $file ) : ?>
                            <a class="notice-file" href="<?php echo esc_url( $file ); ?>" target="_blank" rel="noopener"><i class="ti ti-file-download" aria-hidden="true"></i><?php esc_html_e( 'Download Attachment', 'school-theme' ); ?></a>
                        <?php endif; ?>
                    </div>
                </li>
                <?php endwhile; ?>
            </ul>

            <?php
            echo '<nav class="pagination">';
            echo paginate_links( array(
                'total'   => $query->max_num_pages,
                'current' => $paged,
            ) );
            echo '</nav>';
            wp_reset_postdata();
            ?>
        <?php else : ?>
            <p class="section-empty"><?php esc_html_e( 'No notices have been posted yet.', 'school-theme' ); ?></p>
        <?php endif; ?>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
