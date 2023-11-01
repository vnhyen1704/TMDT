<?php
/**
 * Omega Jewelry Store functions and definitions
 * @package Omega Jewelry Store
 */

if ( ! function_exists( 'omega_jewelry_store_after_theme_support' ) ) :

	function omega_jewelry_store_after_theme_support() {
		
		add_theme_support( 'automatic-feed-links' );

		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'ffffff',
			)
		);

		$GLOBALS['content_width'] = apply_filters( 'omega_jewelry_store_content_width', 1140 );
		
		add_theme_support( 'post-thumbnails' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 270,
				'width'       => 90,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);
		
		add_theme_support( 'title-tag' );

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		add_theme_support( 'post-formats', array(
		    'video',
		    'audio',
		    'gallery',
		    'quote',
		    'image'
		) );
		
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );

	}

endif;

add_action( 'after_setup_theme', 'omega_jewelry_store_after_theme_support' );

/**
 * Register and Enqueue Styles.
 */
function omega_jewelry_store_register_styles() {

	wp_enqueue_style( 'dashicons' );

    $theme_version = wp_get_theme()->get( 'Version' );
	$fonts_url = omega_jewelry_store_fonts_url();
    if( $fonts_url ){
    	require_once get_theme_file_path( 'lib/custom/css/wptt-webfont-loader.php' );
        wp_enqueue_style(
			'omega-jewelry-store-google-fonts',
			wptt_get_webfont_url( $fonts_url ),
			array(),
			$theme_version
		);
    }

    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/lib/swiper/css/swiper-bundle.min.css');
	wp_enqueue_style( 'omega-jewelry-store-style', get_stylesheet_uri(), array(), $theme_version );

	$omega_jewelry_store_css = '';

	if ( get_header_image() ) :

		$omega_jewelry_store_css .=  '
			#center-header{
				background-image: url('.esc_url(get_header_image()).');
				-webkit-background-size: cover !important;
				-moz-background-size: cover !important;
				-o-background-size: cover !important;
				background-size: cover !important;
			}';

	endif;

	wp_add_inline_style( 'omega-jewelry-store-style', $omega_jewelry_store_css );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	

	wp_enqueue_script( 'imagesloaded' );
    wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/lib/swiper/js/swiper-bundle.min.js', array('jquery'), '', 1);
	wp_enqueue_script( 'omega-jewelry-store-custom', get_template_directory_uri() . '/lib/custom/js/theme-custom-script.js', array('jquery'), '', 1);

    // Global Query
    if( is_front_page() ){

    	$posts_per_page = absint( get_option('posts_per_page') );
        $c_paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
        $posts_args = array(
            'posts_per_page'        => $posts_per_page,
            'paged'                 => $c_paged,
        );
        $posts_qry = new WP_Query( $posts_args );
        $max = $posts_qry->max_num_pages;

    }else{
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $c_paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    }

    $omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options();
    $omega_jewelry_store_pagination_layout = get_theme_mod( 'omega_jewelry_store_pagination_layout',$omega_jewelry_store_default['omega_jewelry_store_pagination_layout'] );
}

add_action( 'wp_enqueue_scripts', 'omega_jewelry_store_register_styles',200 );

function omega_jewelry_store_admin_enqueue_scripts_callback() {
    if ( ! did_action( 'wp_enqueue_media' ) ) {
    wp_enqueue_media();
    }
    wp_enqueue_script('omega-jewelry-store-uploaderjs', get_stylesheet_directory_uri() . '/lib/custom/js/uploader.js', array(), "1.0", true);
}
add_action( 'admin_enqueue_scripts', 'omega_jewelry_store_admin_enqueue_scripts_callback' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function omega_jewelry_store_menus() {

	$locations = array(
		'omega-jewelry-store-primary-menu'  => esc_html__( 'Primary Menu', 'omega-jewelry-store' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'omega_jewelry_store_menus' );

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/classes/class-svg-icons.php';
require get_template_directory() . '/classes/class-walker-menu.php';
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/custom-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/classes/body-classes.php';
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/metabox.php';
require get_template_directory() . '/inc/pagination.php';
require get_template_directory() . '/lib/breadcrumbs/breadcrumbs.php';
require get_template_directory() . '/lib/custom/css/dynamic-style.php';
require get_template_directory() . '/woocommerce/woocommerce-functions.php';

/**
 * For Admin Page
 */
if (is_admin()) {
	require get_template_directory() . '/inc/get-started/get-started.php';
}

function omega_jewelry_store_redirect_get_started() {
	global $pagenow;
		if (isset($_GET['activated']) && ('themes.php' == $pagenow) && is_admin()) {
		wp_safe_redirect(admin_url("themes.php?page=omega-jewelry-store-theme.php"));
	}
}
add_action('after_setup_theme', 'omega_jewelry_store_redirect_get_started');


if (! defined( 'OMEGA_JEWELRY_STORE_DOCS_PRO' ) ){
define('OMEGA_JEWELRY_STORE_DOCS_PRO',__('https://www.omegathemes.com/steps/pro-omega-jewelry-store/','omega-jewelry-store'));
}
if (! defined( 'OMEGA_JEWELRY_STORE_BUY_NOW' ) ){
define('OMEGA_JEWELRY_STORE_BUY_NOW',__('https://www.omegathemes.com/wordpress/jewelry-store-wordpress-theme/','omega-jewelry-store'));
}
if (! defined( 'OMEGA_JEWELRY_STORE_SUPPORT_FREE' ) ){
define('OMEGA_JEWELRY_STORE_SUPPORT_FREE',__('https://wordpress.org/support/theme/omega-jewelry-store','omega-jewelry-store'));
}
if (! defined( 'OMEGA_JEWELRY_STORE_REVIEW_FREE' ) ){
define('OMEGA_JEWELRY_STORE_REVIEW_FREE',__('https://wordpress.org/support/theme/omega-jewelry-store/reviews/#new-post','omega-jewelry-store'));
}
if (! defined( 'OMEGA_JEWELRY_STORE_DEMO_PRO' ) ){
define('OMEGA_JEWELRY_STORE_DEMO_PRO',__('https://www.omegathemes.com/preview/jewelry-store/','omega-jewelry-store'));
}
