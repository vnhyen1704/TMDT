<?php
/**
 * Coachify SEO Settings
 *
 * @package Coachify
 */
if ( ! function_exists( 'coachify_customize_register_seo_settings' ) ) : 

function coachify_customize_register_seo_settings( $wp_customize ) { 

    $defaults = coachify_get_general_defaults();
    
    /** SEO Settings */
    $wp_customize->add_section(
        'seo_settings',
        array(
            'title'    => __( 'SEO Settings', 'coachify' ),
            'priority' => 30,
        )
    );
    
    /** Enable Breadcrumb */
    $wp_customize->add_setting( 
        'ed_breadcrumb', 
        array(
            'default'           => $defaults['ed_breadcrumb'],
            'sanitize_callback' => 'coachify_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Coachify_Toggle_Control( 
			$wp_customize,
			'ed_breadcrumb',
			array(
				'section'     => 'seo_settings',
				'label'	      => __( 'Show Breadcrumb', 'coachify' )
			)
		)
	);
    
    /** Breadcrumb Home Text */
    $wp_customize->add_setting(
        'home_text',
        array(
            'default'           => $defaults['home_text'],
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'home_text',
        array(
            'type'            => 'text',
            'section'         => 'seo_settings',
            'label'           => __( 'Breadcrumb Home Text', 'coachify' ),
            'active_callback' => 'coachify_seo_breadcrumb_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'home_text', array(
        'selector'        => '#crumbs .home-text',
        'render_callback' => 'coachify_get_home_text',
    ) );

    /** Separator Text */
    $wp_customize->add_setting( 
        'separator_icon', 
        array(
            'default'           => $defaults[ 'separator_icon' ],
            'sanitize_callback' => 'coachify_sanitize_radio',
            'transport'         => 'postMessage'
        ) 
    );
    
    $wp_customize->add_control(
		new Coachify_Radio_Image_Control(
			$wp_customize,
			'separator_icon',
			array(
				'section'     => 'seo_settings',
				'label'       => __( 'Separator', 'coachify' ),
				'svg'         => true,
				'col'         => 'col-3',
				'choices'     => array(
                    'one' => array(
                        'label' => __( 'Type 1', 'coachify' ),
                        'path'  => coachify_breadcrumb_icons_list('one'),
                    ),
                    'two' => array(
                        'label' => __( 'Type 2', 'coachify' ),                        
                        'path'  => coachify_breadcrumb_icons_list('two'),
                    ),
                    'three' => array(
                        'label' => __( 'Type 3', 'coachify' ),
                        'path'  => coachify_breadcrumb_icons_list('three'),
                    )
                ),
                'active_callback' => 'coachify_seo_breadcrumb_ac'
			)
		)
    );

    /** Enable post updated text */
    $wp_customize->add_setting( 
        'ed_post_update_date', 
        array(
            'default'           => $defaults['ed_post_update_date'],
            'sanitize_callback' => 'coachify_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Coachify_Toggle_Control( 
			$wp_customize,
			'ed_post_update_date',
			array(
				'section'     => 'seo_settings',
				'label'	      => __( 'Show Last Updated Post Date', 'coachify' ),
                'description' => __( 'Enable to show last updated post date on listing as well as in single post.', 'coachify' ),
			)
		)
	);
    
    /** SEO Settings Ends */
}
endif;
add_action( 'customize_register', 'coachify_customize_register_seo_settings' );