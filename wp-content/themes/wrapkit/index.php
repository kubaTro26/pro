<?php 
/**
 * Theme's Index
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

get_header();

$wrapkit_data = wrapkit_global();

$sd_pagination  = isset( $wrapkit_data['sd_pagination_type'] ) ? $wrapkit_data['sd_pagination_type'] : NULL;
$sd_blog_prev   = isset( $wrapkit_data['sd_blog_prev'] ) ? $wrapkit_data['sd_blog_prev'] : NULL;
$sd_blog_next   = isset( $wrapkit_data['sd_blog_next'] ) ? $wrapkit_data['sd_blog_next'] : NULL;
$sd_cats_id     = rwmb_meta( 'sd_blog_category_ids' );
$sd_blog_cats   = ! empty( $sd_cats_id  ) ? $sd_cats_id  : '';
$sd_blog_layout = rwmb_meta( 'sd_blog_layout' );
?>

<div class="container-fluid">
	<div class="spacer">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
				
					<?php 
						global $more;
						$more = 0;
						$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

						$args = array(
							'cat'         => $sd_blog_cats,
							'paged'       => $paged,
							'post_status' => 'publish'
						);

						$wp_query = new WP_Query( $args );
					?>
					<?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
						
						<?php get_template_part( 'framework/inc/post-formats/full-width-content', get_post_format() ); ?>
						
					<?php endwhile; else: ?>
						<p><?php esc_html_e( 'Sorry, no posts matched your criteria', 'wrapkit' ) ?>.</p>
					<?php endif; wp_reset_postdata(); ?>
					
					<?php if ( $sd_pagination == '1' ) : ?>
						<?php wrapkit_blog_nex_prev(); ?>	
					<?php else : ?>
						<?php wrapkit_custom_pagination(); ?>
					<?php endif; ?>
					
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>