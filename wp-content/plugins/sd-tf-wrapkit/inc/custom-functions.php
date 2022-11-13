<?php

global $wrapkit_data;

// Run shortcodes in widgets
add_filter( 'widget_text', 'do_shortcode' );

// Alter Author Contact Fields
if ( ! function_exists( 'sd_author_bio' ) ) {
	function sd_author_bio( $contactmethods ) {
		// Add Google Plus
		$contactmethods['facebook']   = esc_html__( 'Facebook', 'insurancepress' );
		$contactmethods['twitter']    = esc_html__( 'Twitter', 'insurancepress' );
		$contactmethods['googleplus'] = esc_html__( 'Google +', 'insurancepress' );
		$contactmethods['linkedin']   = esc_html__( 'Linked In', 'insurancepress' );
		
		return $contactmethods;
	}
	add_filter( 'user_contactmethods', 'sd_author_bio');
}

if ( ! function_exists( 'sd_share_link' ) ) {
	function sd_share_link() {
		global $wrapkit_data;
		
		$share_links = $wrapkit_data['sd_share_links'];
?>	
		<?php if ( ! empty( $share_links ) ) : ?>
			<div class="clearfix"></div>
			<div class="text-center m-t-30">
				<?php foreach ( $share_links as $key => $value ) : ?>
					<?php if ( $value == '1' ) : ?>
						<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php echo rawurlencode( the_title_attribute() ); ?>" class="btn bg-facebook btn-rounded" target="_blank">
							<i class="fa fa-facebook"></i>
							<?php esc_html_e( 'Share on Facebook', 'wrapkit' ); ?>
						</a>
					<?php endif; ?>
					<?php if ( $value == '2' ) : ?>
						<a href="http://twitter.com/home?status=<?php echo rawurlencode( the_title_attribute() ); ?>: <?php the_permalink(); ?>" class="btn bg-twitter btn-rounded" target="_blank">
							<i class="fa fa-twitter"></i>
							<?php esc_html_e( 'Share on Twitter', 'wrapkit' ); ?>
						</a>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
<?php
	}
}
// Maintenance Mode 

if ( ! function_exists ( 'sd_maintenance' ) ) {
	function sd_maintenance() {
		
		global $wrapkit_data;
		
		$sd_logo = ( ! empty( $wrapkit_data['sd_logo_upload']['url'] ) ? '<img src="'. esc_url( $wrapkit_data['sd_logo_upload']['url'] ) . '" alt="' . esc_html__( 'Scheduled Maintenance', 'digitalagency') . '" style="display: block; margin: 0 auto;"/>' : NULL );
		
		$sd_maintenance = isset( $wrapkit_data['sd_maintenance'] ) ? $wrapkit_data['sd_maintenance'] : NULL;
		
		if ( $sd_maintenance == '1' ) {
		
			if ( ! current_user_can( 'edit_themes' ) || ! is_user_logged_in() ) {
				wp_die( $sd_logo . '<h1 style="text-align: center;">' . esc_html__( "WE'LL BE RIGHT BACK", 'digitalagency' ) . '</h1><p style="text-align:center;">' . esc_html__('We are currently performing scheduled maintenance. We should be back online shortly.', 'digitalagency').'</p>', get_bloginfo( 'name' ));
			}
			
		}
	}
	add_action('get_header', 'sd_maintenance');
}