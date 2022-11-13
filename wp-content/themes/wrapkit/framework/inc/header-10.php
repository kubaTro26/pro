<?php
/**
 * Header Style 10
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
$wrapkit_data = wrapkit_global();

$sd_h10_top_bar       = isset( $wrapkit_data['sd_h10_top_bar'] ) ? $wrapkit_data['sd_h10_top_bar'] : NULL;
$sd_h10_email          = isset( $wrapkit_data['sd_h10_email'] ) ? sanitize_email( $wrapkit_data['sd_h10_email'] ) : NULL;
$sd_h10_hours         = isset( $wrapkit_data['sd_h10_hours'] ) ? $wrapkit_data['sd_h10_hours'] : NULL;
$sd_h10_social_icons  = isset( $wrapkit_data['sd_h10_social_icons'] ) ? $wrapkit_data['sd_h10_social_icons'] : NULL;
$sd_h10_search_form   = isset( $wrapkit_data['sd_h10_search_form'] ) ? $wrapkit_data['sd_h10_search_form'] : NULL;
$sd_h10_phone         = isset( $wrapkit_data['sd_h10_phone'] ) ? $wrapkit_data['sd_h10_phone'] : NULL;
$sd_h10_phone_text    = isset( $wrapkit_data['sd_h10_phone_text'] ) ? $wrapkit_data['sd_h10_phone_text'] : NULL;
$sd_h10_button        = isset( $wrapkit_data['sd_h10_button'] ) ? $wrapkit_data['sd_h10_button'] : NULL;
$sd_h10_button_url    = isset( $wrapkit_data['sd_h10_button_url'] ) ? $wrapkit_data['sd_h10_button_url'] : NULL;
$sd_h10_button_target = isset( $wrapkit_data['sd_h10_button_target'] ) ? $wrapkit_data['sd_h10_button_target'] : NULL;


?>

<div class="sd-header13">
	<div class="header13 po-relative">
		<?php if ( $sd_h10_top_bar == '1' && ! empty( $sd_h10_email ) || ! empty( $sd_h10_hours ) || $sd_h10_social_icons == '1' || $sd_h10_search_form == '1'  ) : ?>
			<div class="h13-topbar">
				<div class="container">
					<nav class="navbar navbar-expand-lg font-14">
						<a class="navbar-brand hidden-lg-up" href="#"><?php esc_html_e( 'Top Menu', 'wrapkit' ); ?></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header13a" aria-controls="header13a" aria-expanded="false" aria-label="Toggle navigation">
							<span class="sl-icon-options"></span>
						</button>
						<div class="collapse navbar-collapse" id="header13a">
							<?php if ( ! empty( $sd_h10_email ) || ! empty( $sd_h10_hours ) ) : ?>
							<ul class="navbar-nav">
								<?php if ( ! empty( $sd_h10_email ) ) : ?>
									<li class="nav-item">
										<a class="nav-link" href="<?php echo 'mailto:' . antispambot( $sd_h9_email, 1 ); ?>"><i class="fa fa-envelope"></i> <?php echo antispambot( $sd_h10_email ); ?></a>
									</li>
								<?php endif; ?>
								<?php if ( ! empty( $sd_h10_hours ) ) : ?>
									<li class="nav-item"><a class="nav-link"><i class="fa fa-clock-o"></i> <?php echo esc_html( $sd_h10_hours ); ?></a></li>
								<?php endif; ?>
							</ul>
							<?php endif; ?>
							<?php if ( $sd_h10_social_icons == '1' || $sd_h10_search_form == '1' ) : ?>
								<ul class="navbar-nav ml-auto h13-social">
									<?php if ( $sd_h10_social_icons == '1' ) : ?>
										<?php echo wrapkit_social(); ?>
									<?php endif; ?>
									<?php if ( $sd_h10_search_form == '1' ) : ?>
										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" href="#" id="h13-sdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-search"></i></a>
											<div class="dropdown-menu b-none search-box dropdown-menu-right animated fadeInDown" aria-labelledby="h13-sdropdown">
												<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
													<input name="s" class="form-control" type="text" value="<?php the_search_query(); ?>" placeholder="<?php esc_attr_e( 'Type & hit enter', 'wrapkit' ); ?>" />
												</form>
											</div>
										</li>
									<?php endif; ?>
								</ul>
							<?php endif; ?>
						</div>
					</nav>
				</div>
			</div>
		<?php endif; ?>
		
		<div class="container sd-header-content">
			
			<nav class="navbar navbar-expand-lg hover-dropdown h13-nav">
				<?php echo wrapkit_theme_logo(); ?>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header13" aria-controls="header13" aria-expanded="false" aria-label="Toggle navigation">
					<span class="ti-menu"></span>
				</button>
				<div class="collapse navbar-collapse" id="header13">
					<?php if ( ! empty( $sd_h10_phone ) ) : ?>
						<div class="call-info hidden-md-down">
							<?php if ( ! empty( $sd_h10_phone_text ) ) : ?>
								<small><?php echo esc_html( $sd_h10_phone_text ); ?></small>
							<?php endif; ?>
							<h5 class="m-b-0 font-medium"><a href="tel:<?php echo esc_html( rawurlencode( $sd_h10_phone ) ); ?>"><?php echo esc_html( $sd_h10_phone ); ?></a></h5>
						</div>
					<?php endif; ?>
					<?php get_template_part( 'framework/inc/main-menu' ); ?>
					<?php if ( ! empty( $sd_h10_button ) ) : ?>
						<a class="btn btn-danger-gradiant" href="<?php echo esc_url( $sd_h10_button_url ); ?>" <?php if ( $sd_h10_button_target == '1' ) { echo 'target="_blank"'; } ?>><?php echo esc_html( $sd_h10_button ); ?></a>
					<?php endif; ?>
				</div>
			</nav>
			
		</div>
	</div>
</div>