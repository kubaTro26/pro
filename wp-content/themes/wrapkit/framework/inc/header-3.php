<?php
/**
 * Header Style 3
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
$wrapkit_data = wrapkit_global();

$sd_h3_email_address = isset( $wrapkit_data['sd_h3_email_address'] ) ? sanitize_email( $wrapkit_data['sd_h3_email_address'] ) : NULL;
$sd_h3_social_icons  = isset( $wrapkit_data['sd_h3_social_icons'] ) ? $wrapkit_data['sd_h3_social_icons'] : NULL;
$sd_h3_phone         = isset( $wrapkit_data['sd_h3_phone'] ) ? $wrapkit_data['sd_h3_phone'] : NULL;


?>

<div class="sd-header3">
	<div class="header3">
		<div class="po-relative">
			<div class="h3-topbar">
				<div class="container">
					<div class="row">
						
						<div class="col-md-5">
							<?php if ( ! empty( $sd_h3_email_address ) ) : ?>
								<ul class="list-inline">
									<li>
										<a href="<?php echo 'mailto:' . antispambot( $sd_h3_email_address, 1 ); ?>"><i class="icon-Mail info-icon"></i> <?php echo antispambot( $sd_h3_email_address ); ?></a>
									</li>
								</ul>
							<?php endif; ?>
						</div>
						
						<?php if ( $sd_h3_social_icons == '1' || ! empty( $sd_h3_phone ) ) : ?>
							<div class="col-md-7 t-r">
								<ul class="list-inline">
									<?php if ( $sd_h3_social_icons == '1' ) : ?>
										<?php echo wrapkit_social(); ?>
									<?php endif; ?>
									<?php if ( $sd_h3_social_icons == '1' && ! empty( $sd_h3_phone ) ) : ?>
										<li><a><span class="vdevider"></span></a></li>
									<?php endif; ?>
									<?php if ( ! empty( $sd_h3_phone ) ) : ?>
										<li><a href="tel:<?php echo esc_html( rawurlencode( $sd_h3_phone ) ); ?>"><i class="icon-Phone-2 info-icon"></i> <?php echo esc_html( $sd_h3_phone ); ?></a></li>
									<?php endif; ?>
								</ul>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<div class="h3-navbar">
				<div class="container">
					<nav class="navbar navbar-expand-lg h3-nav">
						<?php echo wrapkit_theme_logo(); ?>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header3" aria-expanded="false" aria-label="Toggle navigation"><span class="ti-menu"></span></button>
						<div class="collapse navbar-collapse hover-dropdown" id="header3">
							<?php get_template_part( 'framework/inc/main-menu' ); ?>
							<?php get_template_part( 'framework/inc/secondary-header-menu' ); ?>
						</div>
					</nav>
				</div>
			</div>

		</div>
	</div>
</div>