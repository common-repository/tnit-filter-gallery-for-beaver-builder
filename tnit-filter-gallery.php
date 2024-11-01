<?php
/**
 * Plugin Name: TNiT Filter Gallery
 * Plugin URI: http://www.topnotchinv.com
 * Description: A Custom post based filterable gallery plugin.
 * Version: 1.0
 * Author: Topnotch Inv
 * Author URI: http://www.topnotchinv.com
 */
 
//Exit if directly accessed...
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

define( 'TNIT_FILTER_GALLERY_DIR', plugin_dir_path( __FILE__ ) );
define( 'TNIT_FILTER_GALLERY_URL', plugins_url( '/', __FILE__ ) );

//Including required files
require_once TNIT_FILTER_GALLERY_DIR . '/includes/tnit_gallery_post.php';
require_once TNIT_FILTER_GALLERY_DIR . '/functions.php';

//Custom modules
function tnit_filter_gallery_module() {
	if ( class_exists( 'FLBuilder' ) ) {
		require_once 'filter-gallery/filter-gallery.php';
	}
}
add_action( 'init', 'tnit_filter_gallery_module' );

//Custom fields
function tnit_gallery_custom_fields( $name, $value, $field ) {
    echo '<input type="text" class="text text-full" name="' . $name . '" value="' . $value . '" />';
}
add_action( 'fl_builder_control_my-custom-field', 'tnit_gallery_custom_fields', 1, 3 );

//Custom field styles and scripts
function tnit_gallery_assests() {
    if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
        wp_enqueue_style( 'my-custom-fields', TNIT_FILTER_GALLERY_URL . 'assets/css/fields.css', array(), '' );
        wp_enqueue_script( 'my-custom-fields', TNIT_FILTER_GALLERY_URL . 'assets/js/fields.js', array(), '', true );
    }
}
add_action( 'wp_enqueue_scripts', 'tnit_gallery_assests' );
    
?>