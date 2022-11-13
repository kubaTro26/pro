<?php
/**
 * Newsletter Widget
 *
 * @description: A simple widget to display a newsletter form.
 * @package	WrapKit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

class Wrapkit_Newsletter_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'sd_newsletter_widget', // Base ID
			esc_html__( 'MailChimp Newsletter', 'wrapkit' ), // Name
			array( 'description' => esc_html__( 'Displays a newsletter form.', 'wrapkit' ), ) // Args
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
		
		$sd_box_text = $instance['box_text'];
		$sd_list_url = $instance['list_url'];
		$sd_btn_text = $instance['btn_text'];
	?>
	
		
			<div class="subscribe-box">
				<div class="display-4 text-white"><i class="icon-Mail-3"></i></div>
				<?php if ( ! empty( $sd_box_text ) ) : ?>
					<p><?php echo esc_html( $sd_box_text ); ?></p>
				<?php endif; ?>
				<form action="<?php echo esc_url( $sd_list_url ); ?>" method="post" id="mc-embedded-subscribe-form">
					<div class="m-b-20">
						<input value="" name="EMAIL" class="required email form-control" id="mce-EMAIL" placeholder="<?php esc_html_e( 'E-Mail Address', 'wrapkit' ); ?>" type="email">
					</div>
					<div style="position: absolute;left: -5000px"><input name="b_5ef55abee027ce066bca8313c_46cd16464a" value="" type="text"></div>
					<input value="<?php echo esc_html( $sd_btn_text ); ?>" name="subscribe" id="mc-embedded-subscribe" class="button btn btn-danger-gradiant" type="submit">
				</form>
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
			'title'    => esc_html__( 'Newsletter Subscribe', 'wrapkit' ),
			'box_text' => 'Nullam erat ametam arcuing lorme pharetra id risus act sectetur ipsum luctus est. ',
			'list_url' => '//skat.us7.list-manage.com/subscribe/post?u=5ef55abee027ce066bca8313c&amp;id=46cd16464a',
			'btn_text' => esc_html__( 'JOIN US', 'wrapkit' ),
		);
		
		$instance = wp_parse_args( ( array ) $instance, $defaults );
		
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'wrapkit' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>">
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'box_text' ) ); ?>"><?php esc_attr_e( 'Box Text:', 'wrapkit' ); ?></label> 
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'box_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'box_text' ) ); ?>" type="text"><?php echo esc_attr( $instance['box_text'] ); ?></textarea>
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'list_url' ) ); ?>"><?php esc_attr_e( 'Mail Chimp List Url:', 'wrapkit' ); ?></label> 
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list_url' ) ); ?>"><?php echo esc_attr( $instance['list_url'] ); ?></textarea>
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'btn_text' ) ); ?>"><?php esc_attr_e( 'Button Text:', 'wrapkit' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'btn_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'btn_text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['btn_text'] ); ?>">
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
		$instance['box_text'] = ( ! empty( $new_instance['box_text'] ) ) ? strip_tags( $new_instance['box_text'] ) : '';
		$instance['list_url'] = ( ! empty( $new_instance['list_url'] ) ) ? strip_tags( $new_instance['list_url'] ) : '';
		$instance['btn_text'] = ( ! empty( $new_instance['btn_text'] ) ) ? strip_tags( $new_instance['btn_text'] ) : '';
		

		return $instance;
	}

} // class Wrapkit_Contact_Widget
// register Contact widget
function wrapkit_newsletter_widget() {
    register_widget( 'Wrapkit_Newsletter_Widget' );
}
add_action( 'widgets_init', 'wrapkit_newsletter_widget' );