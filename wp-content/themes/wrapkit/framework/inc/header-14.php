<?php
/**
 * Header Style 14
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
$wrapkit_data = wrapkit_global();

$sd_transp_header = '';

if ( is_page() || is_single()  ) {
	$sd_transp_header = rwmb_meta( 'sd_transparent_header', 'type=checkbox');
}


$sd_h14_button        = isset( $wrapkit_data['sd_h14_button'] ) ? $wrapkit_data['sd_h14_button'] : NULL;
$sd_h14_button_url    = isset( $wrapkit_data['sd_h14_button_url'] ) ? $wrapkit_data['sd_h14_button_url'] : NULL;
$sd_h14_button_target = isset( $wrapkit_data['sd_h14_button_target'] ) ? $wrapkit_data['sd_h14_button_target'] : NULL;
$sd_h14_email         = isset( $wrapkit_data['sd_h14_email'] ) ? sanitize_email( $wrapkit_data['sd_h14_email'] ) : NULL;
$sd_h14_phone_text    = isset( $wrapkit_data['sd_h14_phone_text'] ) ? $wrapkit_data['sd_h14_phone_text'] : NULL;
$sd_h14_phone         = isset( $wrapkit_data['sd_h14_phone'] ) ? $wrapkit_data['sd_h14_phone'] : NULL;
$sd_h14_phone_modal   = isset( $wrapkit_data['sd_h14_phone_modal'] ) ? $wrapkit_data['sd_h14_phone_modal'] : NULL;
$sd_h14_social_icons  = isset( $wrapkit_data['sd_h14_social_icons'] ) ? $wrapkit_data['sd_h14_social_icons'] : NULL;
$sd_h14_copyright     = isset( $wrapkit_data['sd_h14_copyright'] ) ? $wrapkit_data['sd_h14_copyright'] : NULL;

?>



<div class="sd-header17">
	<div class="header17">
		<?php if ( is_page() && $sd_transp_header == '1' ) { echo '<div class="topbar">'; } ?>
			<div class="container sd-header-content">
				<nav class="h17-nav">
					<div class="">
						<?php echo wrapkit_theme_logo(); ?>
						<?php if ( ! empty( $sd_h14_phone ) ) : ?>
							<div class="call-info dl hidden-md-down">
								<small><?php echo esc_html( $sd_h14_phone_text ); ?></small>
								<h5 class="m-b-0 font-medium"><a href="tel:<?php echo esc_html( rawurlencode( $sd_h14_phone ) ); ?>"><?php echo esc_html( $sd_h14_phone ); ?></a></h5>
							</div>
						<?php endif; ?>
					</div>
					<div class="ml-auto align-self-center">
						<ul class="list-inline h17nav-bar">
							<?php if ( ! empty( $sd_h14_button ) ) : ?>
								<li><a class="btn btn-success-gradiant hidden-md-down" href="<?php echo esc_url( $sd_h14_button_url ); ?>" <?php if ( $sd_h14_button_target == '1' ) { echo 'target="_blank"'; } ?>><?php echo esc_html( $sd_h14_button ); ?></a></li>
							<?php endif; ?>
							<li><a class="nav-link tgl-cl" href="javascript:void(0)"><i class="ti-menu "></i></a></li>
						</ul>
					</div>
				</nav>
			</div>
		<?php if ( is_page() && $sd_transp_header == '1' ) { echo '</div>'; } ?>
		<div class="h17-main-nav animated fadeInDown justify-content-center" data-aos="fade-up">
			<div class="h-17navbar align-self-center">
				<a href="javascript:void(0)" class="close-icons tgl-cl"><i class="ti-close"></i></a>
				<?php get_template_part( 'framework/inc/modal-menu' ); ?>
				<?php if ( ! empty( $sd_h14_email ) || $sd_h14_phone_modal == '1' ) : ?>
					<ul class="info-nav">
						<?php if ( ! empty( $sd_h14_email ) ) : ?>
							<li class="half-width"><a href="<?php echo 'mailto:' . antispambot( $sd_h14_email, 1 ); ?>"><i class="fa fa-envelope"></i> <?php echo antispambot( $sd_h14_email ); ?></a></li>
						<?php endif; ?>
						<?php if ( $sd_h14_phone_modal == '1' && ! empty( $sd_h14_phone ) ) : ?>
							<li class="half-width"><a href="tel:<?php echo esc_html( rawurlencode( $sd_h14_phone ) ); ?>"><i class="fa fa-phone"></i> <?php echo esc_html( $sd_h14_phone ); ?></a></li>
						<?php endif; ?>
					</ul>
				<?php endif; ?>
				<ul class="social-nav">
					<?php if ( $sd_h14_social_icons == '1' ) : ?>
						<?php echo wrapkit_social(); ?>
					<?php endif; ?>
					<?php if ( ! empty( $sd_h14_copyright ) ) : ?>
						<li class="sd-header17-copy">
							<?php
								echo wp_kses( $sd_h14_copyright,
									array(
										'br' => array(),
										'script' => array(),
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
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</div>