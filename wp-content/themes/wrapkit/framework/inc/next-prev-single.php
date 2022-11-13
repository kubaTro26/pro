<?php
/**
 * Next/Previous Single Post Links
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2015, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
$wrapkit_data = wrapkit_global();

$sd_blog_prev = isset( $wrapkit_data['sd_blog_single_prev'] ) ? $wrapkit_data['sd_blog_single_prev'] : NULL;
$sd_blog_next = isset( $wrapkit_data['sd_blog_single_next'] ) ? $wrapkit_data['sd_blog_single_next'] : NULL;

if ( ! function_exists( 'wrapkit_prev_post_class' ) ) {
	function wrapkit_prev_post_class( $output ) {
		$code = 'class="link font-medium"';
		return str_replace('<a href=', '<a '.$code.' href=', $output);
	}
	add_filter('next_post_link', 'wrapkit_prev_post_class');
}

if ( ! function_exists( 'wrapkit_next_post_class' ) ) {
	function wrapkit_next_post_class( $output ) {
		$code = 'class="link ml-auto font-medium"';
		return str_replace('<a href=', '<a '.$code.' href=', $output);
	}
	add_filter('previous_post_link', 'wrapkit_next_post_class');
}
?>

<div class="mini-spacer">
	<div class="d-flex no-block font-13">
		<?php next_post_link( '%link', '<i class="ti-arrow-left m-r-10"></i>' . $sd_blog_prev ); ?>
		<?php previous_post_link( '%link', $sd_blog_next  . '<i class="ti-arrow-right m-l-10 "></i>' ); ?>
	</div>
</div>