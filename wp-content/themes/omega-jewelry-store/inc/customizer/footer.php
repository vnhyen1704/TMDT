<?php
/**
* Footer Settings.
*
* @package Omega Jewelry Store
*/

$omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options();

$wp_customize->add_section( 'footer_widget_area',
	array(
	'title'      => esc_html__( 'Footer Setting', 'omega-jewelry-store' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting( 'footer_column_layout',
	array(
	'default'           => $omega_jewelry_store_default['footer_column_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control( 'footer_column_layout',
	array(
	'label'       => esc_html__( 'Top Footer Column Layout', 'omega-jewelry-store' ),
	'section'     => 'footer_widget_area',
	'type'        => 'select',
	'choices'               => array(
		'1' => esc_html__( 'One Column', 'omega-jewelry-store' ),
		'2' => esc_html__( 'Two Column', 'omega-jewelry-store' ),
		'3' => esc_html__( 'Three Column', 'omega-jewelry-store' ),
	    ),
	)
);

$wp_customize->add_setting( 'footer_copyright_text',
	array(
	'default'           => $omega_jewelry_store_default['footer_copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'footer_copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'omega-jewelry-store' ),
	'section'  => 'footer_widget_area',
	'type'     => 'text',
	)
);