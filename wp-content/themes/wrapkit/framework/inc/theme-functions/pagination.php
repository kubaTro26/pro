<?php
/**
 * Theme Custom Pagination
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

if ( ! function_exists( 'wrapkit_custom_pagination' ) ) {
	function wrapkit_custom_pagination( $pages = '', $range = 3 ) {
		$showitems = ( $range * 2 ) + 1;
		
		global $paged;

		if ( empty( $paged ) ) $paged = 1;
		
		if ( $pages == '' ) {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if ( !$pages ) {
				$pages = 1;
			}
		}
		
		if ( 1 != $pages ) {
			echo '<nav class="m-t-20 p-t-20">';
			echo '<ul class="pagination justify-content-center">';
			if ( $paged > 2 && $paged > $range+1 && $showitems < $pages ) echo '<li class="page-item"><a class="page-link" href="'. get_pagenum_link( 1 ) .'">' . esc_html__( 'First', 'wrapkit' ) . '</a></li>';
			if ( $paged > 1 && $showitems < $pages ) echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( $paged - 1 ) . '" title="' . esc_attr( 'Previous', 'wrapkit' ) . '">&lsaquo;</a></li>';
			
			for ( $i = 1; $i <= $pages; $i++ ) {
				if ( 1 != $pages &&( !( $i >= $paged + $range + 1 || $i <= $paged-$range - 1) || $pages <= $showitems ) ) {
					echo ( $paged == $i ) ? '<li class="page-item active"><a class="page-link"><span>' . $i . '</span></a></li>' : '<li class="page-item"><a href="' . get_pagenum_link( $i ) . '" class="page-link">' . $i . '</a></li>';
				}
			}
		
			if ( $paged < $pages && $showitems < $pages ) echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( $paged + 1 ) . '" title="' . esc_attr( 'Next', 'wrapkit' ) . '"> &rsaquo;</a></li>';
			if ( $paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages ) echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link( $pages ) . '">' . esc_html__( 'Last', 'wrapkit' ) . '</a></li>';
			echo '</ul>';
			echo '</nav>';
		}
			
	}
}

// Next Prev

if ( ! function_exists( 'wrapkit_prev_link_class' ) ) {
	function wrapkit_prev_link_class() {
		return 'class="link ml-auto font-medium"';
	}
	add_filter('next_posts_link_attributes', 'wrapkit_prev_link_class');
}
if ( ! function_exists( 'wrapkit_next_link_class' ) ) {
	function wrapkit_next_link_class() {
		return 'class="link font-medium"';
	}
	add_filter('previous_posts_link_attributes', 'wrapkit_next_link_class');
}

?>
<?php if ( ! function_exists( 'wrapkit_blog_nex_prev' ) ) {
	function wrapkit_blog_nex_prev() {
		global $wrapkit_data, $wp_query;
		
		$sd_pagination  = isset( $wrapkit_data['sd_pagination_type'] ) ? $wrapkit_data['sd_pagination_type'] : NULL;
		$sd_blog_prev   = isset( $wrapkit_data['sd_blog_prev'] ) ? $wrapkit_data['sd_blog_prev'] : NULL;
		$sd_blog_next   = isset( $wrapkit_data['sd_blog_next'] ) ? $wrapkit_data['sd_blog_next'] : NULL;

?>
	<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="mini-spacer">
			<div class="d-flex no-block font-13">
				<?php if ( get_previous_posts_link() ) : ?>
					<?php previous_posts_link( '<i class="ti-arrow-left m-r-10"></i>' . $sd_blog_prev ); ?>
				<?php endif; ?>

				<?php if ( get_next_posts_link() ) : ?>
					<?php next_posts_link( $sd_blog_next . '<i class="ti-arrow-right m-l-10 "></i>' ); ?>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
<?php
	} 
}
?>