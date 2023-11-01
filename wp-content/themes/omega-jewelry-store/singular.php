<?php
/**
 * The template for displaying single posts and pages.
 * @package Omega Jewelry Store
 * @since 1.0.0
 */
get_header();

    $omega_jewelry_store_default = omega_jewelry_store_get_default_theme_options();
    $global_sidebar_layout = esc_html( get_theme_mod( 'global_sidebar_layout',$omega_jewelry_store_default['global_sidebar_layout'] ) );
    $omega_jewelry_store_post_sidebar = esc_html( get_post_meta( $post->ID, 'omega_jewelry_store_post_sidebar_option', true ) );
    $sidebar_column_class = 'column-order-1';

    if (!empty($omega_jewelry_store_post_sidebar)) {
        $global_sidebar_layout = $omega_jewelry_store_post_sidebar;
    }

    if ($global_sidebar_layout == 'left-sidebar') {
        $sidebar_column_class = 'column-order-2';
    } ?>

    <div class="singular-main-block">
        <div class="wrapper">
            <div class="column-row">

                <div id="primary" class="content-area <?php echo $sidebar_column_class; ?>">
                    <main id="site-content" class="" role="main">

                        <?php
                            omega_jewelry_store_breadcrumb();

                        if( have_posts() ): ?>

                            <div class="article-wraper">

                                <?php while (have_posts()) :
                                    the_post();

                                    get_template_part('template-parts/content', 'single');

                                    if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && !post_password_required() ) { ?>

                                        <div class="comments-wrapper">
                                            <?php comments_template(); ?>
                                        </div>

                                    <?php
                                    }

                                endwhile; ?>

                            </div>

                        <?php
                        else :

                            get_template_part('template-parts/content', 'none');

                        endif;

                        /**
                         * Navigation
                         * 
                         * @hooked omega_jewelry_store_related_posts - 20  
                         * @hooked omega_jewelry_store_single_post_navigation - 30  
                        */

                        do_action('omega_jewelry_store_navigation_action'); ?>

                    </main>
                </div>
                <?php get_sidebar();?>
            </div>
        </div>
    </div>

<?php
get_footer();
