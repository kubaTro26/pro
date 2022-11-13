<?php
/**
 * Archive Page
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

$sd_pagination  = isset( $wrapkit_data['sd_pagination_type'] ) ? $wrapkit_data['sd_pagination_type'] : null;
$sd_blog_prev   = isset( $wrapkit_data['sd_blog_prev'] ) ? $wrapkit_data['sd_blog_prev'] : null;
$sd_blog_next   = isset( $wrapkit_data['sd_blog_next'] ) ? $wrapkit_data['sd_blog_next'] : null;

?>

<div class="sd-blog-page">
	<div class="container">
		<div class="row"> 
			<!--left col-->
			<div class="col-md-8">
					<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'framework/inc/post-formats/sidebar-content', get_post_format() ); ?>
					<?php endwhile; else : ?>
					<p>
						<?php esc_html_e( 'Sorry, no posts matched your criteria', 'wrapkit' ) ?>
						. </p>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
					<!--pagination-->
					<?php if ( $sd_pagination === '1' ) : ?>
						<?php if ( get_previous_posts_link() ) : ?>
						<div class="sd-nav-previous">
							<?php previous_posts_link( $sd_blog_prev ); ?>
						</div>
						<?php endif; ?>
						<?php if ( get_next_posts_link() ) : ?>
						<div class="sd-nav-next">
							<?php next_posts_link( $sd_blog_next ); ?>
						</div>
						<?php endif; ?>
					<?php else : ?>
						<?php wrapkit_custom_pagination(); ?>
					<?php endif; ?>
					<!--pagination end--> 
				</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
