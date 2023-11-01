<?php
/**
* Posts Settings.
*
* @package Omega Jewelry Store
*/

$omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options();

// Single Post Section.
$wp_customize->add_section( 'posts_settings',
	array(
	'title'      => esc_html__( 'Metainformation Settings', 'omega-jewelry-store' ),
	'priority'   => 35,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting('omega_jewelry_store_post_author',
    array(
        'default' => $omega_jewelry_store_default['omega_jewelry_store_post_author'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_jewelry_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_jewelry_store_post_author',
    array(
        'label' => esc_html__('Enable Posts Author', 'omega-jewelry-store'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_jewelry_store_post_date',
    array(
        'default' => $omega_jewelry_store_default['omega_jewelry_store_post_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_jewelry_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_jewelry_store_post_date',
    array(
        'label' => esc_html__('Enable Posts Date', 'omega-jewelry-store'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_jewelry_store_post_category',
    array(
        'default' => $omega_jewelry_store_default['omega_jewelry_store_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_jewelry_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_jewelry_store_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'omega-jewelry-store'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('omega_jewelry_store_post_tags',
    array(
        'default' => $omega_jewelry_store_default['omega_jewelry_store_post_tags'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'omega_jewelry_store_sanitize_checkbox',
    )
);
$wp_customize->add_control('omega_jewelry_store_post_tags',
    array(
        'label' => esc_html__('Enable Posts Tags', 'omega-jewelry-store'),
        'section' => 'posts_settings',
        'type' => 'checkbox',
    )
);