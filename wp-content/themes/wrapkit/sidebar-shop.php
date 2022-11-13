<?php
/**
 * Shop Sidebar
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
?>

<div class="col-xs-12 col-md-3 sd-sidebar-shop">
	<?php
		if ( is_active_sidebar( 'woocommerce-sidebar' ) ) {
			dynamic_sidebar( 'woocommerce-sidebar' );
		}
	?>
</div>