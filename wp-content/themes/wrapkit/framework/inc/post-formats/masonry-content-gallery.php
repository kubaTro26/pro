<?php
/**
 * Theme Index Content - Gallery Post Format
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

$wrapkit_data = wrapkit_global();

$post_meta    = isset( $wrapkit_data['sd_blog_post_meta_enable'] ) ? $wrapkit_data['sd_blog_post_meta_enable'] : NULL;
$gallery_imgs = rwmb_meta( 'sd_gallery_images', 'size=sd-carousel' );
$sd_blog_meta = isset( $wrapkit_data['sd_blog_post_meta'] ) ? $wrapkit_data['sd_blog_post_meta'] : NULL;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'sd-blog-entry sd-gallery-entry clearfix' ); ?>> 
	<div class="sd-entry-gallery">
		<div class="flexslider sd-entry-gallery-slider">
			<ul class="slides">
				<?php if ( ! empty( $gallery_imgs ) ) : ?>
					<?php foreach( $gallery_imgs as $gallery_img ) :  ?>
						<li><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
								<figure><img src="<?php echo esc_url( $gallery_img['url'] ); ?>" alt="<?php echo esc_attr( $gallery_img['alt'] ); ?>" /></figure>
							</a>
						</li>
					<?php endforeach; ?>
				<?php endif; ?>
			</ul>
		</div>
		<!-- flexslider sd-entry-gallery-slider -->
	</div>
	<!-- sd-entry-gallery --> 
	<div class="sd-content-wrap">
		<?php if ( $post_meta == '1' ) : ?>
				<?php get_template_part( 'framework/inc/post-meta' ); ?>
		<?php endif; ?>
		<header>
			<h2 class="sd-entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
					<?php the_title(); ?>
				</a>
			</h2>
		</header>
		<?php if ( $post_meta == '1' ) : ?>
				<?php get_template_part( 'framework/inc/post-meta-2' ); ?>
		<?php endif; ?>
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
<!-- sd-gallery-entry --> 