<?php
/**
 * Header Style 9
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
$wrapkit_data = wrapkit_global();

$sd_h9_top_bar      = isset( $wrapkit_data['sd_h9_top_bar'] ) ? $wrapkit_data['sd_h9_top_bar'] : NULL;
$sd_h9_link1        = isset( $wrapkit_data['sd_h9_link1'] ) ? $wrapkit_data['sd_h9_link1'] : NULL;
$sd_h9_link1_url    = isset( $wrapkit_data['sd_h9_link1_url'] ) ? $wrapkit_data['sd_h9_link1_url'] : NULL;
$sd_h9_link1_target = isset( $wrapkit_data['sd_h9_link1_target'] ) ? $wrapkit_data['sd_h9_link1_target'] : NULL;
$sd_h9_link2        = isset( $wrapkit_data['sd_h9_link2'] ) ? $wrapkit_data['sd_h9_link2'] : NULL;
$sd_h9_link2_url    = isset( $wrapkit_data['sd_h9_link2_url'] ) ? $wrapkit_data['sd_h9_link2_url'] : NULL;
$sd_h9_link2_target = isset( $wrapkit_data['sd_h9_link2_target'] ) ? $wrapkit_data['sd_h9_link2_target'] : NULL;
$sd_h9_email        = isset( $wrapkit_data['sd_h9_email'] ) ? sanitize_email( $wrapkit_data['sd_h9_email'] ) : NULL;
$sd_h9_phone        = isset( $wrapkit_data['sd_h9_phone'] ) ? $wrapkit_data['sd_h9_phone'] : NULL;
$sd_h9_social_icons = isset( $wrapkit_data['sd_h9_social_icons'] ) ? $wrapkit_data['sd_h9_social_icons'] : NULL;
$sd_h9_button = isset( $wrapkit_data['sd_h9_button'] ) ? $wrapkit_data['sd_h9_button'] : NULL;
$sd_h9_button_url = isset( $wrapkit_data['sd_h9_button_url'] ) ? $wrapkit_data['sd_h9_button_url'] : NULL;
$sd_h9_button_target = isset( $wrapkit_data['sd_h9_button_target'] ) ? $wrapkit_data['sd_h9_button_target'] : NULL;

?>

<div class="sd-header12">
	<div class="header12 po-relative">
		<?php if ( $sd_h9_top_bar == '1' && ! empty( $sd_h9_link1 ) || ! empty( $sd_h9_link2 ) || ! empty( $sd_h9_email ) || ! empty( $sd_h9_phone ) || $sd_h9_social_icons == '1' ) : ?>
			<div class="h12-topbar">
				<div class="container">
					<nav class="navbar navbar-expand-lg font-14">
						<a class="navbar-brand hidden-lg-up" href="#"><?php esc_html_e( 'Top Menu', 'wrapkit' ); ?></a>
						<button class="navbar-toggler op-5" type="button" data-toggle="collapse" data-target="#header12" aria-controls="header12" aria-expanded="false" aria-label="Toggle navigation">
							<span class="sl-icon-options-vertical"></span>
						</button>
						<div class="collapse navbar-collapse" id="header12">
							<?php if ( ! empty( $sd_h9_link1 ) || ! empty( $sd_h9_link2 ) ) : ?>
								<ul class="navbar-nav">
									<?php if ( ! empty( $sd_h9_link1 ) ) : ?>
										<li class="nav-item active"><a class="nav-link" href="<?php echo esc_url( $sd_h9_link1_url ); ?>" <?php if ( $sd_h9_link1_target == '1' ) { echo 'target="_blank"'; } ?>><?php echo esc_html( $sd_h9_link1 ); ?></a></li>
									<?php endif; ?>
									<?php if ( ! empty( $sd_h9_link2 ) ) : ?>
										<li class="nav-item"><a class="nav-link" href="<?php echo esc_url( $sd_h9_link2_url ); ?>" <?php if ( $sd_h9_link2_target == '1' ) { echo 'target="_blank"'; } ?>><?php echo esc_html( $sd_h9_link2 ); ?></a></li>
									<?php endif; ?>
								</ul>
							<?php endif; ?>
							<?php if ( ! empty( $sd_h9_email ) || ! empty( $sd_h9_phone ) || $sd_h9_social_icons == '1' ) : ?> 
								<ul class="navbar-nav ml-auto">
									<?php if ( ! empty( $sd_h9_email ) ) : ?>
										<li class="nav-item active">
											<a href="<?php echo 'mailto:' . antispambot( $sd_h9_email, 1 ); ?>" class="nav-link"><i class="fa fa-envelope"></i> <?php echo antispambot( $sd_h9_email ); ?></a>
										</li>
									<?php endif; ?>
									<?php if ( ! empty( $sd_h9_phone ) ) : ?>
										<li class="nav-item active">
											<a class="nav-link" href="tel:<?php echo esc_html( rawurlencode( $sd_h9_phone ) ); ?>"><i class="icon-Phone-2"></i> <?php echo esc_html( $sd_h9_phone ); ?></a>
										</li>
									<?php endif; ?>
									<?php if ( $sd_h9_social_icons == '1' ) : ?>
										
												<?php echo wrapkit_social(); ?>
										
									<?php endif; ?>
								</ul>
							<?php endif; ?>
						</div>
					</nav>
				</div>
			</div>
		<?php endif; ?>

		<div class="container sd-header-content">
			
			<nav class="navbar navbar-expand-lg hover-dropdown h12-nav">
				<?php echo wrapkit_theme_logo(); ?>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header12-1" aria-controls="header12-1" aria-expanded="false" aria-label="Toggle navigation">
					<span class="ti-menu"></span>
				</button>
				<div class="collapse navbar-collapse" id="header12-1">
					<?php get_template_part( 'framework/inc/main-menu' ); ?>
					<?php if ( ! empty( $sd_h9_button ) ) : ?>
						<a class="btn btn-info-gradiant" href="<?php echo esc_url( $sd_h9_button_url ); ?>" <?php if ( $sd_h9_button_target == '1' ) { echo 'target="_blank"'; } ?>><?php echo esc_html( $sd_h9_button ); ?></a>
					<?php endif; ?>
				</div>
			</nav>

		</div>
	</div>
</div>