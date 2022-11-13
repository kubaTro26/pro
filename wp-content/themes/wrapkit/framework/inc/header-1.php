<?php
/**
 * Header Style 1
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
$wrapkit_data = wrapkit_global();

$sd_h1_button        = isset( $wrapkit_data['sd_h4_button'] ) ? $wrapkit_data['sd_h4_button'] : NULL;
$sd_h1_button_url    = isset( $wrapkit_data['sd_h4_button_url'] ) ? $wrapkit_data['sd_h4_button_url'] : NULL;
$sd_h1_button_target = isset( $wrapkit_data['sd_h4_button_target'] ) ? $wrapkit_data['sd_h4_button_target'] : NULL;

?>

<div class="sd-header1">
	<div class="header6">
	<div class="container po-relative sd-header-content">
		<nav class="navbar navbar-expand-lg h6-nav-bar">
			<?php echo wrapkit_theme_logo(); ?>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#h6-info" aria-controls="h6-info" aria-expanded="false" aria-label="Toggle navigation">
				<span class="ti-menu"></span>
			</button>
			<div class="collapse navbar-collapse hover-dropdown font-14 ml-auto" id="h6-info">
				<?php get_template_part( 'framework/inc/main-menu' ); ?>
				<?php if ( ! empty( $sd_h1_button ) ) : ?>
					<a class="btn btn-outline-success" href="<?php echo esc_url( $sd_h1_button_url ); ?>" <?php if ( $sd_h1_button_target == '1' ) { echo 'target="_blank"'; } ?>><?php echo esc_html( $sd_h1_button ); ?></a>
				<?php endif; ?>
			</div>
		</nav>
	</div>
	</div>
</div>