<?php
/**
 * 4 Sidebars Footer
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2015, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
$wrapkit_data = wrapkit_global();

?>
<!-- footer widgets -->
<div class="sd-footer-widgets sd-4-sidebars">
	<div class="container">
		<div class="row">
			<?php if ( is_active_sidebar( 'footer-sidebar-one' ) ) : ?>
				<div class="col-md-3 col-sm-3 col-xs-12 sd-footer-sidebar-1">
					<div class="sd-footer-sidebar-1-content">
						<?php dynamic_sidebar( 'footer-sidebar-one' ); ?>
					</div>
					<!-- sd-footer-sidebar-1-content -->
				</div>
				<!-- col-md-3 col-sm-3 col-xs-12 sd-footer-sidebar-1 -->
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-sidebar-two' ) ) : ?>
				<div class="col-md-3 col-sm-3 col-xs-12 sd-footer-sidebar-2">
					<div class="sd-footer-sidebar-2-content">
						<?php dynamic_sidebar( 'footer-sidebar-two' ); ?>
					</div>
					<!-- sd-footer-sidebar-2-content -->
				</div>
				<!-- col-md-3 col-sm-3 col-xs-12 sd-footer-sidebar-2 -->
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-sidebar-three' ) ) : ?>
				<div class="col-md-3 col-sm-3 col-xs-12 sd-footer-sidebar-3">
					<div class="sd-footer-sidebar-3-content">
						<?php dynamic_sidebar( 'footer-sidebar-three' ); ?>
					</div>
					<!-- sd-footer-sidebar-3-content -->
				</div>
				<!-- col-md-3 col-sm-3 col-xs-12 sd-footer-sidebar-3 -->
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'footer-sidebar-four' ) ) : ?>
				<div class="col-md-3 col-sm-3 col-xs-12 sd-footer-sidebar-4">
					<div class="sd-footer-sidebar-4-content-last">
						<?php dynamic_sidebar( 'footer-sidebar-four' ); ?>
					</div>
					<!-- sd-footer-sidebar-4-content-last -->
				</div>
				<!-- col-md-3 col-sm-3 col-xs-12 sd-footer-sidebar-4 -->
			<?php endif; ?>
		</div>
		<!-- row -->			
	</div>
	<!-- container -->
</div>
<!-- sd-footer-widgets -->