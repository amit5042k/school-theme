<?php
/**
 * Template Name: Results
 *
 * Lists results from the school_achievement CPT filtered by an optional
 * "year" query var (e.g. /results/?year=2024). Page content renders
 * above the table.
 *
 * @package School_Theme
 */

get_header();

$current_year = isset( $_GET['year'] ) ? absint( $_GET['year'] ) : 0;

global $wpdb;
$years = $wpdb->get_col( "SELECT DISTINCT YEAR(post_date) FROM {$wpdb->posts} WHERE post_type = 'school_achievement' AND post_status = 'publish' ORDER BY post_date DESC" );

$args = array(
    'post_type'      => 'school_achievement',
    'posts_per_page' => 30,
    'paged'          => max( 1, get_query_var( 'paged' ) ),
);
if ( $current_year ) {
    $args['date_query'] = array( array( 'year' => $current_year ) );
}
$query = new WP_Query( $args );
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
            <?php if ( get_the_content() ) : ?>
                <div class="entry-content page-intro"><?php the_content(); ?></div>
            <?php endif; ?>
        <?php endwhile; ?>

        <?php if ( ! empty( $years ) ) : ?>
            <div class="results-filter">
                <a class="gallery-filter-link <?php echo $current_year ? '' : 'is-active'; ?>" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'All Years', 'school-theme' ); ?></a>
                <?php foreach ( $years as $y ) : ?>
                    <a class="gallery-filter-link <?php echo (int) $current_year === (int) $y ? 'is-active' : ''; ?>" href="<?php echo esc_url( add_query_arg( 'year', $y, get_permalink() ) ); ?>"><?php echo esc_html( $y ); ?></a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ( $query->have_posts() ) : ?>
            <div class="results-table-wrap">
                <table class="results-table">
                    <thead>
                        <tr>
                            <th><?php esc_html_e( 'Year', 'school-theme' ); ?></th>
                            <th><?php esc_html_e( 'Title', 'school-theme' ); ?></th>
                            <th><?php esc_html_e( 'Details', 'school-theme' ); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <tr>
                            <td><?php echo esc_html( get_the_date( 'Y' ) ); ?></td>
                            <td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
                            <td><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <?php
            echo '<nav class="pagination">';
            echo paginate_links( array(
                'total'   => $query->max_num_pages,
                'current' => max( 1, get_query_var( 'paged' ) ),
            ) );
            echo '</nav>';
            wp_reset_postdata();
            ?>
        <?php else : ?>
            <p class="section-empty"><?php esc_html_e( 'No results published yet. Add entries under Achievements → Add New.', 'school-theme' ); ?></p>
        <?php endif; ?>
    </main>
</div>

<?php get_footer(); ?>
