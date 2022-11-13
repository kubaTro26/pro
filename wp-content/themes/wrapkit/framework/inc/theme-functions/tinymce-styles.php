<?php
/**
 * Custom TinyMce Styles
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

if ( ! class_exists( 'SdCustomTinyMceStyles' ) ) {
	class SdCustomTinyMceStyles {

		public function __construct() {
			add_filter( 'mce_buttons', array( &$this, 'add_dropdown' ) );
			add_filter( 'tiny_mce_before_init', array( &$this, 'add_items' ) );
		}

		public function add_dropdown( $buttons ){
			array_unshift( $buttons, 'styleselect' );
			return $buttons;
		}
 
		public function add_items( $init_array ){
			$styles = array();
		
			$styles[] = array(
				"title"   => "SD Light Text",
				"classes" => "sd-light",
				"inline"  => "span",
				'wrapper' => true,
			);

			$styles[] = array(
				"title"   => "SD Border Top",
				"classes" => "sd-border-top",
				"inline"  => "span",
				'wrapper' => true,
			);

			$styles[] = array(
				"title"   => "SD Border Bottom",
				"classes" => "sd-border-bottom",
				"inline"  => "span",
				'wrapper' => true,
			);
			
			$styles[] = array(
				"title"    => "SD Styled List",
				"classes"  => "sd-list-style",
				"selector" => "ul",
				"wrapper"  => true,
			);
		
			$styles[] = array(
				"title"   => "SD Subtitle",
				"classes" => "sd-subtitle",
				"inline"  => "span",
				"wrapper" => true,
			);
			
			$styles[] = array(
				"title"	  => "SD Colored",
				"classes" => "sd-colored",
				"inline"  => 'span',
				"wrapper" => true,
			);
			
			$styles[] = array(
				"title"	  => "SD Img Float Left",
				"classes" => "pull-left",
				"inline"  => 'img',
				"wrapper" => true,
			);

			$styles[] = array(
				"title"	  => "SD Img Float Right",
				"classes" => "pull-right",
				"selector" => "img",
				"wrapper" => true,
			);

			$styles[] = array(
				"title"	  => "SD Small Text",
				"classes" => "sd-small-text",
				"inline"  => "span",
				"wrapper" => true,
			);
			
			$styles[] = array(
				"title"	  => "SD Large Text",
				"classes" => "sd-large-text",
				"inline"  => "span",
				"wrapper" => true,
			);
			
			$styles[] = array(
				"title"	  => "SD No Margin Paragraph",
				"classes" => "sd-margin-none",
				"selector" => "p",
				"wrapper" => true,
			);
						
			$styles[] = array(
				"title"	  => "SD Clear Floats",
				"classes" => "sd-clear",
				"selector" => "p, h2, h3, h4, h5, h6, div, img",
				"wrapper" => true,
			);
						
			$styles[] = array(
				"title"	  => "SD Styled Title",
				"classes" => "sd-styled-title",
				"selector" => "h2, h3, h4, h5, h6",
				"wrapper" => true,
			);
			$styles[] = array(
				"title"	  => "SD Margin Bottom",
				"classes" => "sd-margin-bottom",
				"selector" => "p, h2, h3, h4, h5, h6, div, img, span, a",
				"wrapper" => true,
			);
			$styles[] = array(
				"title"	  => "SD Styled Title Center",
				"classes" => "sd-styled-title-centered",
				"selector" => "h2, h3, h4, h5, h6",
				"wrapper" => true,
			);
			$styles[] = array(
				"title"	  => "SD Text Background",
				"classes" => "sd-text-background",
				"selector" => "p, h2, h3, h4, h5, h6, div, img, span, a",
				"wrapper" => true,
			);
			$styles[] = array(
				"title"	  => "SD Text Background Dark",
				"classes" => "sd-text-background-dark",
				"selector" => "p, h2, h3, h4, h5, h6, div, img, span, a",
				"wrapper" => true,
			);
			$styles[] = array(
				"title"	  => "SD Text Background White",
				"classes" => "sd-text-bg-white",
				"selector" => "p, h2, h3, h4, h5, h6, div, img, span, a",
				"wrapper" => true,
			);
			$styles[] = array(
				"title"	  => "SD Underline",
				"classes" => "sd-underline",
				"selector" => "p, h2, h3, h4, h5, h6, div, img, span, a",
				"wrapper" => true,
			);
			$init_array['style_formats'] = json_encode( $styles );
		
			return $init_array;
		}
	}	

	new SdCustomTinyMceStyles();
}
// add font size to the editors
if ( ! function_exists( 'sd_editor_fontsize' ) ) {
	function sd_editor_fontsize( $buttons ) {
		array_shift( $buttons );
		array_unshift( $buttons, 'fontsizeselect');
		return $buttons;
	}    
	add_filter('mce_buttons_2', 'sd_editor_fontsize');
}
// change font size from pt to px
if ( ! function_exists( 'sd_tiny_mce_px_size' ) ) {
	function sd_tiny_mce_px_size( $initArray ){
		$initArray['fontsize_formats'] = "10px 11px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 27px 28px 29px 30px 32px";
		return $initArray;
	}        
	add_filter('tiny_mce_before_init', 'sd_tiny_mce_px_size');
}