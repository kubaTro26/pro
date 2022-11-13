<?php
/**
 * Latest Blog VC Shortcode
 *
 * @package	wrapkit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
if ( ! function_exists( 'sd_latest_blog_items' ) ) {
	function sd_latest_blog_items( $atts ) {
		$sd = shortcode_atts( array(
			'cats'	   => '',
			'blog_id'  => '',
			'items'	   => '3',
			'style'    => '',
			'view_all' => 'yes',
			'section_title' => 'section_title',
		), $atts );
		
		$cats          = $sd['cats'];
		$blog_id       = $sd['blog_id'];
		$items         = $sd['items'];
		$style         = $sd['style'];
		$view_all      = $sd['view_all'];
		$section_title = $sd['section_title'];
		
		$args = array(
			'post_type'           => 'post',
			'cat'                 => $cats,
			'posts_per_page'      => $items,
			'ignore_sticky_posts' => 1,
			'post_status'         => 'publish',
		);
		
		$sd_query = new WP_Query( $args );

		ob_start();
		?>
			<?php if ( $style == 'style1' ) : ?>
				<div class="sd-latest-blog blog-home1">
					<div class="row">
						<?php $i = 0; ?>
						<?php if ( $sd_query->have_posts() ) : while ( $sd_query->have_posts() ) : $sd_query->the_post(); $i++ ?>
							<div class="col-md-4">
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
								<div class="card card-shadow" data-aos="<?php echo esc_attr( $aos_anim ); ?>" data-aos-duration="1200">
									<?php if ( has_post_thumbnail() ) : ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'sd-carousel' ); ?></a>
									<?php endif; ?>
									<div class="p-30">
										<div class="d-flex no-block font-14">
											<?php the_category( ', ' ); ?>
											<span class="ml-auto"></span> <?php the_time( get_option( 'date_format') ); ?></span>
										</div>
										<h5 class="font-medium m-t-20"><a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
									</div>
								</div>
							</div>
							<?php if ( $i == '3' ) { $i = 0; } ?>
						<?php endwhile; endif;  wp_reset_postdata(); ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( $style == 'style2' ) : ?>
				<div class="sd-latest-blog blog-home5">
					<div class="row">
						<?php if ( $sd_query->have_posts() ) : while ( $sd_query->have_posts() ) : $sd_query->the_post(); ?>
							<div class="col-md-4">
                                <div class="card b-h-box font-14">
									<?php if ( has_post_thumbnail() ) : ?>
										<div class="sd-img-tint">
											<?php the_post_thumbnail( array( 350, 275 ) ); ?>
										</div>
									<?php endif; ?>
                                    <div class="card-img-overlay">
                                        <span class="bg-info-gradiant label"><?php the_category( ', ' ); ?></span> <span class="m-l-10"><?php the_time( get_option( 'date_format') ); ?></span>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><h5 class="card-title"><?php the_title(); ?></h5></a>
                                        <p class="card-text">
											<?php
												echo wrapkit_excerpt( array(
													'length' => '10',
												) );
											?>
											</p>
                                    </div>
                                </div>
                            </div>
						<?php endwhile; endif;  wp_reset_postdata(); ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( $style == 'style3' ) : ?>
				<div class="sd-latest-blog3">
					<?php if ( ! empty( $section_title ) || $view_all == 'yes' ) : ?>
						<div class="d-flex b-b p-b-20 no-block font-medium text-uppercase">
							<?php if ( ! empty( $section_title ) ) : ?>
								<h6 class="no-shrink font-medium align-self-center m-b-0"><?php echo esc_html( $section_title ); ?></h6>
							<?php endif; ?>
							<?php if ( $view_all == 'yes' && ! empty( $blog_id ) ) : ?> 
								<a class="ml-auto text-danger align-self-center" href="<?php the_permalink( $blog_id ); ?>"><?php esc_html_e( 'VIEW ALL', 'wrapkit' ); ?></a>
							<?php endif; ?>
						</div>
					<?php endif; ?>
					<?php if ( $sd_query->have_posts() ) : while ( $sd_query->have_posts() ) : $sd_query->the_post(); ?>
						<div class="row blog-row m-t-30 blog-row">
							<div class="col-md-4">
								<?php if ( has_post_thumbnail() ) : ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( array( 160, 106 ) ); ?></a>
								<?php endif; ?>
							</div>
							<div class="col-md-8">
								<h5><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
								<p><?php echo esc_html_x( 'By', 'by author', 'wrapkit' ); ?> <?php the_author(); ?> / <?php the_time( get_option( 'date_format') ); ?></p>
							</div>
						</div>
					<?php endwhile; endif;  wp_reset_postdata(); ?>
				</div>
			<?php endif; ?>

			<?php if ( $style == 'style4' ) : ?>
				<div class="card-columns sd-latest-blog4">
					<?php $i = 0; ?>
					<?php if ( $sd_query->have_posts() ) : while ( $sd_query->have_posts() ) : $sd_query->the_post(); $i++ ?>
						<?php $format = get_post_format() ? : 'standard'; ?>
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
							<div class="card card-shadow" data-aos="<?php echo esc_attr( $aos_anim ); ?>" data-aos-duration="1200">
								<?php if ( $format == 'standard' ) : ?>
									<?php if ( has_post_thumbnail() ) : ?>
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail( array( 350, 217 ), array( 'class' => 'card-img-top' ) ); ?>
										</a>
									<?php endif; ?>
								<?php elseif ( $format == 'audio' ) : ?>
									<?php
										$audio_url  = rwmb_meta( 'sd_audio_url' );
										$audio_attr = array(
											'src' => $audio_url,
										);

										echo wp_audio_shortcode( $audio_attr );
									?>
								<?php elseif ( $format == 'video' ) : ?>
									<?php $video_embed  = rwmb_meta( 'sd_video_url', 'type=oembed' ); ?>
										<div class="sd-entry-video ">
											<?php
												echo wp_kses( $video_embed, array(
														'iframe' => array(
															'src'             => array(),
															'height'          => array(),
															'width'           => array(),
															'frameborder'     => array(),
															'allowfullscreen' => array(),
														),
												) );
											?>
									</div>
								<?php elseif ( $format == 'gallery' ) : ?>
									<?php
										$gallery_imgs = rwmb_meta( 'sd_gallery_images', 'size=sd-blog-thumbs' );
										$sd_rand      = mt_rand( 10, 1000 );
									?>
									<div id="sd-gallery-carousel-<?php echo $sd_rand; ?>" class="carousel slide" data-ride="carousel">
										<div class="carousel-inner" role="listbox">
											<?php 
												$i = 1;
												if ( ! empty( $gallery_imgs ) ) : 
											?>
												<?php foreach( $gallery_imgs as $gallery_img ) :  ?>
													<?php $sd_active = ( $i == 1 ) ? 'active' : ''; ?>
													<div class="carousel-item <?php echo $sd_active; ?>">
														<img src="<?php echo esc_url( $gallery_img['url'] ); ?>" alt="<?php echo esc_attr( $gallery_img['alt'] ); ?>" />
													</div>

												<?php $i++; endforeach; ?>
											<?php endif; ?>
										</div>
										<a class="carousel-control-prev" href="#sd-gallery-carousel-<?php echo $sd_rand; ?>" role="button" data-slide="prev">
											<span class="carousel-control-prev-icon" aria-hidden="true"></span>
											<span class="sr-only"><?php esc_html_e( 'Previous', 'wrapkit' ); ?></span>
										</a>
										<a class="carousel-control-next" href="#sd-gallery-carousel-<?php echo $sd_rand; ?>" role="button" data-slide="next">
											<span class="carousel-control-next-icon" aria-hidden="true"></span>
											<span class="sr-only"><?php esc_html_e( 'Previous', 'wrapkit' ); ?></span>
										</a>
									</div>
								<?php endif; ?>
                                <div class="p-30">
                                    <div class="d-flex no-block font-13">
                                        <span class="sd-blog-date"><?php the_time( get_option( 'date_format') ); ?></span>
                                        <span class="link ml-auto sd-blog-author"><?php the_author(); ?></span>
                                    </div>    
                                    <h5 class="font-medium m-t-20"><a class="link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
                                    <?php
										echo wrapkit_excerpt( array(
											'length' => '10',
										) );
									?>
                                    <div class="d-flex no-block font-13">
									<span class="sd-blog-cats"><?php the_category( ', ' ); ?></span>
                                        <a href="#" class="ml-auto link"><?php comments_popup_link ( '<i class="icon-Speach-Bubble8 font-20 vm"></i> 0', '<i class="icon-Speach-Bubble8 font-20 vm"></i> 1', '<i class="icon-Speach-Bubble8 font-20 vm"></i> %', 'comments-link', '' ); ?></a>
                                    </div>
                                </div>
							</div>
						<?php if ( $i == '3' ) { $i = 0; } ?>
					<?php endwhile; endif;  wp_reset_postdata(); ?>
				</div>

			<?php endif; ?>
			
		<?php return ob_get_clean();	
	}
	add_shortcode( 'sd_blog','sd_latest_blog_items' );
}

// Register shortcode to VC

add_action( 'init', 'sd_latest_blog_items_vcmap' );

if ( ! function_exists( 'sd_latest_blog_items_vcmap' ) ) {
	function sd_latest_blog_items_vcmap() {
		
		$terms = get_terms( array(
			'hide_empty' => false,
		) );
		
		$taxonomies = array();
		
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
			$taxonomies = array();
			 foreach ( $terms as $term ) {
				$taxonomies[] = array( 'label' => $term->name, 'value' => $term->term_id );
			}
		}
		
		$all_pages = get_pages();
		
		$pages = array();
		
		if ( ! empty( $all_pages ) && ! is_wp_error( $all_pages ) ) {
			$pages = array();
			 foreach ( $all_pages as $page ) {
				$pages[] = array( 'label' => $page->post_title, 'value' => $page->ID );
			}
		}
		
		vc_map( array(
			'name'              => esc_html__( 'Latest Blog', 'wrapkit' ),
			'description'       => esc_html__( 'Latest blog', 'wrapkit' ),
			'base'              => "sd_blog",
			'class'             => "sd_blog",
			'category'          => esc_html__( 'WrapKit', 'wrapkit' ),
			'icon'              => plugin_dir_url( __DIR__ ) . 'images/vc-icons/blog-icon-min.png',
			'params'            => array(
				array(
					'type'			=> 'dropdown',
					'class'			=> '',
					'heading'		=> esc_html__( 'Style', 'wrapkit' ),
					'param_name'	=> 'style',
					'value' => 
						array( 
							esc_html__( 'Style 1', 'wrapkit') => 'style1',
							esc_html__( 'Style 2', 'wrapkit') => 'style2',
							esc_html__( 'Style 3', 'wrapkit') => 'style3',
							esc_html__( 'Style 4', 'wrapkit') => 'style4',
						),
					'save_always'   => true,
					'description'	=> esc_html__( 'Select the layout of the blog', 'wrapkit' ),
				),
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
				array(
					'type'        => 'textfield',
					'class'       => '',
					'heading'     => esc_html__( 'Section Title', 'wrapkit' ),
					'param_name'  => 'section_title',
					'value'       => esc_html__( 'LATEST NEWS AT WRAPKIT', 'wrapkit' ),
					'save_always' => true,
					'description' => esc_html__( 'Leave empty to hide', 'wrapkit' ),
					'dependency'	=> array(
						'element'	=> 'style',
						'value'		=> array( 'style3'),
					),
				),
				array(
					'type'       => 'dropdown',
					'class'      => '',
					'heading'    => esc_html__( 'Show View All?', 'noxcape' ),
					'param_name' => 'view_all',
					'value'      => 
						array( 
							esc_html__( 'Yes', 'wrapkit' ) => 'yes',
							esc_html__( 'No', 'wrapkit' )  => 'no',
						),
					'save_always' => true,
					'dependency'  => array(
						'element' => 'style',
						'value'   => array( 'style3'),
					),
				),
				array(
					'type'        => 'autocomplete',
					'heading'     => esc_html__( 'Blog Page', 'wrapkit' ),
					'description' => esc_html__( 'Type a page name', 'wrapkit' ),
					'param_name'  => 'blog_id',
					'settings'    => array(
						'multiple'       => false,
						'sortable'       => true,
						'min_length'     => 1,
						'no_hide'        => true,
						'groups'         => true,
						'unique_values'  => true,
						'display_inline' => true,
						'values'         => $pages,
					),
					'dependency' => array(
						'element' => 'style',
						'value'   => array( 'style3'),
					),
				),
			),
		));
	}
}