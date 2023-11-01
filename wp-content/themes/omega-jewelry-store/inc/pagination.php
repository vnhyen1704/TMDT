<?php
/**
 *
 * Pagination Functions
 *
 * @package Omega Jewelry Store
 */

if( !function_exists('omega_jewelry_store_archive_pagination_x') ):

	// Archive Page Navigation
	function omega_jewelry_store_archive_pagination_x(){

		the_posts_pagination();
	}

endif;
add_action('omega_jewelry_store_archive_pagination','omega_jewelry_store_archive_pagination_x',20);