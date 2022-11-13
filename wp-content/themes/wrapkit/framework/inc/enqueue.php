<?php
/**
 * Theme Scripts and Styles
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

// Load Google Fonts

if ( ! function_exists( 'wrapkit_theme_fonts' ) ) {
	function wrapkit_theme_fonts() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = '';
	
		/* translators: If there are characters in your language that are not supported by this font, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== esc_html_x( 'on', 'Montserrat font: on or off', 'wrapkit' ) ) {
			$fonts[] = 'Montserrat:300,400,500,700';
		}
	
		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => implode( '%7C', $fonts ),
				'subset' => $subsets ,
			), 'https://fonts.googleapis.com/css' );
		}
	
		return $fonts_url;
	}
}

// Enqueue scripts

if ( ! function_exists( 'wrapkit_jquery_scripts' ) ) {
	function wrapkit_jquery_scripts() {
		
		global $wrapkit_data;
		// Register scripts
		wp_enqueue_script( 'sd-custom', WRAPKIT_FRAMEWORK_JS . 'custom.js', array( 'jquery', 'jquery-effects-core', 'aos', 'perfect-scrollbar' ), '', true );
		wp_enqueue_script( 'popper', WRAPKIT_FRAMEWORK_JS . 'popper.min.js', array(), '', true );
		wp_enqueue_script( 'bootstrap', WRAPKIT_FRAMEWORK_JS . 'bootstrap.min.js', array(), '', true );
		wp_enqueue_script( 'aos', WRAPKIT_FRAMEWORK_JS . 'aos.js', array(), '', true );
		wp_enqueue_script( 'perfect-scrollbar', WRAPKIT_FRAMEWORK_JS . 'perfect-scrollbar.jquery.min.js', array(), '', true );
		wp_enqueue_script( 'prism', WRAPKIT_FRAMEWORK_JS . 'prism.js', array(), '', true );
		wp_register_script( 'sd-owl-carousel', WRAPKIT_FRAMEWORK_JS . 'owl.carousel.min.js', array(), '', true );
		wp_register_script( 'isotope', WRAPKIT_FRAMEWORK_JS . 'isotope.pkgd.min.js', array(), '', true );
		wp_register_script( 'sd-portfolio', WRAPKIT_FRAMEWORK_JS . 'portfolio.js', array(), '', true );
		wp_register_script( 'sd-magnific-popup', WRAPKIT_FRAMEWORK_JS . 'jquery.magnific-popup.min.js', array(), '', true );
				
		// Enqueue scripts
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		if ( is_page_template( 'blog.php' ) ) {
			
			global $post;
			
			$sd_blog_layout = rwmb_meta( 'sd_blog_layout', $post->ID );
			
			if ( $sd_blog_layout == 'masonry' ) {
				wp_enqueue_script( 'sd-salvatore' );
			}
		}

		// Load the html5 shiv and respond.
		wp_enqueue_script( 'sd-html5shiv', WRAPKIT_FRAMEWORK_JS . 'html5shiv.js', array(), '3.7.3' );
		wp_script_add_data( 'sd-html5shiv', 'conditional', 'lt IE 9' );
		wp_enqueue_script( 'sd-respond', WRAPKIT_FRAMEWORK_JS . 'respond.min.js', array(), '1.4.2' );
		wp_script_add_data( 'sd-respond', 'conditional', 'lt IE 9' );

		
		wp_localize_script( 'sd-custom', 'sd_add_again_var', array(
				'text' => esc_html__( 'Add Again?', 'wrapkit' )
			)
		);
	}

	add_action( 'wp_enqueue_scripts', 'wrapkit_jquery_scripts' );
}

// Enqueue styles

if ( ! function_exists( 'wrapkit_css_styles' ) ) {
	function wrapkit_css_styles() {
		
		global $wrapkit_data;
		
		// Register stylesheets
		wp_enqueue_style( 'bootstrap', WRAPKIT_FRAMEWORK_CSS . 'bootstrap.min.css', '2', 'style' );
		wp_enqueue_style( 'aos', WRAPKIT_FRAMEWORK_CSS . 'aos.css', 'style' );
		wp_enqueue_style( 'prism', WRAPKIT_FRAMEWORK_CSS . 'prism.css', 'style' );
		wp_enqueue_style( 'perfect-scrollbar', WRAPKIT_FRAMEWORK_CSS . 'perfect-scrollbar.min.css', 'style' );
		wp_enqueue_style( 'animate', WRAPKIT_FRAMEWORK_CSS . 'animate.css', 'style' );
		wp_enqueue_style( 'font-awesome', WRAPKIT_FRAMEWORK_CSS . 'font-awesome/font-awesome.min.css', 'style' );
		wp_enqueue_style( 'iconmind', WRAPKIT_FRAMEWORK_CSS . 'iconmind/iconmind.css', 'style' );
		wp_enqueue_style( 'themify-icons', WRAPKIT_FRAMEWORK_CSS . 'themify-icons/themify-icons.css', 'style' );
		wp_enqueue_style( 'simple-line-icons', WRAPKIT_FRAMEWORK_CSS . 'simple-line-icons/simple-line-icons.css', 'style' );
		wp_enqueue_style( 'prettyphoto', WRAPKIT_FRAMEWORK_CSS . 'prettyPhoto.css', 'style' );

		if ( is_multisite() ) {
			wp_register_style( 'sd-custom-css-' . get_current_blog_id() , get_template_directory_uri() . '/framework/admin/admin-options/custom-styles-' . get_current_blog_id() . '.css', 'style' );
		} else {
			wp_register_style( 'sd-custom-css', get_template_directory_uri() . '/framework/admin/admin-options/custom-styles.css', 'style' );
		}

		// Enqueue stylesheets
		wp_enqueue_style( 'sd_theme_fonts', wrapkit_theme_fonts(), array(), null );
		wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), array(), '3', 'all' ); // Main Stylesheet
		if ( is_multisite() ) {
			wp_enqueue_style( 'sd-custom-css-' . get_current_blog_id(), '4', 'all' );
		} else {
			wp_enqueue_style( 'sd-custom-css', '4', 'all' );
		}
		
		$sd_header_style = isset( $wrapkit_data['sd_header_style'] ) ? $wrapkit_data['sd_header_style'] : NULL;
		$sd_footer_style = isset( $wrapkit_data['sd_footer_style'] ) ? $wrapkit_data['sd_footer_style'] : NULL;

	}
	add_action( 'wp_enqueue_scripts', 'wrapkit_css_styles', 15 );
}
?>