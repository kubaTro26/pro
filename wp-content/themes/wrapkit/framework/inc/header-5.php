<?php
/**
 * Header Style 5
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
$wrapkit_data = wrapkit_global();

$sd_h5_link1        = isset( $wrapkit_data['sd_h5_link1'] ) ? $wrapkit_data['sd_h5_link1'] : NULL;
$sd_h5_link1_url    = isset( $wrapkit_data['sd_h5_link1_url'] ) ? $wrapkit_data['sd_h5_link1_url'] : NULL;
$sd_h5_link1_target = isset( $wrapkit_data['sd_h5_link1_target'] ) ? $wrapkit_data['sd_h5_link1_target'] : NULL;
$sd_h5_divider_text = isset( $wrapkit_data['sd_h5_divider_text'] ) ? $wrapkit_data['sd_h5_divider_text'] : NULL;
$sd_h5_link2        = isset( $wrapkit_data['sd_h5_link2'] ) ? $wrapkit_data['sd_h5_link2'] : NULL;
$sd_h5_link2_url    = isset( $wrapkit_data['sd_h5_link2_url'] ) ? $wrapkit_data['sd_h5_link2_url'] : NULL;
$sd_h5_link2_target = isset( $wrapkit_data['sd_h5_link2_target'] ) ? $wrapkit_data['sd_h5_link2_target'] : NULL;

?>

<div class="sd-header5 bg-inverse">
	<div class="header5">
		<div class="container po-relative sd-header-content">
			<nav class="navbar navbar-expand-lg h5-nav-bar hover-dropdown">
				<?php echo wrapkit_theme_logo(); ?>
				<button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#h5-info" aria-controls="h4-info" aria-expanded="false" aria-label="Toggle navigation"><span class="ti-menu"></span></button>
				<div class="collapse navbar-collapse text-uppercase" id="h5-info">
					<?php get_template_part( 'framework/inc/main-menu' ); ?>
					<?php if ( ! empty( $sd_h5_link1 ) || ! empty( $sd_h5_link2 ) ) : ?>
						<div class="rounded-button">
							<?php if ( ! empty( $sd_h5_link1 ) ) : ?>
								<a href="<?php echo esc_url( $sd_h5_link1_url ); ?>" title="<?php echo esc_attr( $sd_h5_link1 ); ?>" <?php if ( $sd_h5_link1_target == '1' ) { echo 'target="_blank"'; } ?>><?php echo esc_html( $sd_h5_link1 ); ?></a>
							<?php endif; ?>
							<?php
								if ( ! empty( $sd_h5_link1 ) && ! empty( $sd_h5_link2 ) ) {
									echo '<span class="sd-sep-txt">' . $sd_h5_divider_text . '</span>';
								}
							?>
							<?php if ( ! empty( $sd_h5_link2 ) ) : ?>
								<a href="<?php echo esc_url( $sd_h5_link2_url ); ?>" title="<?php echo esc_attr( $sd_h5_link2 ); ?>" <?php if ( $sd_h5_link2_target == '1' ) { echo 'target="_blank"'; } ?>><?php echo esc_html( $sd_h5_link2 ); ?></a>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</nav>
		</div>
	</div>
</div>