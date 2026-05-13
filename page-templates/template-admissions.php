<?php
/**
 * Template Name: Admissions
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
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'page-article' ); ?>>
                <div class="entry-content"><?php the_content(); ?></div>
            </article>
        <?php endwhile; ?>

        <section class="admissions-blocks">
            <div class="admissions-grid">
                <div class="admissions-card">
                    <div class="feature-icon"><i class="ti ti-school" aria-hidden="true"></i></div>
                    <h3><?php esc_html_e( 'Eligibility', 'school-theme' ); ?></h3>
                    <p><?php esc_html_e( 'Admissions are open for all classes from Nursery onwards. Age criteria as per CBSE / state norms apply.', 'school-theme' ); ?></p>
                </div>
                <div class="admissions-card">
                    <div class="feature-icon"><i class="ti ti-certificate" aria-hidden="true"></i></div>
                    <h3><?php esc_html_e( 'Procedure', 'school-theme' ); ?></h3>
                    <ol class="admissions-steps">
                        <li><?php esc_html_e( 'Collect / download the registration form', 'school-theme' ); ?></li>
                        <li><?php esc_html_e( 'Submit form with required documents', 'school-theme' ); ?></li>
                        <li><?php esc_html_e( 'Attend interaction / assessment', 'school-theme' ); ?></li>
                        <li><?php esc_html_e( 'Confirm admission and pay fees', 'school-theme' ); ?></li>
                    </ol>
                </div>
                <div class="admissions-card">
                    <div class="feature-icon"><i class="ti ti-file" aria-hidden="true"></i></div>
                    <h3><?php esc_html_e( 'Documents Required', 'school-theme' ); ?></h3>
                    <ul>
                        <li><?php esc_html_e( 'Birth certificate', 'school-theme' ); ?></li>
                        <li><?php esc_html_e( 'Previous school transfer certificate', 'school-theme' ); ?></li>
                        <li><?php esc_html_e( 'Last report card', 'school-theme' ); ?></li>
                        <li><?php esc_html_e( 'Two passport-size photographs', 'school-theme' ); ?></li>
                        <li><?php esc_html_e( 'Aadhaar copy (student & parents)', 'school-theme' ); ?></li>
                    </ul>
                </div>
            </div>
        </section>

        <?php
        $downloads = new WP_Query( array(
            'post_type'      => 'school_download',
            'posts_per_page' => 6,
            'no_found_rows'  => true,
        ) );
        if ( $downloads->have_posts() ) : ?>
            <section class="admissions-downloads">
                <h2 class="section-title"><?php esc_html_e( 'Forms & Downloads', 'school-theme' ); ?></h2>
                <ul class="downloads-list">
                    <?php while ( $downloads->have_posts() ) : $downloads->the_post();
                        $file = get_post_meta( get_the_ID(), '_school_download_file', true );
                        if ( ! $file ) { continue; } ?>
                        <li class="download-item">
                            <i class="ti ti-file" aria-hidden="true"></i>
                            <span class="download-title"><?php the_title(); ?></span>
                            <a class="btn btn-outline btn-sm" href="<?php echo esc_url( $file ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Download', 'school-theme' ); ?></a>
                        </li>
                    <?php endwhile; wp_reset_postdata(); ?>
                </ul>
            </section>
        <?php endif; ?>
    </main>
</div>

<?php get_footer(); ?>
