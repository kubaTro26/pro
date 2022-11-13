<?php
/**
 * Theme Single Post - Video Post Format
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
$sd_blog_meta = isset( $wrapkit_data['sd_blog_post_meta'] ) ? $wrapkit_data['sd_blog_post_meta'] : NULL;
$video_embed  = rwmb_meta( 'sd_video_url', 'type=oembed' );

if ( $post_meta === NULL ) {
	$post_meta = '1';
}

?>

<div class="mini-spacer">
	<div class="sd-entry-video-wrapper m-b-40">
		<div class="sd-entry-video ">
			<?php
				echo wp_kses( $video_embed, array(
						'iframe' => array(
							'src'             => array(),
							'height'          => array(),
							'width'           => array(),
							'frameborder'     => array(),
							'allowfullscreen' => array(),
						),
				) );
			?>
		</div>
	</div>
	<?php if ( $post_meta == '1' ) : ?>
		<?php get_template_part( 'framework/inc/post-meta' ); ?>
	<?php endif; ?>
	<h2 class="title font-medium"><?php the_title(); ?></h2>
	<?php the_content(); ?>
	<?php wp_link_pages( 'before=<strong class="sd-page-navigation clearfix">&after=</strong>' ); ?>
	<?php if ( function_exists( 'sd_share_link' ) ) { sd_share_link(); } ?>
</div>
<?php if ( ! comments_open() ) : ?>
	<hr class="op-5" />
<?php endif; ?>