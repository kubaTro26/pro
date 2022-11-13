<?php
/**
 * Charitable Campaigns VC Shortcode
 *
 * @package	wrapkit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
if ( class_exists( 'Charitable' ) ) {
	if ( ! function_exists( 'sd_charitable_campaigns' ) ) {
		function sd_charitable_campaigns( $atts ) {
			$sd = shortcode_atts( array(
				'cats'  => '',
				'items' => '',
			), $atts );
			
			$cats  = $sd['cats'];
			$items = $sd['items'];

			$args = array(
				'post_type'        => 'campaign',
				'suppress_filters' => false,
				'posts_per_page'   => $items,
				'tax_query'        => array(
					array(
						'taxonomy' => 'campaign_category',
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
						jQuery('.sd-campaigns-carousel-<?php echo $uniqueid; ?>').owlCarousel({
							loop: true,
							margin: 30,
							center: false,
							nav: false,
							dots: true,
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
								}
							}
						})
					});
				</script>
				<div class="owl-carousel owl-theme tcards m-t-40 sd-campaigns-carousel sd-campaigns-carousel-<?php echo $uniqueid; ?>">
					<?php $i = 0; ?>
					<?php if ( $sd_query->have_posts() ) : while ( $sd_query->have_posts() ) : $sd_query->the_post(); $i++ ?>
				
						<?php $campaign = charitable_get_current_campaign(); ?>

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

						<div class="item" data-aos="fade-right">
							<div class="card card-shadow" data-aos="<?php echo esc_attr( $aos_anim ); ?>" data-aos-duration="1200">
								<?php if ( has_post_thumbnail() ) : ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
										<?php the_post_thumbnail( array( 350, 232 ) ); ?>
									</a>
								<?php endif; ?>
								<div class="card-body p-30">
									<h5 class="font-bold">
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
											<?php the_title(); ?>
										</a>
									</h5>
									<p class="m-t-20">
										<?php
											echo wrapkit_excerpt( array(
												'length' => '10',
											) );
										?>
									</p>
									<?php 
										$progress = $campaign->get_percent_donated_raw();

										if ( false === $progress ) {
											return;
										}
									?>
									<div class="progress m-t-30">
										<div class="progress-bar bg-success-gradiant" role="progressbar" style="width: <?php echo $progress ?>%; height: 5px;" aria-valuenow="<?php echo $progress ?>" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="row">
										<div class="col-6 b-r">
											<p class="text-uppercase font-12 m-b-0 m-t-15">Raised</p>
											<h3><?php echo charitable_format_money( $campaign->get_donated_amount() ) ?></h3>
										</div>
										<div class="col-6">
											<p class="text-uppercase font-12 m-b-0 m-t-15">Goal</p>
											<h3><?php echo charitable_format_money( $campaign->get_goal() ) ?></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php if ( $i == '3' ) { $i = 0; } ?>
					<?php endwhile; endif; wp_reset_postdata(); ?>
				</div>
				
			<?php return ob_get_clean();	
		}
		add_shortcode( 'sd_campaigns','sd_charitable_campaigns' );
	}

	// Register shortcode to VC

	add_action( 'init', 'sd_charitable_campaigns_vcmap' );

	if ( ! function_exists( 'sd_charitable_campaigns_vcmap' ) ) {
		function sd_charitable_campaigns_vcmap() {

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
				'name'              => esc_html__( 'Campaigns', 'wrapkit' ),
				'description'       => esc_html__( 'Campaigns', 'wrapkit' ),
				'base'              => "sd_campaigns",
				'class'             => "sd_campaigns",
				'category'          => esc_html__( 'WrapKit', 'wrapkit' ),
				'icon'              => plugin_dir_url( __DIR__ ) . 'images/vc-icons/campaigns-icon-min.png',
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