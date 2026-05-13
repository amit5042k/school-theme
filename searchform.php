<?php
/**
 * The template for displaying the search form.
 *
 * @package School_Theme
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label class="screen-reader-text" for="s-<?php echo esc_attr( uniqid() ); ?>"><?php esc_html_e( 'Search for:', 'school-theme' ); ?></label>
    <input type="search" id="s-<?php echo esc_attr( uniqid() ); ?>" class="search-field" placeholder="<?php esc_attr_e( 'Search courses, posts…', 'school-theme' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
    <button type="submit" class="search-submit" aria-label="<?php esc_attr_e( 'Submit search', 'school-theme' ); ?>">
        <span class="ti ti-search" aria-hidden="true"></span>
    </button>
</form>
