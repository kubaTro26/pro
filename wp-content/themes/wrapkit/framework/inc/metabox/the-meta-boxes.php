<?php
if ( ! function_exists( 'wrapkit_register_meta_boxes' ) ) {
	function wrapkit_register_meta_boxes( $meta_boxes ) {
	
		global $wrapkit_data;
		
		$sd_cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

		$sd_contact_forms = array();
		
		if ( $sd_cf7 ) {
			foreach ( $sd_cf7 as $sd_cform ) {
				$sd_contact_forms[ $sd_cform->ID ] = $sd_cform->post_title;
			}
		} else {
			$sd_contact_forms[ esc_html__( 'No contact forms found', 'wrapkit' ) ] = 0;
		}
		
		$sd_assets_imgs = get_template_directory_uri() . '/framework/inc/metabox/assets/img/';
		
		// Post formats metaboxes		
		
		// gallery
		$meta_boxes[] = array(
			'id'      => 'gallery_options',
			'title'   => esc_html__( 'Gallery Options', 'wrapkit' ),
			'pages'   => array( 'post' ),
			'show'    => array( 
				'relation'    => 'OR',
				'post_format' => array( 'Gallery' ),
			),
			'context' => 'normal',
			'fields'  => array(
				array(
					'name' => esc_html__( 'Gallery Images', 'wrapkit' ),
					'id'   => 'sd_gallery_images',
					'type' => 'image_advanced',
					'desc' => esc_html__( 'Insert the gallery images.', 'wrapkit' ),
				),
			),
		);
		// video
		$meta_boxes[] = array(
            'id'      => 'video_options',
			'title'   => esc_html__( 'Video Options', 'wrapkit' ),
			'pages'   => array( 'post' ),
			'show'    => array( 
				'relation'    => 'OR',
				'post_format' => array( 'Video' ),
			),
			'context' => 'normal',
			'fields'  => array(
				array(
					'name' => esc_html__( 'Video Url', 'wrapkit' ),
					'id'   => 'sd_video_url',
					'type' => 'oembed',
					'desc' => esc_html__( 'Insert the video url.', 'wrapkit' ),
				),
			),
		);
		// audio
		$meta_boxes[] = array(
			'id'      => 'audio_options',
			'title'   => esc_html__( 'Audio Options', 'wrapkit' ),
			'pages'   => array( 'post' ),
			'show'    => array( 
				'relation'    => 'OR',
				'post_format' => array( 'Audio' ),
			),
			'context' => 'normal',
			'fields'  => array(
				array(
					'name' => esc_html__( 'Audio Url', 'wrapkit' ),
					'id'   => 'sd_audio_url',
					'type' => 'text',
					'size' => '50',
					'desc' => esc_html__( 'Insert the audio url.', 'wrapkit' ),
				),
			),
		);
		$meta_boxes[] = array(
			'id'      => 'blog_options',
			'title'   => esc_html__( 'Blog Options', 'wrapkit' ),
			'pages'   => array( 'page' ),
			'show'    => array( 
					'relation' => 'OR',
					'template' => array( 'blog.php' ),
				),
			'context' => 'normal',
			'fields'  => array(
				array(
					'name' => esc_html__( 'Category Ids', 'wrapkit' ),
					'id'   => 'sd_blog_category_ids',
					'type' => 'text',
					'size' => '50',
					'desc' => esc_html__( 'Insert the category ids you want to pull posts from (optional, comma separated, eg. 5,7).', 'wrapkit' ),
				),
			),
		);

		// page metaboxes
		
		$meta_boxes[] = array(
			'id'       => 'page_options',
			'title'    => esc_html__( 'Page Options', 'wrapkit' ),
			'pages'    => array( 'page', 'portfolio' ),
			'context'  => 'side',
			'priority' => 'low',
			'fields'   => array(
				array(
					'name' => esc_html__( 'Page Title Padding Top', 'wrapkit' ),
					'id'   => 'sd_title_top',
					'type' => 'text',
					'desc' => esc_html__( 'e.g 100px (default is 50px)', 'wrapkit' ),
				),
				array(
					'name'  => esc_html__( 'Page Subtitle', 'wrapkit' ),
					'id'    => 'sd_subtitle',
					'type'  => 'text',
					'desc'  => esc_html__( 'Optional', 'wrapkit' ),
				),
				array(
					'name'  => esc_html__( 'Hide page title?', 'wrapkit' ),
					'id'    => 'sd_page_title',
					'type'  => 'checkbox',
					'desc'  => esc_html__( 'Yes', 'wrapkit' ),
				),
				array(
					'name'  => esc_html__( 'Transparent Header?', 'wrapkit' ),
					'id'    => 'sd_transparent_header',
					'type'  => 'checkbox',
					'desc'  => esc_html__( 'Yes', 'wrapkit' ),
				),
			),
		);
		// page full width metaboxes
		
		$meta_boxes[] = array(
			'id'       => 'full_width_page_options',
			'title'    => esc_html__( 'No Header or Footer', 'wrapkit' ),
			'pages'    => array( 'page' ),
			'context'  => 'side',
			'priority' => 'low',
			'show'    => array( 
				'relation' => 'OR',
				'template' => array( 'full-width-page.php' ),
			),
			'fields' => array(
				array(
					'name'  => esc_html__( 'Hide Header?', 'wrapkit' ),
					'id'    => 'sd_hide_header',
					'type'  => 'checkbox',
					'desc'  => esc_html__( 'Yes', 'wrapkit' ),
				),
				array(
					'name'  => esc_html__( 'Hide Footer?', 'wrapkit' ),
					'id'    => 'sd_hide_footer',
					'type'  => 'checkbox',
					'desc'  => esc_html__( 'Yes', 'wrapkit' ),
				),
			),
		);
		
		$meta_boxes[] = array(
			'id'       => 'post_options',
			'title'    => esc_html__( 'Page Options', 'wrapkit' ),
			'pages'    => array( 'post', 'product' ),
			'context'  => 'normal',
			'priority' => 'high',
			'fields' => array(
				array(
					'name' => esc_html__( 'Show top page title?', 'wrapkit' ),
					'id'   => 'sd_post_page_title',
					'type' => 'checkbox',
					'desc' => esc_html__( 'Yes', 'wrapkit' ),
				),
				array(
					'name' => esc_html__( 'Insert a Custom Page title or leave blank for default page title', 'wrapkit' ),
					'id'   => 'sd_post_single_title',
					'type' => 'text',
					'desc' => esc_html__( 'Insert a custom post title.', 'wrapkit' ),
					'visible' => array( 'sd_post_page_title', true ),
				),
				array(
					'name' => esc_html__( 'Page Title Background Padding Top in Pixels', 'wrapkit' ),
					'id'   => 'sd_post_padding_top',
					'type' => 'text',
					'desc' => esc_html__( 'Insert custom padding top for the page background (eg. 121px).', 'wrapkit' ),
					'visible' => array( 'sd_post_page_title', true ),
				),
				array(
					'name' => esc_html__( 'Page Title Background Padding Bottom in Pixels', 'wrapkit' ),
					'id'   => 'sd_post_padding_bottom',
					'type' => 'text',
					'desc' => esc_html__( 'Insert custom padding bottom for the page background (eg. 121px).', 'wrapkit' ),
					'visible' => array( 'sd_post_page_title', true ),
				),
				array(
					'name' => esc_html__( 'Custom Header Page Background', 'wrapkit' ),
					'desc' => esc_html__( 'Upload your custom header page background (optimal size 2170x213 for full image)', 'wrapkit' ),
					'id'   => 'sd_header_page_bg',
					'type' => 'image_advanced',
					'max_file_uploads' => '1',
					'visible' => array( 'sd_post_page_title', true ),
				),
				array(
					'name' => esc_html__( 'Background Repeat?', 'wrapkit' ),
					'id'   => 'sd_bg_repeat',
					'type' => 'checkbox',
					'std'  => '0',
					'desc' => esc_html__( 'Yes', 'wrapkit' ),
					'visible' => array( 'sd_post_page_title', true ),
				),
				array(
					'name' => esc_html__( 'Background Repeat Horizontally', 'wrapkit' ),
					'id'   => 'sd_repeat_x',
					'type' => 'checkbox',
					'std'  => '0',
					'desc' => esc_html__( 'Header background repeat horizontaly', 'wrapkit' ),
					'visible' => array( 'sd_post_page_title', true ),
				),
				array(
					'name' => esc_html__( 'Background Repeat Vertically', 'wrapkit' ),
					'id'   => 'sd_repeat_y',
					'type' => 'checkbox',
					'std'  => '0',
					'desc' => esc_html__( 'Header background repeat vertically', 'wrapkit' ),
					'visible' => array( 'sd_post_page_title', true ),
				),
				array(
					'name' => esc_html__( 'Background Color', 'wrapkit' ),
					'id'   => 'sd_bg_color',
					'type' => 'color',
					'std'  => '',
					'desc' => esc_html__( 'Header background color', 'wrapkit' ),
					'visible' => array( 'sd_post_page_title', true ),
				),
				array(
					'name' => esc_html__( 'Title Color', 'wrapkit' ),
					'id'   => 'sd_title_color',
					'type' => 'color',
					'std'  => '',
					'desc' => esc_html__( 'Header title color', 'wrapkit' ),
					'visible' => array( 'sd_post_page_title', true ),
				),
			),
		);

		if ( post_type_exists( 'testimonials' ) ) {
			$meta_boxes[] = array(
				'id'       => 'testimonial_options',
				'title'    => esc_html__( 'Testimonial Options', 'wrapkit' ),
				'pages'    => array( 'testimonials', 'product' ),
				'context'  => 'normal',
				'priority' => 'high',
				'fields' => array(
					array(
						'name' => esc_html__( 'Testimonial Description', 'wrapkit' ),
						'id'   => 'sd_test_desc',
						'type' => 'text',
						'desc' => esc_html__( '(eg. CEO) Leave empty to hide', 'wrapkit' ),
					),
				),
			);
		}

		if ( post_type_exists( 'classes' ) ) {
			$meta_boxes[] = array(
				'id'       => 'classes_options',
				'title'    => esc_html__( 'Classes Options', 'wrapkit' ),
				'pages'    => array( 'classes', 'product' ),
				'context'  => 'normal',
				'priority' => 'high',
				'fields' => array(
					array(
						'name' => esc_html__( 'Class Trainer', 'wrapkit' ),
						'id'   => 'sd_class_trainer',
						'type' => 'text',
						'desc' => esc_html__( 'Leave blank to hide', 'wrapkit' ),
					),
					array(
						'name' => esc_html__( 'Class Hours', 'wrapkit' ),
						'id'   => 'sd_class_hrs',
						'type' => 'text',
						'desc' => esc_html__( 'Leave blank to hide', 'wrapkit' ),
					),
				),
			);
		}
		
		if ( post_type_exists( 'sd-megamenu' ) ) {
			
			$mega_menu_menus = array();
			$all_menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
			if ( is_array( $all_menus ) && ! empty( $all_menus ) ) {
				foreach ( $all_menus as $menu ) {
					if ( is_object( $menu ) && isset( $menu->name, $menu->slug ) ) {
						$mega_menu_menus[ $menu->slug ] = $menu->name;
					}
				}
			}
			
			$meta_boxes[] = array(
				'id'      => 'megamenu_page_options',
				'title'   => esc_html__( 'SD Mega Menu Options', 'wrapkit' ),
				'pages'   => array( 'sd-megamenu' ),
				'context' => 'normal',
				'fields'  => array(
					array(
						'name'    => esc_html__( 'Menu Layout', 'wrapkit' ),
						'id'      => 'sd_menu_layout',
						'type'    => 'select',
						'desc'    => esc_html__( 'Select the layout of the menu.', 'wrapkit' ),
						'options' => array (
							'3' => esc_html__( '3 Columns', 'wrapkit' ),
							'4' => esc_html__( '4 Columns', 'wrapkit' ),
							'5' => esc_html__( '5 Columns', 'wrapkit' ),
							
						),
					),
					array(
						'name'    => esc_html__( 'Mega Menu Column 1', 'wrapkit' ),
						'id'      => 'sd_megamenu_col1',
						'type'    => 'select',
						'desc'    => esc_html__( 'Assign a menu to the first mega menu column', 'wrapkit' ),
						'placeholder' => esc_html__( 'Select a Menu', 'wrapkit' ),
						'options' => $mega_menu_menus,
					),
					array(
						'name'    => esc_html__( 'Mega Menu Column 2', 'wrapkit' ),
						'id'      => 'sd_megamenu_col2',
						'type'    => 'select',
						'desc'    => esc_html__( 'Assign a menu to the second mega menu column', 'wrapkit' ),
						'placeholder' => esc_html__( 'Select a Menu', 'wrapkit' ),
						'options' => $mega_menu_menus,
					),
					array(
						'name'    => esc_html__( 'Mega Menu Column 3', 'wrapkit' ),
						'id'      => 'sd_megamenu_col3',
						'type'    => 'select',
						'desc'    => esc_html__( 'Assign a menu to the third mega menu column', 'wrapkit' ),
						'placeholder' => esc_html__( 'Select a Menu', 'wrapkit' ),
						'options' => $mega_menu_menus,
					),
					array(
						'name'    => esc_html__( 'Mega Menu Column 4', 'wrapkit' ),
						'id'      => 'sd_megamenu_col4',
						'type'    => 'select',
						'desc'    => esc_html__( 'Assign a menu to the fourth mega menu column', 'wrapkit' ),
						'placeholder' => esc_html__( 'Select a Menu', 'wrapkit' ),
						'visible' => array( 'sd_menu_layout', 'in', array( 4, 5 ) ),
						'options' => $mega_menu_menus,
					),
					array(
						'name'    => esc_html__( 'Mega Menu Column 5', 'wrapkit' ),
						'id'      => 'sd_megamenu_col5',
						'type'    => 'select',
						'desc'    => esc_html__( 'Assign a menu to the fifth mega menu column', 'wrapkit' ),
						'placeholder' => esc_html__( 'Select a Menu', 'wrapkit' ),
						'visible' => array( 'sd_menu_layout', 'in', array( 5 ) ),
						'options' => $mega_menu_menus,
					),
				
				),
			);
		}
		
		// Add unlimited sidebar support
		if ( function_exists( 'smk_sidebar' ) ) {
			
			$the_sidebars = smk_get_all_sidebars();
			
			$sidebar_options = array();
			
			foreach ( $the_sidebars as $key => $value ) {
				$sidebar_options[] = array( $key => $value );
			}
			
			$sidebar_options = call_user_func_array( 'array_merge', $sidebar_options );
			
			$meta_boxes[] = array(
				'id'       => 'sidebar_options',
				'title'    => esc_html__( 'Sidebars', 'wrapkit' ),
				'pages'    => array( 'page', 'post', 'events', 'download' ),
				'context'  => 'side',
				'priority' => 'low',
			
				'fields' => array(
					array(
						'name'    => esc_html__( 'Sidebar', 'wrapkit' ),
						'id'      => 'sd_smk_sidebar',
						'type'    => 'select',
						'desc'    => esc_html__( 'Assign a custom sidebar to your page', 'wrapkit' ),
						'options' => $sidebar_options,
					),
				),
			);
		}
		return $meta_boxes;
	}
	add_filter( 'rwmb_meta_boxes', 'wrapkit_register_meta_boxes' );
}