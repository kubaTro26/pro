<?php
/**
 * Tabs VC Shortcode
 *
 * @package	wrapkit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
if ( ! function_exists( 'sd_tabs_func' ) ) {

	add_shortcode( 'sd_tabs','sd_tabs_func' );

	function sd_tabs_func( $atts, $content = null ) {

		global $tab_panels;
	
		$sd = shortcode_atts( array(
			'style'  => '',
		), $atts );

		$tab_panels         = array();
		$tab_panels_content = do_shortcode( $content );
		$tabs_id            = 'sd-tabs-' . uniqid();
		$style              = $sd['style'];

		

		ob_start();
		?>
			
			<div class="row m-t-40 wrap-feature41-box">
                            
                            <div class="col-lg-4">
                                <ul class="nav vtab f41-tab">
								<?php foreach ( $tab_panels as $key => $val ): ?>
									<?php $active = ( $val['tab_active'] == 'yes' ) ? 'active' : ''; ?>
                                    <li class="nav-item">
                                        <a class="nav-link <?php echo esc_attr( $active ); ?>" data-toggle="tab" href="#<?php echo esc_attr( $val['tab_id'] ); ?>">
										<?php if ( ! empty( $val['icon_class'] ) ) : ?>
											<div class="display-5 t-icon"><i class="<?php echo esc_attr( $val['icon_class'] ); ?>"></i></div>
										<?php endif; ?>
										<div>
											<?php if ( ! empty( $val['tab_title'] ) ) : ?>
												<h5 class="m-b-0"><?php echo esc_html( $val['tab_title'] ); ?></h5>
											<?php endif; ?>
											<?php if ( ! empty( $val['tab_desc'] ) ) : ?>
												<h6 class="subtitle"><?php echo esc_html( $val['tab_desc'] ); ?></h6>
											<?php endif; ?>
										</div>
                                        </a>
									</li>
								<?php endforeach; ?>
                                </ul>
                            </div>
                            
							<div class="col-lg-7 ml-auto">
								<div class="tab-content">
									<?php echo $tab_panels_content; ?>
								</div>
							</div>
                            
                        </div>


		<?php return ob_get_clean();	
	}
}
if ( ! function_exists( 'sd_tabs_panel_func' ) ) {

	add_shortcode( 'sd_tabs_panel','sd_tabs_panel_func' );

	function sd_tabs_panel_func( $atts, $content = null ) {
		
		$sd = shortcode_atts( array(
			'tab_title'        => '',
			'tab_desc'         => '',
			'tab_active'       => '',
			'show_icon'        => '',
			'icon_type'        => '',
			'icon_fontawesome' => '',
			'icon_openiconic'  => '',
			'icon_typicons'    => '',
			'icon_entypo'      => '',
			'icon_linecons'    => '',
			'icon_monosocial'  => '',
			'icon_material'    => '',
			'icon_icomoon'     => '',
		), $atts );

		global $tab_panels;

		$panel_id         = 'sd-tab-' . uniqid();
		$tab_title        = $sd['tab_title'];
		$tab_desc         = $sd['tab_desc'];
		$tab_active       = $sd['tab_active'];
		$show_icon        = $sd['show_icon'];
		$icon_type        = $sd['icon_type'];
		$icon_fontawesome = $sd['icon_fontawesome'];
		$icon_openiconic  = $sd['icon_openiconic'];
		$icon_typicons    = $sd['icon_typicons'];
		$icon_entypo      = $sd['icon_entypo'];
		$icon_linecons    = $sd['icon_linecons'];
		$icon_monosocial  = $sd['icon_monosocial'];
		$icon_material    = $sd['icon_material'];
		$icon_icomoon     = $sd['icon_icomoon'];
		$icon_class       = isset( ${'icon_' . $icon_type} ) ? ${'icon_' . $icon_type} : '';
		
		$tab_panels[] = array(
			'tab_id'     => $panel_id,
			'tab_title'  => $tab_title,
			'tab_desc'   => $tab_desc,
			'tab_active' => $tab_active,
			'show_icon'  => $show_icon,
			'icon_class' => $icon_class,
		);

		$active = ( $tab_active == 'yes' ) ? 'show active' : '';

		vc_icon_element_fonts_enqueue( $icon_type );
		
		ob_start();
		?>

			<div class="tab-pane fade <?php echo esc_attr( $active ); ?>" id="<?php echo esc_attr( $panel_id ); ?>" role="tabpanel">
				<?php echo do_shortcode( $content ); ?>
			</div>
			
				
		<?php return ob_get_clean();	
	}
}
// Register shortcode to VC
if ( ! function_exists( 'sd_tabs_vcmap' ) ) {

	add_action( 'init', 'sd_tabs_vcmap' );	

	function sd_tabs_vcmap() {

		vc_map( array(
			'name'            => esc_html__( 'Wrapkit Tabs', 'wrapkit' ),
			'description'     => esc_html__( 'Wrapkit Tabs', 'wrapkit' ),
			'base'            => "sd_tabs",
			'class'           => "sd_tabs",
			'category'        => esc_html__( 'WrapKit', 'wrapkit' ),
			'as_parent'       => array( 'only' => 'sd_tabs_panel' ),
			'content_element' => true,
			'js_view'         => 'VcColumnView',
			'icon'              => plugin_dir_url( __DIR__ ) . 'images/vc-icons/tabs-icon-min.png',
			'params'            => array(
				array(
					'type'			=> 'dropdown',
					'class'			=> '',
					'heading'		=> esc_html__( 'Style', 'wrapkit' ),
					'param_name'	=> 'style',
					'value' => 
						array( 
							esc_html__( 'Style 1', 'wrapkit') => 'style1',
						),
					'save_always'   => true,
					'description'	=> esc_html__( 'Select the style of the tab', 'wrapkit' ),
				),
			),
		));
	}
}
// Register shortcode to VC
if ( ! function_exists( 'sd_tabs_panel_vcmap' ) ) {

	add_action( 'init', 'sd_tabs_panel_vcmap' );	

	function sd_tabs_panel_vcmap() {
		vc_map( array(
			'name'            => esc_html__( 'Tab Panel', 'wrapkit' ),
			'description'     => esc_html__( 'Tab Panel', 'wrapkit' ),
			'base'            => "sd_tabs_panel",
			'class'           => "sd_tabs_panel",
			'category'        => esc_html__( 'WrapKit', 'wrapkit' ),
			'as_child'        => array( 'only' => 'sd_tabs' ),
			'as_parent'       => array('except' => 'sd_tabs_panel'),
			'content_element' => true,
			'js_view'         => 'VcColumnView',
			'icon'              => plugin_dir_url( __DIR__ ) . 'images/vc-icons/tabs-icon-min.png',
			'params'            => array(
				array(
					'type'        => 'textfield',
					'class'       => '',
					'heading'     => esc_html__( 'Tab Title', 'wrapkit' ),
					'description' => esc_html__( 'Insert the tab title.', 'wrapkit' ),
					'param_name'  => 'tab_title',
					'value'       => esc_html__( 'Tab Title', 'wrapkit' ),
					'save_always' => true,
					'admin_label' => true,
				),
				array(
					'type'        => 'textarea',
					'class'       => '',
					'heading'     => esc_html__( 'Tab Description', 'wrapkit' ),
					'description' => esc_html__( 'Insert a short tab description.', 'wrapkit' ),
					'param_name'  => 'tab_desc',
					'save_always' => true,
				),
				array(
					'type'        => 'checkbox',
					'param_name'  => 'tab_active',
					'heading'     => esc_html__( 'Make this tab active first', 'wrapkit' ),
					'description' => esc_html__( 'Check to make active (only one tab can be set as active).', 'wrapkit' ),
					'value'       => array( esc_html__( 'Yes', 'wrapkit' ) => 'yes' ),
					'save_always' => true,
				),
				array(
					'type'        => 'checkbox',
					'param_name'  => 'show_icon',
					'heading'     => esc_html__( 'Show Icon?', 'wrapkit' ),
					'description' => esc_html__( 'Check to display an icon.', 'wrapkit' ),
					'value'       => array( esc_html__( 'Yes', 'wrapkit' ) => 'yes' ),
					'save_always' => true,
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Icon library', 'wrapkit' ),
					'value' => array(
						esc_html__( 'Font Awesome', 'wrapkit' ) => 'fontawesome',
						esc_html__( 'Open Iconic', 'wrapkit' )  => 'openiconic',
						esc_html__( 'Typicons', 'wrapkit' )     => 'typicons',
						esc_html__( 'Entypo', 'wrapkit' )       => 'entypo',
						esc_html__( 'Linecons', 'wrapkit' )     => 'linecons',
						esc_html__( 'Mono Social', 'wrapkit' )  => 'monosocial',
						esc_html__( 'Material', 'wrapkit' )     => 'material',
					),
					'admin_label' => true,
					'save_always' => true,
					'param_name' => 'icon_type',
					'description' => esc_html__( 'Select icon library.', 'wrapkit' ),
					'dependency' => array(
						'element' => 'show_icon',
						'value'   => 'yes',
					),
				),
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__( 'Icon', 'wrapkit' ),
					'param_name' => 'icon_fontawesome',
					'value'      => 'fa fa-adjust',
					'settings'   => array(
						'emptyIcon'    => false,
						'iconsPerPage' => 4000,
					),
					'dependency' => array(
						'element' => 'icon_type',
						'value'   => 'fontawesome',
					),
					'description' => esc_html__( 'Select icon from library.', 'wrapkit' ),
				),
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__( 'Icon', 'wrapkit' ),
					'param_name' => 'icon_openiconic',
					'value'      => 'vc-oi vc-oi-dial',
					'settings'   => array(
						'emptyIcon'    => false,
						'type'         => 'openiconic',
						'iconsPerPage' => 4000,
					),
					'dependency' => array(
						'element' => 'icon_type',
						'value'   => 'openiconic',
					),
					'description' => esc_html__( 'Select icon from library.', 'wrapkit' ),
				),
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__( 'Icon', 'wrapkit' ),
					'param_name' => 'icon_typicons',
					'value'      => 'typcn typcn-adjust-brightness',
					'settings'   => array(
						'emptyIcon'    => false,
						'type'         => 'typicons',
						'iconsPerPage' => 4000,
					),
					'dependency' => array(
						'element' => 'icon_type',
						'value'   => 'typicons',
					),
					'description' => esc_html__( 'Select icon from library.', 'wrapkit' ),
				),
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__( 'Icon', 'wrapkit' ),
					'param_name' => 'icon_entypo',
					'value'      => 'entypo-icon entypo-icon-note',
					'settings'   => array(
						'emptyIcon'    => false,
						'type'         => 'entypo',
						'iconsPerPage' => 4000,
					),
					'dependency' => array(
						'element' => 'icon_type',
						'value'   => 'entypo',
					),
				),
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__( 'Icon', 'wrapkit' ),
					'param_name' => 'icon_linecons',
					'value'      => 'vc_li vc_li-heart',
					'settings'   => array(
						'emptyIcon'    => false,
						'type'         => 'linecons',
						'iconsPerPage' => 4000,
					),
					'dependency' => array(
						'element' => 'icon_type',
						'value'   => 'linecons',
					),
					'description' => esc_html__( 'Select icon from library.', 'wrapkit' ),
				),
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__( 'Icon', 'wrapkit' ),
					'param_name' => 'icon_monosocial',
					'value'      => 'vc-mono vc-mono-fivehundredpx',
					'settings'   => array(
						'emptyIcon'    => false,
						'type'         => 'monosocial',
						'iconsPerPage' => 4000,
					),
					'dependency' => array(
						'element' => 'icon_type',
						'value'   => 'monosocial',
					),
					'description' => esc_html__( 'Select icon from library.', 'wrapkit' ),
				),
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__( 'Icon', 'wrapkit' ),
					'param_name' => 'icon_material',
					'value'      => 'vc-material vc-material-cake',
					'settings'   => array(
						'emptyIcon'    => false,
						'type'         => 'material',
						'iconsPerPage' => 4000,
					),
					'dependency' => array(
						'element' => 'icon_type',
						'value'   => 'material',
					),
					'description' => esc_html__( 'Select icon from library.', 'wrapkit' ),
				),
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__( 'Icon', 'wrapkit' ),
					'param_name' => 'icon_icomoon',
					'value'      => 'icon-A-Z',
					'settings'   => array(
						'emptyIcon'    => false,
						'type'         => 'icomoon',
						'iconsPerPage' => 4000,
					),
					'dependency' => array(
						'element' => 'icon_type',
						'value'   => 'icomoon',
					),
					'description' => esc_html__( 'Select icon from library.', 'wrapkit' ),
				),
			),
		));
	}
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_sd_tabs extends WPBakeryShortCodesContainer {
	}
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_sd_tabs_panel extends WPBakeryShortCodesContainer {
	}
}