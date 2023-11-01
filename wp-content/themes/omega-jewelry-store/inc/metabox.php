<?php
/**
* Sidebar Metabox.
*
* @package Omega Jewelry Store
*/

$omega_jewelry_store_post_sidebar_fields = array(
    'global-sidebar' => array(
        'id'        => 'post-global-sidebar',
        'value' => 'global-sidebar',
        'label' => esc_html__( 'Global sidebar', 'omega-jewelry-store' ),
    ),
    'right-sidebar' => array(
        'id'        => 'post-left-sidebar',
        'value' => 'right-sidebar',
        'label' => esc_html__( 'Right sidebar', 'omega-jewelry-store' ),
    ),
    'left-sidebar' => array(
        'id'        => 'post-right-sidebar',
        'value'     => 'left-sidebar',
        'label'     => esc_html__( 'Left sidebar', 'omega-jewelry-store' ),
    ),
    'no-sidebar' => array(
        'id'        => 'post-no-sidebar',
        'value'     => 'no-sidebar',
        'label'     => esc_html__( 'No sidebar', 'omega-jewelry-store' ),
    ),
);

function omega_jewelry_store_category_add_form_fields_callback() {
    $image_id = null; ?>
    <div id="category_custom_image"></div>
    <input type="hidden" id="category_custom_image_url" name="category_custom_image_url">
    <div style="margin-bottom: 20px;">
        <span><?php esc_html_e('Category Image','omega-jewelry-store'); ?></span>
        <a href="#" class="button custom-button-upload" id="custom-button-upload"><?php esc_html_e('Upload Image','omega-jewelry-store'); ?></a>
        <a href="#" class="button custom-button-remove" id="custom-button-remove" style="display: none"><?php esc_html_e('Remove Image','omega-jewelry-store'); ?></a>
    </div>
    <?php 
}
add_action( 'category_add_form_fields', 'omega_jewelry_store_category_add_form_fields_callback' );

function omega_jewelry_store_custom_create_term_callback($term_id) {
    // add term meta data
    add_term_meta(
        $term_id,
        'term_image',
        esc_url($_REQUEST['category_custom_image_url'])
    );
}
add_action( 'create_term', 'omega_jewelry_store_custom_create_term_callback' );

function omega_jewelry_store_category_edit_form_fields_callback($ttObj, $taxonomy) {
    $term_id = $ttObj->term_id;
    $image = '';
    $image = get_term_meta( $term_id, 'term_image', true ); ?>
    <tr class="form-field term-image-wrap">
        <th scope="row"><label for="image"><?php esc_html_e('Image','omega-jewelry-store'); ?></label></th>
        <td>
        <?php if ( $image ): ?>
            <span id="category_custom_image">
               <img src="<?php echo $image; ?>" style="width: 100%"/>
            </span>
            <input type="hidden" id="category_custom_image_url" name="category_custom_image_url">
            <span>
                <a href="#" class="button custom-button-upload" id="custom-button-upload" style="display: none"><?php esc_html_e('Upload Image','omega-jewelry-store'); ?></a>
                <a href="#" class="button custom-button-remove"><?php esc_html_e('Remove Image','omega-jewelry-store'); ?></a>                    
            </span>
        <?php else: ?>
            <span id="category_custom_image"></span>
            <input type="hidden" id="category_custom_image_url" name="category_custom_image_url">
            <span>
               <a href="#" class="button custom-button-upload" id="custom-button-upload"><?php esc_html_e('Upload Image','omega-jewelry-store'); ?></a>
               <a href="#" class="button custom-button-remove" style="display: none"><?php esc_html_e('Remove Image','omega-jewelry-store'); ?></a>
            </span>
            <?php endif; ?>
        </td>
    </tr>
    <?php
}
add_action ( 'category_edit_form_fields', 'omega_jewelry_store_category_edit_form_fields_callback', 10, 2 );

function omega_jewelry_store_edit_term_callback($term_id) {
    $image = '';
    $image = get_term_meta( $term_id, 'term_image' );
    if ( $image )
    update_term_meta( 
        $term_id, 
        'term_image', 
        esc_url( $_POST['category_custom_image_url']) );
    else
    add_term_meta( 
        $term_id, 
        'term_image', 
        esc_url( $_POST['category_custom_image_url']) );
}
add_action( 'edit_term', 'omega_jewelry_store_edit_term_callback' );