<?php
/**
 * Header Style 8
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
$wrapkit_data = wrapkit_global();

$sd_h8_social_icons = isset( $wrapkit_data['sd_h8_social_icons'] ) ? $wrapkit_data['sd_h8_social_icons'] : NULL;
$sd_h8_phone        = isset( $wrapkit_data['sd_h8_phone'] ) ? $wrapkit_data['sd_h8_phone'] : NULL;

?>

<div class="sd-header8">
	<div class="header11 po-relative sd-header-content">
		<div class="container">
			<!-- Header 1 code -->
			<nav class="navbar navbar-expand-lg h11-nav">
				<?php echo wrapkit_theme_logo(); ?>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header11" aria-expanded="false" aria-label="Toggle navigation"><span class="ti-menu"></span></button>
				<div class="collapse navbar-collapse hover-dropdown flex-column" id="header11">
					<?php if ( $sd_h8_social_icons == '1' || ! empty( $sd_h8_phone ) ) : ?>
						<div class="ml-auto h11-topbar">
							<ul class="list-inline ">
								<?php if ( $sd_h8_social_icons == '1' ) : ?>
									<?php echo wrapkit_social(); ?>
								<?php endif; ?>
								<?php if ( $sd_h8_social_icons == '1' && ! empty( $sd_h8_phone ) ) : ?>
									<li><a><span class="vdevider"></span></a></li>
								<?php endif; ?>
								<?php if ( ! empty( $sd_h8_phone ) ) : ?>
									<li><a class="sd-h8-tel" href="tel:<?php echo esc_html( rawurlencode( $sd_h8_phone ) ); ?>"><i class="icon-Phone-2"></i> <?php echo esc_html( $sd_h8_phone ); ?></a></li>
								<?php endif; ?>
							</ul>
						</div>
					<?php endif; ?>
					<?php get_template_part( 'framework/inc/main-menu' ); ?>
				</div>
			</nav>
		</div>
	</div>
</div>