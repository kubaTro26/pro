<?php
/**
 * Register Theme Sidebars
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

// Register sidebars
if ( ! function_exists( 'wrapkit_register_sidebars' ) ) {
 	function wrapkit_register_sidebars() {
		
		// main sidebar
		
		register_sidebar( array(
			'name'          => esc_html__( 'Main Sidebar', 'wrapkit' ),
			'id'            => 'main-sidebar',
			'description'   => esc_html__( 'Main sidebar of the site.', 'wrapkit' ),
			'before_widget' => '<div id="%1$s" class="sd-sidebar-widget sd-sidebar-widgets clearfix %2$s m-b-40">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="sd-sidebar-widget-title">',
			'after_title'  => '</h5>',
			) 
		);
		
		$sd_footer_style = isset( $wrapkit_data['sd_footer_style'] ) ? $wrapkit_data['sd_footer_style'] : '1';
		
		$sd_widget_h     = '5';
		$sd_title_class  = '';
		
		if ( $sd_footer_style == '1' ) {
			$sd_widget_h    = '6';
			$sd_title_class = 'font-medium m-t-20';
		}
		
		// footer sidebars
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar One', 'wrapkit' ),
			'id'            => 'footer-sidebar-one',
			'description'   => esc_html__( 'The first sidebar of the footer.', 'wrapkit' ),
			'before_widget' => '<div id="%1$s" class="sd-footer-sidebar-widget clearfix %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h' . $sd_widget_h . ' class="' . $sd_title_class . ' sd-footer-widget-title">',
			'after_title'   => '</h' . $sd_widget_h . '>',
			) 
		);
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar Two', 'wrapkit' ),
			'id'            => 'footer-sidebar-two',
			'description'   => esc_html__( 'The second sidebar of the footer.', 'wrapkit' ),
			'before_widget' => '<div id="%1$s" class="sd-footer-sidebar-widget clearfix %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h' . $sd_widget_h . ' class="' . $sd_title_class . ' sd-footer-widget-title">',
			'after_title'   => '</h' . $sd_widget_h . '>',
			) 
		);
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar Three', 'wrapkit' ),
			'id'            => 'footer-sidebar-three',
			'description'   => esc_html__( 'The third sidebar of the footer.', 'wrapkit' ),
			'before_widget' => '<div id="%1$s" class="sd-footer-sidebar-widget clearfix %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h' . $sd_widget_h . ' class="' . $sd_title_class . ' sd-footer-widget-title">',
			'after_title'   => '</h' . $sd_widget_h . '>',
			) 
		);
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar Four', 'wrapkit' ),
			'id'            => 'footer-sidebar-four',
			'description'   => esc_html__( 'The fourth sidebar of the footer.', 'wrapkit' ),
			'before_widget' => '<div id="%1$s" class="sd-footer-sidebar-widget clearfix %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h' . $sd_widget_h . ' class="' . $sd_title_class . ' sd-footer-widget-title">',
			'after_title'   => '</h' . $sd_widget_h . '>',
			) 
		);
		
		// woo sidebar
		
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Sidebar', 'wrapkit' ),
			'id'            => 'woocommerce-sidebar',
			'description'   => esc_html__( 'Shop sidebar of the site.', 'wrapkit' ),
			'before_widget' => '<div id="%1$s" class="sd-sidebar-widget sd-shop-sidebar clearfix %2$s m-b-40">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="title">',
			'after_title'  => '</h5>',
			) 
		);
	}
	add_action( 'widgets_init', 'wrapkit_register_sidebars' );
}