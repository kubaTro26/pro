<?php
/**
 * Aos Animation VC Shortcode
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

global $wrapkit_data;

if ( ! function_exists( 'sd_aos_animation' ) ) {
	function sd_aos_animation( $atts, $content = null ) {
		$sd = shortcode_atts( array(
			'animation' => '',
		), $atts );
		
		$animation = $sd['animation'];

		ob_start();
		?>		
			
			<div data-aos="<?php echo esc_attr( $animation ); ?>" data-aos-duration="1200" data-aos-once="true">
				<?php echo do_shortcode( $content ); ?>
			</div>

		<?php return ob_get_clean();	
	}
	add_shortcode( 'sd_aos_animation','sd_aos_animation' );
}

// Register shortcode to VC

add_action( 'init', 'sd_aos_animation_vcmap' );

if ( ! function_exists( 'sd_aos_animation_vcmap' ) ) {
	function sd_aos_animation_vcmap() {
		
		vc_map( array(
			'name'            => esc_html__( 'AOS Animation', 'wrapkit' ),
			'description'     => esc_html__( 'AOS Animation', 'wrapkit' ),
			'base'            => "sd_aos_animation",
			'class'           => "sd_aos_animation",
			'category'        => esc_html__( 'WrapKit', 'wrapkit' ),
			'content_element' => true,
			'as_parent'       => array( 'except' => 'sd_aos_animation'),
			'controls'        => 'full',
			'js_view'         => 'VcColumnView',
			'icon'              => plugin_dir_url( __DIR__ ) . 'images/vc-icons/animations-icon-min.png',
			'params'            => array(
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Animation', 'wrapkit' ),
					'param_name'  => 'animation',
					'save_always' => true,
					'admin_label' => true,
					'value'       => 
						array( 
							esc_html__( 'Fade', 'wrapkit' )            => 'fade',
							esc_html__( 'Fade Up', 'wrapkit' )         => 'fade-up',
							esc_html__( 'Fade Down', 'wrapkit' )       => 'fade-down',
							esc_html__( 'Fade Right', 'wrapkit' )      => 'fade-right',
							esc_html__( 'Fade Left', 'wrapkit' )       => 'fade-left',
							esc_html__( 'Fade Up Right', 'wrapkit' )   => 'fade-up-right',
							esc_html__( 'Fade Up Left', 'wrapkit' )    => 'fade-up-left',
							esc_html__( 'Fade Down Left', 'wrapkit' )  => 'fade-down-left',
							esc_html__( 'Fade Down Right', 'wrapkit' ) => 'fade-down-right',
							esc_html__( 'Flip Up', 'wrapkit' )         => 'flip-up',
							esc_html__( 'Flip Down', 'wrapkit' )       => 'flip-down',
							esc_html__( 'Flip Right', 'wrapkit' )      => 'flip-right',
							esc_html__( 'Flip Left', 'wrapkit' )       => 'flip-left',
							esc_html__( 'Slide Up', 'wrapkit' )        => 'slide-up',
							esc_html__( 'Slide Down', 'wrapkit' )      => 'slide-down',
							esc_html__( 'Slide Left', 'wrapkit' )      => 'slide-left',
							esc_html__( 'Slide Riht', 'wrapkit' )      => 'slide-right',
							esc_html__( 'Zoom In', 'wrapkit' )         => 'zoom-in',
							esc_html__( 'Zoom In Up', 'wrapkit' )      => 'zoom-in-up',
							esc_html__( 'Zoom In Down', 'wrapkit' )    => 'zoom-in-down',
							esc_html__( 'Zoom In Left', 'wrapkit' )    => 'zoom-in-left',
							esc_html__( 'Zoom In Right', 'wrapkit' )   => 'zoom-in-right',
							esc_html__( 'Zoom Out', 'wrapkit' )        => 'zoom-out',
							esc_html__( 'Zoom Out Up', 'wrapkit' )     => 'zoom-out-up',
							esc_html__( 'Zoom Out Down', 'wrapkit' )   => 'zoom-out-down',
							esc_html__( 'Zoom Out Left', 'wrapkit' )   => 'zoom-out-left',
							esc_html__( 'Zoom Out Right', 'wrapkit' )  => 'zoom-out-right',
						),
				),
			),
		));
	}
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_sd_aos_animation extends WPBakeryShortCodesContainer {
	}
}