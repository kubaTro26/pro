<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$wrapkit_data = wrapkit_global();

$shop_sidebar = ! empty( $wrapkit_data['sd_shop_page_sidebar'] )  ? $wrapkit_data['sd_shop_page_sidebar'] : '2' ;

if ( $shop_sidebar == '1' ) {
	
	$container = '';
	
} else if ( $shop_sidebar == '2' ) {
	$container = 'container';
} else {
	$container = '';
}

get_header( 'shop' ); ?>
<div class="sd-shop-wrap">
	<?php if ( $shop_sidebar == '1' ) : ?>
		<div class="container">
			<div class="row">
				<div class="col-md-9">
	<?php endif; ?>
		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>
		
		<div class="sd-woo-container <?php echo esc_attr( $container ); ?>">
		<?php
			/**
			 * woocommerce_before_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			 * @hooked woocommerce_breadcrumb - 20
			 */
			do_action( 'woocommerce_before_main_content' );
		?>
	
			<?php	if ( have_posts() ) {

			/**
			* Hook: woocommerce_before_shop_loop.
			*
			* @hooked wc_print_notices - 10
			* @hooked woocommerce_result_count - 20
			* @hooked woocommerce_catalog_ordering - 30
			*/
			do_action( 'woocommerce_before_shop_loop' );
			?>
			<div class="clearfix"></div>
			<div class="row">
			<?php
			woocommerce_product_loop_start();

			if ( wc_get_loop_prop( 'total' ) ) {
				while ( have_posts() ) {
					the_post();

					/**
					 * Hook: woocommerce_shop_loop.
					 *
					 * @hooked WC_Structured_Data::generate_product_data() - 10
					 */
					do_action( 'woocommerce_shop_loop' );

					wc_get_template_part( 'content', 'product' );
				}
			}

			woocommerce_product_loop_end(); ?>
			</div>
						<!-- row -->
			<?php

			/**
			 * Hook: woocommerce_after_shop_loop.
			 *
			 * @hooked woocommerce_pagination - 10
			 */
			do_action( 'woocommerce_after_shop_loop' );
			} else {
			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action( 'woocommerce_no_products_found' );
			}
			?>
	
			<?php
				/**
				 * woocommerce_after_main_content hook.
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				do_action( 'woocommerce_after_main_content' );
			?>
			</div>
			<!-- sd-woo-container -->
	<?php if ( $shop_sidebar == '1' ) : ?>
				</div>
				<!-- col-md-8-->
				<?php
					/**
					 * woocommerce_sidebar hook
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */
					do_action( 'woocommerce_sidebar' );
				?>
			</div>
			<!-- row -->
		</div>
		<!-- container -->
	<?php endif; ?>
</div>
<!-- sd-shop-wrap -->
<?php get_footer( 'shop' ); ?>