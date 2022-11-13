<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage WrapKit
 * @since WrapKit 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="sd-comments-wrapper p-b-0">

	<?php if ( have_comments() ) : ?>
		<h3 class="sd-comments-title comments-title">
			<?php
				$comments_number = get_comments_number();
				if ( 1 === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'Comments (1)', 'comments title', 'wrapkit' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'Comments (%1$s)',
							'Comments (%1$s)',
							$comments_number,
							'comments title',
							'wrapkit'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</h3>

		<?php the_comments_navigation(); ?>

		<ul class="sd-comment-list comment-list list-unstyled with-noborder m-t-30">
			<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 68,
					'callback'    => 'wrapkit_custom_comments',
				) );
			?>
		</ul>

		<?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'wrapkit' ); ?></p>
	<?php endif; ?>
	
	<div class="mini-spacer">
		<?php
			// Customize comments fields
			$fields =  array(
				'author' => '<div class="form-group col-md-6 m-t-20"><input class="form-control" name="author" type="text" placeholder="' . esc_attr__( 'Name*', 'wrapkit' ) .  '" size="30" aria-required="true" /></div>',
				'email'  => '<div class="form-group col-md-6 m-t-20"><input class="form-control" name="email" type="email" size="30" aria-required="true" placeholder="' . esc_attr__( 'E-mail*', 'wrapkit' ) .  '"></div>',
				'url' 	=> '<div class="form-group col-md-6 m-t-20"><input class="form-control" name="url" type="url" size="30" placeholder="' . esc_attr__( 'Website', 'wrapkit' ) .  '" /></div>'
		);
			// Comment Form Args
			$comments_args = array(
				'class_form'           => 'row',
				'reply_text'           => esc_html__( 'Reply', 'wrapkit' ),
				'cancel_reply_link'    => esc_html__( 'Cancel reply', 'wrapkit' ),
				'class_submit'         => 'sd-submit-comments btn btn-info waves-effect waves-light m-r-10',
				'fields'               => $fields,
				'title_reply'          => esc_html__( 'Add Comment', 'wrapkit' ),
				'comment_field'        => '<div class="form-group col-md-12 m-t-20"><textarea class="form-control" id="comment" name="comment" aria-required="true" rows="5" tabindex="4" placeholder="' . esc_attr__( 'Comment*', 'wrapkit' ) .  '"></textarea></div>',
				'label_submit'         => esc_html__( 'Submit Comment', 'wrapkit' ),
				'comment_notes_before' => '<h6 class="subtitle">' . esc_html__( 'Your Email address will not be published','wrapkit' ) . '</h6>',
			);
			comment_form( $comments_args ); 
		?>
	</div>
</div>