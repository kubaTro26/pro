<?php

/**
 * Visual Composer Functions
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
// Change VC templates dir

$dir = WRAPKIT_FRAMEWORK_INC . 'vc/vc-templates/';
vc_set_shortcodes_templates_dir( $dir );

// Set Visual Composer to run in Theme Mode
if ( ! function_exists( 'wrapkit_vc_as_theme' ) ) {
function wrapkit_vc_as_theme() {
		vc_set_as_theme( true );
	}
	add_action( 'vc_before_init', 'wrapkit_vc_as_theme' );
}
// Enable Visual Composer page builder for theme defined post types
$sd_vb_post_types = array(
	'page',
	'sd-templates',
	'portfolio',
);
vc_set_default_editor_post_types( $sd_vb_post_types );

// Disable frontend mode (still in beta)

//vc_disable_frontend();

// Remove params and elements
require_once( WRAPKIT_FRAMEWORK_INC . 'vc/remove.php' );
	
// Update params
require_once( WRAPKIT_FRAMEWORK_INC . 'vc/update.php' );

if ( class_exists( 'SdThemeFunctions' ) ) {
}
// Remove default layout templates
if ( ! function_exists( 'wrapkit_remove_default_layout_templates' ) ) {
	function wrapkit_remove_default_layout_templates( $data ) {
    	return array(); // This will remove all default templates
	}
}
add_filter( 'vc_load_default_templates', 'wrapkit_remove_default_layout_templates' );

// Include SD layout templates
require_once( WRAPKIT_FRAMEWORK_INC . 'vc/layout-templates.php' );

// Run code in admin only
if ( ! is_admin() ) {
	return;
	} else {
		// Remove VC Teaser metabox
		if ( ! function_exists( 'wrapkit_remove_vc_boxes' ) ) {
			function wrapkit_remove_vc_boxes() {
				$post_types = get_post_types( '', 'names' ); 
				foreach ( $post_types as $post_type ) {
					remove_meta_box( 'vc_teaser',  $post_type, 'side' );
				}
			} 
		}
	add_action( 'do_meta_boxes', 'wrapkit_remove_vc_boxes' );
}