<?php
/**
 * Theme Sidebar
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

wp_reset_query();
?>
<div class="sd-sidebar col-md-4">
	<aside role="complementary">
		<?php if ( function_exists( 'smk_sidebar' ) ) {
			if ( ! is_category() && ! is_tag() && ! is_search() && ! is_404() && ! is_day() && ! is_year() && ! is_archive() && ! is_tax() && ! is_date() && ! is_author() ) {
				
				$smk_sidebar = rwmb_meta( 'sd_smk_sidebar' );
				
				if ( ! empty( $smk_sidebar ) ) {
					smk_sidebar( $smk_sidebar );
				} else {
					if ( is_active_sidebar( 'main-sidebar' ) ) {
						dynamic_sidebar( 'main-sidebar' );
					}
				}
			} else {
				if ( is_active_sidebar( 'main-sidebar' ) ) {
					dynamic_sidebar( 'main-sidebar' );
				}
			}
		} else {
			if ( is_active_sidebar( 'main-sidebar' ) ) {
				dynamic_sidebar( 'main-sidebar' );
			}
		}
		?>
	</aside>
</div>
<!-- sd-sidebar -->