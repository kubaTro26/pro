<?php
/**
 * 
 *
 * @description: A simple widget to display popular posts.
 * @package	WrapKit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

class Wrapkit_Popular_Posts_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'sd_popular_posts_widget', // Base ID
			esc_html__( 'Popular Posts', 'wrapkit' ), // Name
			array( 'description' => esc_html__( 'Displays the popular posts.', 'wrapkit' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		
		$sd_postcount = $instance['postcount'];
		
		$query_args = array(
			'posts_per_page'      => $sd_postcount,
			'ignore_sticky_posts' => 1,
			'orderby'             => 'comment_count',
		);
			
		$sd_popular_posts = new WP_Query( $query_args );

		?>
		
		<div class="sd-latest-posts-widget">
			<?php if ( $sd_popular_posts->have_posts() ) : while ( $sd_popular_posts->have_posts() ) : $sd_popular_posts->the_post(); ?>
				<div class="d-flex no-block align-items-center m-t-20">
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="thumb m-r-20">
							<?php the_post_thumbnail( 'sd-latest-blog-widget' ); ?>
						</div>
					<?php endif; ?>
					<div class="btext"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="link"><?php the_title(); ?></a></div>
				</div>
			<?php endwhile; endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
		
	<?php	echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		
		$defaults = array(
			'title'         => esc_html__( 'Popular Posts', 'wrapkit' ),
			'postcount' => '2',
		);
		
		$instance = wp_parse_args( ( array ) $instance, $defaults );
		
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'wrapkit' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>">
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'postcount' ) ); ?>"><?php esc_attr_e( 'Number of Posts:', 'wrapkit' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'postcount' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'postcount' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['postcount'] ); ?>">
		</p>
		
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title']    = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['postcount'] = ( ! empty( $new_instance['postcount'] ) ) ? strip_tags( $new_instance['postcount'] ) : '';

		return $instance;
	}

} // class Wrapkit_Contact_Widget
// register Contact widget
function wrapkit_popular_posts_widget() {
    register_widget( 'Wrapkit_Popular_Posts_Widget' );
}
add_action( 'widgets_init', 'wrapkit_popular_posts_widget' );