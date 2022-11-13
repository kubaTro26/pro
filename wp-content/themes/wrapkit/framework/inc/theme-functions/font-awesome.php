<?php
/**
 * Font Awesome Icons
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

if ( ! function_exists( 'wrapkit_font_awesome_icons' ) ) { 
	function wrapkit_font_awesome_icons() {

		$sd_fa_pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"\\\\(.+)";\s+}/';
		$sd_fa_content = wp_remote_get( get_template_directory_uri() . '/framework/css/font-awesome.css' );
		$sd_fa_content = wp_remote_retrieve_body( $sd_fa_content );

		preg_match_all( $sd_fa_pattern, $sd_fa_content, $sd_fa_matches, PREG_SET_ORDER );

		foreach( $sd_fa_matches as $sd_fa_match ) {
			$sd_fa_icons[$sd_fa_match[1]] = $sd_fa_match[1];
		}

		ksort( $sd_fa_icons );  

		return apply_filters( 'wrapkit_font_awesome_icons', $sd_fa_icons );
	}
}