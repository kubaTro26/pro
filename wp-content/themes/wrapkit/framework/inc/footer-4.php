<?php
/**
 * Footer Style 4
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
$wrapkit_data = wrapkit_global();

$sd_f4_logo           = isset( $wrapkit_data['sd_f2_logo'] ) ? $wrapkit_data['sd_f2_logo']['url'] : NULL;
$sd_widgetized_footer = isset( $wrapkit_data['sd_widgetized_footer'] ) ? $wrapkit_data['sd_widgetized_footer'] : NULL;
$sd_footer_sidebars   = isset( $wrapkit_data['sd_footer_sidebars'] ) ? $wrapkit_data['sd_footer_sidebars'] : NULL;
$sd_copyright         = isset( $wrapkit_data['sd_copyright'] ) ? $wrapkit_data['sd_copyright'] : NULL;

?>

<div class="sd-footer4">
	<div class="footer4 spacer b-t">
		<?php 
			if ( $sd_widgetized_footer == '1' ) { 
				if ( $sd_footer_sidebars == '1' || $sd_footer_sidebars == '5' || $sd_footer_sidebars == '6' ) {
					get_template_part( 'framework/inc/2-sidebars-footer' );
				} else if ( $sd_footer_sidebars == '2' || $sd_footer_sidebars == '4' || $sd_footer_sidebars == '7' || $sd_footer_sidebars == '8') {
					get_template_part( 'framework/inc/3-sidebars-footer' );
				} else if ( $sd_footer_sidebars == '3' ) {
					get_template_part( 'framework/inc/4-sidebars-footer' );
				}

			} 
		?>
		<?php if ( ! empty( $sd_f4_logo ) || ! empty( $sd_copyright ) || has_nav_menu( 'footer-menu' ) ) : ?>
			<div class="container">
				<div class="f4-bottom-bar">
                            <div class="row">
                                <div class="col-md-12">
                                    <nav class="navbar navbar-expand-lg h1-nav">
										<?php if ( ! empty( $sd_f4_logo ) ) : ?>
                                        	<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php echo esc_url( $sd_f4_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
                                        <?php endif; ?>
                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header1" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="ti-menu"></span>
                                        </button>
                                        <div class="collapse navbar-collapse" id="header1">
                                           	<?php if ( ! empty( $sd_copyright ) ) : ?>
												<span class="hidden-lg-down sd-copy-txt">
													<?php
														echo wp_kses( $sd_copyright,
															array(
																'script' => array(),
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
																'p' => array(
																	'class' => array(),
																	'style' => array(),
																),
														) );
													?>
                                            	</span>
                                            <?php endif; ?>
                                            <?php get_template_part( 'framework/inc/footer-menu' ); ?>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
			</div>
		<?php endif; ?>
	</div>
</div>