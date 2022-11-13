<?php
/**
 * Gallery Post Format
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

$wrapkit_data = wrapkit_global();

$sd_has_thumb = ( has_post_thumbnail() ) ? NULL : ' sd-no-thumb';
$post_meta    = isset( $wrapkit_data['sd_blog_post_meta_enable'] ) ? $wrapkit_data['sd_blog_post_meta_enable'] : NULL;
$sd_blog_meta = isset( $wrapkit_data['sd_blog_post_meta'] ) ? $wrapkit_data['sd_blog_post_meta'] : NULL;
$gallery_imgs = rwmb_meta( 'sd_gallery_images', 'size=sd-blog-thumbs' );
$sd_rand      = mt_rand( 10, 1000 );

if ( $post_meta === NULL ) {
	$post_meta = '1';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'sd-full-width-content sd-blog-entry sd-gallery-entry clearfix' ); ?>> 
	<div class="mini-spacer">
		<div id="sd-gallery-carousel-<?php echo $sd_rand; ?>" class="carousel slide m-b-30" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
				<?php 
					$i = 1;
					if ( ! empty( $gallery_imgs ) ) : 
				?>
					<?php foreach( $gallery_imgs as $gallery_img ) :  ?>
						<?php $sd_active = ( $i == 1 ) ? 'active' : ''; ?>
						<div class="carousel-item <?php echo $sd_active; ?>">
							<img src="<?php echo esc_url( $gallery_img['url'] ); ?>" alt="<?php echo esc_attr( $gallery_img['alt'] ); ?>" />
						</div>

					<?php $i++; endforeach; ?>
				<?php endif; ?>
			</div>
			<a class="carousel-control-prev" href="#sd-gallery-carousel-<?php echo $sd_rand; ?>" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only"><?php esc_html_e( 'Previous', 'wrapkit' ); ?></span>
			</a>
			<a class="carousel-control-next" href="#sd-gallery-carousel-<?php echo $sd_rand; ?>" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only"><?php esc_html_e( 'Previous', 'wrapkit' ); ?></span>
			</a>
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