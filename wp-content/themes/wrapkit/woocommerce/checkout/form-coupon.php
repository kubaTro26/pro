<?php
/**
 * Checkout coupon form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! WC()->cart->coupons_enabled() ) {
	return;
}
?>
<?php $info_message = apply_filters( 'woocommerce_checkout_coupon_message', '<div class="sd-checkout-coupon"><i class="fa fa-info-circle"></i> ' . esc_html__( 'Have a coupon?', 'wrapkit' ) . ' <a href="#" class="showcoupon">' . esc_html__( 'Click here to enter your code', 'wrapkit' ) . '</a>' );
wc_print_notice( $info_message, 'notice' );
?>

	<div class="row">
		<div class="col-md-6">
			<form class="checkout_coupon sd-coupon-form" method="post" style="display:none">
			
					<input type="submit" class="button sd-coupon-button sd-opacity-trans" name="apply_coupon" value="<?php esc_attr_e( 'Apply Coupon', 'wrapkit' ); ?>" />
					<div class="sd-coupon-input">
						<input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e( 'Coupon code', 'wrapkit' ); ?>" id="coupon_code" value="" />
					</div>
			
				<div class="clearfix"></div>
			</form>
		</div>
	</div>
</div>