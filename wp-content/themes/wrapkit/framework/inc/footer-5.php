<?php
/**
 * Footer Style 5
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
$wrapkit_data = wrapkit_global();

$sd_f5_social_icons = isset( $wrapkit_data['sd_f1_social_icons'] ) ? $wrapkit_data['sd_f1_social_icons'] : NULL;
$sd_copyright       = isset( $wrapkit_data['sd_copyright'] ) ? $wrapkit_data['sd_copyright'] : NULL;
$sd_f5_text1_icon   = isset( $wrapkit_data['sd_f5_text1_icon'] ) ? $wrapkit_data['sd_f5_text1_icon'] : NULL;
$sd_f5_text1        = isset( $wrapkit_data['sd_f5_text1'] ) ? $wrapkit_data['sd_f5_text1'] : NULL;
$sd_f5_text2_icon   = isset( $wrapkit_data['sd_f5_text2_icon'] ) ? $wrapkit_data['sd_f5_text2_icon'] : NULL;
$sd_f5_text2        = isset( $wrapkit_data['sd_f5_text2'] ) ? $wrapkit_data['sd_f5_text2'] : NULL;
?>

<div class="sd-footer6">
	<footer class="footer6 spacer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<?php if ( ! empty( $sd_f5_text1 ) ) : ?>
						<div class="d-flex no-block f5-content m-b-10">
							<?php if ( ! empty( $sd_f5_text1_icon ) ) : ?>
								<div class="display-7 m-r-20 "><i class="<?php echo esc_attr( $sd_f5_text1_icon ); ?>"></i></div>
							<?php endif; ?>
							<div class="info">
								<span class="db m-t-5"><?php echo esc_html( $sd_f5_text1 ); ?></span>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div class="col-lg-4">
					<?php if ( ! empty( $sd_f5_text2 ) ) : ?>
						<div class="d-flex no-block f5-content m-b-10">
							<?php if ( ! empty( $sd_f5_text2_icon ) ) : ?>
								<div class="display-7 m-r-20"><i class="<?php echo esc_attr( $sd_f5_text2_icon ); ?>"></i></div>
							<?php endif; ?>
							<div class="db m-t-5"><?php echo esc_html( $sd_f5_text2 ); ?></div>
						</div>
					<?php endif; ?>
				</div>
				<?php if ( $sd_f5_social_icons == '1' ) : ?>
				<div class="col-lg-4 ml-auto">
					<div class="ml-auto round-social dark">
						<?php echo wrapkit_social( $wrap = 0, $nav_item = null, $nav_link = null ); ?>
					</div>
				</div>
				<?php endif; ?>
				<?php if ( ! empty( $sd_copyright ) ) : ?>
					<div class="col-md-12 b-t m-t-40">
						<div class="p-t-20 sd-copy-txt">
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
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</footer>
</div>