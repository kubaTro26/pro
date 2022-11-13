<?php
/**
 * Taxonomy Class Category
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://www.skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

get_header();


$wrapkit_data = wrapkit_global();

$sd_has_thumb  = ( has_post_thumbnail() ) ? NULL : ' sd-no-thumb';
$sd_pagination = isset( $wrapkit_data['sd_pagination_type'] ) ? $wrapkit_data['sd_pagination_type'] : NULL;
$sd_blog_prev  = isset( $wrapkit_data['sd_blog_prev'] ) ? $wrapkit_data['sd_blog_prev'] : NULL;
$sd_blog_next  = isset( $wrapkit_data['sd_blog_next'] ) ? $wrapkit_data['sd_blog_next'] : NULL;
?>
<div class="sd-blog-page">
	<div class="container sd-wpas-main">
		<div class="row">
			<div class="col-md-8">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'sd-sidebar-content sd-blog-entry sd-standard-entry clearfix' ); ?>> 
						<?php if ( ( has_post_thumbnail() ) ) : ?>
							<div class="sd-entry-thumb">
								<figure>
									<?php the_post_thumbnail( 'sd-blog-thumbs' ); ?>
								</figure>
							</div>
						<?php endif; ?>
						<div class="sd-content-wrap">
							<header>
								<h2 class="sd-entry-title">
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
										<?php the_title(); ?>
									</a>
								</h2>
							</header>
							<div class="sd-entry-content">
								<?php
									echo wrapkit_excerpt( array(
										'length' => '30',
									) );
								?>
								<?php echo wrapkit_more(); ?>
								<div class="clearfix"></div>
							</div>
							<!-- sd-entry-content -->
						</div>
						<!-- sd-content-wrap -->
					</article>
					<!-- sd-blog-entry  --> 
				<?php endwhile; endif; wp_reset_postdata(); ?>
				<?php if ( $sd_pagination == '1' ) : ?>
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
				<div class="clearfix"></div>
			</div>
			<!-- col-md-8 -->
			<?php get_sidebar(); ?>
		</div>
		<!-- row -->
	</div>
	<!-- container sd-wpas-main -->
</div>
<!-- sd-blog-page -->
<?php get_footer(); ?>