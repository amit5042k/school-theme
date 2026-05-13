<?php
/**
 * Template Name: Contact
 *
 * @package School_Theme
 */

get_header();

$phone   = get_theme_mod( 'school_topbar_phone', '' );
$email   = get_theme_mod( 'school_topbar_email', '' );
$address = get_theme_mod( 'school_contact_address', '' );
$map     = get_theme_mod( 'school_contact_map', '' );
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

        <div class="contact-grid">
            <div class="contact-info">
                <h3><?php esc_html_e( 'Get in Touch', 'school-theme' ); ?></h3>
                <?php if ( $address ) : ?>
                    <p class="contact-line"><i class="ti ti-map-pin" aria-hidden="true"></i><span><?php echo nl2br( esc_html( $address ) ); ?></span></p>
                <?php endif; ?>
                <?php if ( $phone ) : ?>
                    <p class="contact-line"><i class="ti ti-phone" aria-hidden="true"></i><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></p>
                <?php endif; ?>
                <?php if ( $email ) : ?>
                    <p class="contact-line"><i class="ti ti-mail" aria-hidden="true"></i><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
                <?php endif; ?>
            </div>
            <div class="contact-form-wrap">
                <h3><?php esc_html_e( 'Send Us a Message', 'school-theme' ); ?></h3>
                <p class="contact-form-note"><?php esc_html_e( 'Install a contact form plugin (e.g. Contact Form 7, WPForms, Fluent Forms) and paste its shortcode into this page to render the form here.', 'school-theme' ); ?></p>
            </div>
        </div>

        <?php if ( $map ) : ?>
            <div class="contact-map">
                <?php echo wp_kses( $map, array(
                    'iframe' => array(
                        'src'             => true,
                        'width'           => true,
                        'height'          => true,
                        'frameborder'     => true,
                        'style'           => true,
                        'allowfullscreen' => true,
                        'loading'         => true,
                        'referrerpolicy'  => true,
                        'title'           => true,
                    ),
                ) ); ?>
            </div>
        <?php endif; ?>
    </main>
</div>

<?php get_footer(); ?>
