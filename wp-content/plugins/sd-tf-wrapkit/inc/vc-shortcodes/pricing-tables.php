<?php
/**
 * Pricing Tables VC Shortcode
 *
 * @package	wrapkit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */


if ( ! function_exists( 'sd_pricing_table' ) ) {

	add_shortcode( 'sd_pricing_table','sd_pricing_table' );

	function sd_pricing_table( $atts, $content = null ) {

		global $pricing_columns, $columns;

		$sd = shortcode_atts( array(
			'style' => '',
			'nr_columns_4'  => '',
			'show_switch'       => '',
			'monthly_text'      => '',
			'yearly_text'       => '',
		), $atts );

		$pricing_columns = $pricing_table = array();
		
		$style        = $sd['style'];
		$columns      = $sd['nr_columns_4'];
		$show_switch  = $sd['show_switch'];
		$monthly_text = $sd['monthly_text'];
		$yearly_text  = $sd['yearly_text'];
		$col_content  = do_shortcode( $content );
		
		ob_start();
		?>
			<?php if ( $style == 'style1' ) : ?>
				<?php if ( $show_switch == 'yes' ) : ?>
					<script>
						jQuery( document ).ready( function( $ ) {
							jQuery(".pricing1 .btn-group .btn").click(function() {
								jQuery(".pricing1 .monthly, .pricing1 .yearly").toggle();
							});
						});
					</script>
				<?php endif; ?>
				
				<div class="pricing1">
					<?php if ( $show_switch == 'yes' ) : ?>
						<div class="row justify-content-center m-b-50">
							<div class="switcher-box">
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-secondary  btn-rounded active">
										<input type="radio" name="options" id="option1" checked> <?php echo esc_html( $monthly_text ); ?>
									</label>
									<label class="btn btn-secondary  btn-rounded">
										<input type="radio" name="options" id="option2"> <?php echo esc_html( $yearly_text ); ?>
									</label>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<div class="row sd-pricing2">
						<?php echo $col_content; ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( $style == 'style2' ) : ?>
				<div class="pricing2">
					<div class="row pricing-box">
						<?php echo $col_content; ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( $style == 'style4' ) : ?>
				<div class="row sd-pricing1">
					<?php echo $col_content; ?>
				</div>
			<?php endif; ?>


			<?php if ( $style == 'style5' ) : ?>
				<?php if ( $show_switch == 'yes' ) : ?>
					<script>
						jQuery( document ).ready( function( $ ) {
							jQuery(".pricing5 .btn-group .btn").click(function() {
								jQuery(".pricing5 .monthly, .pricing5 .yearly").toggle();
							});
						});
					</script>
				<?php endif; ?>

				<div class="pricing5">
					<?php if ( $show_switch == 'yes' ) : ?>
						<div class="row justify-content-center">
							<div class="switcher-box">
								<div class="btn-group" data-toggle="buttons">
									<label class="btn btn-secondary  btn-rounded active">
										<input type="radio" name="options" id="option1" checked> <?php echo esc_html( $monthly_text ); ?>
									</label>
									<label class="btn btn-secondary  btn-rounded">
										<input type="radio" name="options" id="option2"> <?php echo esc_html( $yearly_text ); ?>
									</label>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<div class="row text-center pricing-box">
						<?php echo $col_content; ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( $style == 'style6' ) : ?>
				<div class="row pricing6">
					<?php echo $col_content; ?>
				</div>
			<?php endif; ?>

			<?php if ( $style == 'style7' ) : ?>
				<div class="row pricing8">
					<?php echo $col_content; ?>
				</div>
			<?php endif; ?>
			
		<?php return ob_get_clean();	
	}
}
// Register shortcode to VC

if ( ! function_exists( 'sd_pricing_table_vcmap' ) ) {

	add_action( 'init', 'sd_pricing_table_vcmap' );

	function sd_pricing_table_vcmap() {

		vc_map( array(
			'name'            => esc_html__( 'Pricing Table', 'wrapkit' ),
			'description'     => esc_html__( 'Pricing Table', 'wrapkit' ),
			'base'            => "sd_pricing_table",
			'class'           => "sd_pricing_table",
			'category'        => esc_html__( 'WrapKit', 'wrapkit' ),
			'as_parent'       => array( 'only' => 'sd_pricing_column' ),
			'content_element' => true,
			'js_view'         => 'VcColumnView',
			'icon'              => plugin_dir_url( __DIR__ ) . 'images/vc-icons/pricing-table-icon-min.png',
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
							esc_html__( 'Style 4', 'wrapkit') => 'style4',
							esc_html__( 'Style 5', 'wrapkit') => 'style5',
							esc_html__( 'Style 6', 'wrapkit') => 'style6',
							esc_html__( 'Style 7', 'wrapkit') => 'style7',
						),
					'admin_label' => true,
					'save_always' => true,
					'description' => esc_html__( 'Select the style of the table', 'wrapkit' ),
				),
				array(
					'type'			=> 'dropdown',
					'class'			=> '',
					'heading'		=> esc_html__( 'Table Columns', 'wrapkit' ),
					'param_name'	=> 'nr_columns_4',
					'value' => 
						array( 
							esc_html__( '1 Columns', 'wrapkit') => '12',
							esc_html__( '2 Columns', 'wrapkit') => '6',
							esc_html__( '3 Columns', 'wrapkit') => '4',
							esc_html__( '4 Columns', 'wrapkit') => '3',
						),
					'save_always'   => true,
					'description'	=> esc_html__( 'Select the number of columns in the table', 'wrapkit' ),
					'dependency'	=> array(
						'element'	=> 'style',
						'value'		=> array( 'style1', 'style4', 'style7' ),
					),
				),
				array(
					'type'        => 'checkbox',
					'param_name'  => 'show_switch',
					'heading'     => esc_html__( 'Show Monthly/Yearly Switch?', 'wrapkit' ),
					'description' => esc_html__( 'Check to show the monthly/yearly switch.', 'wrapkit' ),
					'value'       => array( esc_html__( 'Yes', 'wrapkit' ) => 'yes' ),
					'dependency'  => array(
						'element' => 'style',
						'value'   => array( 'style5', 'style1' ),
					),
				),
				array(
					'type'        => 'textfield',
					'class'       => '',
					'heading'     => esc_html__( 'Monthly Text', 'wrapkit' ),
					'description' => '',
					'param_name'  => 'monthly_text',
					'value'       => esc_html__( 'Monthly', 'wrapkit' ),
					'save_always' => true,
					'dependency'  => array(
						'element' => 'show_switch',
						'value'   => array( 'yes' ),
					),
				),
				array(
					'type'        => 'textfield',
					'class'       => '',
					'heading'     => esc_html__( 'Yearly Text', 'wrapkit' ),
					'description' => '',
					'param_name'  => 'yearly_text',
					'value'       => esc_html__( 'Yearly', 'wrapkit' ),
					'save_always' => true,
					'dependency'  => array(
						'element' => 'show_switch',
						'value'   => array( 'yes' ),
					),
				),
			),
		));
	}
}

if ( ! function_exists( 'sd_pricing_column' ) ) {

	add_shortcode( 'sd_pricing_column','sd_pricing_column' );

	function sd_pricing_column( $atts, $content = null ) {
		$sd = shortcode_atts( array(
			'col_style'            => '',
			'show_column_image'    => '',
			'column_img'           => '',
			'column_title'         => '',
			'column_desc'          => '',
			'column_price'         => '',
			'column_price_desc'    => '',
			'show_btn'             => '',
			'column_btn_text'      => '',
			'column_btn_link'      => '',
			'column_animation'     => '',
			'yearly_price'         => '',
			'column_yr_price_desc' => '',
			'col_featured'         => '',
			'featured_txt'         => '',
			'col5_bg'              => '',
			'currency'             => '',
			'col_bg'               => '',
			'title_color'          => '',
			'title_desc_color'     => '',
			'price_color'          => '',
			'price_desc_color'     => '',
			'btn_color'            => '',
			'btn_color_hover'      => '',
			'btn_type'             => '',
			'btn_bg'               => '',
			'btn_bg_hover'         => '',
			'btn_bg1'              => '',
			'btn_bg2'              => '',
			'btn_bg1_hover'        => '',
			'btn_bg2_hover'        => '',
			'border_style'         => '',
			'border_color'         => '',
			'border_color_hover'   => '',
			'border_width'         => '',
			'border_radius'        => '',
			'feat_bg'              => '',
			'feat_text_color'      => '',
		), $atts );
		
		global $pricing_columns, $columns;
		
		$col_style            = $sd['col_style'];
		$show_column_image    = $sd['show_column_image'];
		$column_img           = $sd['column_img'];
		$column_title         = $sd['column_title'];
		$column_desc          = $sd['column_desc'];
		$column_price         = $sd['column_price'];
		$column_price_desc    = $sd['column_price_desc'];
		$show_btn             = $sd['show_btn'];
		$column_btn_text      = $sd['column_btn_text'];
		$column_btn_link      = $sd['column_btn_link'];
		$column_animation     = $sd['column_animation'];
		$col_featured         = $sd['col_featured'];
		$featured_txt         = $sd['featured_txt'];
		$col5_bg              = $sd['col5_bg'];
		$yearly_price         = $sd['yearly_price'];
		$column_yr_price_desc = $sd['column_yr_price_desc'];
		$currency             = $sd['currency'];
		$col_bg               = $sd['col_bg'];
		$title_color          = $sd['title_color'];
		$title_desc_color     = $sd['title_desc_color'];
		$price_color          = $sd['price_color'];
		$price_desc_color     = $sd['price_desc_color'];
		$btn_color            = $sd['btn_color'];
		$btn_color_hover      = $sd['btn_color_hover'];
		$btn_type             = $sd['btn_type'];
		$btn_bg               = $sd['btn_bg'];
		$btn_bg_hover         = $sd['btn_bg_hover'];
		$btn_bg1              = $sd['btn_bg1'];
		$btn_bg2              = $sd['btn_bg2'];
		$btn_bg1_hover        = $sd['btn_bg1_hover'];
		$btn_bg2_hover        = $sd['btn_bg2_hover'];
		$border_style         = $sd['border_style'];
		$border_color         = $sd['border_color'];
		$border_color_hover   = $sd['border_color_hover'];
		$border_width         = $sd['border_width'];
		$border_radius        = $sd['border_radius'];
		$feat_bg              = $sd['feat_bg'];
		$feat_text_color      = $sd['feat_text_color'];
		$col_id               = uniqid();
		$col_id2              = uniqid();
		$col_id3              = uniqid();
		$col_id4              = uniqid();
		$col_id5              = uniqid();
		$col_id6              = uniqid();

		$btn_link = $url = $target = $link_title = $rel = '';

		$btn_link = vc_build_link( $column_btn_link );

		if ( $btn_link['url'] !== '' ) {
			$url        = ( isset( $btn_link['url'] ) && $btn_link['url'] !== '' ) ? $btn_link['url']  : '';
			$target     = ( isset( $btn_link['target'] ) && $btn_link['target'] !== '' ) ? esc_attr( trim( $btn_link['target'] ) ) : '';
			$link_title = ( isset( $btn_link['title'] ) && $btn_link['title'] !== '' ) ? esc_attr($btn_link['title']) : '';
			$rel        = ( isset( $btn_link['rel'] ) && $btn_link['rel'] !== '' ) ? esc_attr($btn_link['rel']) : '';
		}
		
		ob_start();
		?>
			<?php if ( $col_style == 'style1' ) : ?>
				<div id="col-<?php echo esc_attr( $col_id ); ?>" class="col-md-<?php echo $columns; ?>" data-aos="<?php echo esc_attr( $column_animation ); ?>" data-aos-duration="1200">

					<?php
						if (
							$col_bg             !== '' ||
							$title_color        !== '' ||
							$title_desc_color   !== '' ||
							$price_color        !== '' ||
							$price_desc_color   !== '' ||
							$btn_color          !== '' ||
							$btn_color_hover    !== '' ||
							$btn_type           !== '' ||
							$btn_bg             !== '' ||
							$btn_bg_hover       !== '' ||
							$btn_bg1            !== '' ||
							$btn_bg2            !== '' ||
							$btn_bg1_hover      !== '' ||
							$btn_bg2_hover      !== '' ||
							$border_style       !== '' ||
							$border_color       !== '' ||
							$border_color_hover !== '' ||
							$border_width       !== '' ||
							$border_radius      !== '' ||
							$feat_bg            !== '' ||
							$feat_text_color    !== ''
						) :
					?>
					<style type = "text/css" scoped>
						<?php if ( $col_bg !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id ); ?> .card {
								background-color: <?php echo esc_attr( $col_bg ); ?>;
							}
						<?php endif; ?>
						<?php if ( $title_color !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id ); ?> .title {
								color: <?php echo esc_attr( $title_color ); ?>;
							}
						<?php endif; ?>
						<?php if ( $title_desc_color !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id ); ?> .subtitle {
								color: <?php echo esc_attr( $title_desc_color ); ?>;
							}
						<?php endif; ?>
						<?php if ( $price_color !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id ); ?> .pricing span {
								color: <?php echo esc_attr( $price_color ); ?>;
							}
						<?php endif; ?>
						<?php if ( $price_desc_color !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id ); ?> .pricing sup,
							#col-<?php echo esc_attr( $col_id ); ?> .pricing small {
								color: <?php echo esc_attr( $price_desc_color ); ?>;
							}
						<?php endif; ?>
						<?php if ( $btn_color !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id ); ?> .btn {
								color: <?php echo esc_attr( $btn_color ); ?>;
							}
						<?php endif; ?>
						<?php if ( $btn_color_hover !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id ); ?> .btn:hover {
								color: <?php echo esc_attr( $btn_color_hover ); ?>;
							}
						<?php endif; ?>
						<?php if ( $btn_type == 'normal' && $btn_bg !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id ); ?> .btn {
								background: <?php echo esc_attr( $btn_bg ); ?>;
							}
						<?php endif; ?>
						<?php if ( $btn_type == 'normal' && $btn_bg_hover !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id ); ?> .btn:hover {
								background: <?php echo esc_attr( $btn_bg_hover ); ?>;
							}
						<?php endif; ?>
						<?php if ( $btn_type == 'gradient' && $btn_bg1 !== '' && $btn_bg2 !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id ); ?> .btn {
								background: linear-gradient(to right, <?php echo esc_attr( $btn_bg1 ); ?> 0%, <?php echo esc_attr( $btn_bg2 ); ?> 100%);
							}
						<?php endif; ?>
						<?php if ( $btn_type == 'gradient' && $btn_bg1_hover !== '' && $btn_bg2_hover ) : ?>
							#col-<?php echo esc_attr( $col_id ); ?> .btn:hover {
								background: linear-gradient(to right, <?php echo esc_attr( $btn_bg1_hover ); ?> 0%, <?php echo esc_attr( $btn_bg2_hover ); ?> 100%);
							}
						<?php endif; ?>
						<?php if ( $border_style == 'solid' && $border_color !== '' && $border_width !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id ); ?> .btn {
								border: <?php echo esc_attr( $border_width ); ?>px solid <?php echo esc_attr( $border_color ); ?>;
							}
							<?php if ( $border_radius !== '' ) : ?>
								#col-<?php echo esc_attr( $col_id ); ?> .btn {
									border-radius: <?php echo esc_attr( $border_radius ); ?>px;
								}	
							<?php endif; ?>
							<?php if ( $border_color_hover !== '' ) : ?>
								#col-<?php echo esc_attr( $col_id ); ?> .btn:hover {
									border-color: <?php echo esc_attr( $border_color_hover ); ?>;
								}	
							<?php endif; ?>
						<?php elseif ( $border_style == 'none' ) : ?>
							#col-<?php echo esc_attr( $col_id ); ?> .btn {
								border: none;
							}
						<?php endif; ?>
						<?php if ( $feat_text_color !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id ); ?> .badge {
								color: <?php echo esc_attr( $feat_text_color ); ?>;
							}	
						<?php endif; ?>
						<?php if ( $feat_bg !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id ); ?> .badge {
								background-color: <?php echo esc_attr( $feat_bg ); ?>;
							}	
						<?php endif; ?>
					</style>
					<?php endif; ?>
					<div class="card text-center card-shadow">
						<div class="card-body font-14">
							<?php if ( $col_featured == 'yes' ) : ?>
								<span class="badge badge-inverse p-10"><?php echo esc_html( $featured_txt ); ?></span>
							<?php endif; ?>
							<?php if ( ! empty( $column_title ) ) : ?>
								<h5 class="title"><?php echo esc_html( $column_title ); ?></h5>
							<?php endif; ?>
							<?php if ( ! empty( $column_desc ) ) : ?>
								<h6 class="subtitle"><?php echo esc_html( $column_desc ); ?></h6>
							<?php endif; ?>
							<div class="pricing">
								<sup><?php echo esc_html( $currency ); ?></sup>
								<?php if ( ! empty( $column_price ) ) : ?>
									<span class="monthly display-5"><?php echo esc_html( $column_price ); ?></span>
								<?php endif; ?>
								<?php if ( ! empty( $yearly_price ) ) : ?>
									<span class="yearly display-5"><?php echo esc_html( $yearly_price ); ?></span>
								<?php endif; ?>
								<?php if ( ! empty( $column_price_desc ) ) : ?>
									<small class="monthly"><?php echo esc_html( $column_price_desc ); ?></small>
								<?php endif; ?>
								<?php if ( ! empty( $yearly_price ) ) : ?>
									<small class="yearly"><?php echo esc_html( $column_yr_price_desc ); ?></small>
								<?php endif; ?>
							</div>
							<?php echo do_shortcode( $content ); ?>
							<div class="bottom-btn">
								<?php if ( $show_btn == 'yes' ) : ?>
									<?php $btn_class = ( $col_featured == 'yes' ) ? 'btn-info-gradiant' : 'btn-outline-info' ?>
									<a class="btn  btn-md btn-arrow btn-block <?php echo esc_attr( $btn_class ); ?>" data-toggle="collapse" href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr( $link_title ); ?>" target="<?php echo esc_attr( $target ); ?>" rel="<?php echo esc_attr( $rel ); ?>">
										<span><?php echo esc_html( $column_btn_text ); ?> <i class="ti-arrow-right"></i></span>
									</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( $col_style == 'style2' ) : ?>
				<?php $featured = ( $col_featured == 'yes' ) ? 'col-lg-6 col-md-7 above-card' : 'col-lg-5 col-md-5'; ?>
				<div id="col-<?php echo esc_attr( $col_id2 ); ?>" class="<?php echo esc_attr( $featured ); ?>">
				<?php
						if (
							$col_bg             !== '' ||
							$title_color        !== '' ||
							$title_desc_color   !== '' ||
							$price_color        !== '' ||
							$price_desc_color   !== '' ||
							$btn_color          !== '' ||
							$btn_color_hover    !== '' ||
							$btn_type           !== '' ||
							$btn_bg             !== '' ||
							$btn_bg_hover       !== '' ||
							$btn_bg1            !== '' ||
							$btn_bg2            !== '' ||
							$btn_bg1_hover      !== '' ||
							$btn_bg2_hover      !== '' ||
							$border_style       !== '' ||
							$border_color       !== '' ||
							$border_color_hover !== '' ||
							$border_width       !== '' ||
							$border_radius      !== ''
						) :
					?>
					<style type = "text/css" scoped>
						<?php if ( $col_bg !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id2 ); ?> .card {
								background-color: <?php echo esc_attr( $col_bg ); ?>;
							}
						<?php endif; ?>
						<?php if ( $title_color !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id2 ); ?> .plan-text h4 {
								color: <?php echo esc_attr( $title_color ); ?>;
							}
						<?php endif; ?>
						<?php if ( $title_desc_color !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id2 ); ?> .subtitle {
								color: <?php echo esc_attr( $title_desc_color ); ?>;
							}
						<?php endif; ?>
						<?php if ( $price_color !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id2 ); ?> .pricing-text span {
								color: <?php echo esc_attr( $price_color ); ?>;
							}
						<?php endif; ?>
						<?php if ( $price_desc_color !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id2 ); ?> .pricing-text sup {
								color: <?php echo esc_attr( $price_desc_color ); ?>;
							}
						<?php endif; ?>
						<?php if ( $btn_color !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id2 ); ?> .btn {
								color: <?php echo esc_attr( $btn_color ); ?>;
							}
						<?php endif; ?>
						<?php if ( $btn_color_hover !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id2 ); ?> .btn:hover {
								color: <?php echo esc_attr( $btn_color_hover ); ?>;
							}
						<?php endif; ?>
						<?php if ( $btn_type == 'normal' && $btn_bg !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id2 ); ?> .btn {
								background: <?php echo esc_attr( $btn_bg ); ?>;
							}
						<?php endif; ?>
						<?php if ( $btn_type == 'normal' && $btn_bg_hover !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id2 ); ?> .btn:hover {
								background: <?php echo esc_attr( $btn_bg_hover ); ?>;
							}
						<?php endif; ?>
						<?php if ( $btn_type == 'gradient' && $btn_bg1 !== '' && $btn_bg2 !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id2 ); ?> .btn {
								background: linear-gradient(to right, <?php echo esc_attr( $btn_bg1 ); ?> 0%, <?php echo esc_attr( $btn_bg2 ); ?> 100%);
							}
						<?php endif; ?>
						<?php if ( $btn_type == 'gradient' && $btn_bg1_hover !== '' && $btn_bg2_hover ) : ?>
							#col-<?php echo esc_attr( $col_id2 ); ?> .btn:hover {
								background: linear-gradient(to right, <?php echo esc_attr( $btn_bg1_hover ); ?> 0%, <?php echo esc_attr( $btn_bg2_hover ); ?> 100%);
							}
						<?php endif; ?>
						<?php if ( $border_style == 'solid' && $border_color !== '' && $border_width !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id2 ); ?> .btn {
								border: <?php echo esc_attr( $border_width ); ?>px solid <?php echo esc_attr( $border_color ); ?>;
							}
							<?php if ( $border_radius !== '' ) : ?>
								#col-<?php echo esc_attr( $col_id2 ); ?> .btn {
									border-radius: <?php echo esc_attr( $border_radius ); ?>px;
								}	
							<?php endif; ?>
							<?php if ( $border_color_hover !== '' ) : ?>
								#col-<?php echo esc_attr( $col_id2 ); ?> .btn:hover {
									border-color: <?php echo esc_attr( $border_color_hover ); ?>;
								}	
							<?php endif; ?>
						<?php endif; ?>
					</style>
					<?php endif; ?>
					<div class="card card-shadow">
						<div class="p-40">
							<div class="d-flex no-block align-items-center">
								<div class="plan-text">
									<h4 class="m-b-0"><?php echo esc_html( $column_title ); ?></h4>
									<?php if ( ! empty( $column_desc ) ) : ?>
										<h6 class="subtitle"><?php echo esc_html( $column_desc ); ?></h6>
									<?php endif; ?>
								</div>
								<div class="pricing-text ml-auto"><sup><?php echo esc_html( $currency ); ?></sup><span><?php echo esc_html( $column_price ); ?></span></div>
							</div>
							<?php echo do_shortcode( $content ); ?>
							<?php if ( $show_btn == 'yes' ) : ?>
								<div class="ml-auto">
									<a class="btn btn-outline-danger btn-md btn-arrow" href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr( $link_title ); ?>" target="<?php echo esc_attr( $target ); ?>" rel="<?php echo esc_attr( $rel ); ?>"><span><?php echo esc_html( $column_btn_text ); ?><i class="ti-arrow-right"></i></span></a>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>

			<?php endif; ?>

			<?php if ( $col_style == 'style4' ) : ?>
				<?php
					if (
						$col_bg             !== '' ||
						$title_color        !== '' ||
						$title_desc_color   !== '' ||
						$price_color        !== '' ||
						$price_desc_color   !== '' ||
						$btn_color          !== '' ||
						$btn_color_hover    !== '' ||
						$btn_type           !== '' ||
						$btn_bg             !== '' ||
						$btn_bg_hover       !== '' ||
						$btn_bg1            !== '' ||
						$btn_bg2            !== '' ||
						$btn_bg1_hover      !== '' ||
						$btn_bg2_hover      !== '' ||
						$border_style       !== '' ||
						$border_color       !== '' ||
						$border_color_hover !== '' ||
						$border_width       !== '' ||
						$border_radius      !== ''
					) :
				?>
				<style type = "text/css" scoped>
					<?php if ( $col_bg !== '' ) : ?>
						#col-<?php echo esc_attr( $col_id3 ); ?> .card {
							background-color: <?php echo esc_attr( $col_bg ); ?>;
						}
					<?php endif; ?>
					<?php if ( $title_color !== '' ) : ?>
						#col-<?php echo esc_attr( $col_id3 ); ?> .p-30 h5 {
							color: <?php echo esc_attr( $title_color ); ?>;
						}
					<?php endif; ?>
					<?php if ( $title_desc_color !== '' ) : ?>
						#col-<?php echo esc_attr( $col_id3 ); ?> .subtitle {
							color: <?php echo esc_attr( $title_desc_color ); ?>;
						}
					<?php endif; ?>
					<?php if ( $price_color !== '' ) : ?>
						#col-<?php echo esc_attr( $col_id3 ); ?> .price {
							color: <?php echo esc_attr( $price_color ); ?>;
						}
					<?php endif; ?>
					<?php if ( $price_desc_color !== '' ) : ?>
						#col-<?php echo esc_attr( $col_id3 ); ?> .price small {
							color: <?php echo esc_attr( $price_desc_color ); ?>;
						}
					<?php endif; ?>
					<?php if ( $btn_color !== '' ) : ?>
						#col-<?php echo esc_attr( $col_id3 ); ?> .btn {
							color: <?php echo esc_attr( $btn_color ); ?>;
						}
					<?php endif; ?>
					<?php if ( $btn_color_hover !== '' ) : ?>
						#col-<?php echo esc_attr( $col_id3 ); ?> .btn:hover {
							color: <?php echo esc_attr( $btn_color_hover ); ?>;
						}
					<?php endif; ?>
					<?php if ( $btn_type == 'normal' && $btn_bg !== '' ) : ?>
						#col-<?php echo esc_attr( $col_id3 ); ?> .btn {
							background: <?php echo esc_attr( $btn_bg ); ?>;
						}
					<?php endif; ?>
					<?php if ( $btn_type == 'normal' && $btn_bg_hover !== '' ) : ?>
						#col-<?php echo esc_attr( $col_id3 ); ?> .btn:hover {
							background: <?php echo esc_attr( $btn_bg_hover ); ?>;
						}
					<?php endif; ?>
					<?php if ( $btn_type == 'gradient' && $btn_bg1 !== '' && $btn_bg2 !== '' ) : ?>
						#col-<?php echo esc_attr( $col_id3 ); ?> .btn {
							background: linear-gradient(to right, <?php echo esc_attr( $btn_bg1 ); ?> 0%, <?php echo esc_attr( $btn_bg2 ); ?> 100%);
						}
					<?php endif; ?>
					<?php if ( $btn_type == 'gradient' && $btn_bg1_hover !== '' && $btn_bg2_hover ) : ?>
						#col-<?php echo esc_attr( $col_id3 ); ?> .btn:hover {
							background: linear-gradient(to right, <?php echo esc_attr( $btn_bg1_hover ); ?> 0%, <?php echo esc_attr( $btn_bg2_hover ); ?> 100%);
						}
					<?php endif; ?>
					<?php if ( $border_style == 'solid' && $border_color !== '' && $border_width !== '' ) : ?>
						#col-<?php echo esc_attr( $col_id3 ); ?> .btn {
							border: <?php echo esc_attr( $border_width ); ?>px solid <?php echo esc_attr( $border_color ); ?>;
						}
						<?php if ( $border_radius !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id3 ); ?> .btn {
								border-radius: <?php echo esc_attr( $border_radius ); ?>px;
							}	
						<?php endif; ?>
						<?php if ( $border_color_hover !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id3 ); ?> .btn:hover {
								border-color: <?php echo esc_attr( $border_color_hover ); ?>;
							}	
						<?php endif; ?>
					<?php endif; ?>
				</style>
				<?php endif; ?>
				<div id="col-<?php echo esc_attr( $col_id3 ); ?>" class="col-md-<?php echo $columns; ?>">
					<div class="card card-shadow" data-aos="<?php echo esc_attr( $column_animation ); ?>" data-aos-duration="1200">
						<?php if ( $show_column_image == 'yes' ) : ?>
							<div class="sd-pricing-column-thumb">
								<?php echo wp_get_attachment_image( $column_img, array( 350, 253 ) );  ?>
							</div>
						<?php endif; ?>
						<div class="p-30">
							<?php if ( ! empty( $column_title ) ) : ?>
								<h5 class="font-medium m-b-0"><?php echo esc_html( $column_title ); ?></h5>
							<?php endif; ?>
							<?php if ( ! empty( $column_desc ) ) : ?>
								<h6 class="subtitle font-13"><?php echo esc_html( $column_desc ); ?></h6>
							<?php endif; ?>
							<?php echo do_shortcode( $content ); ?>
							<div class="d-flex m-t-30 align-items-center">
								<?php if ( ! empty( $column_price ) ) : ?>
									<h2 class="price"><?php echo esc_html( $column_price ); ?>
										<?php if ( ! empty( $column_price_desc ) ) : ?>
										<small><?php echo esc_html( $column_price_desc ); ?></small>
									<?php endif; ?>
									</h2>
								<?php endif; ?>
								<?php if ( $show_btn == 'yes' ) : ?>
									<div class="ml-auto">
										<a class="btn btn-info-gradiant" href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr( $link_title ); ?>" target="<?php echo esc_attr( $target ); ?>" rel="<?php echo esc_attr( $rel ); ?>"><?php echo esc_html( $column_btn_text ); ?></a>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( $col_style == 'style5' ) : ?>

				<?php
					if (
						$col_bg             !== '' ||
						$title_color        !== '' ||
						$price_color        !== '' ||
						$btn_color          !== '' ||
						$btn_color_hover    !== '' ||
						$btn_type           !== '' ||
						$btn_bg             !== '' ||
						$btn_bg_hover       !== '' ||
						$btn_bg1            !== '' ||
						$btn_bg2            !== '' ||
						$btn_bg1_hover      !== '' ||
						$btn_bg2_hover      !== '' ||
						$border_style       !== '' ||
						$border_color       !== '' ||
						$border_color_hover !== '' ||
						$border_width       !== '' ||
						$border_radius      !== ''
					) :
				?>
				<style type = "text/css" scoped>
					<?php if ( $col_bg !== '' ) : ?>
						#col-<?php echo esc_attr( $col_id4 ); ?> .card {
							background-color: <?php echo esc_attr( $col_bg ); ?> !important;
						}
					<?php endif; ?>
					<?php if ( $title_color !== '' ) : ?>
						#col-<?php echo esc_attr( $col_id4 ); ?> h6 {
							color: <?php echo esc_attr( $title_color ); ?> !important;
						}
					<?php endif; ?>
					<?php if ( $price_color !== '' ) : ?>
						#col-<?php echo esc_attr( $col_id4 ); ?> .monthly,
						#col-<?php echo esc_attr( $col_id4 ); ?> .yearly {
							color: <?php echo esc_attr( $price_color ); ?> !important;
						}
					<?php endif; ?>
					<?php if ( $btn_color !== '' ) : ?>
						#col-<?php echo esc_attr( $col_id4 ); ?> .btn {
							color: <?php echo esc_attr( $btn_color ); ?>;
						}
					<?php endif; ?>
					<?php if ( $btn_color_hover !== '' ) : ?>
						#col-<?php echo esc_attr( $col_id4 ); ?> .btn:hover {
							color: <?php echo esc_attr( $btn_color_hover ); ?>;
						}
					<?php endif; ?>
					<?php if ( $btn_type == 'normal' && $btn_bg !== '' ) : ?>
						#col-<?php echo esc_attr( $col_id4 ); ?> .btn {
							background: <?php echo esc_attr( $btn_bg ); ?>;
						}
					<?php endif; ?>
					<?php if ( $btn_type == 'normal' && $btn_bg_hover !== '' ) : ?>
						#col-<?php echo esc_attr( $col_id4 ); ?> .btn:hover {
							background: <?php echo esc_attr( $btn_bg_hover ); ?>;
						}
					<?php endif; ?>
					<?php if ( $btn_type == 'gradient' && $btn_bg1 !== '' && $btn_bg2 !== '' ) : ?>
						#col-<?php echo esc_attr( $col_id4 ); ?> .btn {
							background: linear-gradient(to right, <?php echo esc_attr( $btn_bg1 ); ?> 0%, <?php echo esc_attr( $btn_bg2 ); ?> 100%);
						}
					<?php endif; ?>
					<?php if ( $btn_type == 'gradient' && $btn_bg1_hover !== '' && $btn_bg2_hover ) : ?>
						#col-<?php echo esc_attr( $col_id4 ); ?> .btn:hover {
							background: linear-gradient(to right, <?php echo esc_attr( $btn_bg1_hover ); ?> 0%, <?php echo esc_attr( $btn_bg2_hover ); ?> 100%);
						}
					<?php endif; ?>
					<?php if ( $border_style == 'solid' && $border_color !== '' && $border_width !== '' ) : ?>
						#col-<?php echo esc_attr( $col_id4 ); ?> .btn {
							border: <?php echo esc_attr( $border_width ); ?>px solid <?php echo esc_attr( $border_color ); ?>;
						}
						<?php if ( $border_radius !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id4 ); ?> .btn {
								border-radius: <?php echo esc_attr( $border_radius ); ?>px;
							}	
						<?php endif; ?>
						<?php if ( $border_color_hover !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id4 ); ?> .btn:hover {
								border-color: <?php echo esc_attr( $border_color_hover ); ?>;
							}	
						<?php endif; ?>
					<?php endif; ?>
				</style>
				<?php endif; ?>

				<?php $featured = ( $col_featured == 'yes' ) ? 'middle-box' : '' ?>
				<div id="col-<?php echo esc_attr( $col_id4 ); ?>" class="col-md-4 <?php echo esc_attr( $featured ); ?>">
					<div class="card card-shadow" style=" <?php if ( $col5_bg !== '' ) echo 'background:url('. wp_get_attachment_url( $col5_bg, 'full' ) . ')no-repeat' ; ?>">
						<div class="card-body">
						<span class="wyborpremium" style="color:#fff; display:none; font-weight: 700;">Najczęstszy wybór</span>
						<span class="wyborpremiumen" style="color:#fff; display:none; font-weight: 700;">Best seller</span>
							<h6 class="text-white m-t-30 m-b-0"><?php echo esc_html( $column_title ); ?></h6>
							<h2 class="text-white m-t-0 monthly"><?php echo esc_html( $column_price ); ?></h2>
							<?php if ( ! empty( $yearly_price ) ) : ?>
								<h2 class="text-white m-t-0 yearly"><?php echo esc_html( $yearly_price ); ?></h2>
							<?php endif; ?>
							<?php if ( $col_featured == 'yes' ) : ?>
								<div class="star-plan m-t-20"><img src="<?php echo get_template_directory_uri(); ?>/framework/images/star.png" alt="wrapkit" /></div>
							<?php endif; ?>
							<?php echo do_shortcode( $content ); ?>
							<?php if ( $show_btn == 'yes' ) : ?>
								<?php $btn_class = ( $col_featured == 'yes' ) ? 'btn-danger-gradiant' : 'btn-outline-danger' ?>
								<a class="btn btn-md btn-arrow btn-rounded m-b-20 <?php echo esc_attr( $btn_class ); ?>" data-toggle="collapse" href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr( $link_title ); ?>" target="<?php echo esc_attr( $target ); ?>" rel="<?php echo esc_attr( $rel ); ?>">
									<span><?php echo esc_html( $column_btn_text ); ?> <i class="ti-arrow-right"></i></span>
								</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
			
			<?php if ( $col_style == 'style6' ) : ?>
				<?php
					if (
						$col_bg             !== '' ||
						$title_color        !== '' ||
						$price_color        !== '' ||
						$price_desc_color   !== '' ||
						$btn_color          !== '' ||
						$btn_color_hover    !== '' ||
						$btn_type           !== '' ||
						$btn_bg             !== '' ||
						$btn_bg_hover       !== '' ||
						$btn_bg1            !== '' ||
						$btn_bg2            !== '' ||
						$btn_bg1_hover      !== '' ||
						$btn_bg2_hover      !== '' ||
						$border_style       !== '' ||
						$border_color       !== '' ||
						$border_color_hover !== '' ||
						$border_width       !== '' ||
						$border_radius      !== '' ||
						$feat_bg            !== '' ||
						$feat_text_color    !== ''
					) :
				?>
					<style type = "text/css" scoped>
						<?php if ( $col_bg !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id5 ); ?> .card {
								background-color: <?php echo esc_attr( $col_bg ); ?>;
							}
						<?php endif; ?>
						<?php if ( $title_color !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id5 ); ?> .d-flex h5 {
								color: <?php echo esc_attr( $title_color ); ?>;
							}
						<?php endif; ?>
					<?php if ( $price_color !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id5 ); ?> .price-box .text-dark {
								color: <?php echo esc_attr( $price_color ); ?> !important;
							}
						<?php endif; ?>
						<?php if ( $price_desc_color !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id5 ); ?> .price-box h6,
							#col-<?php echo esc_attr( $col_id5 ); ?> .price-box sup {
								color: <?php echo esc_attr( $price_desc_color ); ?>;
							}
						<?php endif; ?>
						<?php if ( $btn_color !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id5 ); ?> .btn {
								color: <?php echo esc_attr( $btn_color ); ?>;
							}
						<?php endif; ?>
						<?php if ( $btn_color_hover !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id5 ); ?> .btn:hover {
								color: <?php echo esc_attr( $btn_color_hover ); ?>;
							}
						<?php endif; ?>
						<?php if ( $btn_type == 'normal' && $btn_bg !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id5 ); ?> .btn {
								background: <?php echo esc_attr( $btn_bg ); ?>;
							}
						<?php endif; ?>
						<?php if ( $btn_type == 'normal' && $btn_bg_hover !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id5 ); ?> .btn:hover {
								background: <?php echo esc_attr( $btn_bg_hover ); ?>;
							}
						<?php endif; ?>
						<?php if ( $btn_type == 'gradient' && $btn_bg1 !== '' && $btn_bg2 !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id5 ); ?> .btn {
								background: linear-gradient(to right, <?php echo esc_attr( $btn_bg1 ); ?> 0%, <?php echo esc_attr( $btn_bg2 ); ?> 100%);
							}
						<?php endif; ?>
						<?php if ( $btn_type == 'gradient' && $btn_bg1_hover !== '' && $btn_bg2_hover ) : ?>
							#col-<?php echo esc_attr( $col_id5 ); ?> .btn:hover {
								background: linear-gradient(to right, <?php echo esc_attr( $btn_bg1_hover ); ?> 0%, <?php echo esc_attr( $btn_bg2_hover ); ?> 100%);
							}
						<?php endif; ?>
						<?php if ( $border_style == 'solid' && $border_color !== '' && $border_width !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id5 ); ?> .btn {
								border: <?php echo esc_attr( $border_width ); ?>px solid <?php echo esc_attr( $border_color ); ?>;
							}
							<?php if ( $border_radius !== '' ) : ?>
								#col-<?php echo esc_attr( $col_id5 ); ?> .btn {
									border-radius: <?php echo esc_attr( $border_radius ); ?>px;
								}	
							<?php endif; ?>
							<?php if ( $border_color_hover !== '' ) : ?>
								#col-<?php echo esc_attr( $col_id5 ); ?> .btn:hover {
									border-color: <?php echo esc_attr( $border_color_hover ); ?>;
								}	
							<?php endif; ?>
						<?php endif; ?>
						<?php if ( $feat_text_color !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id5 ); ?> .badge {
								color: <?php echo esc_attr( $feat_text_color ); ?>;
							}	
						<?php endif; ?>
						<?php if ( $feat_bg !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id5 ); ?> .badge {
								background-color: <?php echo esc_attr( $feat_bg ); ?>;
							}	
						<?php endif; ?>
					</style>
				<?php endif; ?>
				<div id="col-<?php echo esc_attr( $col_id5 ); ?>" class="col-md-6">
					<div class="card card-shadow">
						<div class="card-body p-30">
						
							<div class="d-flex align-items-center no-block">
								<h5 class="font-medium m-b-0"><?php echo esc_html( $column_title ); ?></h5>
								<?php if ( $col_featured == 'yes' ) : ?>
									<div class="ml-auto"><span class="badge badge-danger p-10"><?php echo esc_html( $featured_txt ); ?></span></div>
								<?php endif; ?>
							</div>
							<div class="row">
								<div class="col-lg-5 text-center">
									<div class="price-box">
										<?php if ( $currency !== '' ) : ?>
											<sup><?php echo esc_html( $currency ); ?></sup>
										<?php endif; ?>
										<span class="text-dark display-5"><?php echo esc_html( $column_price ); ?></span>
										<?php if ( $column_price_desc !== '' ) : ?>
											<h6 class="font-light"><?php echo esc_html( $column_price_desc ); ?></h6>
										<?php endif; ?>
										<?php if ( $show_btn == 'yes' ) : ?>
											<a class="btn btn-info-gradiant p-15 btn-arrow btn-block m-t-20" data-toggle="collapse" href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr( $link_title ); ?>" target="<?php echo esc_attr( $target ); ?>" rel="<?php echo esc_attr( $rel ); ?>">
												<span><?php echo esc_html( $column_btn_text ); ?> <i class="ti-arrow-right"></i></span>
											</a>
										<?php endif; ?>
									</div>
								</div>
								<div class="col-lg-7 align-self-center">
									<?php echo do_shortcode( $content ); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( $col_style == 'style7' ) : ?>
				<?php
					if (
						$col_bg             !== '' ||
						$title_color        !== '' ||
						$price_color        !== '' ||
						$price_desc_color   !== '' ||
						$btn_color          !== '' ||
						$btn_color_hover    !== '' ||
						$btn_type           !== '' ||
						$btn_bg             !== '' ||
						$btn_bg_hover       !== '' ||
						$btn_bg1            !== '' ||
						$btn_bg2            !== '' ||
						$btn_bg1_hover      !== '' ||
						$btn_bg2_hover      !== '' ||
						$border_style       !== '' ||
						$border_color       !== '' ||
						$border_color_hover !== '' ||
						$border_width       !== '' ||
						$border_radius      !== '' ||
						$feat_bg            !== '' ||
						$feat_text_color    !== ''
					) :
				?>
					<style type = "text/css" scoped>
						<?php if ( $col_bg !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id6 ); ?> .card {
								background-color: <?php echo esc_attr( $col_bg ); ?>;
							}
						<?php endif; ?>
						<?php if ( $title_color !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id6 ); ?> .pricing7-title {
								color: <?php echo esc_attr( $title_color ); ?>;
							}
						<?php endif; ?>
					<?php if ( $price_color !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id6 ); ?> .pricing7-price {
								color: <?php echo esc_attr( $price_color ); ?> !important;
							}
						<?php endif; ?>
						<?php if ( $price_desc_color !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id6 ); ?> .pricing7-desc,
							#col-<?php echo esc_attr( $col_id6 ); ?> .pricing7-currency {
								color: <?php echo esc_attr( $price_desc_color ); ?>;
							}
						<?php endif; ?>
						<?php if ( $btn_color !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id6 ); ?> .btn {
								color: <?php echo esc_attr( $btn_color ); ?>;
							}
						<?php endif; ?>
						<?php if ( $btn_color_hover !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id6 ); ?> .btn:hover {
								color: <?php echo esc_attr( $btn_color_hover ); ?>;
							}
						<?php endif; ?>
						<?php if ( $btn_type == 'normal' && $btn_bg !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id6 ); ?> .btn {
								background: <?php echo esc_attr( $btn_bg ); ?>;
							}
						<?php endif; ?>
						<?php if ( $btn_type == 'normal' && $btn_bg_hover !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id6 ); ?> .btn:hover {
								background: <?php echo esc_attr( $btn_bg_hover ); ?>;
							}
						<?php endif; ?>
						<?php if ( $btn_type == 'gradient' && $btn_bg1 !== '' && $btn_bg2 !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id6 ); ?> .btn {
								background: linear-gradient(to right, <?php echo esc_attr( $btn_bg1 ); ?> 0%, <?php echo esc_attr( $btn_bg2 ); ?> 100%);
							}
						<?php endif; ?>
						<?php if ( $btn_type == 'gradient' && $btn_bg1_hover !== '' && $btn_bg2_hover ) : ?>
							#col-<?php echo esc_attr( $col_id6 ); ?> .btn:hover {
								background: linear-gradient(to right, <?php echo esc_attr( $btn_bg1_hover ); ?> 0%, <?php echo esc_attr( $btn_bg2_hover ); ?> 100%);
							}
						<?php endif; ?>
						<?php if ( $border_style == 'solid' && $border_color !== '' && $border_width !== '' ) : ?>
							#col-<?php echo esc_attr( $col_id6 ); ?> .btn {
								border: <?php echo esc_attr( $border_width ); ?>px solid <?php echo esc_attr( $border_color ); ?>;
							}
							<?php if ( $border_radius !== '' ) : ?>
								#col-<?php echo esc_attr( $col_id6 ); ?> .btn {
									border-radius: <?php echo esc_attr( $border_radius ); ?>px;
								}	
							<?php endif; ?>
							<?php if ( $border_color_hover !== '' ) : ?>
								#col-<?php echo esc_attr( $col_id6 ); ?> .btn:hover {
									border-color: <?php echo esc_attr( $border_color_hover ); ?>;
								}	
							<?php endif; ?>
						<?php endif; ?>
					</style>
				<?php endif; ?>
				<div id="col-<?php echo esc_attr( $col_id6 ); ?>" class="col-md-<?php echo $columns; ?> pricing-box align-self-center">
					<div class="card b-all ">
						<div class="card-body p-30 text-center">
							<h5 class="pricing7-title"><?php echo esc_html( $column_title ); ?></h5>
							<?php if ( $currency !== '' ) : ?>
								<sup class="pricing7-currency"><?php echo esc_html( $currency ); ?></sup>
							<?php endif; ?>
							<span class="text-dark display-5 pricing7-price"><?php echo esc_html( $column_price ); ?></span>
							<?php if ( $column_price_desc !== '' ) : ?>
								<h6 class="font-light font-14 pricing7-desc"><?php echo esc_html( $column_price_desc ); ?></h6>
							<?php endif; ?>
							<?php echo do_shortcode( $content ); ?>
						</div>
						<?php if ( $show_btn == 'yes' ) : ?>
							<a class="btn btn-info-gradiant p-15 btn-arrow btn-block" data-toggle="collapse" href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr( $link_title ); ?>" target="<?php echo esc_attr( $target ); ?>" rel="<?php echo esc_attr( $rel ); ?>">
								<span><?php echo esc_html( $column_btn_text ); ?> <i class="ti-arrow-right"></i></span>
							</a>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
			
		<?php return ob_get_clean();	
	}
}
// Register shortcode to VC

if ( ! function_exists( 'sd_pricing_table_column_vcmap' ) ) {

	add_action( 'init', 'sd_pricing_table_column_vcmap' );

	function sd_pricing_table_column_vcmap() {
		
		
		vc_map( array(
			'name'            => esc_html__( 'Pricing Table Column', 'wrapkit' ),
			'description'     => esc_html__( 'Pricing Table Column', 'wrapkit' ),
			'base'            => "sd_pricing_column",
			'class'           => "sd_pricing_column",
			'category'        => esc_html__( 'WrapKit', 'wrapkit' ),
			'as_child'        => array( 'only' => 'sd_pricing_table' ),
			"is_container"    => false,
			//'icon'              => get_template_directory_uri() . '/framework/inc/vc/assets/icons/blog-icon.png',
			'params'            => array(
				array(
					'type'			=> 'dropdown',
					'class'			=> '',
					'heading'		=> esc_html__( 'Column Style', 'wrapkit' ),
					'param_name'	=> 'col_style',
					'value' => 
						array( 
							esc_html__( 'Style 1', 'wrapkit') => 'style1',
							esc_html__( 'Style 2', 'wrapkit') => 'style2',
							esc_html__( 'Style 4', 'wrapkit') => 'style4',
							esc_html__( 'Style 5', 'wrapkit') => 'style5',
							esc_html__( 'Style 6', 'wrapkit') => 'style6',
							esc_html__( 'Style 7', 'wrapkit') => 'style7',
						),
					'save_always' => true,
					'description' => esc_html__( 'Select the style of the column (must match the style of the table)', 'wrapkit' ),
				),
				array(
					'type'        => 'checkbox',
					'param_name'  => 'show_column_image',
					'heading'     => esc_html__( 'Show Column Image?', 'wrapkit' ),
					'description' => esc_html__( 'Check to display the column image.', 'wrapkit' ),
					'value'       => array( esc_html__( 'Yes', 'wrapkit' ) => 'yes' ),
					'dependency'  => array(
						'element' => 'col_style',
						'value'   => array( 'style4' ),
					),
				),
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__( 'Column Image', 'wrapkit' ),
					'param_name'  => 'column_img',
					'description' => esc_html__( 'Upload column image.', 'wrapkit' ),
					'dependency'  => array(
						'element' => 'show_column_image',
						'value'   => array( 'yes' ),
					),
				),
				array(
					'type'        => 'textfield',
					'class'       => '',
					'heading'     => esc_html__( 'Column Title', 'wrapkit' ),
					'description' => esc_html__( 'Insert the column title.', 'wrapkit' ),
					'param_name'  => 'column_title',
					'value'       => '',
					'save_always' => true,
					'admin_label' => true,
				),
				array(
					'type'        => 'textfield',
					'class'       => '',
					'heading'     => esc_html__( 'Column Description', 'wrapkit' ),
					'description' => esc_html__( 'Leave blank to hide', 'wrapkit' ),
					'param_name'  => 'column_desc',
					'value'       => '',
					'save_always' => true,
					'dependency'  => array(
						'element' => 'col_style',
						'value'   => array( 'style4', 'style1', 'style2' ),
					),
				),
				array(
					'type'        => 'textarea_html',
					'class'       => '',
					'heading'     => esc_html__( 'Column Content', 'wrapkit' ),
					'description' => esc_html__( 'Insert the column options', 'wrapkit' ),
					'param_name'  => 'content',
					'value'       => '',
					'save_always' => true,
				),
				array(
					'type'        => 'textfield',
					'class'       => '',
					'heading'     => esc_html__( 'Price', 'wrapkit' ),
					'description' => esc_html__( 'Leave blank to hide', 'wrapkit' ),
					'param_name'  => 'column_price',
					'value'       => '',
					'save_always' => true,
				),
				array(
					'type'        => 'textfield',
					'class'       => '',
					'heading'     => esc_html__( 'Currency', 'wrapkit' ),
					'description' => esc_html__( 'Leave blank to hide (ie. $)', 'wrapkit' ),
					'param_name'  => 'currency',
					'value'       => '',
					'save_always' => true,
					'dependency'  => array(
						'element' => 'col_style',
						'value'   => array( 'style1', 'style2', 'style6', 'style7' ),
					),
				),
				array(
					'type'        => 'textfield',
					'class'       => '',
					'heading'     => esc_html__( 'Yearly Price', 'wrapkit' ),
					'description' => esc_html__( 'If month/yearly switch is enabled.', 'wrapkit' ),
					'param_name'  => 'yearly_price',
					'value'       => '',
					'save_always' => true,
					'dependency'  => array(
						'element' => 'col_style',
						'value'   => array( 'style5', 'style1' ),
					),
				),
				array(
					'type'        => 'textfield',
					'class'       => '',
					'heading'     => esc_html__( 'Price Description', 'wrapkit' ),
					'description' => esc_html__( 'Leave blank to hide', 'wrapkit' ),
					'param_name'  => 'column_price_desc',
					'value'       => '',
					'save_always' => true,
					'dependency'  => array(
						'element' => 'col_style',
						'value'   => array( 'style4', 'style1', 'style6', 'style7' ),
					),
				),
				array(
					'type'        => 'textfield',
					'class'       => '',
					'heading'     => esc_html__( 'Yearly Price Description', 'wrapkit' ),
					'description' => esc_html__( 'Leave blank to hide', 'wrapkit' ),
					'param_name'  => 'column_yr_price_desc',
					'value'       => '',
					'save_always' => true,
					'dependency'  => array(
						'element' => 'yearly_price',
						'not_empty'   => true,
					),
				),
				array(
					'type'        => 'checkbox',
					'param_name'  => 'col_featured',
					'heading'     => esc_html__( 'Featured Column?', 'wrapkit' ),
					'description' => esc_html__( 'Check to display the column image.', 'wrapkit' ),
					'value'       => array( esc_html__( 'Yes', 'wrapkit' ) => 'yes' ),
					'dependency'  => array(
						'element' => 'col_style',
						'value'   => array( 'style5', 'style1', 'style2', 'style6' ),
					),
				),
				array(
					'type'        => 'textfield',
					'class'       => '',
					'heading'     => esc_html__( 'Featured Text', 'wrapkit' ),
					'description' => esc_html__( 'Insert the featured text (ie. Popular) (if applicable)', 'wrapkit' ),
					'param_name'  => 'featured_txt',
					'value'       => '',
					'save_always' => true,
					'dependency'  => array(
						'element' => 'col_featured',
						'value'   => array( 'yes' ),
					),
				),
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__( 'Column Top Background', 'wrapkit' ),
					'param_name'  => 'col5_bg',
					'description' => esc_html__( 'Upload column background.', 'wrapkit' ),
					'dependency'  => array(
						'element' => 'col_style',
						'value'   => array( 'style5' ),
					),
				),
				array(
					'type'        => 'checkbox',
					'param_name'  => 'show_btn',
					'heading'     => esc_html__( 'Show Button?', 'wrapkit' ),
					'description' => esc_html__( 'Check to display the button.', 'wrapkit' ),
					'value'       => array( esc_html__( 'Yes', 'wrapkit' ) => 'yes' ),
				),
				array(
					'type'        => 'textfield',
					'class'       => '',
					'heading'     => esc_html__( 'Button Text', 'wrapkit' ),
					'description' => esc_html__( 'Insert the button text', 'wrapkit' ),
					'param_name'  => 'column_btn_text',
					'value'       => '',
					'save_always' => true,
					'dependency'  => array(
						'element' => 'show_btn',
						'value'   => array( 'yes' ),
					),
				),
				array(
					'type'        => 'vc_link',
					'heading'     => esc_html__( 'Button Link', 'wrapkit' ),
					'param_name'  => 'column_btn_link',
					'dependency'  => array(
						'element' => 'show_btn',
						'value'   => array( 'yes' ),
					),
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Animation', 'wrapkit' ),
					'param_name'  => 'column_animation',
					'save_always' => true,
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
					'dependency'  => array(
						'element' => 'col_style',
						'value'   => array( 'style4', 'style1' ),
					),
				),

				// Styling

				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Column Background Color', 'wrapkit' ),
					'param_name'  => 'col_bg',
					'value'       => '',
					'group'       => esc_html__( 'Styling', 'wrapkit' ),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Title Color', 'wrapkit' ),
					'param_name'  => 'title_color',
					'value'       => '',
					'group'       => esc_html__( 'Styling', 'wrapkit' ),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Title Desc. Color', 'wrapkit' ),
					'param_name'  => 'title_desc_color',
					'value'       => '',
					'group'       => esc_html__( 'Styling', 'wrapkit' ),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Price Color', 'wrapkit' ),
					'param_name'  => 'price_color',
					'value'       => '',
					'group'       => esc_html__( 'Styling', 'wrapkit' ),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Price Desc. Color', 'wrapkit' ),
					'param_name'  => 'price_desc_color',
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
					'save_always' => true,
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
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Button Border Style', 'wrapkit' ),
					'param_name'  => 'border_style',
					'group'       => esc_html__( 'Styling', 'wrapkit' ),
					'save_always' => true,
					'value'       => 
						array( 
							esc_html__( 'None', 'wrapkit' )  => 'none',
							esc_html__( 'Solid', 'wrapkit' ) => 'solid',
						),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Border Color', 'wrapkit' ),
					'param_name'  => 'border_color',
					'value'       => '',
					'group'       => esc_html__( 'Styling', 'wrapkit' ),
					'dependency'  => array(
						'element' => 'border_style',
						'value'   => array( 'solid' ),
					),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Border Color Hover', 'wrapkit' ),
					'param_name'  => 'border_color_hover',
					'value'       => '',
					'group'       => esc_html__( 'Styling', 'wrapkit' ),
					'dependency'  => array(
						'element' => 'border_style',
						'value'   => array( 'solid' ),
					),
				),
				array(
					'type'       => 'number',
					'heading'    => esc_html__( 'Border Width', 'wrapkit' ),
					'param_name' => 'border_width',
					'value'      => '',
					'min'        => 0,
					'max'        => 10,
					'suffix'     => 'px',
					'group'      => esc_html__( 'Styling', 'wrapkit' ),
					'dependency' => array(
						'element' => 'border_style',
						'value'   => array( 'solid' ),
					),
				),
				array(
					'type'       => 'number',
					'heading'    => esc_html__( 'Border Radius', 'wrapkit' ),
					'param_name' => 'border_radius',
					'value'      => '',
					'min'        => 0,
					'max'        => 500,
					'suffix'     => 'px',
					'group'      => esc_html__( 'Styling', 'wrapkit' ),
					'dependency' => array(
						'element' => 'border_style',
						'value'   => array( 'solid' ),
					),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Featured Text Background Color', 'wrapkit' ),
					'param_name'  => 'feat_bg',
					'value'       => '',
					'group'       => esc_html__( 'Styling', 'wrapkit' ),
					'dependency'  => array(
						'element' => 'col_featured',
						'value'   => array( 'yes' ),
					),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Featured Text Color', 'wrapkit' ),
					'param_name'  => 'feat_text_color',
					'value'       => '',
					'group'       => esc_html__( 'Styling', 'wrapkit' ),
					'dependency'  => array(
						'element' => 'col_featured',
						'value'   => array( 'yes' ),
					),
				),
			),
		));
	}
}
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_sd_pricing_table extends WPBakeryShortCodesContainer {
	}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_sd_pricing_column extends WPBakeryShortCode {
	}
}