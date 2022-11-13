<?php
/**
 * Demo Imported Settings
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

if ( ! function_exists( 'wbc_importer_description_text' ) ) {
	function wbc_importer_description_text( $description ) {
		$message  = '<p>'. esc_html__( 'Best if used on new WordPress install.', 'wrapkit' ) .'</p>';
		$message .= '<p>'. esc_html__( 'Images are for demo purpose only.', 'wrapkit' ) .'</p>';
		$message .= '<p>'. esc_html__( 'Please be patient. Importing the demo content may take a while.', 'wrapkit' ) .'</p>';
		return $message;
	}

	add_filter( 'wbc_importer_description', 'wbc_importer_description_text', 10 );
}

if ( ! function_exists( 'wbc_filter_title' ) ) {
			/**
			 * Filter for changing demo title in options panel so it's not folder name.
			 *
			 * @param [string] $title name of demo data folder
			 *
			 * @return [string] return title for demo name.
			 */
			function wbc_filter_title( $title ) {
				return trim( ucfirst( str_replace( "-", " ", $title ) ) );
			}
			add_filter( 'wbc_importer_directory_title', 'wbc_filter_title', 10 );
		}

if ( ! function_exists( 'wrapkit_set_home_menu' ) ) {
	function wrapkit_set_home_menu( $demo_active_import , $demo_directory_path ) {

		reset( $demo_active_import );
		$current_key = key( $demo_active_import );
		
		/************************************************************************
		* Import slider(s) for the current demo being imported
		*************************************************************************/
		if ( class_exists( 'RevSlider' ) ) {

			$wbc_sliders_array = array(
				'accounting'     => 'homeslider.zip',
				'agency'         => 'homeslider.zip',
				'charity'        => 'homeslider.zip',
				'fitness'        => 'homeslider.zip',
				'health-medical' => 'homeslider.zip',
				'industrial'     => 'homeslider.zip',
				'restaurant'     => 'homeslider.zip',
				'seo-marketing'  => 'homeslider.zip',
			);
			if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_sliders_array ) ) {
				$wbc_slider_import = $wbc_sliders_array[$demo_active_import[$current_key]['directory']];
				if ( file_exists( $demo_directory_path.$wbc_slider_import ) ) {
					$slider = new RevSlider();
					$slider->importSliderFromPost( true, true, $demo_directory_path.$wbc_slider_import );
				}
			}
		}

		/************************************************************************
		* Setting Menus
		*************************************************************************/

		$wbc_menu_array = array( 'main-demo', 'accounting', 'agency', 'app-landing', 'apponintment-landing', 'business', 'charity', 'coming-soon', 'creative', 'cryptocurrency', 'fitness', 'form-landing', 'freelancer-1', 'freelancer-2', 'health-medical', 'health-medical-landing', 'industrial', 'one-page', 'personal-landing', 'photography-dark', 'photography-light', 'restaurant', 'seo-marketing', 'software-application' );

		if ( isset( $demo_active_import[$current_key]['directory'] ) && ! empty( $demo_active_import[$current_key]['directory'] ) && in_array( $demo_active_import[$current_key]['directory'], $wbc_menu_array ) ) {
			
			$main_menu      = get_term_by( 'name', 'Main Menu', 'nav_menu' );
			$secondary_menu = get_term_by( 'name', 'Secondary Header Menu (if header #3 is selected)', 'nav_menu' );
			$modal_menu     = get_term_by( 'name', 'Modal Menu (if header #14 is selected)', 'nav_menu' );
			$footer_menu    = get_term_by( 'name', 'Footer Menu', 'nav_menu' );

			if ( isset( $main_menu->term_id ) ) {
				set_theme_mod( 'nav_menu_locations', array(
						'main-header-menu'      => $main_menu->term_id,
						'secondary-header-menu' => $secondary_menu->term_id,
						'modal-menu'            => $modal_menu->term_id,
						'footer-menu'           => $footer_menu->term_id,
					)
				);
			}

		}
		
		/************************************************************************
		* Set HomePage
		*************************************************************************/

		// array of demos/homepages to check/select from
		$wbc_home_pages = array(
			'main-demo'              => 'Home',
			'accounting'             => 'Home',
			'agency'                 => 'Home',
			'app-landing'            => 'Home',
			'apponintment-landing'   => 'Home',
			'business'               => 'Home',
			'charity'                => 'Home',
			'coming-soon'            => 'Home',
			'creative'               => 'Home',
			'cryptocurrency'         => 'Home',
			'fitness'                => 'Home',
			'form-landing'           => 'Home',
			'freelancer-1'           => 'Home',
			'freelancer-2'           => 'Home',
			'health-medical'         => 'Home',
			'health-medical-landing' => 'Home',
			'industrial'             => 'Home',
			'one-page'               => 'Home',
			'personal-landing'       => 'Home',
			'photography-dark'       => 'Home',
			'photography-light'      => 'Home',
			'restaurant'             => 'Home',
			'seo-marketing'          => 'Home',
			'software-application'   => 'Home',
		);

		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_home_pages ) ) {
			$page = get_page_by_title( $wbc_home_pages[$demo_active_import[$current_key]['directory']] );
			if ( isset( $page->ID ) ) {
				update_option( 'page_on_front', $page->ID );
				update_option( 'show_on_front', 'page' );
			}
		}

	}
	add_action( 'wbc_importer_after_content_import', 'wrapkit_set_home_menu', 10, 2 );
}