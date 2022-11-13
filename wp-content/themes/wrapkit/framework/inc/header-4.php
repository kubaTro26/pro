<?php
/**
 * Header Style 4
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
$wrapkit_data = wrapkit_global();

$sd_h4_search_form    = isset( $wrapkit_data['sd_h4_search_form'] ) ? $wrapkit_data['sd_h4_search_form'] : NULL;
$sd_h4_email_text    = isset( $wrapkit_data['sd_h4_email_text'] ) ? $wrapkit_data['sd_h4_email_text'] : NULL;
$sd_h4_email_address = isset( $wrapkit_data['sd_h3_email_address'] ) ? sanitize_email( $wrapkit_data['sd_h3_email_address'] ) : NULL;
$sd_h4_phone_text    = isset( $wrapkit_data['sd_h4_phone_text'] ) ? $wrapkit_data['sd_h4_phone_text'] : NULL;
$sd_h4_phone         = isset( $wrapkit_data['sd_h3_phone'] ) ? $wrapkit_data['sd_h3_phone'] : NULL;
$sd_h4_button        = isset( $wrapkit_data['sd_h4_button'] ) ? $wrapkit_data['sd_h4_button'] : NULL;
$sd_h4_button_url    = isset( $wrapkit_data['sd_h4_button_url'] ) ? $wrapkit_data['sd_h4_button_url'] : NULL;
$sd_h4_button_target = isset( $wrapkit_data['sd_h4_button_target'] ) ? $wrapkit_data['sd_h4_button_target'] : NULL;


?>
<div class="sd-header4">
	<div class="header4 po-relative">
		<div class="h4-topbar">
			<div class="container">
				<nav class="navbar navbar-expand-lg h4-nav">
					<a class="hidden-lg-up">Navigation</a>
					<button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#header4" aria-expanded="false" aria-label="Toggle navigation">
						<span class="ti-menu"></span>
					</button>
					<div class="collapse navbar-collapse hover-dropdown" id="header4">
						<?php get_template_part( 'framework/inc/main-menu' ); ?>
						<?php if ( $sd_h4_search_form == '1' ) : ?>
							<ul class="navbar-nav ml-auto">
								<li class="nav-item search dropdown"><a class="nav-link dropdown-toggle" href="javascript:void(0)" id="h4-sdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>
									<div class="dropdown-menu b-none dropdown-menu-right animated fadeInDown" aria-labelledby="h4-sdropdown">
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
		<div class="h4-navbar sd-header-content">
			<div class="container">
				<nav class="navbar navbar-expand-lg h4-nav-bar">
					<?php echo wrapkit_theme_logo(); ?>
					<?php if ( ! empty( $sd_h4_email_address ) || ! empty( $sd_h4_phone ) || ! empty( $sd_h4_button ) ) : ?>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#h4-info" aria-controls="h4-info" aria-expanded="false" aria-label="Toggle navigation">
							<span class="sl-icon-options-vertical"></span>
						</button>
						<div class="collapse navbar-collapse sd-right-options" id="h4-info">
							<ul class="navbar-nav ml-auto text-uppercase">
								<?php if ( ! empty( $sd_h4_email_address ) ) : ?>
									<li class="nav-item">
										<a href="<?php echo 'mailto:' . antispambot( $sd_h4_email_address, 1 ); ?>" class="nav-link">
											<div class="display-6 m-r-10"><i class="icon-Mail"></i></div>
											<div>
												<small><?php echo esc_html( $sd_h4_email_text ); ?></small>
												<h6 class="font-bold">
													<?php echo antispambot( $sd_h4_email_address ); ?>
												</h6>
											</div>
										</a>
									</li>
								<?php endif; ?>
								<?php if ( ! empty( $sd_h4_phone ) ) : ?>
									<li class="nav-item">
										<a href="tel:<?php echo esc_html( rawurlencode( $sd_h4_phone ) ); ?>" class="nav-link">
											<div class="display-6 m-r-10"><i class="icon-Phone-2"></i></div>
											<div><small><?php echo esc_html( $sd_h4_phone_text ); ?></small>
												<h6 class="font-bold"><?php echo esc_html( $sd_h4_phone ); ?></h6></div>
										</a>
									</li>
								<?php endif; ?>
							<?php if ( ! empty( $sd_h4_button ) ) : ?>
								<li class="nav-item donate-btn">
									<a href="<?php echo esc_url( $sd_h4_button_url ); ?>" class="btn btn-outline-danger" <?php if ( $sd_h4_button_target == '1' ) { echo 'target="_blank"'; } ?>><?php echo esc_html( $sd_h4_button ); ?></a>
								</li>
							<?php endif; ?>
							</ul>
						</div>
					<?php endif; ?>
				</nav>
			</div>
		</div>
	</div>
</div>