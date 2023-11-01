<?php
/**
* Widget Functions.
*
* @package Omega Jewelry Store
*/

function omega_jewelry_store_widgets_init(){

	register_sidebar(array(
	    'name' => esc_html__('Main Sidebar', 'omega-jewelry-store'),
	    'id' => 'sidebar-1',
	    'description' => esc_html__('Add widgets here.', 'omega-jewelry-store'),
	    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h3 class="widget-title"><span>',
	    'after_title' => '</span></h3>',
	));


    $omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options();
    $footer_column_layout = absint( get_theme_mod( 'footer_column_layout',$omega_jewelry_store_default['footer_column_layout'] ) );

    for( $i = 0; $i < $footer_column_layout; $i++ ){
    	
    	if( $i == 0 ){ $count = esc_html__('One','omega-jewelry-store'); }
    	if( $i == 1 ){ $count = esc_html__('Two','omega-jewelry-store'); }
    	if( $i == 2 ){ $count = esc_html__('Three','omega-jewelry-store'); }

	    register_sidebar( array(
	        'name' => esc_html__('Footer Widget ', 'omega-jewelry-store').$count,
	        'id' => 'omega-jewelry-store-footer-widget-'.$i,
	        'description' => esc_html__('Add widgets here.', 'omega-jewelry-store'),
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2 class="widget-title">',
	        'after_title' => '</h2>',
	    ));
	}

}

add_action('widgets_init', 'omega_jewelry_store_widgets_init');