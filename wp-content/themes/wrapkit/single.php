<?php
/**
 * Theme Single Post
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

get_header(); 

$wrapkit_data = wrapkit_global();

$format = get_post_format();

if ( false === $format ) {
	$format = 'standard';
}

$post_class = 'sd-single-' . $format;


$header_bgs     = rwmb_meta( 'sd_header_page_bg', 'size=full' );
$bg_repeat      = rwmb_meta( 'sd_bg_repeat', 'type=checkbox' );
$repeat_x       = rwmb_meta( 'sd_repeat_x', 'type=checkbox' );
$repeat_y       = rwmb_meta( 'sd_repeat_y', 'type=checkbox' );
$repeat_x       = ( $repeat_x == '1' ? ' repeat-x ' : '' );
$repeat_y       = ( $repeat_y == '1' ? ' repeat-y ' : '' );
$custom_title   = rwmb_meta( 'sd_post_single_title' );
$padding_top    = rwmb_meta( 'sd_post_padding_top' );
$padding_bottom = rwmb_meta( 'sd_post_padding_bottom' );
$show_title     = rwmb_meta( 'sd_post_page_title' );
$title_color    = rwmb_meta( 'sd_title_color' );
$bg_color       = rwmb_meta('sd_bg_color');
$sd_share       = isset( $wrapkit_data['sd_blog_share'] ) ? $wrapkit_data['sd_blog_share'] : NULL;
$sd_author_box  = isset( $wrapkit_data['sd_blog_author_box'] ) ? $wrapkit_data['sd_blog_author_box'] : NULL;
$sd_prev_next   = isset( $wrapkit_data['sd_blog_single_prev_next'] ) ? $wrapkit_data['sd_blog_single_prev_next'] : NULL;
$sd_related     = isset( $wrapkit_data['sd_blog_related'] ) ? $wrapkit_data['sd_blog_related'] : NULL;
$sd_blog_layout = isset( $wrapkit_data['sd_blog_layout'] ) ? $wrapkit_data['sd_blog_layout'] : NULL;

if ( $bg_repeat == '1' && $repeat_x !== '1' && $repeat_y !== '1' ) {
	$bg_repeat = 'repeat';
} else if ( $repeat_x == '1' || $repeat_y == '1' ) {
	$bg_repeat = '';
} else {
	$bg_repeat = 'no-repeat center center / cover';
}

$styling = array();

if ( ! empty( $header_bgs ) ) {
	foreach ( $header_bgs as $header_bg ) {
		$styling[] = 'background: url(' . $header_bg['full_url'] . ') ' . $bg_repeat . $repeat_x . $repeat_y . ';';
	}
}
if ( ! empty( $padding_top ) ) {
	$styling[] = 'padding-top: '. $padding_top .';';
}
if ( ! empty( $padding_bottom ) ) {
	$styling[] = 'padding-bottom: '. $padding_bottom .';';
}
if ( ! empty( $bg_color ) ) {
		$styling[] = 'background-color: '. $bg_color .';';
}
$styling = implode( '', $styling );

if ( $styling ) {
	$styling = wp_kses( $styling, array() );
	$styling = ' style="' . $styling . '"';
}

//page top title styling
	$title_styling = array();
	
	if ( ! empty( $title_color ) ) {
		$title_styling[] = 'color:' . $title_color . ';';
	}
	if ( ! empty( $title_bg_color ) ) {
		$title_styling[] = 'background-color:' . $title_bg_color . ';';
	}
	
	$title_styling = implode( '', $title_styling );
	
	if ( $title_styling ) {
		$title_styling = wp_kses( $title_styling, array() );
		$title_styling = ' style="' . esc_attr( $title_styling ) . '"';
	}

?>

<?php if ( $show_title == '1' ) : ?>
	<div class="sd-page-top-bg" <?php echo $styling; ?>>
		<div class="container">
			<div>
				<h1 <?php echo $title_styling; ?>>
					<?php if ( ! empty( $custom_title) ) echo esc_html( $custom_title ); else the_title(); ?>
				</h1>
			</div>
			<!-- sd-campaign-single-title -->
		</div>
		<!-- container -->
	</div>
	<!-- sd-campaign-title-bg -->
<?php endif; ?>

<div class="page-wrapper">
	<div class="container-fluid">
		<div class="spacer">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'sd-single-blog-entry clearfix ' . $post_class ); ?>> 
								<?php get_template_part( 'framework/inc/post-formats/single', get_post_format() ); ?>
								<?php
									if ( $sd_prev_next == '1' ) { 
										get_template_part( 'framework/inc/next-prev-single' );
									}
								?>
							</article>
							<?php if ( comments_open() || get_comments_number() ) : 	comments_template(); endif; ?>
						<?php endwhile; else: ?>
							<p><?php esc_html_e( 'Sorry, no posts matched your criteria', 'wrapkit' ) ?>.</p>
						<?php endif; ?>						
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<?php get_footer(); ?>