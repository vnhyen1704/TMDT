<?php
/**
 * Added Omega Page. */

/**
 * Add a new page under Appearance
 */
function omega_jewelry_store_menu()
{
	add_theme_page(__('Omega Options', 'omega-jewelry-store'), __('Omega Options', 'omega-jewelry-store'), 'edit_theme_options', 'omega-jewelry-store-theme', 'omega_jewelry_store_page');
}
add_action('admin_menu', 'omega_jewelry_store_menu');

/**
 * Enqueue styles for the help page.
 */
function omega_jewelry_store_admin_scripts($hook)
{
	wp_enqueue_style('omega-jewelry-store-admin-style', get_template_directory_uri() . '/inc/get-started/get-started.css', array(), '');
}
add_action('admin_enqueue_scripts', 'omega_jewelry_store_admin_scripts');

/**
 * Add the theme page
 */
function omega_jewelry_store_page(){
$omega_jewelry_store_user = wp_get_current_user();
$omega_jewelry_store_theme = wp_get_theme();
?>
<div class="das-wrap">
  <div class="omega-jewelry-store-panel header">
    <div class="omega-jewelry-store-logo">
      <span></span>
      <h2><?php echo esc_html( $omega_jewelry_store_theme ); ?></h2>
    </div>
    <p>
      <?php
            $omega_jewelry_store_theme = wp_get_theme();
            echo wp_kses_post( apply_filters( 'omega_theme_description', esc_html( $omega_jewelry_store_theme->get( 'Description' ) ) ) );
          ?>
    </p>
    <a class="btn btn-primary" href="<?php echo esc_url(admin_url('/customize.php?'));
?>"><?php esc_html_e('Edit With Customizer - Click Here', 'omega-jewelry-store'); ?></a>
  </div>

  <div class="das-wrap-inner">
    <div class="das-col das-col-7">
      <div class="omega-jewelry-store-panel">
        <div class="omega-jewelry-store-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('If you are facing any issue with our theme, submit a support ticket here.', 'omega-jewelry-store'); ?></h3>
          </div>
          <a href="<?php echo esc_url( OMEGA_JEWELRY_STORE_SUPPORT_FREE ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Lite Theme Support.', 'omega-jewelry-store'); ?></a>
        </div>
      </div>
      <div class="omega-jewelry-store-panel">
        <div class="omega-jewelry-store-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Please write a review if you appreciate the theme.', 'omega-jewelry-store'); ?></h3>
          </div>
          <a href="<?php echo esc_url( OMEGA_JEWELRY_STORE_REVIEW_FREE ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Rank this topic.', 'omega-jewelry-store'); ?></a>
        </div>
      </div>
       <div class="omega-jewelry-store-panel">
        <div class="omega-jewelry-store-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Follow our pro theme documentation to set up our premium theme as seen in the screenshot.', 'omega-jewelry-store'); ?></h3>
          </div>
          <a href="<?php echo esc_url( OMEGA_JEWELRY_STORE_DOCS_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Pro Documentation.', 'omega-jewelry-store'); ?></a>
        </div>
      </div>
    </div>
    <div class="das-col das-col-3">
      <div class="upgrade-div">
        <p>
          <strong>
            <?php esc_html_e('Premium Features Include:', 'omega-jewelry-store'); ?>
          </strong>
          </h4>
        <ul>
          <li>
          <?php esc_html_e('One Click Demo Content Importer', 'omega-jewelry-store'); ?>
          </li>
          <li>
          <?php esc_html_e('Woocommerce Plugin Compatibility', 'omega-jewelry-store'); ?>
          </li>
          <li>
          <?php esc_html_e('Multiple Section for the templates', 'omega-jewelry-store'); ?>            
          </li>
          <li>
          <?php esc_html_e('For a better user experience, make the top of your menu sticky.', 'omega-jewelry-store'); ?>  
          </li>
        </ul>
        <div class="text-center">
          <a href="<?php echo esc_url( OMEGA_JEWELRY_STORE_BUY_NOW ); ?>" target="_blank"
            class="btn btn-success"><?php esc_html_e('Upgrade Pro $40', 'omega-jewelry-store'); ?></a>
        </div>
      </div>
      <div class="omega-jewelry-store-panel">
        <div class="omega-jewelry-store-panel-content">
          <div class="theme-title">
            <h3><?php esc_html_e('Kindly view the premium themes live demo.', 'omega-jewelry-store'); ?></h3>
          </div>
          <a class="btn btn-primary demo" href="<?php echo esc_url( OMEGA_JEWELRY_STORE_DEMO_PRO ); ?>" target="_blank"
            class="btn btn-secondary"><?php esc_html_e('Live Demo.', 'omega-jewelry-store'); ?></a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}