<?php
/**
 * Social Icons Widget
 *
 * @description: A simple widget to display social icons.
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

class Wrapkit_Social_Icons_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'sd_social_icons_widget', // Base ID
			esc_html__( 'Social Icons', 'wrapkit' ), // Name
			array( 'description' => esc_html__( 'Displays social icons.', 'wrapkit' ), ) // Args
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
		
		$sd_email      =  sanitize_email( $instance['email'] );
		$sd_facebook   = $instance['facebook'];
		$sd_twitter    = $instance['twitter'];
		$sd_linkedin   = $instance['linkedin'];
		$sd_googleplus = $instance['googleplus'];
		$sd_youtube    = $instance['youtube'];
		$sd_vimeo      = $instance['vimeo'];
		$sd_pinterest  = $instance['pinterest'];
		$sd_instagram  = $instance['instagram'];
		$sd_rss        = $instance['rss'];
	?>
		<div class="sd-social-icons-widget">
			<div class="">
				<?php if ( ! empty( $sd_email ) ) : ?>
					<a href="mailto:<?php echo esc_attr( $sd_email ); ?>" class="link"><i class="fa fa-envelope-o"></i></a>
				<?php endif; ?>
				<?php if ( ! empty( $sd_facebook ) ) : ?>
					<a href="<?php echo esc_url( $sd_facebook ); ?>" class="link"><i class="fa fa-facebook"></i></a>
				<?php endif; ?>
				<?php if ( ! empty( $sd_twitter ) ) : ?>
					<a href="<?php echo esc_url( $sd_twitter ); ?>" class="link"><i class="fa fa-twitter"></i></a>
				<?php endif; ?>
				<?php if ( ! empty( $sd_linkedin ) ) : ?>
					<a href="<?php echo esc_url( $sd_linkedin ); ?>" class="link"><i class="fa fa-linkedin"></i></a>
				<?php endif; ?>
				<?php if ( ! empty( $sd_googleplus ) ) : ?>
					<a href="<?php echo esc_url( $sd_googleplus ); ?>" class="link"><i class="fa fa-google-plus"></i></a>
				<?php endif; ?>
				<?php if ( ! empty( $sd_youtube ) ) : ?>
					<a href="<?php echo esc_url( $sd_youtube ); ?>" class="link"><i class="fa fa-youtube-play"></i></a>
				<?php endif; ?>
				<?php if ( ! empty( $sd_vimeo ) ) : ?>
					<a href="<?php echo esc_url( $sd_vimeo ); ?>" class="link"><i class="fa fa-vimeo-square"></i></a>
				<?php endif; ?>
				<?php if ( ! empty( $sd_pinterest ) ) : ?>
					<a href="<?php echo esc_url( $sd_pinterest ); ?>" class="link"><i class="fa fa-pinterest"></i></a>
				<?php endif; ?>
				<?php if ( ! empty( $sd_instagram ) ) : ?>
					<a href="<?php echo esc_url( $sd_instagram ); ?>" class="link"><i class="fa fa-instagram"></i></a>
				<?php endif; ?>
				<?php if ( ! empty( $sd_rss ) ) : ?>
					<a href="<?php echo esc_url( $sd_rss ); ?>" class="link"><i class="fa fa-rss"></i></a>
				<?php endif; ?>
			</div>
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
			'title'      => esc_html__( 'Get Social', 'wrapkit' ),
			'email'      => '',
			'facebook'   => 'https://www.facebook.com/skatdesign',
			'twitter'    => 'https://twitter.com/skatdesign',
			'linkedin'   => 'https://www.linkedin.com/in/skatdesign',
			'googleplus' => 'https://plus.google.com/u/0/b/116008836048520090738/116008836048520090738/posts',
			'youtube'    => 'https://www.youtube.com/zabestof',
			'vimeo'      => '',
			'pinterest'  => 'https://pinterest.com/skatdesign',
			'instagram'  => '',
			'rss'        => 'https://skat.tf/rss'
		);
		
		$instance = wp_parse_args( ( array ) $instance, $defaults );
		
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'wrapkit' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>">
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php esc_attr_e( 'E-Mail:', 'wrapkit' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['email'] ); ?>">
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_attr_e( 'Facebook:', 'wrapkit' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['facebook'] ); ?>">
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_attr_e( 'Twitter:', 'wrapkit' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['twitter'] ); ?>">
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php esc_attr_e( 'Linked In:', 'wrapkit' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['linkedin'] ); ?>">
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'googleplus' ) ); ?>"><?php esc_attr_e( 'Google +:', 'wrapkit' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'googleplus' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'googleplus' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['googleplus'] ); ?>">
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"><?php esc_attr_e( 'Youtube:', 'wrapkit' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['youtube'] ); ?>">
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'vimeo' ) ); ?>"><?php esc_attr_e( 'Vimeo:', 'wrapkit' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'vimeo' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'vimeo' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['vimeo'] ); ?>">
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>"><?php esc_attr_e( 'Pinterest:', 'wrapkit' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['pinterest'] ); ?>">
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php esc_attr_e( 'Instagram:', 'wrapkit' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['instagram'] ); ?>">
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'rss' ) ); ?>"><?php esc_attr_e( 'Rss:', 'wrapkit' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'rss' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'rss' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['rss'] ); ?>">
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
		$instance['title']      = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['phone']      = ( ! empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone'] ) : '';
		$instance['email']      = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
		$instance['facebook']   = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
		$instance['twitter']    = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
		$instance['linkedin']   = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';
		$instance['googleplus'] = ( ! empty( $new_instance['googleplus'] ) ) ? strip_tags( $new_instance['googleplus'] ) : '';
		$instance['youtube']    = ( ! empty( $new_instance['youtube'] ) ) ? strip_tags( $new_instance['youtube'] ) : '';
		$instance['vimeo']      = ( ! empty( $new_instance['vimeo'] ) ) ? strip_tags( $new_instance['vimeo'] ) : '';
		$instance['pinterest']  = ( ! empty( $new_instance['pinterest'] ) ) ? strip_tags( $new_instance['pinterest'] ) : '';
		$instance['instagram']  = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';
		$instance['flickr']     = ( ! empty( $new_instance['flickr'] ) ) ? strip_tags( $new_instance['flickr'] ) : '';
		$instance['rss']        = ( ! empty( $new_instance['rss'] ) ) ? strip_tags( $new_instance['rss'] ) : '';
		

		return $instance;
	}

} // class Wrapkit_Social_Icons_Widget
// register Social Icons widget
function wrapkit_social_icons_widget() {
    register_widget( 'Wrapkit_Social_Icons_Widget' );
}
add_action( 'widgets_init', 'wrapkit_social_icons_widget' );