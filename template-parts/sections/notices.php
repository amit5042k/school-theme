<?php
/**
 * Notice board section.
 *
 * @package School_Theme
 */

if ( ! get_theme_mod( 'school_section_notices', true ) ) {
    return;
}

$query = new WP_Query( array(
    'post_type'      => 'school_notice',
    'posts_per_page' => 5,
    'meta_key'       => '_school_notice_date',
    'orderby'        => 'meta_value',
    'order'          => 'DESC',
    'no_found_rows'  => true,
) );

if ( ! $query->have_posts() ) {
    return;
}
?>
<section class="notices-section section-pad">
    <div class="container">
        <header class="section-header">
            <span class="section-subtitle"><?php esc_html_e( 'Notice Board', 'school-theme' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'Latest announcements & circulars', 'school-theme' ); ?></h2>
        </header>

        <ul class="notice-list notice-list-compact">
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
                </div>
                <div class="notice-content">
                    <h3 class="notice-title">
                        <a href="<?php echo esc_url( $link ); ?>" <?php if ( $external || $file ) echo 'target="_blank" rel="noopener"'; ?>><?php the_title(); ?></a>
                        <?php if ( $is_new ) : ?><span class="badge-new"><?php esc_html_e( 'New', 'school-theme' ); ?></span><?php endif; ?>
                    </h3>
                </div>
            </li>
            <?php endwhile; wp_reset_postdata(); ?>
        </ul>
        <div class="section-cta-row">
            <a class="btn btn-outline" href="<?php echo esc_url( get_post_type_archive_link( 'school_notice' ) ); ?>"><?php esc_html_e( 'View All Notices', 'school-theme' ); ?></a>
        </div>
    </div>
</section>
