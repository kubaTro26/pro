<?php
/**
 * Header Style 15
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

<div class="sd-header15">
	<div class="header1 po-relative sd-header-content">
		<div class="container">
			<!-- Header 1 code -->
			<nav class="navbar navbar-expand-lg h1-nav">
				<?php echo wrapkit_theme_logo(); ?>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mheader1" aria-expanded="false" aria-label="Toggle navigation">
					<span class="ti-menu"></span>
				</button>
				<div class="collapse navbar-collapse hover-dropdown" id="mheader1">
					<?php get_template_part( 'framework/inc/main-menu' ); ?>
					<ul class="navbar-nav social-icon ml-auto">
						<?php echo wrapkit_social(); ?>
					</ul>
				</div>
			</nav>
			<!-- End Header 1 code -->
		</div>
	</div>
</div>