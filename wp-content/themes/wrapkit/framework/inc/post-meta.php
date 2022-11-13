<?php
/**
 * Post Meta
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

$wrapkit_data = wrapkit_global();

$sd_blog_meta = isset( $wrapkit_data['sd_blog_post_meta'] ) ? $wrapkit_data['sd_blog_post_meta'] : NULL;

if ( $sd_blog_meta === NULL ) {
	$sd_blog_meta[1] = $sd_blog_meta[2] = $sd_blog_meta[3] = $sd_blog_meta[4] = $sd_blog_meta[5] = 1 ;
}

?>

<aside class="sd-entry-meta clearfix">
	<ul class="text-capitalize list-inline font-13 font-medium">
		<?php if ( $sd_blog_meta[2] == '1' ) : ?>
			<li class="sd-meta-author">
				<i class="fa fa-user"></i> <?php the_author(); ?>
			</li>
		<?php endif; ?>
		
		<?php if ( $sd_blog_meta[1] == '1' ) : ?>
			<li class="sd-meta-date">
				<i class="fa fa-calendar"></i> <?php the_time(get_option('date_format')); ?>
			</li>
		<?php endif; ?>
		
		<?php if ( $sd_blog_meta[3] == '1' ) : ?>
			<li class="sd-meta-category">
				<i class="fa fa-folder"></i> <?php the_category( ', ' ); ?>
			</li>
		<?php endif; ?>
		
		<?php if ( $sd_blog_meta[4] == '1' ) : ?>
			<?php $post_tags = the_tags( '<li class="meta-tag"><i class="fa fa-tag"></i>', ', ', '</li>' );
				  if ( $post_tags ) {
					$post_tags;
				  }
			?>
		<?php endif; ?>
		
		<?php if ( $sd_blog_meta[5] == '1' ) : ?>
			<li class="sd-meta-comments">
				<i class="fa fa-comment"></i> <?php comments_popup_link ( esc_html__( '0 comments', 'wrapkit' ), esc_html__( '1 Comment', 'wrapkit' ), esc_html__( ' % comments', 'wrapkit' ), 'comments-link', esc_html__( 'Comments closed', 'wrapkit' ) ); ?>
			</li>
		<?php endif; ?>
	</ul>
</aside>