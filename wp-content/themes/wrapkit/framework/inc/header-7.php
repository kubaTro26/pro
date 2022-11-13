<?php
/**
 * Header Style 7
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
$wrapkit_data = wrapkit_global();

$sd_h7_top_bar       = isset( $wrapkit_data['sd_h7_top_bar'] ) ? $wrapkit_data['sd_h7_top_bar'] : NULL;
$sd_h7_top_bar_text  = isset( $wrapkit_data['sd_h7_top_bar_text'] ) ? $wrapkit_data['sd_h7_top_bar_text'] : NULL;
$sd_h7_button        = isset( $wrapkit_data['sd_h7_button'] ) ? $wrapkit_data['sd_h7_button'] : NULL;
$sd_h7_button_url    = isset( $wrapkit_data['sd_h7_button_url'] ) ? $wrapkit_data['sd_h7_button_url'] : NULL;
$sd_h7_button_target = isset( $wrapkit_data['sd_h7_button_target'] ) ? $wrapkit_data['sd_h7_button_target'] : NULL;
$sd_h7_email         = isset( $wrapkit_data['sd_h7_email'] ) ? sanitize_email( $wrapkit_data['sd_h7_email'] ) : NULL;
$sd_h7_phone         = isset( $wrapkit_data['sd_h7_phone'] ) ? $wrapkit_data['sd_h7_phone'] : NULL;
$sd_h7_hours         = isset( $wrapkit_data['sd_h7_hours'] ) ? $wrapkit_data['sd_h7_hours'] : NULL;
$sd_h7_social_icons  = isset( $wrapkit_data['sd_h7_social_icons'] ) ? $wrapkit_data['sd_h7_social_icons'] : NULL;

?>

<div class="sd-header7">
	<div class="header7">
		<div class="container po-relative">
			<?php if ( $sd_h7_top_bar == '1' ) : ?>
				<div class="h7-topbar">
					<div class="d-flex justify-content-between font-14">
							<div class=" hidden-md-down align-self-center">
								<?php
									if ( ! empty( $sd_h7_top_bar_text ) ) {
										echo esc_html( $sd_h7_top_bar_text );
									}
								?>
							</div>
						<?php if ( ! empty( $sd_h7_button ) ) : ?>
							<div class="con-btn">
								<a href="<?php echo esc_url( $sd_h7_button_url ); ?>" class="btn btn-success-gradiant btn-rounded btn-sm" <?php if ( $sd_h7_button_target == '1' ) { echo 'target="_blank"'; } ?>><?php echo esc_html( $sd_h7_button ); ?></a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
			
			<div class="h7-nav-bar">
				<div class="logo-box"><?php echo wrapkit_theme_logo(); ?></div>
				<button class="btn btn-success btn-circle hidden-md-up op-clo"><i class="ti-menu"></i></button>
				<nav class="h7-nav-box">
					<div class="h7-mini-bar">
						<div class="d-flex justify-content-between">
							<div class="gen-info font-14">
								<?php if ( ! empty( $sd_h7_email ) ) : ?>
									<span><i class="fa fa-envelope"></i><a href="<?php echo 'mailto:' . antispambot( $sd_h7_email, 1 ); ?>"> <?php echo antispambot( $sd_h7_email ); ?></a></span>
								<?php endif; ?>
								<?php if ( ! empty( $sd_h7_phone ) ) : ?>
									<span><i class="fa fa-phone-square"></i><a href="tel:<?php echo esc_html( rawurlencode( $sd_h7_phone ) ); ?>"> <?php echo esc_html( $sd_h7_phone ); ?></a></span>
								<?php endif; ?>
								<?php if ( ! empty( $sd_h7_hours ) ) : ?>
									<span class="hidden-lg-down"><i class="fa fa-clock-o"></i> <?php echo esc_html( $sd_h7_hours ); ?></span>
								<?php endif; ?>
							</div>
							<div class="social-info hidden-lg-down">
								<?php if ( $sd_h7_social_icons == '1' ) : ?>
									<ul class="list-inline">
										<?php echo wrapkit_social(); ?>
									</ul>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="main-nav">
						<?php get_template_part( 'framework/inc/main-menu' ); ?>
					</div>
				</nav>
			</div>
		</div>
	</div>
</div>