<?php
/**
 * Theme Single Post - Standard Post Format
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

<div class="<?php if ( ! is_singular( 'tribe_events' ) ) echo 'mini-spacer'; ?> clearfix">
	<?php	if ( has_post_thumbnail() ) : ?>
		<div class="sd-post-thumb m-b-40">
			<?php the_post_thumbnail( 'sd-blog-thumbs' ); ?>
		</div>
	<?php endif; ?>
	<?php if ( $post_meta == '1' && ! is_singular( 'tribe_events' ) ) : ?>
		<?php get_template_part( 'framework/inc/post-meta' ); ?>
	<?php endif; ?>
	<?php if ( ! is_singular( 'tribe_events' ) ) : ?>
		<h2 class="title font-medium"><?php the_title(); ?></h2>
	<?php endif; ?>
	<?php the_content(); ?>
	<?php wp_link_pages( 'before=<strong class="sd-page-navigation clearfix">&after=</strong>' ); ?>
	<?php if ( function_exists( 'sd_share_link' ) ) { sd_share_link(); } ?>
</div>
<hr class="op-5" />	
