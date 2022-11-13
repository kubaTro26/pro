<?php
/**
 * Main Theme Functions
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

/*-----------------------------------------------------------------------------------*/
/* Define Theme Constants
/*-----------------------------------------------------------------------------------*/

define( 'WRAPKIT_FRAMEWORK', get_template_directory() . '/framework/' );
define( 'WRAPKIT_FRAMEWORK_INC', get_template_directory() . '/framework/inc/' );
define( 'WRAPKIT_FRAMEWORK_CSS', get_template_directory_uri() . '/framework/css/' );
define( 'WRAPKIT_FRAMEWORK_JS', get_template_directory_uri() . '/framework/js/' );

// Redux Theme Options

if ( ! isset( $redux_demo ) && file_exists( WRAPKIT_FRAMEWORK . 'admin/admin-options/admin-options.php' ) ) {
	require_once( WRAPKIT_FRAMEWORK . 'admin/admin-options/admin-options.php' );
}

add_action( 'redux/loaded', 'remove_demo' );

// Remove redux menu under the tools
if ( ! function_exists( 'wrapkit_remove_redux_menu' ) ) {
	function wrapkit_remove_redux_menu() {
		remove_submenu_page( 'tools.php', 'redux-about' );
	}
	add_action( 'admin_menu', 'wrapkit_remove_redux_menu', 12 );
}
if ( ! function_exists( 'wrapkit_remove_redux_demo_link' ) ) {
	function wrapkit_remove_redux_demo_link() {
		if ( class_exists('ReduxFrameworkPlugin') ) {
			remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
		}
		if ( class_exists('ReduxFrameworkPlugin') ) {
			remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
		}
	}
	add_action('init', 'wrapkit_remove_redux_demo_link');
}

if ( ! function_exists( 'wrapkit_global' ) ) {
	function wrapkit_global() {
		global $wrapkit_data;
		return $wrapkit_data;
	}
}

// Define content width
if ( ! isset( $content_width ) ) $content_width = 1170;

/* ------------------------------------------------------------------------ */
/* Localization
/* ------------------------------------------------------------------------ */

if ( ! function_exists( 'wrapkit_load_text_domain' ) ) {
	function wrapkit_load_text_domain() {
		load_theme_textdomain( 'wrapkit', get_template_directory() . '/languages' );
	}
	add_action( 'after_setup_theme', 'wrapkit_load_text_domain' );
}

/* ------------------------------------------------------------------------ */
/* Inlcudes
/* ------------------------------------------------------------------------ */

// Enqueue JavaScripts & CSS
require_once( WRAPKIT_FRAMEWORK_INC . 'enqueue.php');
	
// Theme Functions
require_once( WRAPKIT_FRAMEWORK_INC . 'theme-functions/sd-functions.php' );

// Include Widgets
require_once( WRAPKIT_FRAMEWORK_INC . 'widgets/widgets.php' );
	
// Visual Composer
if ( class_exists( 'Vc_Manager' ) ) {
	require_once( WRAPKIT_FRAMEWORK_INC . 'vc/functions.php' );
}
/* Include Meta Box Script */
require WRAPKIT_FRAMEWORK_INC . 'metabox/meta-box.php';
require WRAPKIT_FRAMEWORK_INC . 'metabox/the-meta-boxes.php';
require WRAPKIT_FRAMEWORK_INC . 'metabox/meta-box-show-hide/meta-box-show-hide.php';
require WRAPKIT_FRAMEWORK_INC . 'metabox/meta-box-conditional-logic/meta-box-conditional-logic.php';
require WRAPKIT_FRAMEWORK_INC . 'metabox/meta-box-group/meta-box-group.php';
require WRAPKIT_FRAMEWORK_INC . 'metabox/meta-box-tabs/meta-box-tabs.php';

/* TGMPA Automatic Plugin Activation */
require_once( WRAPKIT_FRAMEWORK_INC . 'tgmpa/tgmpa.php' );