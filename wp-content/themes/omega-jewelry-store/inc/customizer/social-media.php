<?php
/**
* Header Options.
*
* @package Omega Jewelry Store
*/

$omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options();

// Header Section.
$wp_customize->add_section( 'social_media_setting',
	array(
	'title'      => esc_html__( 'Social Media Settings', 'omega-jewelry-store' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting( 'omega_jewelry_store_header_layout_facebook_link',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'omega_jewelry_store_header_layout_facebook_link',
    array(
    'label'    => esc_html__( 'Facebook Link', 'omega-jewelry-store' ),
    'section'  => 'social_media_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting( 'omega_jewelry_store_header_layout_twitter_link',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'omega_jewelry_store_header_layout_twitter_link',
    array(
    'label'    => esc_html__( 'Twitter Link', 'omega-jewelry-store' ),
    'section'  => 'social_media_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting( 'omega_jewelry_store_header_layout_pintrest_link',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'omega_jewelry_store_header_layout_pintrest_link',
    array(
    'label'    => esc_html__( 'Pintrest Link', 'omega-jewelry-store' ),
    'section'  => 'social_media_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting( 'omega_jewelry_store_header_layout_instagram_link',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'omega_jewelry_store_header_layout_instagram_link',
    array(
    'label'    => esc_html__( 'Instagram Link', 'omega-jewelry-store' ),
    'section'  => 'social_media_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting( 'omega_jewelry_store_header_layout_youtube_link',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'omega_jewelry_store_header_layout_youtube_link',
    array(
    'label'    => esc_html__( 'Youtube Link', 'omega-jewelry-store' ),
    'section'  => 'social_media_setting',
    'type'     => 'url',
    )
);