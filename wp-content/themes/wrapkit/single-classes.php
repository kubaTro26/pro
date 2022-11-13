<?php
/**
 * Theme Single Post Classes
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
get_header(); 

$classes_layout = isset( $wrapkit_data['sd_classes_layout'] ) ? $wrapkit_data['sd_classes_layout'] : NULL;
$sd_share       = isset( $wrapkit_data['sd_classes_share'] ) ? $wrapkit_data['sd_classes_share'] : NULL;

?>
<div class="sd-single-class">
	<div class="container">
		<div class="row"> 
			<!--left col-->
			<div class="col-md-<?php if ( $classes_layout == '3' ) echo '12'; else echo '8'; ?> <?php if ( $classes_layout == '2' ) echo 'pull-right'; ?>">
				<div class="sd-single-class-wrap">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="sd-single-event-thumb">
								<?php $blog_thumb_size = ( $classes_layout == '3'  ? 'sd-full-blog-thumbs' : 'sd-blog-thumbs' ); ?>
								<figure>
									<?php the_post_thumbnail( $blog_thumb_size ); ?>
								</figure>
							</div>
						<?php endif; ?>
						<div class="sd-event-content">
							<?php the_content(); ?>
						</div>
						<!-- sd-event-content -->
						
						<?php if ( $sd_share == '1' ) { get_template_part( 'framework/inc/share-icons' ); } ?>
	
					<?php endwhile; else: ?>
						<p><?php esc_html_e( 'Sorry, no courses matched your criteria', 'wrapkit' ) ?>.</p>
					<?php endif; ?>
				</div>
				<!-- sd-single-class-wrap -->
			</div>
			<!-- col-md-8 --> 
			<?php if ( $classes_layout !== '3' ) : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</div>
<!-- sd-single-course -->
<?php get_footer(); ?>