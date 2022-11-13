<?php
/**
 * Portfolio Carousel VC Shortcode
 *
 * @package	wrapkit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

global $wrapkit_data;

$sd_portfolio = isset( $wrapkit_data['sd_portfolio_module'] ) ? $wrapkit_data['sd_portfolio_module'] : NULL;
		
if ( $sd_portfolio == '1' ) {
 
	if ( ! function_exists( 'sd_portfolio_carousel' ) ) {
		function sd_portfolio_carousel( $atts ) {
			$sd = shortcode_atts( array(
				'cats'	   => '',
				'items'	   => '1',
				'style'   => 'style1',
			), $atts );
			
			$cats  = $sd['cats'];
			$items = $sd['items'];
			$style = $sd['style'];

			if ( ! empty( $cats ) ) {
				$cats = explode( ", ", ", $cats  " );
			}
			
			if ( $style == 'default' ) {
				$items = 1;
			}

			$args = array(
				'post_type'           => 'portfolio',
				'posts_per_page'      => $items,
				'ignore_sticky_posts' => 1,
				'post_status'         => 'publish',
				'tax_query'           => array(
					array(
						'taxonomy' => 'portfolio-category',
						'field'    => 'term_id',
						'terms'    => $cats,
					),
				),
			);

			if( empty( $cats ) ) {
				unset( $args['tax_query'] );
			}
			
			$sd_query = new WP_Query( $args );

			wp_enqueue_script( 'sd-owl-carousel' );

			$uniqueid = uniqid();

			ob_start();
			?>
				
				<script type="text/javascript">
					jQuery(document).ready(function(){
						jQuery('.sd-test-carousel-<?php echo $uniqueid; ?>').owlCarousel({
							loop: true,
							margin: 30,
							center: true,
							nav: false,
							dots: false,
							autoplay: true,
							responsiveClass: true,
							responsive: {
								0: {
									items: 1,
									nav: false
								},
								768: {
									items: 2
								},
								1170: {
									items: 3
								},
								1800: {
									items: 4
								}
							}
						})
					});
				</script>
							
				<div class="owl-carousel owl-theme sd-test-carousel sd-test-carousel-<?php echo $uniqueid; ?> m-t-40">
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

						<div class="item">
							<div class="card card-shadow" data-aos="<?php echo esc_attr( $aos_anim ); ?>" data-aos-duration="1200">
								<a href="<?php the_permalink(); ?>" class="img-ho">
									<?php the_post_thumbnail( array( 404, 251 ) ); ?>
								</a>
								<div class="card-body">
									<h5 class="font-medium m-b-0"><?php the_title(); ?></h5>
									<p class="m-b-0 font-14">
										<?php
											global $post;
											$terms_cats = get_the_terms( $post->ID, 'portfolio-category' );
											$count = count( $terms_cats );
											if ( $terms_cats > 0 ) {
												echo '<span class="sd-port-meta">';
												$port_cats = wp_list_pluck( $terms_cats, 'name' ); 
												$port_cats = implode( ', ', $port_cats );
												echo esc_html( $port_cats );
												echo '</span>';
											} 
										?>
									</p>
								</div>
							</div>
						</div>

					<?php if ( $i == '3' ) { $i = 0; } ?>
					<?php endwhile; endif;  wp_reset_postdata(); ?>

				</div>

			<?php return ob_get_clean();	
		}
		add_shortcode( 'sd_portfolio_carousel','sd_portfolio_carousel' );
	}

	// Register shortcode to VC

	add_action( 'init', 'sd_portfolio_carousel_vcmap' );

	if ( ! function_exists( 'sd_portfolio_carousel_vcmap' ) ) {
		function sd_portfolio_carousel_vcmap() {
			
			$terms = get_terms( array(
				'taxonomy' => 'portfolio-category',
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
				'name'              => esc_html__( 'Portfolio Carousel', 'wrapkit' ),
				'description'       => esc_html__( 'Portfolio Carousel', 'wrapkit' ),
				'class'             => "sd_portfolio_carousel",
				'base'              => "sd_portfolio_carousel",
				'category'          => esc_html__( 'WrapKit', 'wrapkit' ),
				'icon'              => plugin_dir_url( __DIR__ ) . 'images/vc-icons/portfolio-carousel-icon-min.png',
				'params'            => array(
					array(
						'type'        => 'textfield',
						'class'       => '',
						'heading'     => esc_html__( 'Number of items to show', 'wrapkit' ),
						'param_name'  => 'items',
						'value'       => '5',
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