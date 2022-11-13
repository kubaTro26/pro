<?php
/**
Plugin Name: SD Theme Functions WrapKit
Plugin URI: https://skat.tf/
Description: A plugin that adds custom functionality to Skat Design themes.
Version: 1.0
Author: Skat Design
Author URI: https://skat.tf/
*/

/**
 * Copyright (c) 2017 Skat Design. All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 * This is an add-on for WordPress
 * https://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * **********************************************************************
 */

if ( ! defined('ABSPATH') ) die( '-1' );

if ( ! class_exists('SdThemeFunctionsWrapKit' ) ) {
	 class SdThemeFunctionsWrapKit {
		 
		 public function __construct() {
			
			/* Plugin paths. */
			add_action( 'plugins_loaded', array( &$this, 'sd_tf_wrapkit_plugin_paths' ), 1 );
			/* Localization files. */
			add_action( 'plugins_loaded', array( &$this, 'sd_tf_wrapkit_localize' ), 1 );
			/* Functions files. */
			add_action( 'plugins_loaded', array( &$this, 'sd_tf_wrapkit_functions' ), 2 );
			add_action( 'init', array( &$this, 'sd_tf_wrapkit_vc_shortcodes' ), 4 );
			/* Admin files. */
			add_action( 'plugins_loaded', array( &$this, 'sd_tf_wrapkit_admin_functions' ), 3 );
			/* Enqueue scripts and styles. */
			add_action('admin_enqueue_scripts', array(&$this, 'sd_admin_enqueue'), '999');
		}
		
		function sd_tf_wrapkit_plugin_paths() {

			/* Set path to the plugin directory. */
			define( 'SD_TF_WRAPKIT_DIR', trailingslashit( plugin_dir_url( __FILE__ ) ) );

			/* Set path to the inc directory. */
			define( 'SD_TF_WRAPKIT_INC', SD_TF_WRAPKIT_DIR . trailingslashit( 'inc' ) );
			
			/* Set path to the css directory. */
			define( 'SD_TF_WRAPKIT_CSS', SD_TF_WRAPKIT_INC . trailingslashit( 'css' ) );
			
			/* Set path to the js directory. */
			define( 'SD_TF_WRAPKIT_JS', SD_TF_WRAPKIT_INC . trailingslashit( 'js' ) );
		}
		
		function sd_admin_enqueue() {
			
			// Register scripts and styles
			wp_register_script('sd-scripts', SD_TF_WRAPKIT_JS . 'scripts.js', array( 'jquery' ), true);
			
			// Enqueue scripts and styles
			wp_enqueue_script('sd-scripts');
			
			wp_register_style( 'sd-tf-styles', SD_TF_WRAPKIT_CSS . 'styles.css', array(), '1.0', 'all');
			wp_enqueue_style( 'sd-tf-styles');
		}
		
		public function sd_tf_wrapkit_functions() {
		
			foreach ( glob( plugin_dir_path( __FILE__ ) . "inc/*.php" ) as $files )
		    require_once $files;
			
			if ( ! class_exists( 'ReduxFramework' ) ) {
   				require_once( plugin_dir_path( __FILE__ ) . '/admin/admin-init.php' );
			}

			require_once( plugin_dir_path( __FILE__ ) . '/inc/widgets/newsletter.php' );
			
		}
		
		public function sd_tf_wrapkit_vc_shortcodes() {
			if ( defined( 'WPB_VC_VERSION' ) ) {
				foreach ( glob( plugin_dir_path( __FILE__ ) . "inc/vc-shortcodes/*.php" ) as $vc_files )
				require_once $vc_files;
			}
		}
		
		public function sd_tf_wrapkit_localize() {

			/* Load the translation of the plugin. */
			load_plugin_textdomain( 'sd-tf-wrapkit', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		}
	
		public function sd_tf_wrapkit_admin_functions() {

			if ( is_admin() ) {
				require_once( plugin_dir_path( __FILE__ ) . 'admin/admin-functions.php' );
			}
		}
		
	}
}

	$sd_theme_functions = new SdThemeFunctionsWrapKit();

// Change path to woocommerce templates 	

add_filter( 'wc_get_template_part', function( $template, $slug, $name ) { 
    if ( $name ) {
        $path = plugin_dir_path( __FILE__ ) . WC()->template_path() . "{$slug}-{$name}.php";    
    } else {
        $path = plugin_dir_path( __FILE__ ) . WC()->template_path() . "{$slug}.php";    
    }
    return file_exists( $path ) ? $path : $template;
}, 10, 3 );

add_filter( 'woocommerce_locate_template', function( $template, $template_name, $template_path ) { 
    $path = plugin_dir_path( __FILE__ ) . $template_path . $template_name;  
    return file_exists( $path ) ? $path : $template;
}, 10, 3 );

?>