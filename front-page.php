<?php
/**
 * The front page template.
 *
 * @package School_Theme
 */

get_header(); ?>

<?php get_template_part( 'template-parts/sections/hero' ); ?>
<?php get_template_part( 'template-parts/sections/features' ); ?>
<?php get_template_part( 'template-parts/sections/about' ); ?>
<?php get_template_part( 'template-parts/sections/courses' ); ?>
<?php get_template_part( 'template-parts/sections/notices' ); ?>
<?php get_template_part( 'template-parts/sections/cta' ); ?>
<?php get_template_part( 'template-parts/sections/teachers' ); ?>
<?php get_template_part( 'template-parts/sections/testimonials' ); ?>
<?php get_template_part( 'template-parts/sections/events' ); ?>
<?php get_template_part( 'template-parts/sections/blog' ); ?>

<?php get_footer(); ?>
