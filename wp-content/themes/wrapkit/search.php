<?php 
/**
 * Theme Search Results
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

$sd_blog_prev   = isset( $wrapkit_data['sd_blog_prev'] ) ? $wrapkit_data['sd_blog_prev'] : NULL;
$sd_blog_next   = isset( $wrapkit_data['sd_blog_next'] ) ? $wrapkit_data['sd_blog_next'] : NULL;
$sd_pagination  = isset( $wrapkit_data['sd_pagination_type'] ) ? $wrapkit_data['sd_pagination_type'] : NULL;

?>
<div class="container-fluid">
	<div class="spacer">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
				
					<?php if ( have_posts( ) ) : while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'framework/inc/post-formats/full-width-content', get_post_format() ); ?>
					<?php endwhile; else: ?>

					<p>	<?php esc_html_e( 'Sorry, no posts matched your criteria', 'wrapkit' ) ?>. </p>

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
