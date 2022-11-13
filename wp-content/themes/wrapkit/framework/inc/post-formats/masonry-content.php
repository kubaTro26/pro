<?php
/**
 * Theme Index Content - Standard Post Format
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

$wrapkit_data = wrapkit_global();

$sd_has_thumb   = ( has_post_thumbnail() ) ? NULL : ' sd-no-thumb';
$post_meta      = isset( $wrapkit_data['sd_blog_post_meta_enable'] ) ? $wrapkit_data['sd_blog_post_meta_enable'] : NULL;
$sd_blog_meta   = isset( $wrapkit_data['sd_blog_post_meta'] ) ? $wrapkit_data['sd_blog_post_meta'] : NULL;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'sd-sidebar-content sd-blog-entry sd-standard-entry clearfix' ); ?>> 
	<?php if ( ( has_post_thumbnail() ) ) : ?>
		<div class="sd-entry-thumb">
			<figure>
				<?php the_post_thumbnail( 'sd-carousel' ); ?>
			</figure>
		</div>
	<?php endif; ?>
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
<!-- sd-blog-entry  --> 