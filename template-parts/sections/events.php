<?php
/**
 * Events section.
 *
 * @package School_Theme
 */

if ( ! get_theme_mod( 'school_section_events', true ) ) {
    return;
}

$query = new WP_Query( array(
    'post_type'      => 'school_event',
    'posts_per_page' => 3,
    'meta_key'       => '_school_event_date',
    'orderby'        => 'meta_value',
    'order'          => 'ASC',
    'no_found_rows'  => true,
) );
?>
<section class="events-section section-pad">
    <div class="container">
        <header class="section-header">
            <span class="section-subtitle"><?php esc_html_e( 'Upcoming Events', 'school-theme' ); ?></span>
            <h2 class="section-title"><?php esc_html_e( 'Open days, workshops & more', 'school-theme' ); ?></h2>
        </header>

        <?php if ( $query->have_posts() ) : ?>
            <div class="events-grid">
                <?php while ( $query->have_posts() ) : $query->the_post();
                    $date     = get_post_meta( get_the_ID(), '_school_event_date', true );
                    $time     = get_post_meta( get_the_ID(), '_school_event_time', true );
                    $location = get_post_meta( get_the_ID(), '_school_event_location', true );
                    $ts       = $date ? strtotime( $date ) : 0;
                ?>
                    <article class="event-card">
                        <?php if ( $ts ) : ?>
                            <div class="event-date">
                                <span class="event-day"><?php echo esc_html( date_i18n( 'd', $ts ) ); ?></span>
                                <span class="event-month"><?php echo esc_html( date_i18n( 'M', $ts ) ); ?></span>
                            </div>
                        <?php endif; ?>
                        <div class="event-body">
                            <h3 class="event-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="event-meta">
                                <?php if ( $time ) : ?><span><i class="ti ti-clock" aria-hidden="true"></i><?php echo esc_html( $time ); ?></span><?php endif; ?>
                                <?php if ( $location ) : ?><span><i class="ti ti-map-pin" aria-hidden="true"></i><?php echo esc_html( $location ); ?></span><?php endif; ?>
                            </div>
                            <div class="event-excerpt"><?php the_excerpt(); ?></div>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <p class="section-empty"><?php esc_html_e( 'No events scheduled. Add some from Events → Add New.', 'school-theme' ); ?></p>
        <?php endif; ?>
    </div>
</section>
