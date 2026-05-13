<?php
/**
 * The template for displaying the footer.
 *
 * @package School_Theme
 */
?>
    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
        <div class="footer-widgets">
            <div class="container footer-widget-grid">
                <?php for ( $i = 1; $i <= 4; $i++ ) : ?>
                    <?php if ( is_active_sidebar( 'footer-' . $i ) ) : ?>
                        <div class="footer-column footer-column-<?php echo (int) $i; ?>">
                            <?php dynamic_sidebar( 'footer-' . $i ); ?>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="site-info">
            <div class="container site-info-inner">
                <div class="copyright">
                    <?php
                    $copyright = get_theme_mod( 'school_footer_copyright', '' );
                    if ( $copyright ) {
                        echo wp_kses_post( $copyright );
                    } else {
                        printf(
                            /* translators: 1: year, 2: site name. */
                            esc_html__( '© %1$s %2$s. All rights reserved.', 'school-theme' ),
                            esc_html( date_i18n( 'Y' ) ),
                            esc_html( get_bloginfo( 'name' ) )
                        );
                    }
                    ?>
                </div>
                <?php if ( has_nav_menu( 'footer' ) ) : ?>
                <nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'school-theme' ); ?>">
                    <?php wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu',
                        'depth'          => 1,
                        'container'      => false,
                    ) ); ?>
                </nav>
                <?php endif; ?>
            </div>
        </div>

        <button class="back-to-top" aria-label="<?php esc_attr_e( 'Back to top', 'school-theme' ); ?>">
            <span aria-hidden="true">&uarr;</span>
        </button>
    </footer>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
