<?php
/**
 * Theme Footer Copyright
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

$wrapkit_data = wrapkit_global();

$copyright_text = ( ! empty( $wrapkit_data['sd_copyright_text'] ) ? $wrapkit_data['sd_copyright_text'] : NULL );
$copyright_pos  = ( ! empty( $wrapkit_data['sd_copyright_position'] ) ? $wrapkit_data['sd_copyright_position'] : '2' );

if ( $copyright_pos == '1' ) {
	$pos = 'sd-left';	
} elseif ( $copyright_pos == '2' ) {
	$pos = 'sd-center';	
} elseif ( $copyright_pos == '3' ) {
	$pos = 'sd-right';	
}


?>
<div class="sd-copyright-wrapper clearfix">
	<div class="container">
		<div class="sd-copyright <?php echo esc_attr( $pos ); ?>">
			<?php if ( ! empty( $copyright_text ) ) : ?>
				<?php echo wp_kses( do_shortcode( $copyright_text ), array(
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
							'img' => array(
								'src'   => array(),
								'title' => array(),
								'alt'   => array(),
								'style' => array(),
								'class' => array(),
							),
							'p' => array(
								'class' => array(),
								'style' => array(),
							),
					  ) );
				?>
			<?php else : ?>
				<span class="sd-copyright-text"><?php esc_html_e( 'Copyright', 'wrapkit' ); ?> &copy; <?php echo date( 'Y' ); ?> - <a href="https://skat.tf" title="Multi Purpose WordPress Theme" target="_blank"> Multi Purpose WordPress Theme </a></span>
			<?php endif; ?>
			<?php if ( has_nav_menu( 'copyright-menu' ) ) : ?>
				<nav class="sd-copyright-menu">
					<?php wrapkit_copyright_menu(); ?>
				</nav>
				<!-- sd-copyright-menu -->
			<?php endif; ?>
		</div>
		<!-- sd-copyright -->
	</div>
	<!-- container -->
</div>
<!-- sd-copyright-wrapper -->