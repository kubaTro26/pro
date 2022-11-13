<?php
/**
 * Header Style 6
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
$wrapkit_data = wrapkit_global();

$sd_h6_top_bar        = isset( $wrapkit_data['sd_h6_top_bar'] ) ? $wrapkit_data['sd_h6_top_bar'] : NULL;
$sd_h6_top_bar_text   = isset( $wrapkit_data['sd_h6_top_bar_text'] ) ? $wrapkit_data['sd_h6_top_bar_text'] : NULL;
$sd_h6_link1          = isset( $wrapkit_data['sd_h6_link1'] ) ? $wrapkit_data['sd_h6_link1'] : NULL;
$sd_h6_link1_url      = isset( $wrapkit_data['sd_h6_link1_url'] ) ? $wrapkit_data['sd_h6_link1_url'] : NULL;
$sd_h6_link1_target   = isset( $wrapkit_data['sd_h6_link1_target'] ) ? $wrapkit_data['sd_h6_link1_target'] : NULL;
$sd_h6_link2          = isset( $wrapkit_data['sd_h6_link2'] ) ? $wrapkit_data['sd_h6_link2'] : NULL;
$sd_h6_link2_url      = isset( $wrapkit_data['sd_h6_link2_url'] ) ? $wrapkit_data['sd_h6_link2_url'] : NULL;
$sd_h6_link2_target   = isset( $wrapkit_data['sd_h6_link2_target'] ) ? $wrapkit_data['sd_h6_link2_target'] : NULL;
$sd_h6_cart           = isset( $wrapkit_data['sd_h6_cart'] ) ? $wrapkit_data['sd_h6_cart'] : NULL;
$sd_h6_cart_url       = isset( $wrapkit_data['sd_h6_cart_url'] ) ? $wrapkit_data['sd_h6_cart_url'] : NULL;
$sd_h6_cart_target    = isset( $wrapkit_data['sd_h6_cart_target'] ) ? $wrapkit_data['sd_h6_cart_target'] : NULL;
$sd_h6_button1        = isset( $wrapkit_data['sd_h6_button1'] ) ? $wrapkit_data['sd_h6_button1'] : NULL;
$sd_h6_button1_url    = isset( $wrapkit_data['sd_h6_button1_url'] ) ? $wrapkit_data['sd_h6_button1_url'] : NULL;
$sd_h6_button1_target = isset( $wrapkit_data['sd_h6_button1_target'] ) ? $wrapkit_data['sd_h6_button1_target'] : NULL;
$sd_h6_button2        = isset( $wrapkit_data['sd_h6_button2'] ) ? $wrapkit_data['sd_h6_button2'] : NULL;
$sd_h6_button2_url    = isset( $wrapkit_data['sd_h6_button2_url'] ) ? $wrapkit_data['sd_h6_button2_url'] : NULL;
$sd_h6_button2_target = isset( $wrapkit_data['sd_h6_button2_target'] ) ? $wrapkit_data['sd_h6_button2_target'] : NULL;

?>

<div class="sd-header6">
	<?php if ( $sd_h6_top_bar == '1' ) : ?>
		<div class="h6-topbar">
			<div class="container">
				<div class="d-flex justify-content-between font-14">
					<div class=" hidden-md-down align-self-center">
						<?php echo esc_html( $sd_h6_top_bar_text ); ?>
					</div>
					<div class="">
						<ul class="list-inline authentication-box">
							<?php if ( ! empty( $sd_h6_link1 ) ) : ?>
								<li>
									<a href="<?php echo esc_url( $sd_h6_link1_url ); ?>" <?php if ( $sd_h6_link1_target == '1' ) { echo 'target="_blank"'; } ?>><?php echo esc_html( $sd_h6_link1 ); ?></a>
								</li>
							<?php endif; ?>
							<?php if ( ! empty( $sd_h6_link1 ) && ! empty( $sd_h6_link2 ) ) : ?>
								<li>
									<a><span class="vdevider"></span></a>
								</li>
							<?php endif; ?>
							<?php if ( ! empty( $sd_h6_link2 ) ) : ?>
								<li>
									<a href="<?php echo esc_url( $sd_h6_link2_url ); ?>" class="b-l" <?php if ( $sd_h6_link2_target == '1' ) { echo 'target="_blank"'; } ?>><?php echo esc_html( $sd_h6_link2 ); ?> </a>
								</li>
							<?php endif; ?>
							<?php if ( $sd_h6_cart == '1' ) : ?>
								<li>
									<a href="<?php echo esc_url( $sd_h6_cart_url ); ?>" <?php if ( $sd_h6_cart_target == '1' ) { echo 'target="_blank"'; } ?>><i class="icon-Shopping-Cart"></i> </a>
								</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="container po-relative sd-header-content">
		<nav class="navbar navbar-expand-lg h6-nav-bar">
			<?php echo wrapkit_theme_logo(); ?>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#h6-info" aria-controls="h6-info" aria-expanded="false" aria-label="Toggle navigation"><span class="ti-menu"></span></button>
			<div class="collapse navbar-collapse hover-dropdown font-14" id="h6-info">
				<?php get_template_part( 'framework/inc/main-menu' ); ?>
				<div class="ml-auto act-buttons">
					<?php if ( ! empty( $sd_h6_button1 ) ) : ?>
						<a href="<?php echo esc_url( $sd_h6_button1_url ); ?>" class="btn btn-secondary font-13" <?php if ( $sd_h6_button1_target == '1' ) { echo 'target="_blank"'; } ?>><?php echo esc_html( $sd_h6_button1 ); ?></a>
					<?php endif; ?>
					<?php if ( ! empty( $sd_h6_button2 ) ) : ?>
						<a href="<?php echo esc_url( $sd_h6_button2_url ); ?>" class="btn btn-danger-gradiant font-14" <?php if ( $sd_h6_button2_target == '1' ) { echo 'target="_blank"'; } ?>><?php echo esc_html( $sd_h6_button2 ); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</nav>
	</div>
</div>