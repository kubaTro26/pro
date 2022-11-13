<?php
/**
 * Contact Widget
 *
 * @description: A simple widget to display contact info.
 * @package	WrapKit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

class Wrapkit_Contact_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'sd_contact_widget', // Base ID
			esc_html__( 'Contact', 'wrapkit' ), // Name
			array( 'description' => esc_html__( 'Displays contact info.', 'wrapkit' ), ) // Args
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
		
		$sd_address       = $instance['address'];
		$sd_address_title = $instance['address_title'];
		$sd_phone         = $instance['phone'];
		$sd_email         = sanitize_email( $instance['email'] );
		$sd_hours         = $instance['hours'];
	?>
	
		<div class="sd-contact-widget">
			<?php if ( ! empty( $sd_address ) ) : ?>
				<div class="d-flex no-block m-b-10 m-t-20">
					<div class="display-7 m-r-20 align-self-top"><i class="icon-Location-2"></i></div>
					<div class="info">
						<?php if ( ! empty( $sd_address_title ) ) : ?>
							<span class="font-medium db m-t-5"><?php echo esc_html( $sd_address_title ); ?></span>
						<br/>
						<?php endif; ?>
						<p>
							<?php
								echo wp_kses( $sd_address,
									array(
										'br' => array(),
										'i' => array(
											'class' => array(),
										),
										'a' => array(
											'href'  => array(),
											'title' => array(),
										),
										'strong'    => array(),
										'em'        => array(),
										'span' => array(
											'class' => array(),
											'style' => array(),
										),
										'p' => array(
											'class' => array(),
											'style' => array(),
										),
								) );
							?>
						</p>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $sd_hours ) ) : ?>
				<div class="d-flex no-block m-b-10">
					<div class="display-7 m-r-20 align-self-top"><i class="icon-Over-Time"></i></div>
					<div class="info">
						<span class="font-medium db m-t-5"><?php echo esc_html( $sd_hours ); ?></span>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $sd_phone ) ) : ?>
				<div class="d-flex no-block m-b-10">
					<div class="display-7 m-r-20 align-self-top"><i class="icon-Phone-2"></i></div>
					<div class="info">
						<span class="font-medium db m-t-5"><a href="tel:<?php echo esc_html( rawurlencode( $sd_phone ) ); ?>"><?php echo esc_html( $sd_phone ); ?></a></span>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $sd_email ) ) : ?>
				<div class="d-flex no-block m-b-30">
					<div class="display-7 m-r-20 align-self-top"><i class="icon-Mail"></i></div>
					<div class="info">
						<a href="<?php echo 'mailto:' . antispambot( $sd_email, 1 ); ?>" class="font-medium db  m-t-5"><?php echo antispambot( $sd_email ); ?></a>
					</div>
				</div>
			<?php endif; ?>
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
			'title'         => esc_html__( 'Contact', 'wrapkit' ),
			'address'       => '134, Cornish Building, Some Near by area, New York, USA - 34556',
			'address_title' => 'WrapKit Head Office',
			'phone'         => '1 (888) 123 4567',
			'email'         => 'info@wrappixels.com',
			'hours'         => '8:00 AM - 6:00 PM',
		);
		
		$instance = wp_parse_args( ( array ) $instance, $defaults );
		
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'wrapkit' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>">
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'address_title' ) ); ?>"><?php esc_attr_e( 'Address Title:', 'wrapkit' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'address_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'address_title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['address_title'] ); ?>">
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>"><?php esc_attr_e( 'Address:', 'wrapkit' ); ?></label> 
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'address' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>"><?php echo esc_attr( $instance['address'] ); ?></textarea>
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'hours' ) ); ?>"><?php esc_attr_e( 'Working Hours:', 'wrapkit' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'hours' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hours' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['hours'] ); ?>">
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>"><?php esc_attr_e( 'Phone #:', 'wrapkit' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'phone' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['phone'] ); ?>">
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>"><?php esc_attr_e( 'Email:', 'wrapkit' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['email'] ); ?>">
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
		$instance['title']         = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['address']       = ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';
		$instance['address_title'] = ( ! empty( $new_instance['address_title'] ) ) ? strip_tags( $new_instance['address_title'] ) : '';
		$instance['phone']         = ( ! empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone'] ) : '';
		$instance['email']         = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
		$instance['hours']         = ( ! empty( $new_instance['hours'] ) ) ? strip_tags( $new_instance['hours'] ) : '';
		

		return $instance;
	}

} // class Wrapkit_Contact_Widget
// register Contact widget
function wrapkit_contact_widget() {
    register_widget( 'Wrapkit_Contact_Widget' );
}
add_action( 'widgets_init', 'wrapkit_contact_widget' );