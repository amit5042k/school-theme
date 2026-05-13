<?php
/**
 * The 404 template.
 *
 * @package School_Theme
 */

get_header(); ?>

<div class="container error-404-wrap">
    <main id="primary" class="site-main">
        <section class="error-404 not-found">
            <h1 class="error-code">404</h1>
            <h2 class="error-title"><?php esc_html_e( 'Oops! Page not found.', 'school-theme' ); ?></h2>
            <p><?php esc_html_e( 'The page you are looking for might have been removed, renamed, or is temporarily unavailable.', 'school-theme' ); ?></p>
            <div class="error-actions">
                <a class="btn btn-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to Home', 'school-theme' ); ?></a>
            </div>
            <div class="error-search"><?php get_search_form(); ?></div>
        </section>
    </main>
</div>

<?php get_footer(); ?>
