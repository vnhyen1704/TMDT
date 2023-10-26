<?php
/**
 * Sidebar Settings
 *
 * @package Coachify
*/
if ( ! function_exists( 'coachify_customize_register_general_sidebar' ) ) : 

function coachify_customize_register_general_sidebar( $wp_customize ){
    
    $defaults = coachify_get_general_defaults();

    /** Sidebar */
    $wp_customize->add_section( 
        'general_sidebar_section',
         array(
            'priority' => 20,
            'title'    => __( 'Sidebar', 'coachify' ),
            'panel'    => 'general_settings'
        ) 
    );

    /** Sidebar Width */
    $wp_customize->add_setting(
        'sidebar_width',
        array(
            'default'           => $defaults['sidebar_width'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Coachify_Range_Slider_Control(
            $wp_customize,
            'sidebar_width',
            array(
                'label'    => __( 'Sidebar Width', 'coachify' ),
                'section'  => 'general_sidebar_section',
                'settings' => array(
                    'desktop' => 'sidebar_width',
                ),
                'choices' => array(
                    'desktop' => array(
                        'max'  => 50,
                        'step' => 1,
                        'edit' => true,
                        'unit' => '%',
                    )
                ),
            )
        )
    );  

    /** Widget Spacing */
    $wp_customize->add_setting(
        'widgets_spacing',
        array(
            'default'           => $defaults['widgets_spacing'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'tablet_widgets_spacing',
        array(
            'default'           => $defaults['tablet_widgets_spacing'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_setting(
        'mobile_widgets_spacing',
        array(
            'default'           => $defaults['mobile_widgets_spacing'],
            'sanitize_callback' => 'coachify_sanitize_empty_absint',
            'transport'         => 'postMessage',
        )
    );

    $wp_customize->add_control(
        new Coachify_Range_Slider_Control(
            $wp_customize,
            'widgets_spacing',
            array(
                'label'    => __( 'Widget Spacing', 'coachify' ),
                'section'  => 'general_sidebar_section',
                'settings' => array(
                    'desktop' => 'widgets_spacing',
                    'tablet'  => 'tablet_widgets_spacing',
                    'mobile'  => 'mobile_widgets_spacing'
                ),
                'choices' => array(
                    'desktop' => array(
                        'min'  => 5,
                        'max'  => 100,
                        'step' => 1,
                        'edit' => true,
                        'unit' => 'px',
                    ),
                    'tablet' => array(
                        'min'  => 5,
                        'max'  => 100,
                        'step' => 1,
                        'edit' => true,
                        'unit' => 'px',
                    ),
                    'mobile' => array(
                        'min'  => 5,
                        'max'  => 100,
                        'step' => 1,
                        'edit' => true,
                        'unit' => 'px',
                    ),
                ),
            )
        )
    );

    /** Enable Last Widget Sticky */
    $wp_customize->add_setting(
        'ed_last_widget_sticky',
        array(
            'default'           => $defaults['ed_last_widget_sticky'],
            'sanitize_callback' => 'coachify_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Coachify_Toggle_Control( 
			$wp_customize,
			'ed_last_widget_sticky',
			array(
				'section'	  => 'general_sidebar_section',
				'label'		  => __( 'Last Widget Sticky', 'coachify' ),
			)
		)
	);

    $wp_customize->add_setting(
        'sidebar_layout_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );
    
    $wp_customize->add_control(
        new Coachify_Note_Control( 
            $wp_customize,
            'sidebar_layout_text',
            array(
                'section'         => 'general_sidebar_section',
                /* translators: %1$s: Link to Sidebar customizer setting*/ 
                'description'     => sprintf(__( 'You can select the default sidebar layout from %1$s here. %2$s', 'coachify' ), '<span class="text-inner-link sidebar_layout_text">', '</span>'),
            )
        )
    );

}
endif;
add_action( 'customize_register', 'coachify_customize_register_general_sidebar' );