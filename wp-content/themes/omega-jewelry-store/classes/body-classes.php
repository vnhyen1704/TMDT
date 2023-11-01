<?php
/**
* Body Classes.
* @package Omega Jewelry Store
*/
 
 if (!function_exists('omega_jewelry_store_body_classes')) :

    function omega_jewelry_store_body_classes($classes) {

        $omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options();
        global $post;
        // Adds a class of hfeed to non-singular pages.
        if ( !is_singular() ) {
            $classes[] = 'hfeed';
        }

        // Adds a class of no-sidebar when there is no sidebar present.
        if ( !is_active_sidebar( 'sidebar-1' ) ) {
            $classes[] = 'no-sidebar';
        }

        $global_sidebar_layout = esc_html( get_theme_mod( 'global_sidebar_layout',$omega_jewelry_store_default['global_sidebar_layout'] ) );

        if ( is_active_sidebar( 'sidebar-1' ) ) {
            if( is_single() || is_page() ){
                $omega_jewelry_store_post_sidebar = esc_html( get_post_meta( $post->ID, 'omega_jewelry_store_post_sidebar_option', true ) );
                if (empty($omega_jewelry_store_post_sidebar) || ($omega_jewelry_store_post_sidebar == 'global-sidebar')) {
                    $classes[] = esc_attr( $global_sidebar_layout );
                } else{
                    $classes[] = esc_attr( $omega_jewelry_store_post_sidebar );
                }
            }else{
                $classes[] = esc_attr( $global_sidebar_layout );
            }
            
        }
        
        return $classes;
    }

endif;

add_filter('body_class', 'omega_jewelry_store_body_classes');