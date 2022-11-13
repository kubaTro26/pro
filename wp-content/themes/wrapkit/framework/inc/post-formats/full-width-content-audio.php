<?php
/**
 * Audio Post Format
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

$wrapkit_data = wrapkit_global();

$sd_blog_meta = isset( $wrapkit_data['sd_blog_post_meta'] ) ? $wrapkit_data['sd_blog_post_meta'] : NULL;
$post_meta    = isset( $wrapkit_data['sd_blog_post_meta_enable'] ) ? $wrapkit_data['sd_blog_post_meta_enable'] : NULL;
$audio_url    = rwmb_meta( 'sd_audio_url' );
$attr = array(
	'src' => $audio_url,
);

if ( $post_meta === NULL ) {
	$post_meta = '1';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'sd-full-width-content sd-blog-entry sd-audio-entry clearfix' ); ?>> 
	<div class="mini-spacer">
		<div class="sd-entry-audio m-b-30">
			<?php echo wp_audio_shortcode( $attr ); ?>
		</div>
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
	<hr class="op-5" />	
</article>
