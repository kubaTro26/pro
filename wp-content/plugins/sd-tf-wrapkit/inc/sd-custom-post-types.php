<?php

global $wrapkit_data;

/* Custom Post Types and Taxonomies */
if ( ! function_exists( 'sd_register_post_types' ) ) {
	function sd_register_post_types() {
		
		global $wrapkit_data;
		
		// Mega Menu Post Type

			$megamenu_labels = array(
				'name'               => esc_html__( 'SD Mega Menu', 'wrapkit' ),
				'singular_name'      => esc_html__( 'SD Mega Menu Item', 'wrapkit' ),
				'add_new'            => esc_html__( 'Add New SD Mega Menu', 'wrapkit' ),
				'add_new_item'       => esc_html__( 'Add New SD Mega Menu Item', 'wrapkit' ),
				'edit_item'          => esc_html__( 'Edit SD Mega Menu Item', 'wrapkit' ),
				'new_item'           => esc_html__( 'Add New SD Mega Menu Item', 'wrapkit' ),
				'view_item'          => esc_html__( 'View SD Mega Menu Item', 'wrapkit' ),
				'search_items'       => esc_html__( 'Search SD Mega Menu Item', 'wrapkit' ),
				'not_found'          => esc_html__( 'No SD Mega Menu Item found', 'wrapkit' ),
				'not_found_in_trash' => esc_html__( 'No SD Mega Menu Item found in trash', 'wrapkit' ),
			);
	
			$megamenu_args = array(
				'public'              => true,
				'publicly_queryable'  => false,
				'show_ui'             => true,
				'show_in_nav_menus'   => true,
				'show_in_admin_bar'   => true,
				'exclude_from_search' => false,
				'show_in_menu'        => true,
				'menu_icon'           => 'dashicons-menu',
				'can_export'          => true,
				'has_archive'         => false,
				'delete_with_user'    => false,
				'labels'              => $megamenu_labels,
				'public'              => true,
				'show_ui'             => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'rewrite'             => array( 'slug' => 'sd-megamenu', 'with_front' => false ), // Permalinks format
				'supports'            => array( 'title', 'editor', 'thumbnail' ),
			);
	
			register_post_type( 'sd-megamenu' , $megamenu_args );
		
		// Testimonials Post Type
		
		$sd_testimonials = ! empty( $wrapkit_data['sd_testimonials_module'] ) ? $wrapkit_data['sd_testimonials_module'] : '';
		
		if ( $sd_testimonials == '1' ) {

			$testimonials_labels = array(
				'name'               => esc_html__( 'Testimonials', 'wrapkit' ),
				'singular_name'      => esc_html__( 'Testimonial', 'wrapkit' ),
				'add_new'            => esc_html__( 'Add New Testimonial', 'wrapkit' ),
				'add_new_item'       => esc_html__( 'Add New Testimonial', 'wrapkit' ),
				'edit_item'          => esc_html__( 'Edit Testimonial', 'wrapkit' ),
				'new_item'           => esc_html__( 'Add New Testimonial', 'wrapkit' ),
				'view_item'          => esc_html__( 'View Testimonial', 'wrapkit' ),
				'search_items'       => esc_html__( 'Search testimonials', 'wrapkit' ),
				'not_found'          => esc_html__( 'No testimonials found', 'wrapkit' ),
				'not_found_in_trash' => esc_html__( 'No testimonials found in trash', 'wrapkit' ),
			);
			
			$custom_testimonials_slug = ( ! empty( $wrapkit_data[ 'sd_testimonials_slug'] ) ? $wrapkit_data['sd_testimonials_slug'] : 'testimonials-page' );
	
			$testimonials_args = array(
				'public'              => true,
				'publicly_queryable'  => true,
				'show_in_nav_menus'   => true,
				'show_in_admin_bar'   => true,
				'exclude_from_search' => false,
				'show_in_menu'        => true,
				'menu_icon'           => 'dashicons-format-quote',
				'can_export'          => true,
				'delete_with_user'    => false,
				'labels'              => $testimonials_labels,
				'public'              => true,
				'show_ui'             => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'rewrite'             => array( 'slug' => $custom_testimonials_slug, 'with_front' => false ), // Permalinks format
				'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			);
	
			register_post_type( 'testimonials' , $testimonials_args );
		
			// testimonials Taxonomy
			
			$sd_testimonial_tax_slug = ( ! empty( $sd_data['sd_testimonial_taxonomy_slug'] ) ? $sd_data['sd_testimonial_taxonomy_slug'] : 'testimonial-category' );
			
			$testimonial_taxt_labels = array(
				'name'              => esc_html__( 'Testimonial Categories', 'wrapkit' ),
				'singular_name'     => esc_html__( 'Testimonial Category', 'wrapkit' ),
				'search_items'      => esc_html__( 'Search Testimonial Categories', 'wrapkit' ),
				'all_items'         => esc_html__( 'All Testimonial Categories', 'wrapkit' ),
				'edit_item'         => esc_html__( 'Edit Testimonial Category', 'wrapkit' ),
				'update_item'       => esc_html__( 'Update Testimonial  Category', 'wrapkit' ),
				'add_new_item'      => esc_html__( 'Add New Testimonial Category', 'wrapkit' ),
				'new_item_name'     => esc_html__( 'New Testimonial Category', 'wrapkit' ),
				'menu_name'         => esc_html__( 'Testimonial Categories', 'wrapkit' )
			);
		
			$testimonial_tax_args = array(
				'hierarchical'      => true,
				'labels'            => $testimonial_taxt_labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => $sd_testimonial_tax_slug )
			);
			
			register_taxonomy( 'testimonial-category', array( 'testimonials' ), $testimonial_tax_args );
		
		}
		// Portfolio Post Type
		
		$sd_portfolio = ! empty( $wrapkit_data['sd_portfolio_module'] ) ? $wrapkit_data['sd_portfolio_module'] : '';
		
		if ( $sd_portfolio == '1' ) {

			$portfolio_labels = array(
				'name'               => esc_html__( 'Portfolio', 'wrapkit' ),
				'singular_name'      => esc_html__( 'Portfolio Item', 'wrapkit' ),
				'add_new'            => esc_html__( 'Add New Portfolio Item', 'wrapkit' ),
				'add_new_item'       => esc_html__( 'Add New Portfolio Item', 'wrapkit' ),
				'edit_item'          => esc_html__( 'Edit Portfolio Item', 'wrapkit' ),
				'new_item'           => esc_html__( 'Add New Portfolio Item', 'wrapkit' ),
				'view_item'          => esc_html__( 'View Portfolio Item', 'wrapkit' ),
				'search_items'       => esc_html__( 'Search Portfolio Items', 'wrapkit' ),
				'not_found'          => esc_html__( 'No portfolio items found', 'wrapkit' ),
				'not_found_in_trash' => esc_html__( 'No portfolio items found in trash', 'wrapkit' ),
			);
			
			$custom_portfolio_slug = ( ! empty( $wrapkit_data[ 'sd_portfolio_slug'] ) ? $wrapkit_data['sd_portfolio_slug'] : 'portfolio-page' );
	
			$portfolio_args = array(
				'public'              => true,
				'publicly_queryable'  => true,
				'show_in_nav_menus'   => true,
				'show_in_admin_bar'   => true,
				'exclude_from_search' => false,
				'show_in_menu'        => true,
				'menu_icon'           => 'dashicons-portfolio',
				'can_export'          => true,
				'delete_with_user'    => false,
				'labels'              => $portfolio_labels,
				'public'              => true,
				'show_ui'             => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'rewrite'             => array( 'slug' => $custom_portfolio_slug, 'with_front' => false ), // Permalinks format
				'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			);
	
			register_post_type( 'portfolio' , $portfolio_args );
		
			// Portfolio Taxonomy
			
			$sd_portfolio_tax_slug = ( ! empty( $sd_data['sd_portfolio_tax_slug'] ) ? $sd_data['sd_portfolio_tax_slug'] : 'portfolio-category' );
			
			$portfolio_tax_labels = array(
				'name'              => esc_html__( 'Portfolio Categories', 'wrapkit' ),
				'singular_name'     => esc_html__( 'Portfolio Category', 'wrapkit' ),
				'search_items'      => esc_html__( 'Search Portfolio Categories', 'wrapkit' ),
				'all_items'         => esc_html__( 'All Portfolio Categories', 'wrapkit' ),
				'edit_item'         => esc_html__( 'Edit Portfolio Category', 'wrapkit' ),
				'update_item'       => esc_html__( 'Update Portfolio  Category', 'wrapkit' ),
				'add_new_item'      => esc_html__( 'Add New Portfolio Category', 'wrapkit' ),
				'new_item_name'     => esc_html__( 'New Portfolio Category', 'wrapkit' ),
				'menu_name'         => esc_html__( 'Portfolio Categories', 'wrapkit' )
			);
		
			$portfolio_tax_args = array(
				'hierarchical'      => true,
				'labels'            => $portfolio_tax_labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => $sd_portfolio_tax_slug )
			);
			
			register_taxonomy( 'portfolio-category', array( 'portfolio' ), $portfolio_tax_args );
		
        }
        
        // Classes Post Type
		
		$sd_fitness = ! empty( $wrapkit_data['sd_fitness_module'] ) ? $wrapkit_data['sd_fitness_module'] : '';
		
		if ( $sd_fitness == '1' ) {

			$classes_labels = array(
				'name'               => esc_html__( 'Classes', 'wrapkit' ),
				'singular_name'      => esc_html__( 'Class', 'wrapkit' ),
				'add_new'            => esc_html__( 'Add New Class', 'wrapkit' ),
				'add_new_item'       => esc_html__( 'Add New Class', 'wrapkit' ),
				'edit_item'          => esc_html__( 'Edit Class', 'wrapkit' ),
				'new_item'           => esc_html__( 'Add New Class', 'wrapkit' ),
				'view_item'          => esc_html__( 'View Class', 'wrapkit' ),
				'search_items'       => esc_html__( 'Search Classes', 'wrapkit' ),
				'not_found'          => esc_html__( 'No classes found', 'wrapkit' ),
				'not_found_in_trash' => esc_html__( 'No classes found in trash', 'wrapkit' ),
			);
			
			$custom_classes_slug = ( ! empty( $wrapkit_data[ 'sd_classes_slug'] ) ? $wrapkit_data['sd_classes_slug'] : 'classes-page' );
	
			$classes_args = array(
				'public'              => true,
				'publicly_queryable'  => true,
				'show_in_nav_menus'   => true,
				'show_in_admin_bar'   => true,
				'exclude_from_search' => false,
				'show_in_menu'        => true,
				'menu_icon'           => 'dashicons-universal-access',
				'can_export'          => true,
				'delete_with_user'    => false,
				'labels'              => $classes_labels,
				'public'              => true,
				'show_ui'             => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'rewrite'             => array( 'slug' => $custom_classes_slug, 'with_front' => false ), // Permalinks format
				'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			);
	
			register_post_type( 'classes' , $classes_args );
		
			// Classes Taxonomy
			
			$sd_classes_tax_slug = ( ! empty( $sd_data['sd_classes_tax_slug'] ) ? $sd_data['sd_classes_tax_slug'] : 'class-category' );
			
			$class_tax_labels = array(
				'name'              => esc_html__( 'Classes Categories', 'wrapkit' ),
				'singular_name'     => esc_html__( 'Class Category', 'wrapkit' ),
				'search_items'      => esc_html__( 'Search Class Categories', 'wrapkit' ),
				'all_items'         => esc_html__( 'All Class Categories', 'wrapkit' ),
				'edit_item'         => esc_html__( 'Edit Class Category', 'wrapkit' ),
				'update_item'       => esc_html__( 'Update Class  Category', 'wrapkit' ),
				'add_new_item'      => esc_html__( 'Add New Class Category', 'wrapkit' ),
				'new_item_name'     => esc_html__( 'New Class Category', 'wrapkit' ),
				'menu_name'         => esc_html__( 'Class Categories', 'wrapkit' )
			);
		
			$class_tax_args = array(
				'hierarchical'      => true,
				'labels'            => $class_tax_labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => $sd_classes_tax_slug )
			);
			
            register_taxonomy( 'class-category', array( 'classes' ), $class_tax_args );
            
            // Trainers Post Type

            $tainer_labels = array(
				'name'               => esc_html__( 'Trainers', 'wrapkit' ),
				'singular_name'      => esc_html__( 'Trainer', 'wrapkit' ),
				'add_new'            => esc_html__( 'Add New Trainer', 'wrapkit' ),
				'add_new_item'       => esc_html__( 'Add New Trainer', 'wrapkit' ),
				'edit_item'          => esc_html__( 'Edit Trainer', 'wrapkit' ),
				'new_item'           => esc_html__( 'Add New Trainer', 'wrapkit' ),
				'view_item'          => esc_html__( 'View Trainer', 'wrapkit' ),
				'search_items'       => esc_html__( 'Search Trainers', 'wrapkit' ),
				'not_found'          => esc_html__( 'No trainers found', 'wrapkit' ),
				'not_found_in_trash' => esc_html__( 'No trainers found in trash', 'wrapkit' ),
			);
			
			$custom_trainers_slug = ( !empty( $wrapkit_data[ 'sd_trainers_slug'] ) ? $wrapkit_data['sd_trainers_slug'] : 'trainers-page' );
	
			$trainers_args = array(
				'public'              => true,
				'publicly_queryable'  => true,
				'show_in_nav_menus'   => true,
				'show_in_admin_bar'   => true,
				'exclude_from_search' => false,
				'show_in_menu'        => true,
				'menu_icon'           => 'dashicons-universal-access',
				'can_export'          => true,
				'delete_with_user'    => false,
				'labels'              => $tainer_labels,
				'public'              => true,
				'show_ui'             => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'rewrite'             => array( 'slug' => $custom_trainers_slug, 'with_front' => false ), // Permalinks format
				'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			);
	
			register_post_type( 'trainers' , $trainers_args );
		
			// Trainers Taxonomy
			
			$sd_trainers_tax_slug = ( ! empty( $sd_data['sd_trainers_tax_slug'] ) ? $sd_data['sd_trainers_tax_slug'] : 'trainer-category' );
			
			$trainer_tax_labels = array(
				'name'              => esc_html__( 'Trainers Categories', 'wrapkit' ),
				'singular_name'     => esc_html__( 'Trainer Category', 'wrapkit' ),
				'search_items'      => esc_html__( 'Search Trainer Categories', 'wrapkit' ),
				'all_items'         => esc_html__( 'All Trainer Categories', 'wrapkit' ),
				'edit_item'         => esc_html__( 'Edit Trainer Category', 'wrapkit' ),
				'update_item'       => esc_html__( 'Update Trainer  Category', 'wrapkit' ),
				'add_new_item'      => esc_html__( 'Add New Trainer Category', 'wrapkit' ),
				'new_item_name'     => esc_html__( 'New Trainer Category', 'wrapkit' ),
				'menu_name'         => esc_html__( 'Trainer Categories', 'wrapkit' )
			);
		
			$trainer_tax_args = array(
				'hierarchical'      => true,
				'labels'            => $trainer_tax_labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => $sd_trainers_tax_slug )
			);
			
            register_taxonomy( 'trainer-category', array( 'trainers' ), $trainer_tax_args );
		
		}
	}
	add_action('init', 'sd_register_post_types');
}