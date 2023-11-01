<?php
/**
* Layouts Settings.
*
* @package Omega Jewelry Store
*/

$omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'layout_setting',
	array(
	'title'      => esc_html__( 'Global Layout Settings', 'omega-jewelry-store' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting( 'global_sidebar_layout',
    array(
    'default'           => $omega_jewelry_store_default['global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'omega_jewelry_store_sanitize_sidebar_option',
    )
);
$wp_customize->add_control( 'global_sidebar_layout',
    array(
    'label'       => esc_html__( 'Global Sidebar Layout', 'omega-jewelry-store' ),
    'section'     => 'layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__( 'Right Sidebar', 'omega-jewelry-store' ),
        'left-sidebar'  => esc_html__( 'Left Sidebar', 'omega-jewelry-store' ),
        'no-sidebar'    => esc_html__( 'No Sidebar', 'omega-jewelry-store' ),
        ),
    )
);
