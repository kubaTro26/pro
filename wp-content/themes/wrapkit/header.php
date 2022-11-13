<?php 
/**
 * Theme Header
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

if ( is_page() || is_single() || is_singular( 'portfolio' )  ) {
	$sd_transp_header = rwmb_meta( 'sd_transparent_header', 'type=checkbox');
}
$hide_header = '';
if ( is_page_template( 'full-width-page.php' ) ) {
	$hide_header = rwmb_meta( 'sd_hide_header' );
}
$sd_header_style  = isset( $wrapkit_data['sd_header_style'] ) ? $wrapkit_data['sd_header_style'] : '9';
$sd_sticky_header = isset( $wrapkit_data['sd_sticky_header'] ) ? $wrapkit_data['sd_sticky_header'] : '1';
$sd_boxed         = isset( $wrapkit_data['sd_boxed'] ) ? $wrapkit_data['sd_boxed'] : NULL;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if ( $sd_boxed == '2' ) : ?>
	<div class="sd-boxed">
<?php endif; ?>
<div class="preloader">
	<div class="loader">
		<div class="loader__figure"></div>
	</div>
</div>

<?php if ( $hide_header !== '1' ) : ?>
	<header id="sd-header" class="clearfix <?php if ( $sd_transp_header == '1' && $sd_header_style !== '14' ) { echo 'topbar'; } ?> <?php if ( $sd_sticky_header == '1' && $sd_header_style !== '14' ) { echo 'sd-sticky'; } ?> <?php if ( $sd_transp_header == '1' ) { echo 'sd-transparent-bg'; } ?>">
		
		<?php get_template_part( 'framework/inc/header-'. $sd_header_style ); ?>

	</header>
	<!-- #sd-header -->
<?php endif; ?>
<?php
	if ( ! is_singular( array( 'post' ) ) ) {
		get_template_part( 'framework/inc/page-top' );
	}
?>