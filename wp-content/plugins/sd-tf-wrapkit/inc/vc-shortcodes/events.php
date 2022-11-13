<?php
/**
 * Tribe Events VC Shortcode
 *
 * @package	wrapkit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
if ( class_exists( 'Tribe__Events__Main' ) ) {
	if ( ! function_exists( 'sd_events' ) ) {
		function sd_events( $atts ) {
			$sd = shortcode_atts( array(
				'cats'  => '',
				'items' => '',
			), $atts );
			
			$cats  = $sd['cats'];
			$items = $sd['items'];

			$args = array(
				'post_type'        => array(Tribe__Events__Main::POSTTYPE),
				'suppress_filters' => false,
				'posts_per_page'   => 3,
				'meta_key'=>'_EventStartDate',
				'orderby'=>'_EventStartDate',
				'order'=>'ASC',
				'eventDisplay'=>'custom',
				'tax_query' => array(
					array(
						'taxonomy' => 'tribe_events_cat',
						'field' => 'slug',
						'terms' => $cats,
						'operator' => 'IN'
					),
				)
			);
						
			if( empty( $cats ) ) {
				unset( $args['tax_query'] );
			}
			
			$sd_query = new WP_Query( $args );

			ob_start();
			?>
			
				<div class="sd-events blog-home2">
					<div class="row">
						<?php $i = 0; ?>
						<?php if ( $sd_query->have_posts() ) : while ( $sd_query->have_posts() ) : $sd_query->the_post(); $i++ ?>
							<?php
								$aos_anim = '';

								if ( $i == '1' ) {
									$aos_anim = 'flip-left';
								} else if ( $i == '2' ) {
									$aos_anim = 'flip-up';
								} else if ( $i == '3' ) {
									$aos_anim = 'flip-right';
								}
							?>
							<div class="col-md-4">
								<div class="card" data-aos="<?php echo esc_attr( $aos_anim ); ?>" data-aos-duration="1200">
									<?php if ( has_post_thumbnail() ) : ?>
										<?php the_post_thumbnail( array( 350, 205 ) ); ?>
									<?php endif; ?>
									<div class="date-pos bg-success-gradiant"><?php echo tribe_get_start_date(null, false, 'M'); ?><span><?php echo tribe_get_start_date( null, false, 'd' ); ?></span></div>
									<h5 class="font-medium m-t-30"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="link"><?php the_title(); ?></a></h5>
									<?php
										echo wrapkit_excerpt( array(
											'length' => '15',
										) );
									?>
									<a href="<?php the_permalink(); ?>" class="linking text-danger font-medium m-t-10" title="<?php the_title_attribute(); ?>"><?php esc_html_e( 'Learn More', 'wrapkit' ); ?> <i class="ti-arrow-right"></i></a>
								</div>
							</div>
							<?php if ( $i == '3' ) { $i = 0; } ?>
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</div>
				</div>
				
			<?php return ob_get_clean();	
		}
		add_shortcode( 'sd_events','sd_events' );
	}

	// Register shortcode to VC

	add_action( 'init', 'sd_events_vcmap' );

	if ( ! function_exists( 'sd_events_vcmap' ) ) {
		function sd_events_vcmap() {

			$terms = get_terms( array(
				'taxonomy' => 'campaign_category',
				'hide_empty' => false,
			) );
			
			$taxonomies = array();
			
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				$taxonomies = array();
				 foreach ( $terms as $term ) {
					$taxonomies[] = array( 'label' => $term->name, 'value' => $term->term_id );
				}
			}
			
			vc_map( array(
				'name'              => esc_html__( 'Upcoming Events', 'wrapkit' ),
				'description'       => esc_html__( 'Upcoming Events', 'wrapkit' ),
				'base'              => "sd_events",
				'class'             => "sd_events",
				'category'          => esc_html__( 'WrapKit', 'wrapkit' ),
				'icon'              => plugin_dir_url( __DIR__ ) . 'images/vc-icons/events-icon-min.png',
				'params'            => array(
					array(
						'type'        => 'textfield',
						'class'       => '',
						'heading'     => esc_html__( 'Number of items to show', 'wrapkit' ),
						'param_name'  => 'items',
						'value'       => '4',
						'save_always' => true,
						'description' => esc_html__( 'Insert the number of items to show.', 'wrapkit' ),
					),
					array(
						'type'       => 'autocomplete',
						'heading'    => esc_html__( 'Type a category name', 'wrapkit' ),
						'param_name' => 'cats',
						'settings'   => array(
							'multiple'       => true,
							'sortable'       => true,
							'min_length'     => 1,
							'no_hide'        => true,
							'groups'         => true,
							'unique_values'  => true,
							'display_inline' => true,
							'values'         => $taxonomies,
						),
					),
				),
			));
		}
	}
}