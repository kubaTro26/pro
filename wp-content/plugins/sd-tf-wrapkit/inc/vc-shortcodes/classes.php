<?php
/**
 * Fitness Classes VC Shortcode
 *
 * @package	wrapkit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

global $wrapkit_data;

$sd_fitness = isset( $wrapkit_data['sd_fitness_module'] ) ? $wrapkit_data['sd_fitness_module'] : NULL;

if ( $sd_fitness == '1' ) {
 
	if ( ! function_exists( 'sd_fitness_classes' ) ) {
		function sd_fitness_classes( $atts ) {
			$sd = shortcode_atts( array(
				'cats'  => '',
				'items' => '3',
			), $atts );
			
			$cats  = $sd['cats'];
			$items = $sd['items'];
			
			$args = array(
				'post_type'           => 'classes',
				'cat'                 => $cats,
				'posts_per_page'      => $items,
				'ignore_sticky_posts' => 1,
				'post_status'         => 'publish',
			);
			
			$sd_query = new WP_Query( $args );

			ob_start();
			?>
				<div class="row m-t-40">
					<?php $i = 0; ?>
					<?php if ( $sd_query->have_posts() ) : while ( $sd_query->have_posts() ) : $sd_query->the_post(); $i++ ?>
						<div class="col-md-4 wrap-feature2-box">
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
							<div class="card card-shadow" data-aos="<?php echo esc_attr( $aos_anim ); ?>" data-aos-duration="1200" data-aos-once="true">
								<?php if ( has_post_thumbnail() ) : ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
										<?php the_post_thumbnail( array( 350, 217 ), array( 'class' => 'card-img-top' ) ); ?>
									</a>
								<?php endif; ?>
								<div class="card-body">
									<?php 
										$class_trainer = rwmb_meta( 'sd_class_trainer' );
										$class_hrs     = rwmb_meta( 'sd_class_hrs' );
									?>
									<?php if ( ! empty( $class_trainer || ! empty( $class_hrs ) ) ) : ?>
										<div class="d-flex no-block font-14 m-b-20">
											<?php if ( ! empty( $class_trainer ) ) : ?>
												<span class="text-info"><?php echo esc_html( $class_trainer ); ?></span>
											<?php endif; ?>
											<?php if ( ! empty( $class_hrs ) ) : ?>
												<span class="ml-auto"><?php echo esc_html( $class_hrs ); ?></span>
											<?php endif; ?>
										</div>
									<?php endif; ?>
									<h5 class="font-medium"><?php the_title(); ?></h5>
									<?php
										echo wrapkit_excerpt( array(
											'length' => '10',
										) );
									?>
								</div>
							</div>
						</div>
						<?php if ( $i == '3' ) : ?>
							<div class="clearfix"></div>
							<?php $i = 0; ?>
						<?php endif; ?>
					<?php endwhile; endif;  wp_reset_postdata(); ?>
				</div>
				
			<?php return ob_get_clean();	
		}
		add_shortcode( 'sd_fitness_classes','sd_fitness_classes' );
	}

	// Register shortcode to VC

	add_action( 'init', 'sd_fitness_classes_vcmap' );

	if ( ! function_exists( 'sd_fitness_classes_vcmap' ) ) {
		function sd_fitness_classes_vcmap() {
			
			$terms = get_terms( array(
				'taxonomy' => 'class-category',
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
				'name'              => esc_html__( 'Fitness Classes', 'wrapkit' ),
				'description'       => esc_html__( 'Fitness Classes', 'wrapkit' ),
				'base'              => "sd_fitness_classes",
				'class'             => "sd_fitness_classes",
				'category'          => esc_html__( 'WrapKit', 'wrapkit' ),
				'icon'              => plugin_dir_url( __DIR__ ) . 'images/vc-icons/classes-icon-min.png',
				'params'            => array(
					array(
						'type'        => 'textfield',
						'class'       => '',
						'heading'     => esc_html__( 'Number of items to show', 'wrapkit' ),
						'param_name'  => 'items',
						'value'       => '3',
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