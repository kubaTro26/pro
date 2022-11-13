<?php
/**
 * 404 Page
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

get_header();

$wrapkit_data = wrapkit_global();

$sd_title_404       = isset( $wrapkit_data['sd_404_title'] ) ? $wrapkit_data['sd_404_title'] : null;
$sd_content_404     = isset( $wrapkit_data['sd_404_content'] ) ? $wrapkit_data['sd_404_content'] : null;
$sd_button_text_404 = isset( $wrapkit_data['sd_404_button_text'] ) ? $wrapkit_data['sd_404_button_text'] : null;
$sd_button_url_404  = isset( $wrapkit_data['sd_404_button1_url'] ) ? $wrapkit_data['sd_404_button1_url'] : null;
?>
<!--left col-->

<div class="sd-404-page">
	<div class="container">
		<div class="row">
			<div class="col-md-4 hidden-xs">
				<div class="sd-404-hexagon">
					<div class="sd-not-found">
							<div class="sd-404-text">
								<span class="sd-404"><?php echo esc_html_e( '404', 'wrapkit' ); ?></span>
								<span class="sd-page-not-found"><?php echo esc_html_e( 'PAGE NOT FOUND', 'wrapkit' ); ?></span>
							</div>
					</div>
					<!-- sd-not-found -->
				</div>
			</div>
			<!-- col-md-4 -->
			<div class="col-md-8 col-xs-12">
				<div class="sd-404-left">
					<?php if ( ! empty( $sd_title_404 ) ) : ?>
						<h2><?php echo esc_html( $sd_title_404 ); ?></h2>
					<?php endif; ?>
					<?php if ( ! empty( $sd_content_404 ) ) : ?>
						<p><?php echo do_shortcode( $sd_content_404 ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $sd_button_text_404 ) ) : ?>
						<a title="<?php echo esc_attr( $sd_button_text_404 ); ?>" href="<?php echo esc_url( $sd_button_url_404 ); ?>" class="sd-opacity-trans"><?php echo esc_html( $sd_button_text_404 ); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</div>
<!-- sd-404-page -->
<?php get_footer(); ?>
