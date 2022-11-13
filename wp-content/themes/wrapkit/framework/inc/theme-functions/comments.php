<?php
/**
 * Theme Custom Comments
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

// Show number of comments in post excluding trackbacks/pings
if ( ! function_exists( 'wrapkit_comment_count' ) ) {
	function wrapkit_comment_count( $count ) {
		if ( ! is_admin() ) {
			global $id;
			$get_comments = get_comments( 'status=approve&post_id=' . $id );
			$comments_by_type = separate_comments($get_comments);
			return count( $comments_by_type['comment'] );
		} else {
		return $count;
		}
	}
	add_filter( 'get_comments_number', 'wrapkit_comment_count', 0 );
}

// Custom Comments Callback

if ( ! function_exists( 'wrapkit_custom_comments' ) ) {
	function wrapkit_custom_comments( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
	?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>" class="sd-comment-body clearfix">
		<div class="sd-author-avatar"> <?php echo get_avatar( $comment, $size=$args['avatar_size'] ); ?> </div>
		<div class="sd-comment-text">
			<div class="sd-comment-author">
				<cite><?php echo get_comment_author_link(); ?></cite>
				<small class="sd-comment-meta"><?php echo get_comment_date( get_option( 'date_format' ) );?> - <?php printf( _x( '%s ago', '%s = human-readable time difference', 'wrapkit' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?></small>
			</div>
			<?php if ( $comment->comment_approved == '0' ) : ?>
			<em>
			<?php esc_html_e( 'You comment awaits moderation.', 'wrapkit' ) ?>
			</em>
			<?php endif; ?>
			<div class="sd-comment-meta sd-comment-meta-data"> <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"></a>
				<?php edit_comment_link( esc_html__( '(Edit)', 'wrapkit'),'&nbsp;&nbsp;','' ) ?>
			</div>
			<div class="sd-text-of-comment">
				<?php comment_text(); ?>
			</div>
			<?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'wrapkit' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
	</div>
	<?php // Do not include the </li> tag.
	}
}
// Trackback and pings callback
if ( ! function_exists( 'list_pings' ) ) {
	function list_pings($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
?>
<li id="comment-<?php comment_ID(); ?>">
	<?php comment_author_link(); ?>
<?php } 
}
?>