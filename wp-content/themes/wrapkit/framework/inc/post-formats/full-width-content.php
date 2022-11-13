<?php
/**
 * Standard Post Format
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

if ( $post_meta === NULL ) {
	$post_meta = '1';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'sd-full-width-content sd-blog-entry sd-standard-entry clearfix' ); ?>> 
	<?php if ( is_sticky() ) : ?>
		<span class="badge badge-danger font-20 m-b-20"><?php esc_html_e( 'FEATURED', 'wrapkit' ); ?></span>
	<?php endif; ?>
	<div class="mini-spacer">
		<?php	if ( has_post_thumbnail() ) : ?>
			<div class="sd-post-thumb m-b-30">
				<?php the_post_thumbnail( 'sd-blog-thumbs' ); ?>
			</div>
		<?php endif; ?>
		<?php if ( $post_meta == '1' ) : ?>
			<?php get_template_part( 'framework/inc/post-meta' ); ?>
		<?php endif; ?>
		<h2 class="title font-medium"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="link"><?php the_title(); ?></a></h2>
		<?php
			echo wrapkit_excerpt( array(
					'length' => '30',
				) );
		?>
		<?php echo wrapkit_more(); ?>
	</div>
	<hr />	
</article>