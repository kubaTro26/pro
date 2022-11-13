<?php
/**
 * 3 Sidebars Footer
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2015, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
$wrapkit_data = wrapkit_global();

$sd_footer_sidebars = isset( $wrapkit_data['sd_footer_sidebars'] ) ? $wrapkit_data['sd_footer_sidebars'] : NULL;
$sd_left_col         = '4';
$sd_middle_col       = '4';
$sd_right_col        = '4';

if ( $sd_footer_sidebars == '2' ) {
	$sd_left_col         = '4';
	$sd_middle_col       = '4';
	$sd_right_col        = '4';
} else if ( $sd_footer_sidebars == '4' ) {
	$sd_left_col         = '3';
	$sd_middle_col       = '6';
	$sd_right_col        = '3';
} else if ( $sd_footer_sidebars == '7' ) {
	$sd_left_col         = '6';
	$sd_middle_col       = '3';
	$sd_right_col        = '3';
} else if ( $sd_footer_sidebars == '8' ) {
	$sd_left_col         = '3';
	$sd_middle_col       = '3';
	$sd_right_col        = '6';
}

?>
<!-- footer widgets -->
<div class="sd-footer-widgets sd-3-sidebars">
	<div class="container">
		<div class="sd-3-sidebars-content-wrap">
			<div class="row">
				<?php if ( is_active_sidebar( 'footer-sidebar-one' ) ) : ?>
					<div class="col-md-<?php echo esc_attr( $sd_left_col ); ?> col-sm-<?php echo esc_attr( $sd_left_col ); ?> col-xs-12 sd-footer-sidebar-1">
						<div class="sd-footer-sidebar-1-content">
							<?php dynamic_sidebar( 'footer-sidebar-one' ); ?>
						</div>
						<!-- sd-footer-sidebar-1-content -->
					</div>
					<!-- col-md-4 col-sm-4 col-xs-12 sd-footer-sidebar-1 -->
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-sidebar-two' ) ) : ?>
					<div class="col-md-<?php echo esc_attr( $sd_middle_col ); ?> col-sm-<?php echo esc_attr( $sd_middle_col ); ?> col-xs-12 sd-footer-sidebar-2">
						<div class="sd-footer-sidebar-2-content">
							<?php dynamic_sidebar( 'footer-sidebar-two' ); ?>
						</div>
						<!-- sd-footer-sidebar-2-content -->
					</div>
					<!-- col-md-4 col-sm-4 col-xs-12 sd-footer-sidebar-2 -->
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-sidebar-three' ) ) : ?>
					<div class="col-md-<?php echo esc_attr( $sd_right_col ); ?> col-sm-<?php echo esc_attr( $sd_right_col ); ?> col-xs-12 sd-footer-sidebar-3 sd-footer-sidebar-last">
						<div class="sd-footer-sidebar-3-content-last">
							<?php dynamic_sidebar( 'footer-sidebar-three' ); ?>
						</div>
						<!-- sd-footer-sidebar-3-content -->
					</div>
					<!-- col-md-4 col-sm-4 col-xs-12 sd-footer-sidebar-3 -->
				<?php endif; ?>
			</div>
			<!-- row -->
		</div>
		<!-- sd-3-sidebars-content-wrap -->
	</div>
	<!-- container -->
</div>
<!-- sd-footer-widgets -->