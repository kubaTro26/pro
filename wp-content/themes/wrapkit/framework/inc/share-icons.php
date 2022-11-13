<?php
/**
 * Share Icons
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

$wrapkit_data = wrapkit_global();

$share_icons = isset( $wrapkit_data['sd_share_icons'] ) ? $wrapkit_data['sd_share_icons'] : NULL;
?>

<div class="sd-share-icons clearfix">
	<h3><?php echo esc_html( 'Share', 'wrapkit' ); ?></h3>
	<ul>
		<?php if ( $share_icons[1] == '1' ) : ?>
			<li>
				<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php echo urlencode( the_title_attribute() ); ?>" title="<?php esc_attr_e( 'Facebook', 'wrapkit' ) ?>" target="_blank" >		<i class="fa fa-facebook"></i>
				</a>
			</li>
		<?php endif; ?>

		<?php if ( $share_icons[2] == '1' ) : ?>
			<li>
				<a href="http://twitter.com/home?status=<?php echo urlencode( the_title_attribute() ); ?>: <?php the_permalink(); ?>" title="<?php esc_attr_e( 'Twitter', 'wrapkit' ) ?>" target="_blank">
					<i class="fa fa-twitter"></i>
				</a>
			</li>
		<?php endif; ?>
		
		<?php if ( $share_icons[3] == '1' ) : ?>
		<li>
			<a href="https://plus.google.com/share?url=<?php the_permalink() ?>" target="_blank">
				<i class="fa fa-google-plus"></i>
			</a>
		</li>
		<?php endif; ?>
		
		<?php if ( $share_icons[4] == '1' ) : ?>
			<li> 
				<a href="http://www.delicious.com/post?v=2&amp;url=<?php the_permalink() ?>&amp;notes=&amp;tags=&amp;title=<?php echo urlencode( the_title_attribute() ); ?>" title="<?php esc_attr_e( 'Delicious', 'wrapkit' ) ?>" target="_blank">
					<i class="fa fa-delicious"></i>
				</a>
			</li>
		<?php endif; ?>
		
		<?php if ( $share_icons[5] == '1' ) : ?>
			<li>
				<a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php echo urlencode( the_title_attribute() ); ?>" title="StumbleUpon" target="_blank">
					<i class="fa fa-stumbleupon"></i>
				</a>
			</li>
		<?php endif; ?>
		
		<?php if ( $share_icons[6] == '1' ) : ?>
			<li> <a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink() ?>&amp;bodytext=&amp;tags=&amp;title=<?php echo urlencode( the_title_attribute() ); ?>" target="_blank" title="<?php esc_attr_e( 'Digg', 'wrapkit' ) ?>">
					<i class="fa fa-digg"></i>
				</a>
			</li>
		<?php endif; ?>
		
		<?php if ( $share_icons[7] == '1' ) : ?>
			<li>
				<a href="http://www.reddit.com/submit?url=<?php the_permalink() ?>&amp;title=<?php echo urlencode( the_title_attribute() ); ?>" title="<?php esc_attr_e( 'Reddit', 'wrapkit' ) ?>" target="_blank">
					<i class="fa fa-reddit"></i>
				</a>
			</li>
		<?php endif; ?>
		
		<?php if ( $share_icons[8] == '1' ) : ?>
			<li>
				<a href="mailto:?subject=<?php echo urlencode( the_title_attribute() ); ?>&amp;body=<?php the_permalink() ?>" title="<?php esc_attr_e( 'E-Mail', 'wrapkit' ) ?>" target="_blank">
					<i class="fa fa-envelope-o"></i>
				</a>
			</li>
		<?php endif; ?>
	</ul>
</div>