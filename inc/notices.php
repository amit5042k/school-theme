<?php
/**
 * Notice ticker (marquee) widget.
 *
 * Drop the [school_ticker] shortcode anywhere, or include this file's
 * function school_theme_render_ticker() from your templates.
 *
 * @package School_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function school_theme_render_ticker( $args = array() ) {
    $args = wp_parse_args( $args, array(
        'count' => 5,
        'label' => __( 'Latest', 'school-theme' ),
    ) );

    $query = new WP_Query( array(
        'post_type'      => 'school_notice',
        'posts_per_page' => max( 1, (int) $args['count'] ),
        'meta_key'       => '_school_notice_date',
        'orderby'        => 'meta_value',
        'order'          => 'DESC',
        'no_found_rows'  => true,
    ) );

    if ( ! $query->have_posts() ) {
        return '';
    }

    ob_start();
    ?>
    <div class="notice-ticker" data-notice-ticker>
        <span class="notice-ticker-label"><i class="ti ti-megaphone" aria-hidden="true"></i><?php echo esc_html( $args['label'] ); ?></span>
        <div class="notice-ticker-viewport">
            <ul class="notice-ticker-track">
                <?php while ( $query->have_posts() ) : $query->the_post();
                    $external = get_post_meta( get_the_ID(), '_school_notice_url', true );
                    $file     = get_post_meta( get_the_ID(), '_school_notice_file', true );
                    $is_new   = get_post_meta( get_the_ID(), '_school_notice_new', true );
                    $link     = $external ? $external : ( $file ? $file : get_permalink() );
                ?>
                <li>
                    <a href="<?php echo esc_url( $link ); ?>" <?php if ( $external || $file ) echo 'target="_blank" rel="noopener"'; ?>>
                        <?php if ( $is_new ) : ?><span class="badge-new"><?php esc_html_e( 'New', 'school-theme' ); ?></span><?php endif; ?>
                        <span class="ticker-title"><?php the_title(); ?></span>
                    </a>
                </li>
                <?php endwhile; wp_reset_postdata(); ?>
            </ul>
        </div>
        <div class="notice-ticker-controls">
            <button type="button" class="ticker-prev" aria-label="<?php esc_attr_e( 'Previous notice', 'school-theme' ); ?>">&#8249;</button>
            <button type="button" class="ticker-pause" aria-label="<?php esc_attr_e( 'Pause ticker', 'school-theme' ); ?>">&#10073;&#10073;</button>
            <button type="button" class="ticker-next" aria-label="<?php esc_attr_e( 'Next notice', 'school-theme' ); ?>">&#8250;</button>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode( 'school_ticker', function ( $atts ) {
    $atts = shortcode_atts( array(
        'count' => 5,
        'label' => __( 'Latest', 'school-theme' ),
    ), $atts, 'school_ticker' );
    return school_theme_render_ticker( $atts );
} );

class School_Theme_Notices_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'school_notices_widget',
            __( 'School: Latest Notices', 'school-theme' ),
            array( 'description' => __( 'Lists the most recent notices.', 'school-theme' ) )
        );
    }

    public function widget( $args, $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Notice Board', 'school-theme' );
        $count = ! empty( $instance['count'] ) ? (int) $instance['count'] : 5;

        $query = new WP_Query( array(
            'post_type'      => 'school_notice',
            'posts_per_page' => $count,
            'meta_key'       => '_school_notice_date',
            'orderby'        => 'meta_value',
            'order'          => 'DESC',
            'no_found_rows'  => true,
        ) );

        if ( ! $query->have_posts() ) {
            return;
        }

        echo $args['before_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        if ( $title ) {
            echo $args['before_title'] . esc_html( $title ) . $args['after_title']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }

        echo '<ul class="widget-notices">';
        while ( $query->have_posts() ) {
            $query->the_post();
            $ndate    = get_post_meta( get_the_ID(), '_school_notice_date', true );
            $external = get_post_meta( get_the_ID(), '_school_notice_url', true );
            $file     = get_post_meta( get_the_ID(), '_school_notice_file', true );
            $is_new   = get_post_meta( get_the_ID(), '_school_notice_new', true );
            $link     = $external ? $external : ( $file ? $file : get_permalink() );
            $ts       = $ndate ? strtotime( $ndate ) : get_the_date( 'U' );
            ?>
            <li class="widget-notice-item">
                <span class="widget-notice-date"><?php echo esc_html( date_i18n( get_option( 'date_format' ), $ts ) ); ?></span>
                <a href="<?php echo esc_url( $link ); ?>" <?php if ( $external || $file ) echo 'target="_blank" rel="noopener"'; ?>><?php the_title(); ?></a>
                <?php if ( $is_new ) : ?><span class="badge-new"><?php esc_html_e( 'New', 'school-theme' ); ?></span><?php endif; ?>
            </li>
            <?php
        }
        echo '</ul>';
        wp_reset_postdata();

        echo $args['after_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Notice Board', 'school-theme' );
        $count = ! empty( $instance['count'] ) ? (int) $instance['count'] : 5;
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'school-theme' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"><?php esc_html_e( 'Number of notices:', 'school-theme' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>" type="number" min="1" max="20" value="<?php echo esc_attr( $count ); ?>">
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        return array(
            'title' => sanitize_text_field( $new_instance['title'] ),
            'count' => max( 1, min( 20, (int) $new_instance['count'] ) ),
        );
    }
}

add_action( 'widgets_init', function () {
    register_widget( 'School_Theme_Notices_Widget' );
} );
