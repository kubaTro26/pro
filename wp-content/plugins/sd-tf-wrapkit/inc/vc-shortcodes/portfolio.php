<?php
/**
 * Portfolio VC Shortcode
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

global $wrapkit_data;

$sd_portfolio = isset( $wrapkit_data['sd_portfolio_module'] ) ? $wrapkit_data['sd_portfolio_module'] : NULL;
		
if ( $sd_portfolio == '1' ) {

	if ( ! function_exists( 'sd_portfolio' ) ) {
		function sd_portfolio( $atts ) {
			$sd = shortcode_atts( array(
				'layout'         => '1',
				'cols'           => '1',
				'cats'           => '',
				'items'          => '6',
				'show_filter'    => '',
				'filter_pos'     => '',
				'loaded_items'   => '6',
				'show_load_more' => '',
				'load_items'     => '3',
			), $atts );
			
			$layout         = $sd['layout'];
			$cols           = $sd['cols'];
			$cats           = $sd['cats'];
			$items          = $sd['items'];
			$show_filter    = $sd['show_filter'];
			$filter_pos     = $sd['filter_pos'];
			$show_load_more = $sd['show_load_more'];
			$loaded_items   = $sd['loaded_items'];
			$load_items     = $sd['load_items'];
			
			if ( ! empty( $cats ) ) {
				$cats = explode( ", ", ", $cats  " );
			}
			
			$args = array(
				'post_type'        => 'portfolio',
				'suppress_filters' => false,
				'posts_per_page'   => $items,
				'tax_query'        => array(
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

			$filter_pos_class = 'text-left';

			if ( $show_filter === 'yes' ) {
				$port_terms = get_terms( array(
					'taxonomy'   => 'portfolio-category',
					'hide_empty' => true,
				) );

				if ( $filter_pos == '2' ) {
					$filter_pos_class = 'text-center';
				} elseif ( $filter_pos == '3' ) {
					$filter_pos_class = 'text-right';
				}
			}

				wp_enqueue_script( 'isotope' );
				wp_enqueue_script( 'sd-portfolio' );

			if ( $layout == 'modal' ) {
				wp_enqueue_script( 'sd-magnific-popup' );
			}

			$isotope_class = ( $layout == 'normal' || $layout == 'modal' ) ? 'sd-filterable' : 'portfolio-box';

			wp_localize_script( 'sd-portfolio', 'sd_port_js', array(
				'load_more'    => esc_html__( 'Load More', 'wrapkit' ),
				'show_more'    => $show_load_more,
				'loaded_items' => $loaded_items,
				'load_items'   => $load_items,
				'modal'        => $layout,
			) );

			ob_start();
			?>
				<div class="portfolio1">
					<?php if ( ! empty( $port_terms ) && ! is_wp_error( $port_terms ) ) : ?>
						<div class="filterby <?php echo esc_attr( $filter_pos_class ); ?>">
							<a href="JavaScript:void(0)" class="sd-active" data-filter="*"><?php esc_html_e( 'All', 'wrapkit' ); ?></a>
							<?php foreach ( $port_terms as $port_term ) : ?>
								<?php if ( ! empty( $cats ) ) : ?>
									<?php if ( in_array( $port_term->term_id, $cats ) ): ?>
										<a href="JavaScript:void(0)" data-filter=".<?php echo esc_attr( $port_term->slug ); ?>"><?php echo esc_attr( $port_term->name ); ?></a>
									<?php endif; ?>
								<?php else : ?>
									<a href="JavaScript:void(0)" data-filter=".<?php echo esc_attr( $port_term->slug ); ?>"><?php echo esc_attr( $port_term->name ); ?></a>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>   
					<?php endif; ?>
					<div class="row">
						<?php if ( $cols == '12' ) : ?>
							<div class="col-md-2"></div>
								<div class="col-md-8">
						<?php endif; ?>
							<div class="portfolio-box <?php if ( $layout == 'photo' ) echo 'sd-portfolio-box-photo'; ?>">
								<?php $i = 0; ?>
								<?php if ( $sd_query->have_posts() ) : while ( $sd_query->have_posts() ) : $sd_query->the_post(); $i++ ?>

									<?php 
										global $post;
										$terms = get_the_terms( $post->ID, 'portfolio-category' );
									?>

									<?php if ( $layout == 'normal' || $layout == 'modal' ) : ?>
										<div class="col-md-<?php echo esc_attr( $cols ); ?> filter <?php if ( $terms ) : foreach ( $terms as $term ) { echo esc_attr( $term->slug ) . ' '; } endif; ?> popup-gallery">
											<div class="card card-shadow">
												<?php if ( ( has_post_thumbnail() ) ) : ?>
													<?php
														if ( $layout == 'modal' ) {

															$img_url = get_the_post_thumbnail_url( get_the_ID(), 'full');

														} else {

															$img_url = get_the_permalink();

														}
													?>
													<a href="<?php echo esc_url( $img_url ); ?>" title="<?php the_title_attribute(); ?>" class="img-ho">
														<?php the_post_thumbnail( '', array( 'class' => 'card-img-top' ) ); ?>
													</a>
												<?php endif; ?>
												<div class="card-body">
													<h5 class="font-medium m-b-0"><?php the_title(); ?></h5>
													<p class="m-b-0 font-14">
														<?php
															$count = count( $terms );
															if ( has_term( '', 'portfolio-category') ) {
																echo '<span class="sd-port-meta">';
																$cats = wp_list_pluck( $terms, 'name' ); 
																$cats = implode( ', ', $cats );
																echo esc_html( $cats );
																echo '</span>';
															} 
														?>
													</p>
												</div>
											</div>
										</div>
									<?php endif; ?>

									<?php if ( $layout == 'masonry' ) : ?>
										<div class="col-lg-4 col-md-3 filter <?php if ( $terms ) : foreach ( $terms as $term ) { echo esc_attr( $term->slug ) . ' '; } endif; ?>">
											<div class="overlay-box">
												<?php if ( ( has_post_thumbnail() ) ) : ?>
													<?php the_post_thumbnail( '', array( 'class' => 'img-fluid' ) ); ?>
												<?php endif; ?>
												<a href="<?php the_permalink(); ?>" class="overlay">
													<div class="port-text">
														<h5><?php the_title(); ?></h5>
														<span>
															<?php
																$count = count( $terms );
																if ( has_term( '', 'portfolio-category') ) {
																	echo '<span class="sd-port-meta">';
																	$cats = wp_list_pluck( $terms, 'name' ); 
																	$cats = implode( ', ', $cats );
																	echo esc_html( $cats );
																	echo '</span>';
																} 
															?>
														</span>
													</div>
												</a>
											</div>
										</div>
									<?php endif; ?>

									<?php if ( $layout == 'photo' ) : ?>
										<?php 
											global $post;
											$terms = get_the_terms( $post->ID, 'portfolio-category' );
										?>
										<?php if ( $i == 1 ) : ?>
										<div class="col-lg-8 col-md-6 filter <?php if ( $terms ) : foreach ( $terms as $term ) { echo esc_attr( $term->slug ) . ' '; } endif; ?>">
											<div class="overlay-box">
												<?php if ( ( has_post_thumbnail() ) ) : ?>
													<?php the_post_thumbnail( '', array( 'class' => 'img-fluid' ) ); ?>
												<?php endif; ?>
												<a href="<?php the_permalink(); ?>" class="overlay">
													<div class="port-text">
														<h5><?php the_title(); ?></h5>
														<?php
															$count = count( $terms );
															if ( has_term( '', 'portfolio-category') ) {
																echo '<span class="op-8">';
																$cats = wp_list_pluck( $terms, 'name' ); 
																$cats = implode( ', ', $cats );
																echo esc_html( $cats );
																echo '</span>';
															} 
														?>
													</div>
												</a>
											</div>
										</div>
										<?php else : ?>
											<div class="col-lg-4 col-md-6 filter <?php if ( $terms ) : foreach ( $terms as $term ) { echo esc_attr( $term->slug ) . ' '; } endif; ?>">
												<div class="overlay-box">
													<?php if ( ( has_post_thumbnail() ) ) : ?>
														<?php the_post_thumbnail( '', array( 'class' => 'img-fluid' ) ); ?>
													<?php endif; ?>
													<a href="<?php the_permalink(); ?>" class="overlay">
														<div class="port-text">
															<h5><?php the_title(); ?></h5>
															<?php
																$count = count( $terms );
																if ( has_term( '', 'portfolio-category') ) {
																	echo '<span class="op-8">';
																	$cats = wp_list_pluck( $terms, 'name' ); 
																	$cats = implode( ', ', $cats );
																	echo esc_html( $cats );
																	echo '</span>';
																} 
															?>
														</div>
													</a>
												</div>
											</div>
										<?php endif; ?>
									<?php endif; ?>
								<?php endwhile; endif; wp_reset_postdata(); ?>
						<?php if ( $cols == '12' ) : ?>
							</div>
						<?php endif; ?>
						</div>
					</div>
				</div>
				
			<?php return ob_get_clean();	
		}
		add_shortcode( 'sd_portfolio','sd_portfolio' );
	}
	
	// Register shortcode to VC
	
	add_action( 'init', 'sd_portfolio_vcmap' );
	
	if ( ! function_exists( 'sd_portfolio_vcmap' ) ) {
		function sd_portfolio_vcmap() {
			
			$terms = get_terms( array(
				'taxonomy' => 'portfolio-category',
				'hide_empty' => true,
			) );
	
				$taxonomies = array();
				 foreach ( $terms as $term ) {
					$taxonomies[] = array(
						'label' => $term->name,
						'value' => $term->term_id );
				}
		
			vc_map( array(
				'name'        => esc_html__( 'Portfolio', 'wrapkit' ),
				'description' => esc_html__( 'Add portfolio items', 'wrapkit' ),
				'base'        => "sd_portfolio",
				'class'       => "sd_portfolio",
				'category'    => esc_html__( 'WrapKit', 'wrapkit' ),
				'icon'        => plugin_dir_url( __DIR__ ) . 'images/vc-icons/portfolio-icon-min.png',
				'params'      => array(
					array(
						'type'       => 'dropdown',
						'class'      => '',
						'heading'    => esc_html__( 'Layout', 'wrapkit' ),
						'param_name' => 'layout',
						'value'      => 
							array( 
								esc_html__( 'Normal', 'wrapkit' )      => 'normal',
								esc_html__( 'Masonry', 'wrapkit' )     => 'masonry',
								esc_html__( 'With Modal', 'wrapkit' )  => 'modal',
								esc_html__( 'Photography', 'wrapkit' ) => 'photo',
							),
						'std'         => 'normal',
						'save_always' => true,
					),
					array(
						'type'       => 'dropdown',
						'class'      => '',
						'heading'    => esc_html__( 'Columns', 'wrapkit' ),
						'param_name' => 'cols',
						'value'      => 
							array( 
								esc_html__( '1 Column', 'wrapkit' )   => '12',
								esc_html__( '2 Columns', 'wrapkit' )  => '6',
								esc_html__( '3 Columns', 'wrapkit' )  => '4',
							),
						'save_always' => true,
						'std'         => '4',
						'dependency'  => array(
							'element' => 'layout',
							'value' => array( 'normal', 'modal' ),
						),
					),
					array(
						'type'        => 'textfield',
						'class'       => '',
						'heading'     => esc_html__( 'Number of items to show', 'wrapkit' ),
						'param_name'  => 'items',
						'value'       => '6',
						'description' => esc_html__( 'Insert the number of items to show.', 'wrapkit' ),
						'save_always' => true,
					),
					array(
						'type'        => 'checkbox',
						'class'       => '',
						'heading'     => esc_html__( 'Show filter?', 'wrapkit' ),
						'param_name'  => 'show_filter',
						'value'       => array( esc_html__( 'Yes', 'wrapkit' ) => 'yes' ),
						'save_always' => true,
						'std'         => 'yes',
						'description' => esc_html__( 'Insert the number of items to show.', 'wrapkit' ),
					),
					array(
						'type'       => 'dropdown',
						'class'      => '',
						'heading'    => esc_html__( 'Filters position', 'wrapkit' ),
						'param_name' => 'filter_pos',
						'value'      => 
							array( 
								esc_html__( 'Left', 'wrapkit' )   => '1',
								esc_html__( 'Middle', 'wrapkit' ) => '2',
								esc_html__( 'Right', 'wrapkit' )  => '3',
							),
						'save_always' => true,
						'std'         => '1',
						'dependency'  => array(
							'element' => 'show_filter',
							'value'   => array( 'yes' ),
						),
					),
					array(
						'type'       => 'autocomplete',
						'heading'    => esc_html__( 'Type a portfolio category name', 'wrapkit' ),
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
					array(
						'type'        => 'checkbox',
						'class'       => '',
						'heading'     => esc_html__( 'Show Load More Button', 'wrapkit' ),
						'param_name'  => 'show_load_more',
						'value'       => array( esc_html__( 'Yes', 'wrapkit' ) => 'yes' ),
						'save_always' => true,
						'description' => esc_html__( 'Insert the number of items to show.', 'wrapkit' ),
					),
					array(
						'type'        => 'textfield',
						'class'       => '',
						'heading'     => esc_html__( 'Number of items loaded on the page.', 'wrapkit' ),
						'param_name'  => 'loaded_items',
						'value'       => '6',
						'save_always' => true,
						'dependency'  => array(
							'element' => 'show_load_more',
							'value'   => array( 'yes' ),
						),
					),
					array(
						'type'        => 'textfield',
						'class'       => '',
						'heading'     => esc_html__( 'Number of items to load on each click.', 'wrapkit' ),
						'param_name'  => 'load_items',
						'value'       => '3',
						'save_always' => true,
						'dependency'  => array(
							'element' => 'show_load_more',
							'value'   => array( 'yes' ),
						),
					),
				),
			));
		}
	}
}