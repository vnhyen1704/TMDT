<?php
/**
 * Displays top navigation
 *
 * @package Fashion Estore
 */

$fashion_estore_sticky_header = get_theme_mod('fashion_estore_sticky_header');
    $data_sticky = "false";
    if ($fashion_estore_sticky_header) {
        $data_sticky = "true";
    }
?>

<div class="navigation_header" data-sticky="<?php echo esc_attr($data_sticky); ?>">
    <div class="container">
        <div class="row">  
            <div class="col-lg-3 col-md-4 menu_cat_box align-self-center">
                <div class="menu_cat">
                    <i class="fas fa-align-left"></i><span><?php esc_html_e('Categories','fashion-estore'); ?></span>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 align-self-center">
                <div class="toggle-nav mobile-menu">
                    <button onclick="fashion_estore_openNav()"><i class="fas fa-th"></i></button>
                </div>
                <div id="mySidenav" class="nav sidenav">
                    <nav id="site-navigation" class="main-navigation navbar navbar-expand-xl" aria-label="<?php esc_attr_e( 'Top Menu', 'fashion-estore' ); ?>"><?php {
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'menu_class'     => 'menu', 
                                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'fallback_cb' => 'wp_page_menu',
                            )
                        );
                    } ?>
                    </nav>
                    <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="fashion_estore_closeNav()"><i class="fas fa-times"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>