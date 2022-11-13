<?php
/**
 * Header Style 12
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
$wrapkit_data = wrapkit_global();

$sd_h12_top_bar       = isset( $wrapkit_data['sd_h12_top_bar'] ) ? $wrapkit_data['sd_h12_top_bar'] : NULL;
$sd_h12_top_bar_text  = isset( $wrapkit_data['sd_h12_top_bar_text'] ) ? $wrapkit_data['sd_h12_top_bar_text'] : NULL;
$sd_h12_social_icons  = isset( $wrapkit_data['sd_h12_social_icons'] ) ? $wrapkit_data['sd_h12_social_icons'] : NULL;
$sd_h12_search_form   = isset( $wrapkit_data['sd_h12_search_form'] ) ? $wrapkit_data['sd_h12_search_form'] : NULL;
$sd_h12_address       = isset( $wrapkit_data['sd_h12_address'] ) ? $wrapkit_data['sd_h12_address'] : NULL;
$sd_h12_button_icon   = isset( $wrapkit_data['sd_h12_button_icon'] ) ? $wrapkit_data['sd_h12_button_icon'] : NULL;
$sd_h12_phone_text    = isset( $wrapkit_data['sd_h12_phone_text'] ) ? $wrapkit_data['sd_h12_phone_text'] : NULL;
$sd_h12_phone         = isset( $wrapkit_data['sd_h12_phone'] ) ? $wrapkit_data['sd_h12_phone'] : NULL;
$sd_h12_button        = isset( $wrapkit_data['sd_h12_button'] ) ? $wrapkit_data['sd_h12_button'] : NULL;
$sd_h12_button_url    = isset( $wrapkit_data['sd_h12_button_url'] ) ? $wrapkit_data['sd_h12_button_url'] : NULL;
$sd_h12_button_target = isset( $wrapkit_data['sd_h12_button_target'] ) ? $wrapkit_data['sd_h12_button_target'] : NULL;

?>

<div class="sd-header15">
	<div class="header15 po-relative">
		<?php if ( $sd_h12_top_bar == '1' && ! empty( $sd_h12_top_bar_text ) || $sd_h12_social_icons == '1' || $sd_h12_search_form == '1' ) : ?>
			<div class="h15-topbar">
				<div class="container">
					<nav class="navbar navbar-expand-lg">
						<a class="navbar-brand hidden-lg-up" href="#"><?php esc_html_e( 'Top Menu', 'wrapkit' ); ?></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header15a" aria-controls="header15a" aria-expanded="false" aria-label="Toggle navigation">
							<span class="sl-icon-options"></span>
						</button>
						<div class="collapse navbar-collapse" id="header15a">
							<?php if ( ! empty( $sd_h12_top_bar_text ) ) : ?>
								<ul class="navbar-nav font-14">
									<li class="nav-item"><?php echo esc_html( $sd_h12_top_bar_text ); ?></li>
								</ul>
							<?php endif; ?>
							<ul class="navbar-nav ml-auto h15-social">
								<?php if ( $sd_h12_social_icons == '1' ) : ?>
									<?php echo wrapkit_social(); ?>
								<?php endif; ?>
								<?php if ( $sd_h12_search_form == '1' ) : ?>
									<li class="nav-item search dropdown"><a class="nav-link dropdown-toggle" href="javascript:void(0)" id="h15-sdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>
										<div class="dropdown-menu b-none dropdown-menu-right animated fadeInDown" aria-labelledby="h15-sdropdown">
											<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
												<input name="s" class="form-control" type="text" value="<?php the_search_query(); ?>" placeholder="<?php esc_attr_e( 'Type & hit enter', 'wrapkit' ); ?>" />
											</form>
										</div>
									</li>
								<?php endif; ?>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		<?php endif; ?>
		<div class="h15-infobar">
			<div class="container sd-header-content">
				<nav class="navbar navbar-expand-lg h15-info-bar">
					<?php echo wrapkit_theme_logo(); ?>
					<?php if ( ! empty( $sd_h12_address ) || ! empty( $sd_h12_phone ) ) : ?>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#h15-info" aria-controls="h15-info" aria-expanded="false" aria-label="Toggle navigation">
							<span class="sl-icon-options-vertical"></span>
						</button>
						<div class="collapse navbar-collapse" id="h15-info">
							<ul class="navbar-nav ml-auto">
								<?php if ( ! empty( $sd_h12_address ) ) : ?>
									<li class="nav-item">
										<a class="nav-link">
											<div class="display-6 m-r-10"><i class="icon-Location-2"></i></div>
											<div>
												<small>
													<?php
														echo wp_kses( $sd_h12_address,
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
												</small>
											</div>
										</a>
									</li>
								<?php endif; ?>
								<?php if ( ! empty( $sd_h12_phone ) ) : ?>
									<li class="nav-item">
										<a href="tel:<?php echo esc_html( rawurlencode( $sd_h12_phone ) ); ?>" class="nav-link sd-phone-link">
											<div class="display-6 m-r-10"><i class="icon-Phone-2"></i></div>
											<div><small><?php echo esc_html( $sd_h12_phone_text ); ?></small>
												<h5 class="font-bold"><?php echo esc_html( $sd_h12_phone ); ?></h5></div>
										</a>
									</li>
								<?php endif; ?>
							</ul>
						</div>
					<?php endif; ?>
				</nav>
			</div>
		</div>
		<?php if ( has_nav_menu( 'main-header-menu' ) || ! empty( $sd_h12_button_icon ) ) : ?>
			<div class="h15-navbar">
				<div class="container">
					<nav class="navbar navbar-expand-lg h15-nav">
						<a class="hidden-lg-up"><?php esc_html_e( 'Navigation', 'wrapkit' ); ?></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header15" aria-expanded="false" aria-label="Toggle navigation">
							<span class="ti-menu"></span>
						</button>
						<div class="collapse navbar-collapse" id="header15">
							<div class="hover-dropdown">
								<?php get_template_part( 'framework/inc/main-menu' ); ?>
							</div>
							<?php if ( ! empty( $sd_h12_button ) ) : ?>
								<ul class="navbar-nav ml-auto">
									<li class="nav-item search">
										<a class="sd-app-button nav-link" href="<?php echo esc_url( $sd_h12_button_url ); ?>" <?php if ( $sd_h12_button_target == '1' ) { echo 'target="_blank"'; } ?>>
											<?php if ( ! empty( $sd_h12_button_icon ) ) : ?>
												<i class="fa <?php echo esc_attr( $sd_h12_button_icon ); ?> m-r-10"></i>
											<?php endif; ?>
											<?php echo esc_html( $sd_h12_button ); ?>
										</a>
									</li>
								</ul>
							<?php endif; ?>
						</div>
					</nav>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>