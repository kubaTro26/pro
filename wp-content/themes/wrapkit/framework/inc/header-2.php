<?php
/**
 * Header Style 2
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
$wrapkit_data = wrapkit_global();

$sd_h2_link1            = isset( $wrapkit_data['sd_h2_link1'] ) ? $wrapkit_data['sd_h2_link1'] : NULL;
$sd_h2_link1_url        = isset( $wrapkit_data['sd_h2_link1_url'] ) ? $wrapkit_data['sd_h2_link1_url'] : NULL;
$sd_h2_link1_url_target = isset( $wrapkit_data['sd_h2_link1_url_target'] ) ? $wrapkit_data['sd_h2_link1_url_target'] : NULL;
$sd_h2_link1_icon       = isset( $wrapkit_data['sd_h2_link1_icon'] ) ? $wrapkit_data['sd_h2_link1_icon'] : NULL;

$sd_h2_link2            = isset( $wrapkit_data['sd_h2_link2'] ) ? $wrapkit_data['sd_h2_link2'] : NULL;
$sd_h2_link2_url        = isset( $wrapkit_data['sd_h2_link2_url'] ) ? $wrapkit_data['sd_h2_link2_url'] : NULL;
$sd_h2_link2_url_target = isset( $wrapkit_data['sd_h2_link2_url_target'] ) ? $wrapkit_data['sd_h2_link2_url_target'] : NULL;

$sd_h2_link3            = isset( $wrapkit_data['sd_h2_link3'] ) ? $wrapkit_data['sd_h2_link3'] : NULL;
$sd_h2_link3_url        = isset( $wrapkit_data['sd_h2_link3_url'] ) ? $wrapkit_data['sd_h2_link3_url'] : NULL;
$sd_h2_link3_url_target = isset( $wrapkit_data['sd_h2_link3_url_target'] ) ? $wrapkit_data['sd_h2_link3_url_target'] : NULL;

?>
<div class="sd-header2 bg-success-gradiant">
	<div class="container po-relative sd-header-content">
		<nav class="navbar navbar-expand-lg h2-nav">
			<?php echo wrapkit_theme_logo(); ?>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header2" aria-controls="header2" aria-expanded="false" aria-label="Toggle navigation">
				<span class="ti-menu"></span>
			</button>
			<div class="collapse navbar-collapse hover-dropdown" id="header2">
				<?php get_template_part( 'framework/inc/main-menu' ); ?>
				
				<?php if ( $sd_h2_link1 || $sd_h2_link2 || $sd_h2_link3 ) : ?>
					<ul class="navbar-nav ml-auto">
						<?php if ( ! empty( $sd_h2_link1) ) : ?>
							<li class="nav-item active">
								<a target="_blank" class="nav-link" href="<?php echo esc_url( $sd_h2_link1_url ); ?>" <?php if ( $sd_h2_link1_url_target == '1' ) { echo 'target="_blank"'; } ?>>
									<i class="fa <?php echo esc_attr( $sd_h2_link1_icon ); ?>"></i> <?php echo esc_html( $sd_h2_link1 ); ?>
								</a>
							</li>
						<?php endif; ?>
						
						<?php if ( ! empty( $sd_h2_link2 ) ) : ?>
							<li class="nav-item active">
								<a class="nav-link" href="<?php echo esc_url( $sd_h2_link2_url ); ?>" <?php if ( $sd_h2_link2_url_target == '1' ) { echo 'target="_blank"'; } ?>>
									<?php echo esc_html( $sd_h2_link2 ); ?>
								</a>
							</li>
						<?php endif; ?>
						
						<?php if ( ! empty( $sd_h2_link3 ) ) : ?>
							<li class="nav-item">
								<a class="btn btn-rounded btn-dark" href="<?php echo esc_url( $sd_h2_link3_url ); ?>" <?php if ( $sd_h2_link3_url_target == '1' ) { echo 'target="_blank"'; } ?>>
									<?php echo esc_html( $sd_h2_link3 ); ?>
								</a>
							</li>
						<?php endif; ?>
					</ul>
				<?php endif; ?>
			</div>
		</nav>
	</div>
</div>