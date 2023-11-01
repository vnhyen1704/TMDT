<?php
/**
 * Cosmetic Ecommerce Store functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Cosmetic Ecommerce Store
 */

if ( ! defined( 'FASHION_ESTORE_URL' ) ) {
    define( 'FASHION_ESTORE_URL', esc_url( 'https://www.themagnifico.net/themes/ecommerce-store-wordpress-theme/', 'cosmetic-ecommerce-store') );
}
if ( ! defined( 'FASHION_ESTORE_TEXT' ) ) {
    define( 'FASHION_ESTORE_TEXT', __( 'Cosmetic Pro','cosmetic-ecommerce-store' ));
}
if ( ! defined( 'FASHION_ESTORE_CONTACT_SUPPORT' ) ) {
define('FASHION_ESTORE_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/cosmetic-ecommerce-store','cosmetic-ecommerce-store'));
}
if ( ! defined( 'FASHION_ESTORE_REVIEW' ) ) {
define('FASHION_ESTORE_REVIEW',__('https://wordpress.org/support/theme/cosmetic-ecommerce-store/reviews/#new-post','cosmetic-ecommerce-store'));
}
if ( ! defined( 'FASHION_ESTORE_LIVE_DEMO' ) ) {
define('FASHION_ESTORE_LIVE_DEMO',__('https://www.themagnifico.net/demo/cosmetic-ecommerce-store/','cosmetic-ecommerce-store'));
}
if ( ! defined( 'FASHION_ESTORE_GET_PREMIUM_PRO' ) ) {
define('FASHION_ESTORE_GET_PREMIUM_PRO',__('https://www.themagnifico.net/themes/ecommerce-store-wordpress-theme/','cosmetic-ecommerce-store'));
}
if ( ! defined( 'FASHION_ESTORE_PRO_DOC' ) ) {
define('FASHION_ESTORE_PRO_DOC',__('https://www.themagnifico.net/eard/wathiqa/cosmetic-ecommerce-store-doc/ ','cosmetic-ecommerce-store'));
}

function cosmetic_ecommerce_store_enqueue_styles() {
    wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri()) . '/assets/css/bootstrap.css');
    $cosmetic_ecommerce_store_parentcss = 'fashion-estore-style';
    $cosmetic_ecommerce_store_theme = wp_get_theme(); wp_enqueue_style( $cosmetic_ecommerce_store_parentcss, get_template_directory_uri() . '/style.css', array(), $cosmetic_ecommerce_store_theme->parent()->get('Version'));
    wp_enqueue_style( 'cosmetic-ecommerce-store-style', get_stylesheet_uri(), array( $cosmetic_ecommerce_store_parentcss ), $cosmetic_ecommerce_store_theme->get('Version'));

    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
}

add_action( 'wp_enqueue_scripts', 'cosmetic_ecommerce_store_enqueue_styles' );

function cosmetic_ecommerce_store_admin_scripts() {
    // demo CSS
    wp_enqueue_style( 'cosmetic-ecommerce-store-demo-css', get_theme_file_uri( 'assets/css/demo.css' ) );
}
add_action( 'admin_enqueue_scripts', 'cosmetic_ecommerce_store_admin_scripts' );

function cosmetic_ecommerce_store_customize_register($wp_customize){

    // Pro Version
    class Cosmetic_Ecommerce_Store_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( FASHION_ESTORE_BUY_TEXT,'fashion-estore' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Shop Services Section
    $wp_customize->add_section( 'cosmetic_ecommerce_store_shop_services_section' , array(
        'title'      => __( 'Shop Services Settings', 'cosmetic-ecommerce-store' ),
        'priority'   => 60,
    ) );

    $wp_customize->add_setting('cosmetic_ecommerce_store_shop_services_show_setting', array(
        'default' => 1,
        'sanitize_callback' => 'fashion_estore_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cosmetic_ecommerce_store_shop_services_show_setting',array(
        'label'          => __( 'Show Hide Shop Services', 'cosmetic-ecommerce-store' ),
        'section'        => 'cosmetic_ecommerce_store_shop_services_section',
        'settings'       => 'cosmetic_ecommerce_store_shop_services_show_setting',
        'type'           => 'checkbox',
    )));

    for ($i=1; $i <= 4 ; $i++) {

        $wp_customize->add_setting('cosmetic_ecommerce_store_shop_services_icon'.$i,array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('cosmetic_ecommerce_store_shop_services_icon'.$i,array(
            'label' => esc_html__('Icon','cosmetic-ecommerce-store').$i,
            'section' => 'cosmetic_ecommerce_store_shop_services_section',
            'setting' => 'cosmetic_ecommerce_store_shop_services_icon'.$i,
            'type'  => 'text',
            'default' => '',
            'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fas fa-shipping-fast','cosmetic-ecommerce-store')
        ));

        $wp_customize->add_setting('cosmetic_ecommerce_store_shop_services_title'.$i,array(
            'default'   => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('cosmetic_ecommerce_store_shop_services_title'.$i,array(
            'label' => esc_html__('Title ','cosmetic-ecommerce-store').$i,
            'section'   => 'cosmetic_ecommerce_store_shop_services_section',
            'type'      => 'text'
        ));

        $wp_customize->add_setting('cosmetic_ecommerce_store_shop_services_text'.$i,array(
            'default'   => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('cosmetic_ecommerce_store_shop_services_text'.$i,array(
            'label' => esc_html__('Text ','cosmetic-ecommerce-store').$i,
            'section'   => 'cosmetic_ecommerce_store_shop_services_section',
            'type'      => 'text'
        ));
    // Pro Version
    $wp_customize->add_setting( 'pro_version_service_pro_option', array(
        'sanitize_callback' => 'Fashion_Fstore_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Cosmetic_Ecommerce_Store_Pro_Version ( $wp_customize,'pro_version_service_pro_option', array(
        'section'     => 'cosmetic_ecommerce_store_shop_services_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'cosmetic-ecommerce-store' ),
        'description' => esc_url( FASHION_ESTORE_LINK ),
        'priority'    => 100
    )));

    }

    // Shop Section
    $wp_customize->add_section('cosmetic_ecommerce_store_new_product',array(
        'title' => esc_html__('Featured Product','cosmetic-ecommerce-store'),
        'description' => esc_html__('Here you have to select product category which will display perticular new featured product in the home page.','cosmetic-ecommerce-store'),
        'priority'   => 60,
    ));

     $wp_customize->add_setting('cosmetic_ecommerce_store_new_product_show_setting', array(
        'default' => 1,
        'sanitize_callback' => 'fashion_estore_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'cosmetic_ecommerce_store_new_product_show_setting',array(
        'label'          => __( 'Show Hide Shop Services', 'cosmetic-ecommerce-store' ),
        'section'        => 'cosmetic_ecommerce_store_new_product',
        'settings'       => 'cosmetic_ecommerce_store_new_product_show_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('cosmetic_ecommerce_store_new_product_title',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('cosmetic_ecommerce_store_new_product_title',array(
        'label' => esc_html__('Title','cosmetic-ecommerce-store'),
        'section' => 'cosmetic_ecommerce_store_new_product',
        'setting' => 'cosmetic_ecommerce_store_new_product_title',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('cosmetic_ecommerce_store_new_product_number',array(
        'default' => '',
        'sanitize_callback' => 'absint'
    ));
    $wp_customize->add_control('cosmetic_ecommerce_store_new_product_number',array(
        'label' => esc_html__('No of Product','cosmetic-ecommerce-store'),
        'section' => 'cosmetic_ecommerce_store_new_product',
        'setting' => 'cosmetic_ecommerce_store_new_product_number',
        'type'  => 'number'
    ));

    $cosmetic_ecommerce_store_args = array(
       'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
    $categories = get_categories( $cosmetic_ecommerce_store_args );
    $cats = array();
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cats[$category->slug] = $category->name;
    }
    $wp_customize->add_setting('cosmetic_ecommerce_store_new_product_category',array(
        'sanitize_callback' => 'cosmetic_ecommerce_store_sanitize_select',
    ));
    $wp_customize->add_control('cosmetic_ecommerce_store_new_product_category',array(
        'type'    => 'select',
        'choices' => $cats,
        'label' => __('Select Product Category','cosmetic-ecommerce-store'),
        'section' => 'cosmetic_ecommerce_store_new_product',
    ));
    // Pro Version
    $wp_customize->add_setting( 'pro_version_product_pro_option', array(
        'sanitize_callback' => 'Fashion_Fstore_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Cosmetic_Ecommerce_Store_Pro_Version ( $wp_customize,'pro_version_product_pro_option', array(
        'section'     => 'cosmetic_ecommerce_store_new_product',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'cosmetic-ecommerce-store' ),
        'description' => esc_url( FASHION_ESTORE_LINK ),
        'priority'    => 100
    )));
    
}
add_action('customize_register', 'cosmetic_ecommerce_store_customize_register');

if ( ! function_exists( 'cosmetic_ecommerce_store_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function cosmetic_ecommerce_store_setup() {

        add_theme_support( 'responsive-embeds' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        add_image_size('cosmetic-ecommerce-store-featured-header-image', 2000, 660, true);

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'fashion_estore_custom_background_args', array(
            'default-color' => '',
            'default-image' => '',
        ) ) );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 50,
            'width'       => 50,
            'flex-width'  => true,
        ) );

        add_editor_style( array( '/editor-style.css' ) );

        add_theme_support( 'align-wide' );

        add_theme_support( 'wp-block-styles' );
    }
endif;
add_action( 'after_setup_theme', 'cosmetic_ecommerce_store_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cosmetic_ecommerce_store_widgets_init() {
        register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'cosmetic-ecommerce-store' ),
        'id'            => 'sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'cosmetic-ecommerce-store' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
}
add_action( 'widgets_init', 'cosmetic_ecommerce_store_widgets_init' );

function cosmetic_ecommerce_store_remove_customize_register() {
    global $wp_customize;
    $wp_customize->remove_section( 'fashion_estore_color_option' );
}
add_action( 'customize_register', 'cosmetic_ecommerce_store_remove_customize_register', 11 );

function cosmetic_ecommerce_store_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

if ( ! defined( 'FASHION_ESTORE_BUY_TEXT' ) ) {
    define( 'FASHION_ESTORE_BUY_TEXT', __( 'Buy Cosmetic Ecommerce Pro','cosmetic-ecommerce-store' ));
}

if ( ! defined( 'FASHION_ESTORE_LINK' ) ) {
    define( 'FASHION_ESTORE_LINK', esc_url( 'https://www.themagnifico.net/themes/ecommerce-store-wordpress-theme/', 'cosmetic-ecommerce-store') );
}

