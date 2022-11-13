<?php
/**
 * Theme WooCommerce Functions
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

// Add WooCommerce support
add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

// Remove styling

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// Number of products to display on the shop page

if ( ! function_exists( 'wrapkit_prods_nr' ) ) {
	function wrapkit_prods_nr() {

		global $sd_data;
		
		$cols = ( ! empty( $wrapkit_data['sd_products_nr'] ) ? $wrapkit_data['sd_products_nr'] : '21' );

		return $cols;
	}
	add_filter( 'loop_shop_per_page', 'wrapkit_prods_nr', 20 );
}
// Change number of upsells per row and columns

if ( ! function_exists( 'wrapkit_woo_related_products_limit' ) ) {
	function wrapkit_woo_related_products_limit() {
	  global $product;
	
		$args['posts_per_page'] = 4;
		return $args;
	}
}

if ( ! function_exists( 'wrapkit_related_products_args' ) ) {
	function wrapkit_related_products_args( $args ) {

		$args['posts_per_page'] = 4;
		$args['columns'] = 4;
		return $args;
	}
	add_filter( 'woocommerce_output_related_products_args', 'wrapkit_related_products_args' );
}

// Change number of upsells per row

if ( ! function_exists( 'wrapkit_woo_upsells' ) ) {
	function wrapkit_woo_upsells() {
			woocommerce_upsell_display( 4, 4 );
	}
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	add_action( 'woocommerce_after_single_product_summary', 'wrapkit_woo_upsells', 15 );
} 

// Change number of cross sells per row

if ( ! function_exists ( 'wrapkit_woo_cross_sells' ) ) {
	function wrapkit_woo_cross_sells( $columns ) {

		return 4;
	}
	add_filter( 'woocommerce_cross_sells_columns', 'wrapkit_woo_cross_sells', 10, 1 );
}

// Change number of products per row

if ( ! function_exists( 'wrapkit_loop_columns' ) ) {
	function wrapkit_loop_columns() {
		global $wrapkit_data;

		$shop_columns = ! empty( $wrapkit_data['sd_shop_columns'] ) ? $wrapkit_data['sd_shop_columns'] : '3';

		return $shop_columns;
	}
	add_filter( 'loop_shop_columns', 'wrapkit_loop_columns' );
}

// Rearrange content product

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

// Rearrange single product

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 29 );

// on single product pages

if ( ! function_exists( 'wrapkit_woo_custom_cart_button_text' ) ) {
	function wrapkit_woo_custom_cart_button_text() {
	
	  global $woocommerce;
		
		foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {
			$_product = $values['data'];
		
			if ( get_the_ID() == $_product->get_id() ) {
				return esc_html__( 'Add Again?', 'wrapkit' );
			}
		}
		
		return esc_html__( 'Add to Cart', 'wrapkit' );
	}
	add_filter( 'woocommerce_product_single_add_to_cart_text', 'wrapkit_woo_custom_cart_button_text' );
}

// on product archive

if ( ! function_exists( 'wrapkit_woo_archive_custom_cart_button_text' ) ) {
	function wrapkit_woo_archive_custom_cart_button_text() {
	
		global $woocommerce;
		
		foreach($woocommerce->cart->get_cart() as $cart_item_key => $values ) {
			$_product = $values['data'];
		
			if( get_the_ID() == $_product->get_id() ) {
				return esc_html__('Add Again?', 'wrapkit');
			}
		}
		
		return esc_html__('Add to cart', 'wrapkit');
	}
	
	
	
	
	add_filter( 'woocommerce_product_add_to_cart_text', 'wrapkit_woo_archive_custom_cart_button_text' );
}

// display out of stock

if ( ! function_exists( 'wrapkit_out_of_stock' ) ) {
	function wrapkit_out_of_stock()  {
		global $product;
		
		$output = '';
	
		if ( ! $product->is_in_stock() ) {
			$output .= '<div class="sd-off-price">';
			$output .= '<span class="sd-sale-text sd-sale-text-first">' . esc_html__( 'Sold Out', 'wrapkit' ) . '</span>';
			$output .= '</div>';
			$output .= '<!-- sd-off-price -->';
			
			echo $output;
		}
	}
	add_action( 'woocommerce_before_single_product_summary', 'wrapkit_out_of_stock' );
}
// change sale badge
if ( ! function_exists( 'wrapkit_sale_badge' ) ) {
	function wrapkit_sale_badge( $html ) {
		$out = '<span class="onsale"><span>' . esc_html__( 'Sale!', 'wrapkit' ) . ' </span></span>';
		
		return $out;
	}
	add_filter( 'woocommerce_sale_flash', 'wrapkit_sale_badge' );
}

// remove sale badge from single product

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

// remove breadcrumbs
if ( ! function_exists( 'wrapkit_remove_woo_breadcrumbs' ) ) {
	function wrapkit_remove_woo_breadcrumbs() {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	}
	add_action( 'init', 'wrapkit_remove_woo_breadcrumbs' );
}

// Add share icons to single product

if ( ! function_exists ( 'wrapkit_single_product_share_icons' ) ) {
	function wrapkit_single_product_share_icons() {
		
		global $post;
		
		$product_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), false, '' );
?>
		<ul>
			<li>
				<a class="sd-link-trans" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>&amp;t=<?php echo urlencode( get_the_title() ); ?>" title="<?php esc_attr_e( 'Share on Facebook', 'wrapkit' ) ?>" target="_blank" rel="nofollow"><i class="fa fa-facebook"></i></a>
			</li>
			
			<li>
				<a class="sd-link-trans" href="http://twitter.com/home?status=<?php echo urlencode( get_the_title() ); ?>: <?php echo urlencode( get_permalink() ); ?>" title="<?php esc_attr_e( 'Share on Twitter', 'wrapkit' ) ?>" target="_blank" rel="nofollow" ><i class="fa fa-twitter"></i></a>
			</li>
			
			<li>
				<a class="sd-link-trans" href="https://plus.google.com/share?url=<?php echo urlencode( get_permalink() ); ?>" title="<?php esc_attr_e( 'Share on Google Plus', 'wrapkit' ) ?>" target="_blank" rel="nofollow"><i class="fa fa-google-plus"></i></a>
			</li>
			<li>
				<a class="sd-link-trans" href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode( get_permalink() ); ?>&amp;media=<?php echo $product_image[0]; ?>&amp;description=<?php echo urlencode( get_the_title() ); ?>" title="<?php esc_attr_e( 'Pin on Pinterest', 'wrapkit' ) ?>" target="_blank" rel="nofollow"><i class="fa fa-pinterest"></i></a>
			</li>			
			<li>
				<a class="sd-link-trans" href="mailto:?subject=<?php echo urlencode( get_the_title() );?>&amp;body=<?php echo urlencode( get_permalink() ); ?>" title="<?php esc_attr_e( 'Share on E-Mail', 'wrapkit' ) ?>" target="_blank" rel="nofollow"><i class="fa fa-envelope"></i></a>
			</li>
		</ul>	
		
<?php	
	}
	//add_action('woocommerce_share','sd_single_product_share_icons');
}

// Change category thumb to full size

function wrapkit_cat_thumb( $category ) {
    
	$small_thumbnail_size = apply_filters( 'single_product_small_thumbnail_size', 'full' );
    $dimensions = wc_get_image_size( $small_thumbnail_size );
    $thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true  );
     
    if ( $thumbnail_id ) {
        $image = wp_get_attachment_image_src( $thumbnail_id, $small_thumbnail_size  );
        $image = $image[0];
    } else {
        $image = wc_placeholder_img_src();
    }
     
    if ( $image ) { 
        $image = str_replace( ' ', '%20', $image );
        echo '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '" width="' . esc_attr( $dimensions['width'] ) . '" height="' . esc_attr( $dimensions['height'] ) . '" />';
    }
}


// Set image dimensions upon theme activation
if ( ! function_exists ( 'wrapkit_woo_image_dimensions' ) ) {
	function wrapkit_woo_image_dimensions() {
		global $pagenow;
	 
		if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
			return;
		}
	
		$catalog = array(
			'width' 	=> '360',	// px
			'height'	=> '260',	// px
			'crop'		=> 1 		// true
		);
	
		$single = array(
			'width' 	=> '505',	// px
			'height'	=> '505',	// px
			'crop'		=> 1 		// true
		);
	
		$thumbnail = array(
			'width' 	=> '195',	// px
			'height'	=> '195',	// px
			'crop'		=> 1 		// false
		);
	
		// Image sizes
		update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
		update_option( 'shop_single_image_size', $single ); 		// Single product image
		update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
	}

	add_action( 'after_switch_theme', 'wrapkit_woo_image_dimensions', 1 );
}

// Ajax header cart

if ( ! function_exists( 'wrapkit_add_to_cart_fragment_header' ) ) {
	function wrapkit_add_to_cart_fragment_header( $fragments ) {
	
		global $woocommerce;
	
		ob_start();
?>
		<?php 
			if ( sizeof( $woocommerce->cart->cart_contents ) > 0 ) {
			$count = $woocommerce->cart->cart_contents_count;
			$nr = '<span class="sd-items-count sd-items-cart">' . $count . '</span>';
		} else {
			$nr = '<span class="sd-items-count sd-items-cart">0</span>';	
		}
		?>
			<?php echo $nr; ?>
		<?php
			$fragments['.sd-items-cart'] = ob_get_clean();
	
			return $fragments;
				
	}
	add_filter('add_to_cart_fragments', 'wrapkit_add_to_cart_fragment_header');
}

if ( ! function_exists( 'wrapkit_header_cart_icon' ) ) {
	function wrapkit_header_cart_icon() {

		global $woocommerce, $wrapkit_data;
		
		if ( sizeof( $woocommerce->cart->cart_contents ) > 0 ) {
			$count = $woocommerce->cart->cart_contents_count;
			$nr = '<span class="sd-items-count sd-items-cart">' . $count . '</span>';
		} else {
			$nr = '<span class="sd-items-cart">0';	
		}

		$cart_url = $woocommerce->cart->get_cart_url();
		
		return '<a class="sd-minicart-link" href="' . $cart_url . '" title="' . esc_attr( 'View cart content', 'wrapkit' ) . '"><i class="fa fa-shopping-cart"></i>' . $nr . '</a>';
	}
}


// check if empty array value

if ( ! function_exists ( 'wrapkit_is_empty' ) ) {
	function wrapkit_is_empty( $array ) {
		foreach ( $array as $k => $v ) {
			if ( empty( $v['image_src'] ) ) {
				return false;
			} else {
				return true;	
			}
		}
	}
}

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );



// remove meta from single product page
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

// add item loop wrapper to thumb image

if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
	function woocommerce_template_loop_product_thumbnail() {
		echo wrapkit_woo_get_product_thumbnail();
	}
}
if ( ! function_exists( 'wrapkit_woo_get_product_thumbnail' ) ) {   
	function wrapkit_woo_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
		global $post, $woocommerce, $product;
		$output = '<div class="sd-product-item-thumb">';

		if ( has_post_thumbnail() ) {               
			$output .= get_the_post_thumbnail( $post->ID, $size );              
		}
		
		if ( $product->is_in_stock() && $product->is_on_sale() && $product->is_type( 'variable' ) ) {
			
			$output .= '<div class="sd-off-price">';
			$output .= '<span class="sd-sale-text sd-sale-text-first">' . esc_html__( 'SALE', 'wrapkit' ) . '</span>';
			$output .= '</div>';
			$output .= '<!-- sd-off-price -->';

		} elseif ( $product->is_in_stock() && $product->is_on_sale() && $product->is_type( 'simple' ) ) {
			
			$percentage = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
			
			$output .= '<div class="sd-off-price sd-off-price-off">';
			$output .= '<span class="sd-sale-text">' . esc_html( $percentage ) . esc_html_x( '% OFF', '% of price', 'wrapkit' ) . '</span>';
			$output .= '</div>';
			$output .= '<!-- sd-off-price -->';
			
		}
		
		if ( ! $product->is_in_stock() ) {
			$output .= '<div class="sd-off-price sd-solout-text">';
			$output .= '<span class="sd-sale-text  sd-sale-text-first">' . esc_html__( 'Sold Out', 'wrapkit' ) . '</span>';
			$output .= '</div>';
			$output .= '<!-- sd-off-price -->';
		}
		
		$output .= '</div>';
		return $output;
	}
}

// remove Product Description heading fron single product
if ( ! function_exists ( 'wrapkit_remove_woo_tab_prod_desc' ) ) {
	function wrapkit_remove_woo_tab_prod_desc() {
		return '';
	}
	add_filter( 'woocommerce_product_description_heading', 'wrapkit_remove_woo_tab_prod_desc' );
	add_filter( 'woocommerce_product_additional_information_heading', 'wrapkit_remove_woo_tab_prod_desc' );
	add_filter( 'woocommerce_product_reviews_heading', 'wrapkit_remove_woo_tab_prod_desc' );
}

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);


remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );


// remove sidebar from single page
if ( ! function_exists( 'wrapkit_remove_sidebar_single_product' ) ) {   
	function wrapkit_remove_sidebar_single_product() {
		if ( is_singular('product') ) {
			remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');
		}
	}
	add_action('template_redirect', 'wrapkit_remove_sidebar_single_product');
}