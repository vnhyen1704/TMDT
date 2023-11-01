<?php
/**
 * Default Values.
 *
 * @package Omega Jewelry Store
 */

if ( ! function_exists( 'omega_jewelry_store_get_default_theme_options' ) ) :
	function omega_jewelry_store_get_default_theme_options() {

		$omega_jewelry_store_defaults = array();
		
		// Options.
        $omega_jewelry_store_defaults['logo_width_range']                                  = 300;
		$omega_jewelry_store_defaults['global_sidebar_layout']					            = 'right-sidebar';
        $omega_jewelry_store_defaults['omega_jewelry_store_header_layout_email_address']      = esc_html__( 'mail@example.com', 'omega-jewelry-store' );
        $omega_jewelry_store_defaults['omega_jewelry_store_header_layout_20_per_discount_text']      = esc_html__( 'Free International Shipping On Order Over $60', 'omega-jewelry-store' );
        $omega_jewelry_store_defaults['omega_jewelry_store_header_layout_enable_translator']          = 0;
        $omega_jewelry_store_defaults['omega_jewelry_store_pagination_layout']         = 'numeric';
		$omega_jewelry_store_defaults['footer_column_layout'] 						 = 3;
		$omega_jewelry_store_defaults['footer_copyright_text'] 				         = esc_html__( 'All rights reserved.', 'omega-jewelry-store' );
        $omega_jewelry_store_defaults['twp_navigation_type']              			 = 'theme-normal-navigation';
        $omega_jewelry_store_defaults['omega_jewelry_store_post_author']                		= 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_post_date']                		= 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_post_category']                	= 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_post_tags']                		= 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_floating_next_previous_nav']       = 1;
        $omega_jewelry_store_defaults['omega_jewelry_store_header_banner']               		= 0;
        $omega_jewelry_store_defaults['omega_jewelry_store_category_section']               	= 0;
        $omega_jewelry_store_defaults['omega_jewelry_store_courses_category_section']         = 0;
        $omega_jewelry_store_defaults['omega_jewelry_store_background_color']               	= '#fff';
        $omega_jewelry_store_defaults['omega_jewelry_store_product_section_title']           = esc_html__( 'Grab Your Favorite Earrings', 'omega-jewelry-store' );

		// Pass through filter.
		$omega_jewelry_store_defaults = apply_filters( 'omega_jewelry_store_filter_default_theme_options', $omega_jewelry_store_defaults );

		return $omega_jewelry_store_defaults;
	}
endif;
