<?php
/**
 * Custom template tags for this theme.
 *
 * @package School_Theme
 */

if ( ! function_exists( 'school_theme_menu_fallback' ) ) :
    function school_theme_menu_fallback() {
        echo '<ul id="primary-menu" class="primary-menu">';
        wp_list_pages( array(
            'title_li' => '',
            'depth'    => 2,
        ) );
        echo '</ul>';
    }
endif;

if ( ! function_exists( 'school_theme_breadcrumbs' ) ) :
    function school_theme_breadcrumbs() {
        if ( is_front_page() ) {
            return;
        }
        echo '<nav class="breadcrumbs" aria-label="' . esc_attr__( 'Breadcrumb', 'school-theme' ) . '">';
        echo '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'school-theme' ) . '</a>';
        echo '<span class="separator">/</span>';

        if ( is_category() || is_single() ) {
            if ( is_single() ) {
                $cat = get_the_category();
                if ( ! empty( $cat ) ) {
                    echo '<a href="' . esc_url( get_category_link( $cat[0]->term_id ) ) . '">' . esc_html( $cat[0]->name ) . '</a>';
                    echo '<span class="separator">/</span>';
                }
                echo '<span class="current">' . esc_html( get_the_title() ) . '</span>';
            } else {
                echo '<span class="current">' . esc_html( single_cat_title( '', false ) ) . '</span>';
            }
        } elseif ( is_page() ) {
            $post = get_post();
            if ( $post->post_parent ) {
                $ancestors = array_reverse( get_post_ancestors( $post->ID ) );
                foreach ( $ancestors as $ancestor ) {
                    echo '<a href="' . esc_url( get_permalink( $ancestor ) ) . '">' . esc_html( get_the_title( $ancestor ) ) . '</a>';
                    echo '<span class="separator">/</span>';
                }
            }
            echo '<span class="current">' . esc_html( get_the_title() ) . '</span>';
        } elseif ( is_search() ) {
            echo '<span class="current">' . esc_html__( 'Search Results', 'school-theme' ) . '</span>';
        } elseif ( is_404() ) {
            echo '<span class="current">' . esc_html__( '404', 'school-theme' ) . '</span>';
        } elseif ( is_archive() ) {
            echo '<span class="current">' . wp_kses_post( get_the_archive_title() ) . '</span>';
        }
        echo '</nav>';
    }
endif;

if ( ! function_exists( 'school_theme_post_meta' ) ) :
    function school_theme_post_meta() {
        echo '<div class="entry-meta">';
        printf(
            '<span class="posted-on"><i class="ti ti-calendar" aria-hidden="true"></i><a href="%s">%s</a></span>',
            esc_url( get_permalink() ),
            esc_html( get_the_date() )
        );
        printf(
            '<span class="byline"><i class="ti ti-user" aria-hidden="true"></i>%s</span>',
            esc_html( get_the_author() )
        );
        if ( has_category() ) {
            echo '<span class="cat-links"><i class="ti ti-folder" aria-hidden="true"></i>';
            the_category( ', ' );
            echo '</span>';
        }
        echo '</div>';
    }
endif;
