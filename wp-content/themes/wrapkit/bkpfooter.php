<?php
/**
 * Theme Footer
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

$wrapkit_data = wrapkit_global();

$sd_footer_style = isset( $wrapkit_data['sd_footer_style'] ) ? $wrapkit_data['sd_footer_style'] : '1';
$sd_back_to_top  = isset( $wrapkit_data['sd_back_to_top'] ) ? $wrapkit_data['sd_back_to_top'] : '1';

$sd_body_boxed        = isset( $wrapkit_data['sd_boxed'] ) ? $wrapkit_data['sd_boxed'] : NULL;

$hide_footer = '';

if ( is_page_template( 'full-width-page.php' ) ) {
	$hide_footer = rwmb_meta( 'sd_hide_footer' );
}

?>
<?php if ( $hide_footer !== '1' ) : ?>
	<div id="sd-footer">
		<?php get_template_part( 'framework/inc/footer-'. $sd_footer_style ); ?>
	</div>
<?php endif; ?>

<?php if ( $sd_back_to_top == '1' ) : ?>
	<a class="bt-top btn btn-circle btn-lg btn-info"><i class="ti-arrow-up"></i></a>
<?php endif; ?>
<?php if ( $sd_body_boxed == '2' ) : ?>
	</div>
	<!-- sd-boxed -->
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>