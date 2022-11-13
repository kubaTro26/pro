<?php
/**
 * Footer Style 1
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
$wrapkit_data = wrapkit_global();

$sd_widgetized_footer = isset( $wrapkit_data['sd_widgetized_footer'] ) ? $wrapkit_data['sd_widgetized_footer'] : NULL;
$sd_footer_sidebars   = isset( $wrapkit_data['sd_footer_sidebars'] ) ? $wrapkit_data['sd_footer_sidebars'] : NULL;
$sd_f1_cta            = isset( $wrapkit_data['sd_f1_cta'] ) ? $wrapkit_data['sd_f1_cta'] : NULL;
$sd_f1_cta_icon       = isset( $wrapkit_data['sd_f1_cta_icon'] ) ? $wrapkit_data['sd_f1_cta_icon'] : NULL;
$sd_f1_cta_url        = isset( $wrapkit_data['sd_f1_cta_url'] ) ? $wrapkit_data['sd_f1_cta_url'] : NULL;
$sd_f1_cta_target     = isset( $wrapkit_data['sd_f1_cta_target'] ) ? $wrapkit_data['sd_f1_cta_target'] : NULL;
$sd_f1_social_icons   = isset( $wrapkit_data['sd_f1_social_icons'] ) ? $wrapkit_data['sd_f1_social_icons'] : NULL;
$sd_copyright         = isset( $wrapkit_data['sd_copyright'] ) ? $wrapkit_data['sd_copyright'] : NULL;

?>

<div class="sd-footer1">
	<div class="footer1 font-14">
		<?php if ( has_nav_menu( 'footer-menu' ) || ! empty( $sd_f1_cta ) ) : ?>
			<div class="f1-topbar">
				<div class="container">
					<div class="row">
						<div class="col-md-12" data-aos="fade-right" data-aos-duration="1200">
							<nav class="navbar navbar-expand-lg f1-nav"> <a class="navbar-brand hidden-md-up" href="#"><?php esc_html_e( 'Footer Navbar', 'wrapkit' ); ?></a>
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ft1" aria-controls="ft1" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle navigation', 'wrapkit' ); ?>"> <span class="ti-menu"></span> </button>
								<div class="collapse navbar-collapse" id="ft1">
									<?php get_template_part( 'framework/inc/footer-menu' ); ?>
									<?php if ( ! empty( $sd_f1_cta ) ) : ?>
										<ul class="navbar-nav ml-auto">
											<li class="nav-item"><a class="nav-link text-uppercase f1-cta-txt" href="<?php echo esc_url( $sd_f1_cta_url ); ?>" <?php if ( $sd_f1_cta_target == '1' ) { echo 'target="_blank"'; } ?>><i class="<?php echo esc_attr( $sd_f1_cta_icon ); ?> font-20 m-r-10 f1-cta-icon"></i><?php echo esc_html( $sd_f1_cta ); ?></a></li>
										</ul>
									<?php endif; ?>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="f1-middle">
			<?php 
				if ( $sd_widgetized_footer == '1' ) { 
					if ( $sd_footer_sidebars == '1' || $sd_footer_sidebars == '5' || $sd_footer_sidebars == '6' ) {
						get_template_part( 'framework/inc/2-sidebars-footer' );
					} else if ( $sd_footer_sidebars == '2' || $sd_footer_sidebars == '4' || $sd_footer_sidebars == '7' || $sd_footer_sidebars == '8') {
						get_template_part( 'framework/inc/3-sidebars-footer' );
					} else if ( $sd_footer_sidebars == '3' ) {
						get_template_part( 'framework/inc/4-sidebars-footer' );
					}

				} 
			?>
		</div>
		<?php if ( ! empty( $sd_copyright ) || $sd_f1_social_icons == '1' ) : ?>
			<div class="f1-bottom-bar">
				<div class="container">
					<div class="d-flex">
						<div class="m-t-10 m-b-10">
							<div class="sd-copy-txt">
								<?php if ( ! empty( $sd_copyright ) ) : ?>
									<?php
										echo wp_kses( $sd_copyright,
											array(
												'script' => array(),
												'br' => array(),
												'i' => array(
													'class' => array(),
												),
												'a' => array(
													'href'  => array(),
													'title' => array(),
												),
												'strong'    => array(),
												'em'        => array(),
												'span' => array(
													'class' => array(),
													'style' => array(),
												),
												'p' => array(
													'class' => array(),
													'style' => array(),
												),
										) );
									?>
								<?php endif; ?>
							</div>
						</div>
						<?php if ( $sd_f1_social_icons == '1' ) : ?>
							<div class="links ml-auto m-t-10 m-b-10 f1-social">
								<?php echo wrapkit_social( $wrap = 0, $nav_item = null, $nav_link = 'link p-10' ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>