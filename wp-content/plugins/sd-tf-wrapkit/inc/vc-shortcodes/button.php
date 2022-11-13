<?php
/**
 * WrapKit Button VC Shortcode
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

global $wrapkit_data;

	if ( ! function_exists( 'sd_wrapkit_button' ) ) {
		function sd_wrapkit_button( $atts ) {
			$sd = shortcode_atts( array(
				'text'           => '',
				'link'           => '',
				'arrow_icon'     => '',
				'btn_align'      => '',
				'custom_class'   => '',
				'color'          => '',
				'hover'          => '',
				'bg_type'        => '',
				'bg_col'         => '',
				'bg_hover_color' => '',
				'grad_col_1'     => '',
				'grad_col_2'     => '',
				'css'            => '',
			), $atts );
			
			$text           = $sd['text'];
			$link           = $sd['link'];
			$arrow_icon     = $sd['arrow_icon'];
			$btn_align      = $sd['btn_align'];
			$custom_class   = $sd['custom_class'];
			$color          = $sd['color'];
			$hover          = $sd['hover'];
			$bg_type        = $sd['bg_type'];
			$bg_col         = $sd['bg_col'];
			$bg_hover_color = $sd['bg_hover_color'];
			$grad_col_1     = $sd['grad_col_1'];
			$grad_col_2     = $sd['grad_col_2'];
			$css            = $sd['css'];
			
			$btn_link = $url = $target = $link_title = $rel = '';

			$uid = uniqid();
			
			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), 'sd_wrapkit_button', $atts );

			$btn_link = vc_build_link( $link );

			if ( $btn_link['url'] !== '' ) {
				$url        = ( isset( $btn_link['url'] ) && $btn_link['url'] !== '' ) ? $btn_link['url']  : '';
				$target     = ( isset( $btn_link['target'] ) && $btn_link['target'] !== '' ) ? esc_attr( trim( $btn_link['target'] ) ) : '';
				$link_title = ( isset( $btn_link['title'] ) && $btn_link['title'] !== '' ) ? esc_attr($btn_link['title']) : '';
				$rel        = ( isset( $btn_link['rel'] ) && $btn_link['rel'] !== '' ) ? esc_attr($btn_link['rel']) : '';
			}

			// normal bg
			$bg_css = $bg_css_hover = $bg_border_css = $bg_border_css_hover = $gradient_css = $gradient_css_hover = array();
			
			$bg_css[]       = 'background-color: ' . $bg_col;
			$bg_css[]       = 'color: ' . $color;

			$bg_css_hover[] = 'background-color: ' . $bg_hover_color;
			$bg_css_hover[] = 'color: ' . $hover;

			// border bg
			$bg_border_css[] = 'background: none; border: 1px solid ' . $bg_col;
			$bg_border_css[] = 'color: ' . $color;
			
			$bg_border_css_hover[] = 'border-color: ' . $bg_hover_color;
			$bg_border_css_hover[] = 'color: ' . $hover;

			// gradient bg
			$gradient_css[] = 'color: ' . $color;
			$gradient_css[] = 'border: none';
			$gradient_css[] = 'background-color: ' . $grad_col_1;
			$gradient_css[] = 'background-image: -webkit-linear-gradient(left, ' . $grad_col_1 . ' 0%, ' . $grad_col_2 . ' 50%,' . $grad_col_1 . ' 100%)';
			$gradient_css[] = 'background-image: linear-gradient(to right, ' . $grad_col_1 . ' 0%, ' . $grad_col_2 . ' 50%,' . $grad_col_1 . ' 100%)';
			$gradient_css[] = 'background-size: 200% 100%';

			// gradient hover css
			$gradient_css_hover[] = 'color: ' . $hover;
			$gradient_css_hover[] = 'border: none';
			$gradient_css_hover[] = 'background-color: ' . $grad_col_2;
			$gradient_css_hover[] = 'background-image: -webkit-linear-gradient(left, ' . $grad_col_2 . ' 0%, ' . $grad_col_1 . ' 50%,' . $grad_col_2 . ' 100%)';
			$gradient_css_hover[] = 'background-image: linear-gradient(to right, ' . $grad_col_2 . ' 0%, ' . $grad_col_1 . ' 50%,' . $grad_col_2 . ' 100%)';
			$gradient_css_hover[] = 'background-size: 200% 100%';

			$align = '';

			if ( $btn_align === 'left' ) {
				$align = 'text-left';
			} elseif ( $btn_align === 'center' ) {
				$align = 'text-center';
			} elseif ( $btn_align === 'right') {
				$align = 'text-right';
			} elseif ( $btn_align === 'inline') {
				$align = 'sd-inline';
			}
			
	
			ob_start();
			?>		
				
				<?php if ( $bg_type == 'normal') : ?>
					<?php 
						echo '<style type="text/css">.sd-grad-' . $uid . ' {' . implode( ';', $bg_css ) . ';' . '}</style>';
						echo '<style type="text/css">.sd-grad-' . $uid . ':hover {' . implode( ';', $bg_css_hover ) . ';' . '}</style>';
					?>
				<?php elseif ( $bg_type == 'border') : ?>
					<?php 
						echo '<style type="text/css">.sd-grad-' . $uid . ' {' . implode( ';', $bg_border_css ) . ';' . '}</style>';
						echo '<style type="text/css">.sd-grad-' . $uid . ':hover {' . implode( ';', $bg_border_css_hover ) . ';' . '}</style>';
					?>
				<?php elseif ( $bg_type == 'gradient') : ?>
					<?php 
						echo '<style type="text/css">.sd-grad-' . $uid . ' {' . implode( ';', $gradient_css ) . ';' . '}</style>';
						echo '<style type="text/css">.sd-grad-' . $uid . ':hover {' . implode( ';', $gradient_css_hover ) . ';' . '}</style>';
					?>
				<?php endif; ?>
				
				<div class="<?php echo esc_attr( $align ); ?>">
					<a href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr( $link_title ); ?>" target="<?php echo esc_attr( $target ); ?>" rel="<?php echo esc_attr( $rel ); ?>" class="sd-wrapkit-btn sd-grad-<?php echo $uid; ?> btn <?php if ( $bg_type == 'gradient' ) { echo 'btn-info-gradiant'; } ?> btn-md <?php if ( $arrow_icon == 'yes' ) { echo 'btn-arrow'; } ?> <?php echo esc_attr( $css_class ); ?> <?php echo esc_attr( $custom_class ); ?>">
						<span><?php if ( $arrow_icon == 'yes' ) { echo '<i class="ti-arrow-right"></i>'; } ?><?php echo esc_html( $text ); ?></span>
					</a>
				</div>

			<?php return ob_get_clean();	
		}
		add_shortcode( 'sd_wrapkit_button','sd_wrapkit_button' );
	}
	
	// Register shortcode to VC
	
	add_action( 'init', 'sd_wrapkit_button_vcmap' );
	
	if ( ! function_exists( 'sd_wrapkit_button_vcmap' ) ) {
		function sd_wrapkit_button_vcmap() {
			
			vc_map( array(
				'name'              => esc_html__( 'WrapKit Button', 'wrapkit' ),
				'description'       => esc_html__( 'Theme Button', 'wrapkit' ),
				'admin_enqueue_css' => plugin_dir_url( __FILE__ ) . 'css/sd-vc-admin-styles.css',
				'base'              => "sd_wrapkit_button",
				'class'             => "sd_wrapkit_button",
				'category'          => esc_html__( 'WrapKit', 'wrapkit' ),
				'icon'              => plugin_dir_url( __DIR__ ) . 'images/vc-icons/button-icon-min.png',
				'params'            => array(
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Button Text', 'wrapkit' ),
						'param_name'  => 'text',
						'value'       => esc_html__( 'Button Text', 'wrapkit' ),
						'save_always' => true,
					),
					array(
						'type'        => 'vc_link',
						'heading'     => esc_html__( 'Button Link', 'wrapkit' ),
						'param_name'  => 'link',
					),
					array(
						'type'        => 'checkbox',
						'heading'     => esc_html__( 'Show arrow?', 'wrapkit' ),
						'param_name'  => 'arrow_icon',
						'value'       => array( esc_html__( 'Yes', 'wrapkit' ) => 'yes' ),
						'save_always' => true,
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Align', 'wrapkit' ),
						'param_name'  => 'btn_align',
						'save_always' => true,
						'value'       => 
							array( 
								esc_html__( 'Left', 'wrapkit' )   => 'left',
								esc_html__( 'Center', 'wrapkit' ) => 'center',
								esc_html__( 'Right', 'wrapkit' )  => 'right',
								esc_html__( 'Inline', 'wrapkit' ) => 'inline',
							),
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Custom Class', 'wrapkit' ),
						'param_name'  => 'custom_class',
						'value'       => '',
						'save_always' => true,
					),
					// Styling
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Text Color', 'wrapkit' ),
						'param_name'  => 'color',
						'value'       => '#ffffff',
						'group'       => esc_html__( 'Styling', 'wrapkit' ),
						'save_always' => true,
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Hover Text Color', 'wrapkit' ),
						'param_name'  => 'hover',
						'value'       => '#ffffff',
						'group'       => esc_html__( 'Styling', 'wrapkit' ),
						'save_always' => true,
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Background Type', 'wrapkit' ),
						'param_name'  => 'bg_type',
						'save_always' => true,
						'group'       => esc_html__( 'Styling', 'wrapkit' ),
						'value'       => 
							array( 
								esc_html__( 'Normal', 'wrapkit' )   => 'normal',
								esc_html__( 'Border', 'wrapkit' )   => 'border',
								esc_html__( 'Gradient', 'wrapkit' ) => 'gradient',
							),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Background Color', 'wrapkit' ),
						'param_name'  => 'bg_col',
						'value'       => '#188ef4',
						'group'       => esc_html__( 'Styling', 'wrapkit' ),
						'save_always' => true,
						'dependency'  => array(
							'element' => 'bg_type',
							'value'   => array( 'normal', 'border' ),
						),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Hover Background Color', 'wrapkit' ),
						'param_name'  => 'bg_hover_color',
						'value'       => '#316ce8',
						'group'       => esc_html__( 'Styling', 'wrapkit' ),
						'save_always' => true,
						'dependency'  => array(
							'element' => 'bg_type',
							'value'   => array( 'normal', 'border' ),
						),
					),
					array(
						'type'               => 'colorpicker',
						'heading'            => esc_html__( 'Gradient Color 1', 'wrapkit' ),
						'param_name'         => 'grad_col_1',
						'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
						'group'              => 'Styling',
						'value'              => '#188ef4',
						'save_always'        => true,
						'dependency'         => array(
							'element' => 'bg_type',
							'value'   => 'gradient',
						),
					),
					array(
						'type'               => 'colorpicker',
						'heading'            => esc_html__( 'Gradient Color 2', 'wrapkit' ),
						'param_name'         => 'grad_col_2',
						'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
						'group'              => esc_html__( 'Styling', 'wrapkit' ),
						'value'              => '#316ce8',
						'save_always'        => true,
						'dependency'         => array(
							'element' => 'bg_type',
							'value'   => 'gradient',
						),
					),
					array(
						'type'             => 'css_editor',
						'heading'          => esc_html__( 'Css', 'wrapkit' ),
						'param_name'       => 'css',
						'group'            => esc_html__( 'Styling', 'wrapkit' ),
						'edit_field_class' => 'no-vc-background no-vc-border',
					),
				),
			));
		}
	}