<?php
/**
* Custom Functions.
*
* @package Omega Jewelry Store
*/

if( !function_exists( 'omega_jewelry_store_sanitize_sidebar_option' ) ) :

    // Sidebar Option Sanitize.
    function omega_jewelry_store_sanitize_sidebar_option( $omega_jewelry_store_input ){

        $omega_jewelry_store_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $omega_jewelry_store_input,$omega_jewelry_store_metabox_options ) ){

            return $omega_jewelry_store_input;

        }

        return;

    }

endif;

if ( ! function_exists( 'omega_jewelry_store_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 */
	function omega_jewelry_store_sanitize_checkbox( $omega_jewelry_store_checked ) {

		return ( ( isset( $omega_jewelry_store_checked ) && true === $omega_jewelry_store_checked ) ? true : false );

	}

endif;


if ( ! function_exists( 'omega_jewelry_store_sanitize_select' ) ) :

    /**
     * Sanitize select.
     */
    function omega_jewelry_store_sanitize_select( $omega_jewelry_store_input, $omega_jewelry_store_setting ) {
        $omega_jewelry_store_input = sanitize_text_field( $omega_jewelry_store_input );
        $choices = $omega_jewelry_store_setting->manager->get_control( $omega_jewelry_store_setting->id )->choices;
        return ( array_key_exists( $omega_jewelry_store_input, $choices ) ? $omega_jewelry_store_input : $omega_jewelry_store_setting->default );
    }

endif;