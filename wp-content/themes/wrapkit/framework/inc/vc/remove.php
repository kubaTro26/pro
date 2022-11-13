<?php
/**
 * Remove Parameters and Elements from Visual Composer
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

// Remove VC Elements

if ( !function_exists( 'wrapkit_vc_remove_elements' ) ) {
	function wrapkit_vc_remove_elements() {
		vc_remove_element( 'vc_wp_tagcloud' );
		vc_remove_element( 'vc_wp_archives' );
		vc_remove_element( 'vc_wp_calendar' );
		vc_remove_element( 'vc_wp_pages' );
		vc_remove_element( 'vc_wp_links' );
		vc_remove_element( 'vc_wp_posts' );
		vc_remove_element( 'vc_gallery' );
		vc_remove_element( 'vc_wp_rss' );
		vc_remove_element( 'vc_wp_text' );
		vc_remove_element( 'vc_wp_meta' );
		vc_remove_element( 'vc_wp_recentcomments' );
		vc_remove_element( 'vc_wp_categories' );
		vc_remove_element( 'vc_button' );
		vc_remove_element( 'vc_cta_button2' );
		vc_remove_element( 'vc_gmaps' );
		vc_remove_element( 'vc_posts_grid' );
		vc_remove_element( 'vc_carousel' );
		vc_remove_element( 'vc_widget_sidebar' );
	}
	add_action( 'init', 'wrapkit_vc_remove_elements' );	
}