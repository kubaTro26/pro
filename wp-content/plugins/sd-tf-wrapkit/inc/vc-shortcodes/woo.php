<?php
/**
 * Woo VC Shortcode
 *
 * @package	wrapkit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since wrapkit 1.0
 */

// recent products

if ( ! function_exists('wrapkit_woo_products' ) ) {
	function wrapkit_woo_products( $atts, $content = NULL ){
		$sd = shortcode_atts( array(
			'products' => 'recent_products',
			'per_page' => '3',
			'orderby'  => '',
			'order'    => '',
			'category' => '',
		), $atts );
		
		$products = $sd['products'];		
		$per_page = $sd['per_page'];
		$orderby  = $sd['orderby'];
		$order    = $sd['order'];
		$category = $sd['category'];
		
		$cats = ( ! empty( $category ) ? 'category="' . $category . '"' : ' ' );
			

		
		ob_start();
			
	?>
		<div class="sd-woo-short">
			<?php echo do_shortcode( '['. $products .' per_page="' . $per_page . '" orderby="' . $orderby . '" order="' . $order . '" ' . $cats . ' columns="3" ]' ); ?>
		</div>
		
	<?php					
		return ob_get_clean();
	}
	add_shortcode( 'sd_woo_products', 'wrapkit_woo_products' );
}

// register shortcode to VC

add_action( 'vc_before_init', 'wrapkit_woo_products_vcmap' );

if ( ! function_exists( 'wrapkit_woo_products_vcmap' ) ) {
	function wrapkit_woo_products_vcmap() {
		vc_map( array(
			'name'					=> esc_html__( 'Woo Products', 'wrapkit' ),
			'description'			=> esc_html__( 'WooCommerce products', 'wrapkit' ),
			'base'					=> "sd_woo_products",
			'class'					=> "sd-woo-products",
			'icon'              => plugin_dir_url( __DIR__ ) . 'images/vc-icons/woo-icon-min.png',
			'category'				=> esc_html__( 'WrapKit', 'wrapkit' ),
			'params'				=> array(
				array(
					'type'			=> 'dropdown',
					'class'			=> '',
					'heading'		=> esc_html__( 'Products', 'wrapkit' ),
					'param_name'	=> 'products',
					'value' => array( 
						'Recent Products'   => 'recent_products',
						'Featured Products' => 'featured_products',
						'Sale Products'     => 'sale_products',
						'Best Selling'      => 'best_selling_products',
						'Top Rated'         => 'top_rated_products',
						'Products Category' => 'product_category',
					),
					'description'	=> esc_html__( 'Select the products type', 'wrapkit' )
				),
				array(
					'type'			=> 'textfield',
					'class'			=> '',
					'heading'		=> esc_html__( 'Categories Slugs', 'wrapkit' ),
					'param_name'	=> 'category',
					'description'	=> esc_html__( 'Insert the slugs of your categories separated by comma.', 'wrapkit' ),
					'dependency'	=> array(
						'element'	=> "products",
						'value'		=> array( 'product_category' ),
					),
				),
				array(
					'type'			=> 'textfield',
					'class'			=> '',
					'heading'		=> esc_html__( 'Number of Products to Show', 'wrapkit' ),
					'param_name'	=> 'per_page',
					'value'			=> '3',
					'description'	=> esc_html__( 'Insert the number of products to display in the carousel', 'wrapkit' ),
				),
				array(
					'type'			=> 'dropdown',
					'class'			=> '',
					'heading'		=> esc_html__( 'Order By', 'wrapkit' ),
					'param_name'	=> 'orderby',
					'value' 		=> array( 'none', 'ID', 'title', 'name', 'date', 'random' => 'rand' ),
					'description'	=> esc_html__( 'Select the "oderby" parameter', 'wrapkit' ),
					'dependency'	=> array(
						'element'	=> "products",
						'value'		=> array( 'recent_products', 'featured_products', 'sale_products', 'top_rated_products', 'product_category' ),
					),
				),
				array(
					'type'			=> 'dropdown',
					'class'			=> '',
					'heading'		=> esc_html__( 'Order', 'wrapkit' ),
					'param_name'	=> 'order',
					'value' => array( 'descending' => 'DESC', 'ascending' => 'ASC' ),
					'description'	=> esc_html__( 'Select the "order" parameter', 'wrapkit' ),
					'dependency'	=> array(
						'element'	=> "products",
						'value'		=> array( 'recent_products', 'featured_products', 'sale_products', 'top_rated_products', 'product_category' ),
					),
				),
			)
		));
	}
}