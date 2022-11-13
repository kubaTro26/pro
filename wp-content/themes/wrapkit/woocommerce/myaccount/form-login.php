<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<div class="<?php if ( is_page_template( 'full-width-page.php' ) ) echo 'container'; ?> sd-form-login">
	<?php wc_print_notices(); ?>
	
	<?php do_action( 'woocommerce_before_customer_login_form' ); ?>
	
	<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>
	
	<div class="col2-set" id="customer_login">
		<div class="row">
			<div class="col-1 col-md-6">
		
		<?php endif; ?>
		
				<h3 class="sd-widget-title"><?php _e( 'I already have an account', 'wrapkit' ); ?></h3>
		
				<form method="post" class="login">
		
					<?php do_action( 'woocommerce_login_form_start' ); ?>
		
					<p class="form-row form-row-wide">
						<label for="username"><?php _e( 'Username or email address', 'wrapkit' ); ?> <span class="required">*</span></label>
						<input type="text" class="input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
					</p>
					<p class="form-row form-row-wide">
						<label for="password"><?php _e( 'Password', 'wrapkit' ); ?> <span class="required">*</span></label>
						<input class="input-text" type="password" name="password" id="password" />
					</p>
		
					<?php do_action( 'woocommerce_login_form' ); ?>
		
					<p class="form-row">
						<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
						<input type="submit" class="button sd-link-trans" name="login" value="<?php _e( 'Login', 'wrapkit' ); ?>" />
						<label for="rememberme" class="inline sd-remember-me">
							&nbsp;&nbsp;<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'wrapkit' ); ?>
						</label>
					</p>
					<p class="lost_password">
						<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'wrapkit' ); ?></a>
					</p>
		
					<?php do_action( 'woocommerce_login_form_end' ); ?>
		
				</form>
		
		<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>
		
			</div>
		
			<div class="col-2 col-md-6">
		
				<h3 class="sd-widget-title"><?php _e( 'I am new here', 'wrapkit' ); ?></h3>
		
				<form method="post" class="register">
		
					<?php do_action( 'woocommerce_register_form_start' ); ?>
		
					<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
		
						<p class="form-row form-row-wide">
							<label for="reg_username"><?php _e( 'Username', 'wrapkit' ); ?> <span class="required">*</span></label>
							<input type="text" class="input-text" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
						</p>
		
					<?php endif; ?>
		
					<p class="form-row form-row-wide">
						<label for="reg_email"><?php _e( 'Email address', 'wrapkit' ); ?> <span class="required">*</span></label>
						<input type="email" class="input-text" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
					</p>
		
					<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
		
						<p class="form-row form-row-wide">
							<label for="reg_password"><?php _e( 'Password', 'wrapkit' ); ?> <span class="required">*</span></label>
							<input type="password" class="input-text" name="password" id="reg_password" />
						</p>
		
					<?php endif; ?>
		
					<!-- Spam Trap -->
					<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'wrapkit' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>
		
					<?php do_action( 'woocommerce_register_form' ); ?>
					<?php do_action( 'register_form' ); ?>
		
					<p class="form-row">
						<?php wp_nonce_field( 'woocommerce-register' ); ?>
						<input type="submit" class="button sd-link-trans" name="register" value="<?php esc_attr_e( 'Register', 'wrapkit' ); ?>" />
					</p>
		
					<?php do_action( 'woocommerce_register_form_end' ); ?>
		
				</form>
		
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
</div>