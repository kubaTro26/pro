<?php
/**
 * Header Style 13
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
$wrapkit_data = wrapkit_global();

$sd_h13_top_bar       = isset( $wrapkit_data['sd_h13_top_bar'] ) ? $wrapkit_data['sd_h13_top_bar'] : NULL;
$sd_h13_top_bar_text  = isset( $wrapkit_data['sd_h13_top_bar_text'] ) ? $wrapkit_data['sd_h13_top_bar_text'] : NULL;
$sd_h13_email         = isset( $wrapkit_data['sd_h13_email'] ) ? sanitize_email( $wrapkit_data['sd_h13_email'] ) : NULL;
$sd_h13_social_icons  = isset( $wrapkit_data['sd_h13_social_icons'] ) ? $wrapkit_data['sd_h13_social_icons'] : NULL;
$sd_h13_hours         = isset( $wrapkit_data['sd_h13_hours'] ) ? $wrapkit_data['sd_h13_hours'] : NULL;
$sd_h13_phone_text    = isset( $wrapkit_data['sd_h13_phone_text'] ) ? $wrapkit_data['sd_h13_phone_text'] : NULL;
$sd_h13_phone         = isset( $wrapkit_data['sd_h13_phone'] ) ? $wrapkit_data['sd_h13_phone'] : NULL;
$sd_h13_button        = isset( $wrapkit_data['sd_h13_button'] ) ? $wrapkit_data['sd_h13_button'] : NULL;
$sd_h13_button_url    = isset( $wrapkit_data['sd_h13_button_url'] ) ? $wrapkit_data['sd_h13_button_url'] : NULL;
$sd_h13_button_target = isset( $wrapkit_data['sd_h13_button_target'] ) ? $wrapkit_data['sd_h13_button_target'] : NULL;

?>

<div class="sd-header16">
	<div class="header16 po-relative">
	<?php if ( $sd_h13_top_bar == '1' && ! empty( $sd_h13_top_bar_text ) || ! empty( $sd_h13_email ) || $sd_h13_social_icons == '1' ) : ?>
		<div class="h16-topbar">
			<div class="container">
				<nav class="navbar navbar-expand-lg">
					<a class="navbar-brand hidden-lg-up" href="#"><?php esc_html_e( 'Top Menu', 'wrapkit' ); ?></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header16a" aria-controls="header16a" aria-expanded="false" aria-label="Toggle navigation">
						<span class="sl-icon-options"></span>
					</button>
					<div class="collapse navbar-collapse" id="header16a">
						<?php if ( ! empty( $sd_h13_top_bar_text ) ) : ?>
							<ul class="navbar-nav font-14">
								<li class="nav-item"><?php echo esc_html( $sd_h13_top_bar_text ); ?></li>
							</ul>
						<?php endif; ?>
						<ul class="navbar-nav ml-auto">
							<?php if ( ! empty( $sd_h13_email ) ) : ?>
								<li class="nav-item"><a class="nav-link" href="<?php echo 'mailto:' . antispambot( $sd_h13_email, 1 ); ?>"><i class="fa fa-envelope"></i> <?php echo antispambot( $sd_h13_email ); ?></a></li>
							<?php endif; ?>
							
							<?php if ( ! empty( $sd_h13_email ) && $sd_h13_social_icons == '1' ) : ?>
								<li><a><span class="vdevider"></span></a></li>
							<?php endif; ?>
							
							<?php if ( $sd_h13_social_icons == '1' ) : ?>
								<?php echo wrapkit_social(); ?>
							<?php endif; ?>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	<?php endif; ?>
		<div class="h16-infobar">
			<div class="container sd-header-content">
				<nav class="navbar navbar-expand-lg h16-info-bar">
					<?php echo wrapkit_theme_logo(); ?>
					<?php if ( ! empty( $sd_h13_hours ) || ! empty( $sd_h13_phone ) ) : ?>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#h16-info" aria-controls="h16-info" aria-expanded="false" aria-label="Toggle navigation">
						<span class="sl-icon-options-vertical"></span>
					</button>
					<div class="collapse navbar-collapse" id="h16-info">
						<ul class="navbar-nav ml-auto">
							<?php if ( ! empty( $sd_h13_hours ) ) : ?>
								<li class="nav-item">
									<a class="nav-link">
										<div class="display-6 m-r-10"><a href="mailto:witaj@belingua.pl"><i class="fa fa-envelope"></i><span style="font-size:16px;"> witaj@belingua.pl</span></a>								
											<small><a style="font-size:16px;" href="mailto:witaj@belingua.pl" class="nav-link">		<?php
													echo wp_kses( $sd_h13_hours,
														array(
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
											</a></small>
										</div>
									</a>
								</li>
							<?php endif; ?>
							<?php if ( ! empty( $sd_h13_phone ) ) : ?>
								<li class="nav-item">
									<a href="tel:<?php echo esc_html( rawurlencode( $sd_h13_phone ) ); ?>" class="nav-link sd-phone-link">
										<div class="display-6 m-r-10"><i class="icon-Phone-2"></i></div>
										<div><small><?php echo esc_html( $sd_h13_phone_text ); ?></small>
											<h5 class="font-bold"><?php echo esc_html( $sd_h13_phone ); ?></h5></div>
									</a>
								</li>
							<?php endif; ?>
							<li class="nav-item">
							<?php do_action( 'wpml_add_language_selector' ); ?>
							</li>
						</ul>
					</div>
					<?php endif; ?>
				</nav>
			</div>
		</div>

	<div class="h16-navbar">
		<div class="container">
			<nav class="navbar navbar-expand-lg h16-nav">
				<a class="hidden-lg-up"><?php esc_html_e( 'Navigation', 'wrapkit' ); ?></a>
				<button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#header16" aria-expanded="false" aria-label="Toggle navigation">
					<span class="ti-menu"></span>
				</button>
				<div class="collapse navbar-collapse" id="header16">
					<div class="hover-dropdown">
						<?php get_template_part( 'framework/inc/main-menu' ); ?>
					</div>
					<?php if ( ! empty( $sd_h13_button ) ) : ?>
						<ul class="navbar-nav ml-auto">
							<li class="nav-item search"><a class="nav-link" href="<?php echo esc_url( $sd_h13_button_url ); ?>" <?php if ( $sd_h13_button_target == '1' ) { echo 'target="_blank"'; } ?>><?php echo esc_html( $sd_h13_button ); ?></a>
							</li>
						</ul>
					<?php endif; ?>
				</div>
			</nav>
		</div>
	</div>
	</div>
</div>