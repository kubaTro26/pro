<?php
/**
 * Header Style 11
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
$wrapkit_data = wrapkit_global();

$sd_h11_top_bar       = isset( $wrapkit_data['sd_h11_top_bar'] ) ? $wrapkit_data['sd_h11_top_bar'] : NULL;
$sd_h11_top_bar_text  = isset( $wrapkit_data['sd_h11_top_bar_text'] ) ? $wrapkit_data['sd_h11_top_bar_text'] : NULL;
$sd_h11_hours         = isset( $wrapkit_data['sd_h11_hours'] ) ? $wrapkit_data['sd_h11_hours'] : NULL;
$sd_h11_social_icons  = isset( $wrapkit_data['sd_h11_social_icons'] ) ? $wrapkit_data['sd_h11_social_icons'] : NULL;
$sd_h11_email_text    = isset( $wrapkit_data['sd_h11_email_text'] ) ? $wrapkit_data['sd_h11_email_text'] : NULL;
$sd_h11_email         = isset( $wrapkit_data['sd_h11_email'] ) ? sanitize_email( $wrapkit_data['sd_h11_email'] ) : NULL;
$sd_h11_phone_text    = isset( $wrapkit_data['sd_h11_phone_text'] ) ? $wrapkit_data['sd_h11_phone_text'] : NULL;
$sd_h11_phone         = isset( $wrapkit_data['sd_h11_phone'] ) ? $wrapkit_data['sd_h11_phone'] : NULL;
$sd_h11_button        = isset( $wrapkit_data['sd_h11_button'] ) ? $wrapkit_data['sd_h11_button'] : NULL;
$sd_h11_button_url    = isset( $wrapkit_data['sd_h11_button_url'] ) ? $wrapkit_data['sd_h11_button_url'] : NULL;
$sd_h11_button_target = isset( $wrapkit_data['sd_h11_button_target'] ) ? $wrapkit_data['sd_h11_button_target'] : NULL;
$sd_h11_search_form   = isset( $wrapkit_data['sd_h11_search_form'] ) ? $wrapkit_data['sd_h11_search_form'] : NULL;

?>
<div class="sd-header14">
	<div class="header14 po-relative">
		<?php if ( $sd_h11_top_bar == '1' && ! empty( $sd_h11_top_bar_text ) || ! empty( $sd_h11_hours ) || $sd_h11_social_icons == '1' ) : ?>
			<div class="h14-topbar">
				<div class="container">
					<nav class="navbar navbar-expand-lg font-14">
						<a class="navbar-brand hidden-lg-up" href="#"><?php esc_html_e( 'Top Menu', 'wrapkit' ); ?></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header14a" aria-controls="header14a" aria-expanded="false" aria-label="Toggle navigation">
							<span class="sl-icon-options"></span>
						</button>
						<div class="collapse navbar-collapse" id="header14a">
							<?php if ( ! empty( $sd_h11_top_bar_text ) ) : ?>
								<ul class="navbar-nav">
									<li class="nav-item"><a class="nav-link"><?php echo esc_html( $sd_h11_top_bar_text ); ?></a></li>
								</ul>
							<?php endif; ?>
							<?php if ( ! empty( $sd_h11_hours ) || $sd_h11_social_icons == '1' ) : ?>
								<ul class="navbar-nav ml-auto">
									<?php if ( ! empty( $sd_h11_hours ) ) : ?>
										<li class="nav-item"><a class="nav-link"><i class="fa fa-clock-o"></i> <?php echo esc_html( $sd_h11_hours ); ?></a></li>
									<?php endif; ?>
									<?php if ( $sd_h11_social_icons == '1' ) : ?>
										<?php echo wrapkit_social(); ?>
									<?php endif; ?>
								</ul>
							<?php endif; ?>
						</div>
					</nav>
				</div>
			</div>
		<?php endif; ?>

		<div class="h14-infobar">
			<div class="container sd-header-content">
				<nav class="navbar navbar-expand-lg h14-info-bar">
					<?php echo wrapkit_theme_logo(); ?>
					<?php if ( ! empty( $sd_h11_email ) || ! empty( $sd_h11_phone ) || ! empty( $sd_h11_button ) ) : ?>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#h14-info" aria-controls="h14-info" aria-expanded="false" aria-label="Toggle navigation">
						<span class="sl-icon-options-vertical"></span>
					</button>
					<div class="collapse navbar-collapse" id="h14-info">
						<ul class="navbar-nav ml-auto text-uppercase">
							<?php if ( ! empty( $sd_h11_email ) ) : ?>
								<li class="nav-item">
									<a href="<?php echo 'mailto:' . antispambot( $sd_h11_email, 1 ); ?>" class="nav-link">
										<div class="display-6 m-r-10"><i class="icon-Mail"></i></div>
										<div><small><?php echo esc_html( $sd_h11_phone_text ); ?></small>
											<h6 class="font-bold"><?php echo antispambot( $sd_h11_email ); ?></h6></div>
									</a>
								</li>
							<?php endif; ?>
							<?php if ( ! empty( $sd_h11_phone ) ) : ?>
								<li class="nav-item">
									<a href="tel:<?php echo esc_html( rawurlencode( $sd_h11_phone ) ); ?>" class="nav-link">
										<div class="display-6 m-r-10"><i class="icon-Phone-2"></i></div>
										<div><small><?php echo esc_html( $sd_h11_phone_text ); ?></small>
											<h6 class="font-bold"><?php echo esc_html( $sd_h11_phone ); ?></h6></div>
									</a>
								</li>
							<?php endif; ?>
							<?php if ( ! empty( $sd_h11_button ) ) : ?>
								<li class="nav-item donate-btn"><a href="<?php echo esc_url( $sd_h11_button_url ); ?>" class="btn btn-outline-info" <?php if ( $sd_h11_button_target == '1' ) { echo 'target="_blank"'; } ?>><?php echo esc_html( $sd_h11_button ); ?></a></li>
							<?php endif; ?>
						</ul>
					</div>
					<?php endif; ?>
				</nav>
			</div>
		</div>

		<div class="h14-navbar">
			<div class="container">
				<nav class="navbar navbar-expand-lg h14-nav">
					<a class="hidden-lg-up"><?php esc_html_e( 'Navigation', 'wrapkit' ); ?></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header14" aria-expanded="false" aria-label="Toggle navigation">
						<span class="ti-menu"></span>
					</button>
					<div class="collapse navbar-collapse" id="header14">
						<div class="hover-dropdown">
							<?php get_template_part( 'framework/inc/main-menu' ); ?>
						</div>
						<?php if ( $sd_h11_search_form == '1' ) : ?>
							<ul class="navbar-nav ml-auto">
								<li class="nav-item search dropdown"><a class="nav-link dropdown-toggle" href="javascript:void(0)" id="h14-sdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>
									<div class="dropdown-menu b-none dropdown-menu-right animated fadeInDown" aria-labelledby="h14-sdropdown">
										<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
											<input name="s" class="form-control" type="text" value="<?php the_search_query(); ?>" placeholder="<?php esc_attr_e( 'Type & hit enter', 'wrapkit' ); ?>" />
										</form>
									</div>
								</li>
							</ul>
						<?php endif; ?>
					</div>
				</nav>
			</div>
		</div>
	</div>
</div>