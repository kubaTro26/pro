<?php
/**
 * Footer Style 3
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
$wrapkit_data = wrapkit_global();

$sd_f3_logo           = isset( $wrapkit_data['sd_f2_logo'] ) ? $wrapkit_data['sd_f2_logo']['url'] : NULL;
$sd_f3_text           = isset( $wrapkit_data['sd_f3_text'] ) ? $wrapkit_data['sd_f3_text'] : NULL;
$sd_f3_newsletter     = isset( $wrapkit_data['sd_f3_newsletter'] ) ? $wrapkit_data['sd_f3_newsletter'] : NULL;
$sd_f3_news_url       = isset( $wrapkit_data['sd_f3_news_url'] ) ? $wrapkit_data['sd_f3_news_url'] : NULL;
$sd_f3_news_btn       = isset( $wrapkit_data['sd_f3_news_btn'] ) ? $wrapkit_data['sd_f3_news_btn'] : NULL;
$sd_widgetized_footer = isset( $wrapkit_data['sd_widgetized_footer'] ) ? $wrapkit_data['sd_widgetized_footer'] : NULL;
$sd_footer_sidebars   = isset( $wrapkit_data['sd_footer_sidebars'] ) ? $wrapkit_data['sd_footer_sidebars'] : NULL;
$sd_copyright         = isset( $wrapkit_data['sd_copyright'] ) ? $wrapkit_data['sd_copyright'] : NULL;
$sd_f3_social_icons   = isset( $wrapkit_data['sd_f1_social_icons'] ) ? $wrapkit_data['sd_f1_social_icons'] : NULL;

?>

<div class="sd-footer3">
	<div class="footer3 font-14">
		<?php if ( ! empty( $sd_f3_logo ) || ! empty( $sd_f3_text ) || $sd_f3_newsletter =='1' ) : ?>
			<div class="f3-topbar container">
				<div class="d-flex">
					<div class="d-flex no-block align-items-center">
						<?php if ( ! empty( $sd_f3_logo ) ) : ?>
							<a class="m-r-20" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php echo esc_url( $sd_f3_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
						<?php endif; ?>
						<?php if ( ! empty( $sd_f3_text ) ) : ?>
							<span class="sd-copy-txt">
								<?php
								echo wp_kses( $sd_f3_text,
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
							</span>
						<?php endif; ?>
					</div>
					<?php if ( $sd_f3_newsletter == '1' ) : ?>
						<div class="ml-auto no-shrink align-self-center">
							<form action="<?php echo esc_url( $sd_f3_news_url ); ?>" method="post" id="mc-embedded-subscribe-form">
								<div class="input-group">
									<input value="" name="EMAIL" class="required email form-control form-control-dark form-control-lg" id="mce-EMAIL" placeholder="<?php esc_html_e( 'Sign up for updates', 'wrapkit' ); ?>" type="email">
									<div style="position: absolute;left: -5000px"><input name="b_5ef55abee027ce066bca8313c_46cd16464a" value="" type="text"></div>
									<span class="input-group-btn">
									  <input value="<?php echo esc_html( $sd_f3_news_btn ); ?>" name="subscribe" id="mc-embedded-subscribe" class="button btn btn-danger-gradiant btn-md" type="submit">
									</span>
								</div>
							</form>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="f3-middle">
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
		<?php if ( ! empty( $sd_copyright ) || $sd_f3_social_icons == '1' ) : ?>
			<div class="f3-bottom-bar">
				<div class="container">
					<div class="d-flex">
						<span class="m-t-10 m-b-10 sd-copy-txt">
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
						</span>
						<?php if ( $sd_f3_social_icons == '1' ) : ?>
							<div class="ml-auto m-t-10 m-b-10 f3-social">
								<?php echo wrapkit_social( $wrap = 0, $nav_item = null, $nav_link = 'link' ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>