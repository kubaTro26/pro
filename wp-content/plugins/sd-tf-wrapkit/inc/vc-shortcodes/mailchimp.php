<?php
/**
 * MailChimp VC Shortcode
 *
 * @package	wrapkit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
if ( ! function_exists( 'sd_mailchimp' ) ) {
	function sd_mailchimp( $atts ) {
		$sd = shortcode_atts( array(
			'style'              => '',
			'list_url'           => '',
			'input_color'        => '',
			'input_bg_color'     => '',
			'input_border_color' => '',
			'btn_text'           => '',
			'btn_color'          => '',
			'btn_color_hover'    => '',
			'btn_type'           => '',
			'btn_bg'             => '',
			'btn_bg_hover'       => '',
			'btn_bg1'            => '',
			'btn_bg2'            => '',
			'btn_bg1_hover'      => '',
			'btn_bg2_hover'      => '',
		), $atts );
		
		$list_url           = $sd['list_url'];
		$btn_text           = $sd['btn_text'];
		$style              = $sd['style'];
		$input_color        = $sd['input_color'];
		$input_bg_color     = $sd['input_bg_color'];
		$input_border_color = $sd['input_border_color'];
		$btn_color          = $sd['btn_color'];
		$btn_color_hover    = $sd['btn_color_hover'];
		$btn_type           = $sd['btn_type'];
		$btn_bg             = $sd['btn_bg'];
		$btn_bg_hover       = $sd['btn_bg_hover'];
		$btn_bg1            = $sd['btn_bg1'];
		$btn_bg2            = $sd['btn_bg2'];
		$btn_bg1_hover      = $sd['btn_bg1_hover'];
		$btn_bg2_hover      = $sd['btn_bg2_hover'];

		ob_start();
		?>
			<?php
				if (
					$input_color        !== '' ||
					$input_bg_color     !== '' ||
					$input_border_color !== '' ||
					$btn_color          !== '' ||
					$btn_color_hover    !== '' ||
					$btn_type           !== '' ||
					$btn_bg             !== '' ||
					$btn_bg_hover       !== '' ||
					$btn_bg1            !== '' ||
					$btn_bg2            !== '' ||
					$btn_bg1_hover      !== '' ||
					$btn_bg2_hover      !== ''
				) :
			?>
				<style type = "text/css" scoped>
					<?php if ( $input_color !== '' ) : ?>
						.sd-mailchimp input[type="text"],
						.sd-mailchimp input[type="email"] {
							color: <?php echo esc_attr( $input_color ); ?>;
						}
					<?php endif; ?>
					<?php if ( $input_bg_color !== '' ) : ?>
						.sd-mailchimp input[type="text"],
						.sd-mailchimp input[type="email"] {
							background-color: <?php echo esc_attr( $input_bg_color ); ?>;
						}
					<?php endif; ?>
					<?php if ( $input_border_color !== '' ) : ?>
						.sd-mailchimp input[type="text"],
						.sd-mailchimp input[type="email"] {
							border-color: <?php echo esc_attr( $input_border_color ); ?>;
						}
					<?php endif; ?>
					<?php if ( $btn_color !== '' ) : ?>
						.sd-mailchimp input[type="submit"] {
							color: <?php echo esc_attr( $btn_color ); ?>;
						}
					<?php endif; ?>
					<?php if ( $btn_color_hover !== '' ) : ?>
						.sd-mailchimp input[type="submit"]:hover {
							color: <?php echo esc_attr( $btn_color_hover ); ?> !important;
						}
					<?php endif; ?>
					<?php if ( $btn_type == 'normal' && $btn_bg !== '' ) : ?>
						.sd-mailchimp input[type="submit"] {
							background: <?php echo esc_attr( $btn_bg ); ?>;
						}
					<?php endif; ?>
					<?php if ( $btn_type == 'normal' && $btn_bg_hover !== '' ) : ?>
						.sd-mailchimp input[type="submit"]:hover {
							background: <?php echo esc_attr( $btn_bg_hover ); ?>;
						}
					<?php endif; ?>
					<?php if ( $btn_type == 'gradient' && $btn_bg1 !== '' && $btn_bg2 !== '' ) : ?>
						.sd-mailchimp input[type="submit"] {
							background: linear-gradient(to right, <?php echo esc_attr( $btn_bg1 ); ?> 0%, <?php echo esc_attr( $btn_bg2 ); ?> 100%);
						}
					<?php endif; ?>
					<?php if ( $btn_type == 'gradient' && $btn_bg1_hover !== '' && $btn_bg2_hover ) : ?>
						.sd-mailchimp input[type="submit"]:hover {
							background: linear-gradient(to right, <?php echo esc_attr( $btn_bg1_hover ); ?> 0%, <?php echo esc_attr( $btn_bg2_hover ); ?> 100%);
						}
					<?php endif; ?>
				</style>
			<?php endif; ?>
			<?php if ( $style == 'style1' ) : ?>
				<div class="sd-mailchimp">
					<form action="<?php echo esc_url( $list_url ); ?>" method="post" id="mc-embedded-subscribe-form">
						<div class="form-group">
							<input value="" name="NAME" class="email form-control" id="mce-NAME" placeholder="<?php esc_html_e( 'Your Name', 'wrapkit' ); ?>" type="text">
						</div>
						<div class="form-group">
							<input value="" name="EMAIL" class="required email form-control" id="mce-EMAIL" placeholder="<?php esc_html_e( 'E-Mail Address', 'wrapkit' ); ?>" type="email">
						</div>
						<div class="form-group">
							<div style="position: absolute;left: -5000px"><input name="b_5ef55abee027ce066bca8313c_46cd16464a" value="" type="text"></div>
							<input value="<?php echo esc_html( $btn_text ); ?>" name="subscribe" id="mc-embedded-subscribe" class="button btn btn-danger-gradiant btn-block btn-md text-uppercase" type="submit">	
						</div>
					</form>
				</div>
			<?php endif; ?>
			<?php if ( $style == 'style2' ) : ?>
				<div class="sd-mailchimp">
					<p class="text-dark font-medium">Enter email address to get the app</p>
					<form class="form-inline" action="<?php echo esc_url( $list_url ); ?>" method="post" id="mc-embedded-subscribe-form">
						<div class="form-group m-r-10">
							<input value="" name="EMAIL" class="required email form-control form-control-md" id="mce-EMAIL" placeholder="<?php esc_html_e( 'E-Mail Address', 'wrapkit' ); ?>" type="email">
						</div>
						<div style="position: absolute;left: -5000px"><input name="b_5ef55abee027ce066bca8313c_46cd16464a" value="" type="text"></div>
						<input value="<?php echo esc_html( $btn_text ); ?>" name="subscribe" id="mc-embedded-subscribe" class="button btn btn-md btn-success-gradiant" type="submit">	
					</form>
				</div>
			<?php endif; ?>
			<?php if ( $style == 'style3' ) : ?>
				<div class="sd-mailchimp sd-mailchimp3">
					<form class="form-inline" action="<?php echo esc_url( $list_url ); ?>" method="post" id="mc-embedded-subscribe-form">
						<input value="" name="EMAIL" class="required email font-16" id="mce-EMAIL" placeholder="<?php esc_html_e( 'E-Mail Address', 'wrapkit' ); ?>" type="email">
						<div style="position: absolute;left: -5000px"><input name="b_5ef55abee027ce066bca8313c_46cd16464a" value="" type="text"></div>
						<input value="<?php echo esc_html( $btn_text ); ?>" name="subscribe" id="mc-embedded-subscribe" class="bg-danger-gradiant font-semibold font-16 btn-rounded text-uppercase text-white text-center" type="submit">	
					</form>
				</div>
			<?php endif; ?>
		<?php return ob_get_clean();	
	}
	add_shortcode( 'sd_mailchimp','sd_mailchimp' );
}

// Register shortcode to VC

add_action( 'init', 'sd_mailchimp_vcmap' );

if ( ! function_exists( 'sd_mailchimp_vcmap' ) ) {
	function sd_mailchimp_vcmap() {

		vc_map( array(
			'name'              => esc_html__( 'Simple Mail Chimp Form', 'wrapkit' ),
			'description'       => esc_html__( 'Simple Mail Chimp Form', 'wrapkit' ),
			'base'              => "sd_mailchimp",
			'class'             => "sd_mailchimp",
			'category'          => esc_html__( 'WrapKit', 'wrapkit' ),
			'icon'              => plugin_dir_url( __DIR__ ) . 'images/vc-icons/newsletter-icon-min.png',
			'params'            => array(
				array(
					'type'			=> 'dropdown',
					'class'			=> '',
					'heading'		=> esc_html__( 'Style', 'wrapkit' ),
					'param_name'	=> 'style',
					'value' => 
						array( 
							esc_html__( 'Style 1', 'wrapkit') => 'style1',
							esc_html__( 'Style 2', 'wrapkit') => 'style2',
							esc_html__( 'Style 3', 'wrapkit') => 'style3',
						),
					'save_always'   => true,
					'description'	=> esc_html__( 'Select the layout of the form', 'wrapkit' ),
				),
				array(
					'type'        => 'textarea',
					'class'       => '',
					'heading'     => esc_html__( 'Mail Chimp List Url', 'wrapkit' ),
					'param_name'  => 'list_url',
					'value'       => '//skat.us7.list-manage.com/subscribe/post?u=5ef55abee027ce066bca8313c&id=46cd16464a',
					'save_always' => true,
					'description' => esc_html__( 'Insert the newsletter list url.', 'wrapkit' ),
				),
				array(
					'type'        => 'textfield',
					'class'       => '',
					'heading'     => esc_html__( 'Button Text', 'wrapkit' ),
					'param_name'  => 'btn_text',
					'value'       => esc_html__( 'SUBSCRIBE', 'wrapkit' ),
					'save_always' => true,
					'description' => esc_html__( 'Insert the button text.', 'wrapkit' ),
				),

				// Styling

				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Input Text Color', 'wrapkit' ),
					'param_name'  => 'input_color',
					'value'       => '',
					'group'       => esc_html__( 'Styling', 'wrapkit' ),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Input Background Color', 'wrapkit' ),
					'param_name'  => 'input_bg_color',
					'value'       => '',
					'group'       => esc_html__( 'Styling', 'wrapkit' ),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Input Border Color', 'wrapkit' ),
					'param_name'  => 'input_border_color',
					'value'       => '',
					'group'       => esc_html__( 'Styling', 'wrapkit' ),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Button Text Color', 'wrapkit' ),
					'param_name'  => 'btn_color',
					'value'       => '',
					'group'       => esc_html__( 'Styling', 'wrapkit' ),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Button Text Hover Color', 'wrapkit' ),
					'param_name'  => 'btn_color_hover',
					'value'       => '',
					'group'       => esc_html__( 'Styling', 'wrapkit' ),
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Button Type', 'wrapkit' ),
					'param_name'  => 'btn_type',
					'group'       => esc_html__( 'Styling', 'wrapkit' ),
					'save_always' => true,
					'value'       => 
						array( 
							esc_html__( 'Normal', 'wrapkit' )   => 'normal',
							esc_html__( 'Gradient', 'wrapkit' ) => 'gradient',
						),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Button Background', 'wrapkit' ),
					'param_name'  => 'btn_bg',
					'value'       => '',
					'group'       => esc_html__( 'Styling', 'wrapkit' ),
					'dependency'  => array(
						'element' => 'btn_type',
						'value'   => array( 'normal' ),
					),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Button Background Hover', 'wrapkit' ),
					'param_name'  => 'btn_bg_hover',
					'value'       => '',
					'group'       => esc_html__( 'Styling', 'wrapkit' ),
					'dependency'  => array(
						'element' => 'btn_type',
						'value'   => array( 'normal' ),
					),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Gradient Color 1', 'wrapkit' ),
					'param_name'  => 'btn_bg1',
					'value'       => '',
					'group'       => esc_html__( 'Styling', 'wrapkit' ),
					'dependency'  => array(
						'element' => 'btn_type',
						'value'   => array( 'gradient' ),
					),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Gradient Color 2', 'wrapkit' ),
					'param_name'  => 'btn_bg2',
					'value'       => '',
					'group'       => esc_html__( 'Styling', 'wrapkit' ),
					'dependency'  => array(
						'element' => 'btn_type',
						'value'   => array( 'gradient' ),
					),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Gradient Color 1 Hover', 'wrapkit' ),
					'param_name'  => 'btn_bg1_hover',
					'value'       => '',
					'group'       => esc_html__( 'Styling', 'wrapkit' ),
					'dependency'  => array(
						'element' => 'btn_type',
						'value'   => array( 'gradient' ),
					),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Gradient Color 2 Hover', 'wrapkit' ),
					'param_name'  => 'btn_bg2_hover',
					'value'       => '',
					'group'       => esc_html__( 'Styling', 'wrapkit' ),
					'dependency'  => array(
						'element' => 'btn_type',
						'value'   => array( 'gradient' ),
					),
				),
			),
		));
	}
}