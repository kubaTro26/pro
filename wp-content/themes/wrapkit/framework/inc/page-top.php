<?php
/**
 * Page Titles
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

global $post;

$wrapkit_data = wrapkit_global();

wp_reset_query();

$sd_transp_header = '';

if ( is_page() || is_single()  ) {
	$sd_transp_header = rwmb_meta( 'sd_transparent_header', 'type=checkbox');
}

$hide_title      = rwmb_meta( 'sd_page_title', 'type=checkbox');
$sd_subtitle     = rwmb_meta( 'sd_subtitle' );
$hide_title_shop = 0;
$error_title     = isset( $wrapkit_data['sd_404_title'] ) ? $wrapkit_data['sd_404_title'] : NULL;
if ( wrapkit_is_woo() && is_shop() ) {
	$shop_id = get_option( 'woocommerce_shop_page_id' );
	$hide_title_shop = rwmb_meta( 'sd_page_title', 'type=checkbox', $shop_id );
}
?>
<?php if ( ! is_front_page() && ! is_home() && ! is_singular( 'product' ) && ! is_singular( 'page' ) && ! is_singular( 'tribe_events' ) && ! is_singular( 'campaign' ) ) : ?>
	<div class="sd-page-top banner-innerpage <?php if ( $hide_title == 1 || $hide_title_shop == 1 ) { echo 'hide'; } ?> <?php if ( is_404() ) echo 'sd-page-top-404'; ?> <?php if ( $sd_transp_header == 1 ) { echo 'sd-page-top-transp'; } ?>">
		<div class="container"> 
			<div class="row justify-content-center ">
				<div class="col-md-6 align-self-center text-center" data-aos="fade-down" data-aos-duration="1200">
					<?php if( is_archive() ) : ?>

						<?php if ( have_posts() ) : ?>

							<?php  if ( is_category() ) { ?>
								<h1 class="title">
									<?php single_cat_title(); ?>
								</h1>

							<?php  } elseif ( is_author() ) { ?>
								<h1 class="title">
									<?php esc_html_e( 'All Posts by', 'wrapkit' ); ?> <?php the_author(); ?>
								</h1>

							<?php  } elseif( is_tag() ) { ?>
								<h1 class="title">
									<?php esc_html_e( 'Tagged as:', 'wrapkit' ); ?>
									<?php single_tag_title(); ?>
								</h1>

							<?php  } elseif ( is_day() ) { ?>
								<h1 class="title">
									<?php esc_html_e( 'Archive for', 'wrapkit' ); ?>
									<?php the_time( 'F jS, Y' ); ?>
								</h1>

							<?php  } elseif ( is_month() ) { ?>
								<h1 class="title">
									<?php esc_html_e( 'Archive for', 'wrapkit' ); ?>
									<?php the_time( 'F, Y' ); ?>
								</h1>
							<?php  } elseif ( is_year() ) { ?>
								<h1 class="title">
									<?php esc_html_e( 'Archive for', 'wrapkit' ); ?>
									<?php the_time( 'Y' ); ?>
								</h1>

							<?php  } elseif ( isset( $_GET['paged']) && !empty( $_GET['paged']) ) { ?>
								<h1 class="title">
									<?php esc_html_e( 'Archive', 'wrapkit' ); ?>
								</h1>
							<?php  } elseif ( wrapkit_is_woo() && is_shop() ) { ?>
								<h1 class="title">
									<?php woocommerce_page_title(); ?>
								</h1>
							<?php } else { ?>
								<h1 class="title">
									<?php single_cat_title(); ?>
								</h1>
							<?php } ?>
						<?php endif; ?>

					<?php elseif ( is_search() ) : ?>
						<h1 class="title">
							<?php esc_html_e( 'Search Results for:', 'wrapkit' ); ?>
							<?php $allsearch = new WP_Query("s=$s&amp;showposts=-1"); $key = esc_html( $s, 1 ); echo '"' . $key . '"'; wp_reset_query(); ?>
						</h1>
					<?php elseif ( is_404() ) : ?>
						<h1 class="title">
							<?php echo esc_html( $error_title ); ?>
						</h1>
					<?php else : ?>
						<h1 class="title">
							<?php
								$post_id = $post->ID;
								echo get_the_title( $post_id );
							?>
							<?php if ( ! empty( $sd_subtitle ) ) : ?>
								<h6 class="subtitle op-8"><?php echo esc_html( $sd_subtitle ); ?></h6>
							<?php endif; ?>
						</h1>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<!-- container -->	
	</div>
	<!-- sd-page-top -->
<?php endif; ?>