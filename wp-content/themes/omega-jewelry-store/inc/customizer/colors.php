<?php
/**
* Color Settings.
* @package Omega Jewelry Store
*/

$omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options();

$wp_customize->add_setting( 'omega_jewelry_store_default_text_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'omega_jewelry_store_default_text_color',
    array(
        'label'      => esc_html__( 'Text Color', 'omega-jewelry-store' ),
        'section'    => 'colors',
        'settings'   => 'omega_jewelry_store_default_text_color',
    ) ) 
);

$wp_customize->add_setting( 'omega_jewelry_store_border_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'omega_jewelry_store_border_color',
    array(
        'label'      => esc_html__( 'Border Color', 'omega-jewelry-store' ),
        'section'    => 'colors',
        'settings'   => 'omega_jewelry_store_border_color',
    ) ) 
);