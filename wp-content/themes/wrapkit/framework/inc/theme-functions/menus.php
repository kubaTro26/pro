<?php
/**
 * Register Theme Menus
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

// Function for registering wp_nav_menu()
if ( ! function_exists( 'wrapkit_register_navmenus' ) ) {
	function wrapkit_register_navmenus() {
		
		register_nav_menus( array(
			'main-header-menu' => esc_html__( 'Main Menu', 'wrapkit' )
			)
		);
		register_nav_menus( array(
			'secondary-header-menu' => esc_html__( 'Secondary Header Menu (if header #3 is selected)', 'wrapkit' )
			)
		);
		register_nav_menus( array(
			'modal-menu' => esc_html__( 'Modal Menu (if header #14 is selected)', 'wrapkit' )
			)
		);
		register_nav_menus( array(
			'footer-menu' => esc_html__( 'Footer Menu', 'wrapkit' )
			)
		);
	}
	add_action( 'init', 'wrapkit_register_navmenus' );
}

if ( ! function_exists( 'wrapkit_main_menu' ) ) {
	function wrapkit_main_menu() {
		
		global $wrapkit_data;
		
		$sd_header_style = isset( $wrapkit_data['sd_header_style'] ) ? $wrapkit_data['sd_header_style'] : NULL;
		
		$ml_auto = '';
		
		if ( $sd_header_style !== '2' && $sd_header_style !== '3' && $sd_header_style !== '4' && $sd_header_style !== '15' ) {
			$ml_auto = 'ml-auto';
		} else if ( $sd_header_style !== '6' ) {
			$ml_auto = '';
		}
		
		$sd_h5_link1 = isset( $wrapkit_data['sd_h5_link1'] ) ? $wrapkit_data['sd_h5_link1'] : NULL;
		$sd_h5_link2 = isset( $wrapkit_data['sd_h5_link2'] ) ? $wrapkit_data['sd_h5_link2'] : NULL;
		
		if ( $sd_header_style == '5' AND ! empty( $sd_h5_link1 ) || ! empty( $sd_h5_link2 ) ) {
			$ml_auto = 'm-auto';
		}
		
		if ( $sd_header_style == '6' ) {
			$ml_auto = '';
		}
		
		if ( $sd_header_style == '8' ) {
			$ml_auto = 'ml-auto font-13';
		}
		
		if ( $sd_header_style == '9' ) {
			$ml_auto = 'ml-auto mt-2 mt-lg-0';
		}
		
		wp_nav_menu( array(
			'menu'           => esc_html__( 'Main Header Menu', 'wrapkit' ),
			'class'          => '',
			'menu_class'     => 'navbar-nav ' . $ml_auto,
			'menu_id'        => 'main-header-menu',
			'container'      => false,
			'theme_location' => 'main-header-menu',
			'fallback_cb'    => 'wp_bootstrap_navwalker::fallback',
			'walker'         => new sd_wrapkit_menu_walker(),
			)
		);
	}
}
if ( ! function_exists( 'wrapkit_secondary_header_menu' ) ) {
	function wrapkit_secondary_header_menu() {
		
		global $wrapkit_data;
		
		wp_nav_menu( array(
			'menu'           => esc_html__( 'Secondary Header Menu', 'wrapkit' ),
			'class'          => '',
			'menu_class'     => 'navbar-nav ml-auto',
			'menu_id'        => 'secondary-header-menu',
			'container'      => false,
			'theme_location' => 'secondary-header-menu',
			'fallback_cb'    => 'wp_bootstrap_navwalker::fallback',
			'walker'         => new sd_wrapkit_menu_walker(),
			)
		);
	}
}
if ( ! function_exists( 'wrapkit_modal_menu' ) ) {
	function wrapkit_modal_menu() {
		wp_nav_menu( array(
			'menu'			 => esc_html__( 'Modal Menu', 'wrapkit' ),
			'class' 		 => '',
			'menu_class'	 => 'nav-menu',
			'menu_id' 		 => '',
			'container'		 => false,
			'theme_location' => 'modal-menu',
			)
		);
	}
}
if ( ! function_exists( 'sd_modal_menu_addons' ) ) {
	function sd_modal_menu_addons( $items, $args ) {
		
		global $wrapkit_data;
		
		if( ! ( $args->theme_location == 'modal-menu' ) )
			return $items;
			
			
		
			$sd_modal_logo       = isset( $wrapkit_data['sd_modal_logo'] ) ? $wrapkit_data['sd_modal_logo']['url'] : NULL;
			$sd_modal_btn        = isset( $wrapkit_data['sd_h14_button_modal'] ) ? $wrapkit_data['sd_h14_button_modal'] : NULL;
			$sd_modal_btn_txt    = isset( $wrapkit_data['sd_h14_button'] ) ? $wrapkit_data['sd_h14_button'] : NULL;
			$sd_modal_btn_url    = isset( $wrapkit_data['sd_h14_button_url'] ) ? $wrapkit_data['sd_h14_button_url'] : NULL;
			$sd_modal_btn_target = isset( $wrapkit_data['sd_h14_button_target'] ) ? $wrapkit_data['sd_h14_button_target'] : NULL;
			$sd_logo_menu        = '';
				
			if ( ! empty( $sd_modal_logo ) ) {
				$sd_logo_menu = '<li><a href="#"><img src="' . esc_url( $sd_modal_logo ) . '" alt="wrapkit"/></a></li>';
			}
		
			if ( $sd_modal_btn == '1' && ! empty( $sd_modal_btn_txt ) ) {
			
				$items .= '<li class="sd-h17-btn"><a class="btn btn-success-gradiant" href="' . esc_url( $sd_modal_btn_url ) . '" ' . ( ( $sd_modal_btn_target == '1' ) ? 'target="_blank"' : '' ) . '>' . esc_html( $sd_modal_btn_txt ) . '</a></li>';
				
			}
		
		return  $sd_logo_menu . $items;	
	}
	add_filter( 'wp_nav_menu_items', 'sd_modal_menu_addons', 10, 2 );
}
if ( ! function_exists( 'wrapkit_footer_menu' ) ) {
	function wrapkit_footer_menu() {
		
		global $wrapkit_data;
		
		$sd_footer_style = isset( $wrapkit_data['sd_footer_style'] ) ? $wrapkit_data['sd_footer_style'] : '1';
		
		$nav_class = '';
		
		if ( $sd_footer_style == '4' ) {
			$nav_class = 'ml-auto mt-2 mt-lg-0';
		}
		
		wp_nav_menu( array(
			'menu'			  => esc_html__( 'Footer Menu', 'wrapkit' ),
			'class' 		  => '',
			'menu_class'	  => 'navbar-nav ' . $nav_class,
			'menu_id' 		  => '',
			'container'		  => false,
			'theme_location'  => 'footer-menu',
			'container_class' => '',
			)
		);
	}
}
// add custom class to link menu
if ( ! function_exists( 'wrapkit_footer_menu_atts' ) ) {
	function wrapkit_footer_menu_atts( $atts, $item, $args ) {
		if ( $args->theme_location == 'footer-menu' ) {
			$atts['class'] = 'nav-link';
		}
		return $atts;
	}
	add_filter( 'nav_menu_link_attributes', 'wrapkit_footer_menu_atts', 10, 3 );
}
// add custom class to link to li menu
if ( ! function_exists( 'wrapkit_footer_menu_class' ) ) {
	function wrapkit_footer_menu_class( $classes, $item, $args ) {

		if ( 'footer-menu' === $args->theme_location ) {
			$classes[] = 'nav-item';
		}

		return $classes;
	}
	add_filter( 'nav_menu_css_class', 'wrapkit_footer_menu_class', 10, 3 ); 
}

if ( ! function_exists( 'sd_add_menu_title' ) ) {
	function sd_add_menu_title( $item_output, $item, $depth, $args ) {
		global $sd_title;
		$sd_title = $item->attr_title;
		return $item_output;
	}
	add_filter( 'walker_nav_menu_start_el', 'sd_add_menu_title', 10, 4 );
}

if ( ! ( class_exists( 'sd_wrapkit_menu_walker' ) ) ) {
	class sd_wrapkit_menu_walker extends Walker_Nav_Menu {
		/**
     * @see Walker::start_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of page. Used for padding.
     */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
		
		global $sd_title, $wrapkit_data;
		
		$b_none = '';
		
		$sd_header_style = isset( $wrapkit_data['sd_header_style'] ) ? $wrapkit_data['sd_header_style'] : NULL;
		
		if ( $sd_header_style !== '2' && $sd_header_style !== '3' && $sd_header_style !== '5' ) {
			$b_none = 'b-none';
		}
		
		$open_right = '';
		
		if ( strcasecmp( $sd_title, 'open-right' ) == 0 ) {
			$open_right = 'menu-right';
		} else {
			$open_right = '';
		}		
        $indent = str_repeat( "\t", $depth );
		if ( $args->has_children && $depth > 0 ) {
        	$output .= "\n$indent<ul class=\"dropdown-menu font-14 " . $b_none . " animated flipInY {$open_right}\">\n";
		} else {
			$output .= "\n$indent<ul role=\"menu\" class=\"" . $b_none . " dropdown-menu font-14 animated fadeIn\">\n";
		}
    }
 
    /**
     * @see Walker::start_el()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param int $current_page Menu item ID.
     * @param object $args
     */
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		global $wrapkit_data;
 
        /**
         * Dividers, Headers or Disabled
         * =============================
         * Determine whether the item is a Divider, Header, Disabled or regular
         * menu item. To prevent errors we use the strcasecmp() function to so a
         * comparison that is not case sensitive. The strcasecmp() function returns
         * a 0 if the strings are equal.
         */
        if ( strcasecmp( $item->attr_title, 'separator' ) == 0 && $depth === 1 ) {
            $output .= $indent . '<li role="separator" class="divider">';
        } else if ( strcasecmp( $item->title, 'separator') == 0 && $depth === 1 ) {
            $output .= $indent . '<li role="presentation" class="divider">';
        } else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} else if ( strcasecmp( $item->attr_title, 'separator' ) == 0 && $depth === 2 ) {
            $output .= $indent . '<li role="separator" class="divider">';
        } else if ( strcasecmp( $item->title, 'separator') == 0 && $depth === 2 ) {
            $output .= $indent . '<li role="presentation" class="divider">';
        } else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 2 ) {
            $output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
        } else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
            $output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
        } else {
 
            $class_names = $value = '';
 
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = ' ';
 
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			
			if ( $depth === 0 ) {
				$class_names .= ' nav-item';
			}
 
            if ( $args->has_children ) {
                $class_names .= ' dropdown';
			}
			
			if ( $args->has_children && $depth > 0 ) {
                $class_names .= ' dropdown-submenu';
			}
 
            if ( in_array( 'current-menu-item', $classes ) ) {
                $class_names .= ' active';
			}
 
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
 
            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
 
            $output .= $indent . '<li' . $id . $value . $class_names .'>';
 
            $atts = array();
            $atts['title']  = ! empty( $item->title )    ? $item->title   : '';
            $atts['target'] = ! empty( $item->target )   ? $item->target  : '';
			$atts['rel']    = ! empty( $item->xfn )      ? $item->xfn : '';
			
			if ( empty( $item->attr_title ) ) {
				$atts['title']  = ! empty( $item->title )   ? strip_tags($item->title) : '';
			} else {
				$atts['title'] = $item->attr_title;
			}
			
 			
			if ( $depth === 0 ) {
				$atts['class'] = 'nav-link';
			}
            // If item has_children add atts to a.
            if ( $args->has_children && $depth === 0 ) {
                $atts['href']           = '#';
                $atts['data-toggle']    = 'dropdown';
                $atts['class']          = 'nav-link dropdown-toggle';
                $atts['aria-haspopup']  = 'true';
				
            } else {
                $atts['href'] = ! empty( $item->url ) ? $item->url : '';
            }
			
			if ( $depth > 0 ) {
				$atts['class'] = 'dropdown-item';
			}
			if ( $args->has_children && $depth > 0 ) {
				$atts['href']           = '#';
				$atts['class'] = 'dropdown-toggle dropdown-item';
			}
 
            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
 
            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }
			
			if ( ! ( $item->object == 'sd-megamenu' ) ) {
 
				$item_output = $args->before;
				$item_output .= '<a'. $attributes .'>';
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				if ( $args->has_children && 0 === $depth ) {
					$item_output .=	' <i class="fa fa-angle-down m-l-5"></i></a>';
				} else if ( $args->has_children && 0 < $depth ) {
					$item_output .=	' <i class="fa fa-angle-right ml-auto"></i></a>';
				} else {
					$item_output .= '</a>';
				}
				$item_output .= $args->after;
			}
			
			
			if ( ( $item->object == 'sd-megamenu' ) ) {
				$sd_menu_layout   = rwmb_meta( 'sd_menu_layout', '', $item->object_id );
				$sd_has_thumb     = has_post_thumbnail( $item->object_id );
				$sd_megamenu_col1 = rwmb_meta( 'sd_megamenu_col1', '', $item->object_id );
				$sd_megamenu_col2 = rwmb_meta( 'sd_megamenu_col2', '', $item->object_id );
				$sd_megamenu_col3 = rwmb_meta( 'sd_megamenu_col3', '', $item->object_id );
				$sd_megamenu_col4 = rwmb_meta( 'sd_megamenu_col4', '', $item->object_id );
				$sd_megamenu_col5 = rwmb_meta( 'sd_megamenu_col5', '', $item->object_id );
				
				
				$sd_megamenu_cols = 'col-md-4';
				$sd_thumb_col = 'col-md-6';
				
				
				if ( $sd_menu_layout == '3' ) {
				
					$sd_megamenu_cols = ( $sd_has_thumb ? 'col-md-2' : 'col-md-4' );
				
				} else if ( $sd_menu_layout == '4' ) {
					
					$sd_megamenu_cols = ( $sd_has_thumb ? 'col-md-2' : 'col-md-3' );
					$sd_thumb_col  = 'col-md-4';
					
				} else if ( $sd_menu_layout == '5' ) {
					
					$sd_megamenu_cols = 'col';
					$sd_thumb_col  = 'col';
					
				}
				
				
				$output .= '<li class="nav-item dropdown mega-dropdown '. $item->classes[0].'">';
				
				$output .= '<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'. $item->title .'<i class="fa fa-angle-down m-l-5"></i></a>';
				
				$sd_header_style = isset( $wrapkit_data['sd_header_style'] ) ? $wrapkit_data['sd_header_style'] : NULL;
				
				$b_none = '';
				
				if ( $sd_header_style !== '2' && $sd_header_style !== '3' && $sd_header_style !== '5' ) {
					$b_none = 'b-none';
				}
				
				$output .= '<div class="dropdown-menu ' . $b_none . ' font-14 animated fadeIn">
								<div class="row">
				';
				$output .= ( has_post_thumbnail( $item->object_id ) ) ? '<div class="' . $sd_thumb_col .  ' inside-bg hidden-md-down">
									<div class="bg-img" style="background-image:url(' . get_the_post_thumbnail_url( $item->object_id, $size = 'full' ) . ')">
											' . do_shortcode( get_post_field( 'post_content', $item->object_id ) ) . '
										</div>
									</div>' : '' ;
				
				if ( ! ( $sd_megamenu_col1 == '' ) ) {
				
					$get_menu = wp_get_nav_menu_items( $sd_megamenu_col1 );

					$output .= '<div class="'. $sd_megamenu_cols .'"><ul class="list-style-none">';

					foreach( $get_menu as $get_menu_item ){
						$before = ( '#' == $get_menu_item->url ) ? '<h6>' : '<a href="'. $get_menu_item->url .'">';
						$after = ( '#' == $get_menu_item->url ) ? '</h6>' : '</a>';

						$output .= '<li class="'. implode(' ', $get_menu_item->classes) .' sd-mega-li">'. $before . $get_menu_item->title . $after .'</li>';	
					}

					$output .= '</ul></div>';	
						
				}
				
				if ( ! ( $sd_megamenu_col2 == '' ) ) {
				
					$get_menu = wp_get_nav_menu_items( $sd_megamenu_col2 );

					$output .= '<div class="'. $sd_megamenu_cols .'"><ul class="list-style-none">';

					foreach( $get_menu as $get_menu_item ){
						$before = ( '#' == $get_menu_item->url ) ? '<h6>' : '<a href="'. $get_menu_item->url .'">';
						$after = ( '#' == $get_menu_item->url ) ? '</h6>' : '</a>';

						$output .= '<li class="'. implode(' ', $get_menu_item->classes) .'  sd-mega-li">'. $before . $get_menu_item->title . $after .'</li>';	
					}

					$output .= '</ul></div>';	
						
				}
						
				if ( ! ( $sd_megamenu_col3 == '' ) ) {
				
					$get_menu = wp_get_nav_menu_items( $sd_megamenu_col3 );

					$output .= '<div class="'. $sd_megamenu_cols .'"><ul class="list-style-none">';

					foreach( $get_menu as $get_menu_item ){
						$before = ( '#' == $get_menu_item->url ) ? '<h6>' : '<a href="'. $get_menu_item->url .'">';
						$after = ( '#' == $get_menu_item->url ) ? '</h6>' : '</a>';

						$output .= '<li class="'. implode(' ', $get_menu_item->classes) .'  sd-mega-li">'. $before . $get_menu_item->title . $after .'</li>';	
					}

					$output .= '</ul></div>';	
						
				}
				
				if ( ! ( $sd_megamenu_col4 == '' ) ) {
				
					$get_menu = wp_get_nav_menu_items( $sd_megamenu_col4 );

					$output .= '<div class="'. $sd_megamenu_cols .'"><ul class="list-style-none">';

					foreach( $get_menu as $get_menu_item ){
						$before = ( '#' == $get_menu_item->url ) ? '<h6>' : '<a href="'. $get_menu_item->url .'">';
						$after = ( '#' == $get_menu_item->url ) ? '</h6>' : '</a>';

						$output .= '<li class="'. implode(' ', $get_menu_item->classes) .'  sd-mega-li">'. $before . $get_menu_item->title . $after .'</li>';	
					}

					$output .= '</ul></div>';	
						
				}
				
				if ( $sd_menu_layout == '5' && ! ( $sd_megamenu_col5 == '' ) ) {
				
					$get_menu = wp_get_nav_menu_items( $sd_megamenu_col5 );

					$output .= '<div class="'. $sd_megamenu_cols .'"><ul class="list-style-none">';

					foreach( $get_menu as $get_menu_item ){
						$before = ( '#' == $get_menu_item->url ) ? '<h6>' : '<a href="'. $get_menu_item->url .'">';
						$after = ( '#' == $get_menu_item->url ) ? '</h6>' : '</a>';

						$output .= '<li class="'. implode(' ', $get_menu_item->classes) .'  sd-mega-li">'. $before . $get_menu_item->title . $after .'</li>';	
					}

					$output .= '</ul></div>';	
						
				}
					
				
				$output .= '</div></div>';
				
				
			} else {
 
            	$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			
			}
        }
    }
 
    /**
     * Traverse elements to create list from elements.
     *
     * Display one element if the element doesn't have any children otherwise,
     * display the element and its children. Will only traverse up to the max
     * depth and no ignore elements under that depth.
     *
     * This method shouldn't be called directly, use the walk() method instead.
     *
     * @see Walker::start_el()
     * @since 2.5.0
     *
     * @param object $element Data object
     * @param array $children_elements List of elements to continue traversing.
     * @param int $max_depth Max depth to traverse.
     * @param int $depth Depth of current element.
     * @param array $args
     * @param string $output Passed by reference. Used to append additional content.
     * @return null Null on failure with no changes to parameters.
     */
    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;
 
        $id_field = $this->db_fields['id'];
 
        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
 
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
 
    /**
     * Menu Fallback
     * =============
     * If this function is assigned to the wp_nav_menu's fallback_cb variable
     * and a manu has not been assigned to the theme location in the WordPress
     * menu manager the function with display nothing to a non-logged in user,
     * and will add a link to the WordPress menu manager if logged in as an admin.
     *
     * @param array $args passed from the wp_nav_menu function.
     *
     */
    public static function fallback( $args ) {
        if ( current_user_can( 'manage_options' ) ) {
 
            extract( $args );
 
            $fb_output = null;
 
            if ( $container ) {
                $fb_output = '<' . $container;
 
                if ( $container_id )
                    $fb_output .= ' id="' . $container_id . '"';
 
                if ( $container_class )
                    $fb_output .= ' class="' . $container_class . '"';
 
                $fb_output .= '>';
            }
 
            $fb_output .= '<ul';
 
            if ( $menu_id )
                $fb_output .= ' id="' . $menu_id . '"';
 
            if ( $menu_class )
                $fb_output .= ' class="' . $menu_class . '"';
 
            $fb_output .= '>';
            $fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
            $fb_output .= '</ul>';
 
            if ( $container )
                $fb_output .= '</' . $container . '>';
 
            echo $fb_output;
        }
    }
	}
}