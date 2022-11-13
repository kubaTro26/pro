<?php
/**
 * Testimonials VC Shortcode
 *
 * @package	wrapkit
 * @author Skat
 * @copyright 2017, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

global $wrapkit_data;

$sd_testimonials = isset( $wrapkit_data['sd_testimonials_module'] ) ? $wrapkit_data['sd_testimonials_module'] : NULL;

if ( $sd_testimonials == '1' ) {
	if ( ! function_exists( 'sd_latest_testimonials' ) ) {
		function sd_latest_testimonials( $atts ) {
			$sd = shortcode_atts( array(
				'cats'                => '',
				'items'               => '3',
				'style'               => 'style1',
				'section_title'       => '',
				'section_desc'        => '',
				'cols'                => '',
				'box_color'           => '',
				'box_border_color'    => '',
				'title_color'         => '',
				'content_color'       => '',
				'quote1_color'        => '',
				'quote1_bg'           => '',
				'title_band_color'    => '',
				'line_color'          => '',
				'desc_color'          => '',
				'bullet_color'        => '',
				'bullet_color_hover'  => '',
				'img_bg'              => '',
				'active_line_color'   => '',
				'active_box_bg'       => '',
				'active_box_txt'      => '',
				'section_title_color' => '',
				'section_desc_color'  => '',
			), $atts );
			
			$cats                = $sd['cats'];
			$items               = $sd['items'];
			$style               = $sd['style'];
			$section_title       = $sd['section_title'];
			$section_desc        = $sd['section_desc'];
			$cols                = $sd['cols'];
			$box_color           = $sd['box_color'];
			$box_border_color    = $sd['box_border_color'];
			$title_color         = $sd['title_color'];
			$content_color       = $sd['content_color'];
			$quote1_color        = $sd['quote1_color'];
			$quote1_bg           = $sd['quote1_bg'];
			$title_band_color    = $sd['title_band_color'];
			$line_color          = $sd['line_color'];
			$desc_color          = $sd['desc_color'];
			$bullet_color        = $sd['bullet_color'];
			$bullet_color_hover  = $sd['bullet_color_hover'];
			$img_bg              = $sd['img_bg'];
			$active_line_color   = $sd['active_line_color'];
			$active_box_bg       = $sd['active_box_bg'];
			$active_box_txt      = $sd['active_box_txt'];
			$section_title_color = $sd['section_title_color'];
			$section_desc_color  = $sd['section_desc_color'];
			

			if ( ! empty( $cats ) ) {
				$cats = explode( ", ", ", $cats  " );
			}
			
			if ( $style == 'style1' ) {
				$items = 1;
			}

			$args = array(
				'post_type'           => 'testimonials',
				'posts_per_page'      => $items,
				'ignore_sticky_posts' => 1,
				'post_status'         => 'publish',
				'tax_query'           => array(
					array(
						'taxonomy' => 'testimonial-category',
						'field'    => 'term_id',
						'terms'    => $cats,
					),
				),
			);

			if( empty( $cats ) ) {
				unset( $args['tax_query'] );
			}
			
			$sd_query = new WP_Query( $args );

			if ( $style == 'style2' || $style == 'style3' || $style == 'style4' || $style == 'style6' || $style == 'style7' || $style == 'style8' ) {
				wp_enqueue_script( 'sd-owl-carousel' );
			}

			$uniqueid  = uniqid();

			ob_start();
			?>

				<?php if ( $style == 'style1' ) : ?>
					<?php
						if (
							$box_color     !== '' ||
							$title_color   !== '' ||
							$content_color !== '' ||
							$quote1_color  !== '' ||
							$quote1_bg     !== ''
						) :
					?>
						<style type = "text/css" scoped>
							<?php if ( $box_color !== '' ) : ?>
								.sd-testimonials-style1-<?php echo esc_attr( $uniqueid ); ?> .card-body {
									background-color: <?php echo esc_attr( $box_color ); ?>;
								}
							<?php endif; ?>
							<?php if ( $content_color !== '' ) : ?>
								.sd-testimonials-style1-<?php echo esc_attr( $uniqueid ); ?> .sd-test-content {
									color: <?php echo esc_attr( $content_color ); ?>;
								}
							<?php endif; ?>
							<?php if ( $title_color !== '' ) : ?>
								.sd-testimonials-style1-<?php echo esc_attr( $uniqueid ); ?> .quote-text h6 {
									color: <?php echo esc_attr( $title_color ); ?>;
								}
							<?php endif; ?>
							<?php if ( $quote1_color !== '' ) : ?>
								.sd-testimonials-style1-<?php echo esc_attr( $uniqueid ); ?> .quote i {
									color: <?php echo esc_attr( $quote1_color ); ?>;
								}
							<?php endif; ?>
							<?php if ( $quote1_bg !== '' ) : ?>
								.sd-testimonials-style1-<?php echo esc_attr( $uniqueid ); ?> .quote {
									background: <?php echo esc_attr( $quote1_bg ); ?>;
								}
							<?php endif; ?>
						</style>
					<?php endif; ?>
					<div class="sd-testimonials sd-testimonials-style1 sd-testimonials-style1-<?php echo esc_attr( $uniqueid ); ?>">
						<div class="row">
							<?php if ( $sd_query->have_posts() ) : while ( $sd_query->have_posts() ) : $sd_query->the_post(); ?>
								<div class="card card-shadow aos-init aos-animate" data-aos="flip-left" data-aos-duration="1200">
									<?php the_post_thumbnail( 'sd-test-style1' ); ?>
									<div class="card-body p-40 po-relative">
										<div class="quote icon-round bg-danger-gradiant po-absolute text-white"><i class="fa fa-quote-right"></i></div>
										<div class="quote-text">
											<h4 class=" font-light sd-test-content"><?php the_content(); ?></h4>
											<h6 class="m-t-30 font-medium"><?php the_title(); ?></h6>
										</div>
									</div>
								</div>
							<?php endwhile; endif;  wp_reset_postdata(); ?>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( $style == 'style2' ) : ?>
					<?php
						if (
							$box_color          !== '' ||
							$title_color        !== '' ||
							$content_color      !== '' ||
							$title_band_color   !== '' ||
							$line_color         !== '' ||
							$desc_color         !== '' ||
							$bullet_color       !== '' ||
							$bullet_color_hover !== ''
						) :
					?>
						<style type = "text/css" scoped>
							<?php if ( $box_color !== '' ) : ?>
								.sd-testimonials-style2-<?php echo esc_attr( $uniqueid ); ?> .card-body {
									background-color: <?php echo esc_attr( $box_color ); ?>;
								}
							<?php endif; ?>
							<?php if ( $title_band_color !== '' ) : ?>
								.sd-testimonials-style2-<?php echo esc_attr( $uniqueid ); ?> .bg-success-gradiant {
									background: <?php echo esc_attr( $title_band_color ); ?>;
								}
							<?php endif; ?>
							<?php if ( $content_color !== '' ) : ?>
								.sd-testimonials-style2-<?php echo esc_attr( $uniqueid ); ?> .sd-test-content {
									color: <?php echo esc_attr( $content_color ); ?>;
								}
							<?php endif; ?>
							<?php if ( $title_color !== '' ) : ?>
								.sd-testimonials-style2-<?php echo esc_attr( $uniqueid ); ?> .thumb {
									color: <?php echo esc_attr( $title_color ); ?>;
								}
							<?php endif; ?>
							<?php if ( $desc_color !== '' ) : ?>
								.sd-testimonials-style2-<?php echo esc_attr( $uniqueid ); ?> .card-body h6 {
									color: <?php echo esc_attr( $desc_color ); ?>;
								}
							<?php endif; ?>
							<?php if ( $line_color !== '' ) : ?>
								.sd-testimonials-style2-<?php echo esc_attr( $uniqueid ); ?> .devider {
									background: <?php echo esc_attr( $line_color ); ?>;
								}
							<?php endif; ?>
							<?php if ( $bullet_color !== '' ) : ?>
								.sd-testimonials-style2-<?php echo esc_attr( $uniqueid ); ?> .owl-dots .owl-dot span {
									background: <?php echo esc_attr( $bullet_color ); ?>;
								}
							<?php endif; ?>
							<?php if ( $bullet_color_hover !== '' ) : ?>
								.sd-testimonials-style2-<?php echo esc_attr( $uniqueid ); ?> .owl-dots .owl-dot:hover span,
								.sd-testimonials-style2-<?php echo esc_attr( $uniqueid ); ?> .owl-dots .owl-dot.active span {
									background: <?php echo esc_attr( $bullet_color_hover ); ?>;
								}
							<?php endif; ?>
						</style>
					<?php endif; ?>
					<script type="text/javascript">
						jQuery(document).ready(function(){
							jQuery('.sd-testimonials-style2-<?php echo $uniqueid; ?>').owlCarousel({
								loop: true,
								margin: 30,
								nav: false,
								dots: true,
								autoplay: true,
								responsiveClass: true,
								responsive: {
									0: {
										items: 1,
										nav: false
									},
									1170: {
										items: 2
									}
								}
							})
						});
					</script>
					<div class="owl-carousel owl-theme testi1 m-t-40 sd-testimonials-style2 sd-testimonials-style2-<?php echo $uniqueid; ?>">
						<?php if ( $sd_query->have_posts() ) : while ( $sd_query->have_posts() ) : $sd_query->the_post(); ?>
							<div class="item">
								<div class="card card-shadow">
									<div class="card-body">
										<div class="thumb bg-success-gradiant">
											<?php if ( has_post_thumbnail() ) : ?>
												<?php the_post_thumbnail( array( 60, 60 ), array( 'class' => 'thumb-img circle' ) ); ?>
											<?php endif; ?>
											<?php the_title(); ?>
										</div>
										<h5 class="font-light sd-test-content"><?php the_content(); ?></h5>
										<span class="devider"></span>
										<?php $test_desc = rwmb_meta( 'sd_test_desc' ); ?>
										<?php if ( $test_desc !== '' ) : ?>
											<h6><?php echo esc_html( $test_desc ); ?></h6>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endwhile; endif;  wp_reset_postdata(); ?>
					</div>
				<?php endif; ?>

				<?php if ( $style == 'style3' ) : ?>
						<?php
							if (
								$title_color   !== '' ||
								$content_color !== '' ||
								$quote1_color  !== '' ||
								$quote1_bg     !== '' ||
								$desc_color    !== '' ||
								$img_bg        !== ''
							) :
						?>
							<style type = "text/css" scoped>
								<?php if ( $content_color !== '' ) : ?>
									.sd-testimonials-style3-<?php echo esc_attr( $uniqueid ); ?> .sd-test-content {
										color: <?php echo esc_attr( $content_color ); ?>;
									}
								<?php endif; ?>
								<?php if ( $title_color !== '' ) : ?>
									.sd-testimonials-style3-<?php echo esc_attr( $uniqueid ); ?> .sd-test-title {
										color: <?php echo esc_attr( $title_color ); ?>;
									}
								<?php endif; ?>
								<?php if ( $quote1_color !== '' ) : ?>
									.sd-testimonials-style3-<?php echo esc_attr( $uniqueid ); ?> .btn i {
										color: <?php echo esc_attr( $quote1_color ); ?>;
									}
								<?php endif; ?>
								<?php if ( $quote1_bg !== '' ) : ?>
									.sd-testimonials-style3-<?php echo esc_attr( $uniqueid ); ?> .btn {
										background: <?php echo esc_attr( $quote1_bg ); ?>;
									}
								<?php endif; ?>
								<?php if ( $desc_color !== '' ) : ?>
									.sd-testimonials-style3-<?php echo esc_attr( $uniqueid ); ?> .subtitle {
										color: <?php echo esc_attr( $desc_color ); ?>;
									}
								<?php endif; ?>
								<?php if ( $img_bg !== '' ) : ?>
									.sd-testimonials-style3-<?php echo esc_attr( $uniqueid ); ?> .sd-thumb-back {
										background-color: <?php echo esc_attr( $img_bg ); ?>;
									}
								<?php endif; ?>
							</style>
						<?php endif; ?>
					<script type="text/javascript">
						jQuery(document).ready(function(){
							jQuery('.sd-testimonials-style3-<?php echo $uniqueid; ?>').owlCarousel({
								loop: true,
								margin: 20,
								nav: false,
								dots: true,
								autoplay: true,
								responsiveClass: true,
								responsive: {
									0: {
										items: 1,
										nav: false
									},
									1170: {
										items: 1
									}
								}
							});

							jQuery(function() {
								dotcount = 1;
								jQuery('.sd-testimonials-style3-<?php echo $uniqueid; ?> .owl-dot').each(function() {
									jQuery(this).addClass('dotnumber' + dotcount);
									jQuery(this).attr('data-info', dotcount);
									dotcount = dotcount + 1;
								});
								slidecount = 1;
								jQuery('.sd-testimonials-style3-<?php echo $uniqueid; ?> .owl-item').not('.cloned').each(function() {
									jQuery(this).addClass('slidenumber' + slidecount);
									slidecount = slidecount + 1;
								});
								jQuery('.sd-testimonials-style3-<?php echo $uniqueid; ?> .owl-dot').each(function() {
									grab = jQuery(this).data('info');
									slidegrab = jQuery('.slidenumber' + grab + ' img').attr('src');
									console.log(slidegrab);
									jQuery(this).css("background-image", "url(" + slidegrab + ")");
								});
							});
						});
					</script>
					<div class="owl-carousel owl-theme testi2 m-t-40 sd-testimonials-style3 sd-testimonials-style3-<?php echo $uniqueid; ?>">
						<?php if ( $sd_query->have_posts() ) : while ( $sd_query->have_posts() ) : $sd_query->the_post(); ?>
							<?php $test_desc = rwmb_meta( 'sd_test_desc' ); ?>
							<div class="item">
								<div class="row po-relative">
									<div class="col-lg-6 col-md-6 align-self-center">
										<span class="btn btn-circle bg-danger-gradiant btn-md"><i class="fa fa-quote-left"></i></span>
										<h3 class="m-t-20 m-b-20 sd-test-title"><?php the_title(); ?></h3>
										<div class="sd-test-content">
											<?php the_content(); ?>
										</div>
										<?php if ( ! empty( $test_desc ) ) : ?>
											<h6 class="subtitle m-t-30"><?php echo esc_html( $test_desc ); ?></h6>
										<?php endif; ?>
									</div>
									<div class="col-lg-6 col-md-6 image-thumb hidden-sm-down">
										<?php if ( has_post_thumbnail() ) : ?>
											<span class="sd-thumb-back"></span>
											<?php the_post_thumbnail( array( 400, 400 ), array( 'class' => 'circle img-fluid' ) ); ?>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endwhile; endif;  wp_reset_postdata(); ?>
					</div>
				<?php endif; ?>

				<?php if ( $style == 'style4' ) : ?>
					<?php
						if (
							$title_color   !== '' ||
							$content_color !== '' ||
							$desc_color    !== ''
						) :
					?>
						<style type = "text/css" scoped>
							<?php if ( $content_color !== '' ) : ?>
								.sd-testimonials-style4-<?php echo esc_attr( $uniqueid ); ?> .sd-test-content {
									color: <?php echo esc_attr( $content_color ); ?> !important;
								}
							<?php endif; ?>
							<?php if ( $title_color !== '' ) : ?>
								.sd-testimonials-style4-<?php echo esc_attr( $uniqueid ); ?> .sd-test-title {
									color: <?php echo esc_attr( $title_color ); ?> !important;
								}
							<?php endif; ?>
							<?php if ( $desc_color !== '' ) : ?>
								.sd-testimonials-style4-<?php echo esc_attr( $uniqueid ); ?> .sd-test-desc {
									color: <?php echo esc_attr( $desc_color ); ?> !important;
								}
							<?php endif; ?>
						</style>
					<?php endif; ?>
					<script type="text/javascript">
						jQuery(document).ready(function(){
							jQuery('.sd-testimonials-style4-<?php echo $uniqueid; ?>').owlCarousel({
								loop: true,
								margin: 30,
								nav: false,
								dots: false,
								autoplay:true,
								responsiveClass: true,
								responsive: {
									0: {
										items: 1
									},
									1650: {
										items: 1
									}
								}
							});
						});
					</script>
					<div class="owl-carousel owl-theme text-center testi10 sd-testimonials-style4 sd-testimonials-style4-<?php echo $uniqueid; ?>">
						<?php if ( $sd_query->have_posts() ) : while ( $sd_query->have_posts() ) : $sd_query->the_post(); ?>
							<div class="item">
								<div class="quote-bg">
									<h3 class="font-light text-white sd-test-content"><?php the_content(); ?></h3>
								</div>    
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="customer-thumb">
										<?php the_post_thumbnail( array( 60, 60 ), array( 'class' => 'circle' ) ); ?>
									</div>
								<?php endif; ?>
								<h6 class="text-white m-b-0 font-medium sd-test-title"><?php the_title(); ?></h6>
								<?php $test_desc = rwmb_meta( 'sd_test_desc' ); ?>
								<?php if ( ! empty( $test_desc ) ) : ?>
									<span class="text-white sd-test-desc"><?php echo esc_html( $test_desc ); ?></span>
								<?php endif; ?>
							</div>
						<?php endwhile; endif;  wp_reset_postdata(); ?>
					</div>
				<?php endif; ?>

				<?php if ( $style == 'style5' ) : ?>
					<?php
						if (
							$title_color       !== '' ||
							$content_color     !== '' ||
							$desc_color        !== '' ||
							$line_color        !== '' ||
							$active_line_color !== '' ||
							$quote1_color      !== '' ||
							$quote1_bg         !== ''
						) :
					?>
						<style type = "text/css" scoped>
							<?php if ( $content_color !== '' ) : ?>
								.sd-testimonials-style5-<?php echo esc_attr( $uniqueid ); ?> .sd-test-content {
									color: <?php echo esc_attr( $content_color ); ?> !important;
								}
							<?php endif; ?>
							<?php if ( $title_color !== '' ) : ?>
								.sd-testimonials-style5-<?php echo esc_attr( $uniqueid ); ?> .sd-test-title {
									color: <?php echo esc_attr( $title_color ); ?> !important;
								}
							<?php endif; ?>
							<?php if ( $desc_color !== '' ) : ?>
								.sd-testimonials-style5-<?php echo esc_attr( $uniqueid ); ?> .sd-test-desc {
									color: <?php echo esc_attr( $desc_color ); ?> !important;
								}
							<?php endif; ?>
							<?php if ( $line_color !== '' ) : ?>
								.sd-testimonials-style5-<?php echo esc_attr( $uniqueid ); ?> .testi6 {
									border-color: <?php echo esc_attr( $line_color ); ?> !important;
								}
							<?php endif; ?>
							<?php if ( $active_line_color !== '' ) : ?>
								.sd-testimonials-style5-<?php echo esc_attr( $uniqueid ); ?> .nav-link.active {
									border-color: <?php echo esc_attr( $active_line_color ); ?> !important;
								}
							<?php endif; ?>
							<?php if ( $quote1_color !== '' ) : ?>
								.sd-testimonials-style5-<?php echo esc_attr( $uniqueid ); ?> .sd-test-quote i {
									color: <?php echo esc_attr( $quote1_color ); ?>;
								}
							<?php endif; ?>
							<?php if ( $quote1_bg !== '' ) : ?>
								.sd-testimonials-style5-<?php echo esc_attr( $uniqueid ); ?> .sd-test-quote {
									background: <?php echo esc_attr( $quote1_bg ); ?>;
								}
							<?php endif; ?>
						</style>
					<?php endif; ?>
					<div class="testimonial6 sd-testimonials-style5 sd-testimonials-style5-<?php echo esc_attr( $uniqueid ); ?>">
						<div class="row">
							<div class="col-lg-2 col-md-3" data-aos="fade-right">
								<div class="nav flex-column nav-pills testi6" id="v-pills-tab" role="tablist">
									<?php $i = 0; ?>
									<?php if ( $sd_query->have_posts() ) : while ( $sd_query->have_posts() ) : $sd_query->the_post(); $i++ ?>
										<?php $active_tab = ( $i == '1' ) ? 'active' : ''; ?>
										<a class="nav-link <?php echo esc_attr( $active_tab ); ?>" data-toggle="pill" href="#tab-<?php echo get_the_ID(); ?>" role="tab" aria-controls="tab-<?php echo get_the_ID(); ?>" aria-expanded="true">
											<?php the_post_thumbnail( array( 70, 70 ), array( 'class' => 'circle' ) ); ?>
										</a>
									<?php endwhile; endif;  wp_reset_postdata(); ?>
								</div>
							</div>

							<div class="col-lg-9 col-md-8 ml-auto align-self-center" data-aos="fade-up">
								<div class="tab-content" id="v-pills-tabContent">
									<?php $z = 0; ?>
									<?php if ( $sd_query->have_posts() ) : while ( $sd_query->have_posts() ) : $sd_query->the_post(); $z++ ?>
										<?php $active_panel = ( $z == '1' ) ? 'active' : ''; ?>
										<?php $test_desc = rwmb_meta( 'sd_test_desc' ); ?>
										<div class="tab-pane fade show <?php echo esc_attr( $active_panel ); ?>" id="tab-<?php echo get_the_ID(); ?>" role="tabpanel">
											<h2 class="font-bold sd-test-title"><?php the_title(); ?></h2>
											<h6 class="subtitle m-t-40 sd-test-content"><?php the_content(); ?></h6>
											<div class="d-flex m-t-40">
												<div>
													<?php if ( ! empty( $test_desc ) ) : ?>
														<h5 class="m-b-0 text-uppercase sd-test-desc"><?php echo esc_html( $test_desc ); ?></h5>
													<?php endif; ?>
												</div>
												<button class="btn btn-circle btn-info btn-md ml-auto sd-test-quote"><i class="fa fa-quote-left"></i></button>
											</div>
										</div>
									<?php endwhile; endif;  wp_reset_postdata(); ?>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( $style == 'style6' ) : ?>

						<?php
							if (
								$box_color          !== '' ||
								$box_border_color   !== '' ||
								$title_color        !== '' ||
								$content_color      !== '' ||
								$bullet_color       !== '' ||
								$bullet_color_hover !== ''
							) :
						?>
						<style type = "text/css" scoped>
							<?php if ( $box_color !== '' ) : ?>
								.sd-testimonials-style6-<?php echo esc_attr( $uniqueid ); ?> .card-body {
									background-color: <?php echo esc_attr( $box_color ); ?>;
								}
							<?php endif; ?>
							<?php if ( $content_color !== '' ) : ?>
								.sd-testimonials-style6-<?php echo esc_attr( $uniqueid ); ?> .sd-test-content {
									color: <?php echo esc_attr( $content_color ); ?>;
								}
							<?php endif; ?>
							<?php if ( $title_color !== '' ) : ?>
								.sd-testimonials-style6-<?php echo esc_attr( $uniqueid ); ?> .sd-test-title {
									color: <?php echo esc_attr( $title_color ); ?>;
								}
							<?php endif; ?>
							<?php if ( $bullet_color !== '' ) : ?>
								.sd-testimonials-style6-<?php echo esc_attr( $uniqueid ); ?> .owl-dots .owl-dot span {
									background: <?php echo esc_attr( $bullet_color ); ?> !important;
								}
							<?php endif; ?>
							<?php if ( $bullet_color_hover !== '' ) : ?>
								.sd-testimonials-style6-<?php echo esc_attr( $uniqueid ); ?> .owl-dots .owl-dot:hover span,
								.sd-testimonials-style6-<?php echo esc_attr( $uniqueid ); ?> .owl-dots .owl-dot.active span {
									background: <?php echo esc_attr( $bullet_color_hover ); ?> !important;
								}
							<?php endif; ?>
						</style>
					<?php endif; ?>

					<?php $col = ! empty( $cols ) ? $cols : '3'; ?>
					<script type="text/javascript">
						jQuery(document).ready(function(){
							jQuery('.sd-testimonials-style6-<?php echo $uniqueid; ?>').owlCarousel({
								loop: true,
								margin: 30,
								nav: false,
								dots: true,
								autoplay: true,
								responsiveClass: true,
								responsive: {
									0: {
										items: 1,
										nav: false
									},
									1170: {
										items: <?php echo esc_html( $col ); ?>
									}
								}
							});
						});
					</script>
					<div class="owl-carousel owl-theme testi3 m-t-40 sd-testimonials-style6 sd-testimonials-style6-<?php echo $uniqueid; ?>">
						<?php $y = 0; ?>
						<?php if ( $sd_query->have_posts() ) : while ( $sd_query->have_posts() ) : $sd_query->the_post(); $y++ ?>
							<?php
								$aos_anim = '';

								if ( $y == '1' ) {
									$aos_anim = 'flip-left';
								} else if ( $y == '2' ) {
									$aos_anim = 'flip-up';
								} else if ( $y == '3' ) {
									$aos_anim = 'flip-right';
								}
							?>
							<div class="item" data-aos="<?php echo esc_attr( $aos_anim ); ?>">
								<div class="card ">
									<div class="card-body">
										<h6 class="font-light m-b-30 sd-test-content"><?php the_content(); ?></h6>
										<div class="d-flex no-block align-items-center">
											<?php if ( has_post_thumbnail() ) : ?>
												<span class="thumb-img"><?php the_post_thumbnail( array( 60, 60 ), array( 'class' => 'circle' ) ); ?></span>
											<?php endif; ?>
											<div class="m-l-20">
												<h6 class="m-b-0 customer sd-test-title"><?php the_title(); ?></h6>
												<?php $test_desc = rwmb_meta( 'sd_test_desc' ); ?>
												<?php if ( ! empty( $test_desc ) ) : ?>
													<p class="sd-test-desc"><?php echo esc_html( $test_desc ); ?></p>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php if ( $y == '3' ) { $y = 0; } ?>
						<?php endwhile; endif;  wp_reset_postdata(); ?>
					</div>
				<?php endif; ?>

				<?php if ( $style == 'style7' ) : ?>
					
					<?php
						if (
							$title_color        !== '' ||
							$content_color      !== '' ||
							$active_box_bg      !== '' ||
							$active_box_txt     !== '' ||
							$desc_color         !== '' ||
							$bullet_color       !== '' ||
							$bullet_color_hover !== ''
						) :
					?>
						<style type = "text/css" scoped>
							<?php if ( $box_color !== '' ) : ?>
								.sd-testimonials-style7-<?php echo esc_attr( $uniqueid ); ?> .card-body {
									background-color: <?php echo esc_attr( $box_color ); ?>;
								}
							<?php endif; ?>
							<?php if ( $content_color !== '' ) : ?>
								.sd-testimonials-style7-<?php echo esc_attr( $uniqueid ); ?> .sd-test-content {
									color: <?php echo esc_attr( $content_color ); ?>;
								}
							<?php endif; ?>
							<?php if ( $active_box_bg !== '' ) : ?>
								.sd-testimonials-style7-<?php echo esc_attr( $uniqueid ); ?> .center .sd-test-content {
									background: <?php echo esc_attr( $active_box_bg ); ?> !important;
								}
							<?php endif; ?>
							<?php if ( $active_box_txt !== '' ) : ?>
								.sd-testimonials-style7-<?php echo esc_attr( $uniqueid ); ?> .center .sd-test-content {
									color: <?php echo esc_attr( $active_box_txt ); ?> !important;
								}
							<?php endif; ?>
							<?php if ( $title_color !== '' ) : ?>
								.sd-testimonials-style7-<?php echo esc_attr( $uniqueid ); ?> .sd-test-title {
									color: <?php echo esc_attr( $title_color ); ?> !important;
								}
							<?php endif; ?>
							<?php if ( $desc_color !== '' ) : ?>
								.sd-testimonials-style7-<?php echo esc_attr( $uniqueid ); ?> .sd-test-desc {
									color: <?php echo esc_attr( $desc_color ); ?>;
								}
							<?php endif; ?>
							<?php if ( $bullet_color !== '' ) : ?>
								.sd-testimonials-style7-<?php echo esc_attr( $uniqueid ); ?> .owl-dots .owl-dot span {
									background: <?php echo esc_attr( $bullet_color ); ?>;
								}
							<?php endif; ?>
							<?php if ( $bullet_color_hover !== '' ) : ?>
								.sd-testimonials-style7-<?php echo esc_attr( $uniqueid ); ?> .owl-dots .owl-dot:hover span,
								.sd-testimonials-style7-<?php echo esc_attr( $uniqueid ); ?> .owl-dots .owl-dot.active span {
									background: <?php echo esc_attr( $bullet_color_hover ); ?>;
								}
							<?php endif; ?>
						</style>
					<?php endif; ?>
					
					<script type="text/javascript">
						jQuery(document).ready(function(){
							jQuery('.sd-testimonials-style7-<?php echo $uniqueid; ?>').owlCarousel({
								loop: true,
								margin: 30,
								nav: false,
								navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
								dots: true,
								autoplay: true,
								center: true,
								responsiveClass: true,
								responsive: {
									0: {
										items: 1

									},
									1170: {
										items: 3
									}
								}
							});
						});
					</script>
					<div class="testimonial5">
						<div class="owl-carousel owl-theme testi5 m-t-40 text-center sd-testimonials-style7 sd-testimonials-style7-<?php echo $uniqueid; ?>">
							<?php if ( $sd_query->have_posts() ) : while ( $sd_query->have_posts() ) : $sd_query->the_post(); ?>
								<div class="item">
									<div class="content sd-test-content"><?php the_content(); ?></div>
									<div class="customer-thumb">
										<?php if ( has_post_thumbnail() ) : ?>
											<?php the_post_thumbnail( array( 60, 60 ), array( 'class' => 'circle' ) ); ?>
										<?php endif; ?>
										<h6 class="text-white m-b-0 sd-test-title"><?php the_title(); ?></h6>
										<?php $test_desc = rwmb_meta( 'sd_test_desc' ); ?>
										<?php if ( ! empty( $test_desc ) ) : ?>
											<p class="sd-test-desc"><?php echo esc_html( $test_desc ); ?></p>
										<?php endif; ?>
									</div>
								</div>
							<?php endwhile; endif;  wp_reset_postdata(); ?>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( $style == 'style8' ) : ?>

					<?php
						if (
							$title_color         !== '' ||
							$content_color       !== '' ||
							$desc_color          !== '' ||
							$section_title_color !== '' ||
							$section_desc_color  !== '' ||
							$line_color          !== '' ||
							$bullet_color        !== '' ||
							$bullet_color_hover  !== ''
						) :
					?>
						<style type = "text/css" scoped>
							<?php if ( $box_color !== '' ) : ?>
								.sd-testimonials-style8-<?php echo esc_attr( $uniqueid ); ?> .card {
									background-color: <?php echo esc_attr( $box_color ); ?>;
								}
							<?php endif; ?>
							<?php if ( $box_color !== '' ) : ?>
								.sd-testimonials-style8-<?php echo esc_attr( $uniqueid ); ?> .card .p-40::after {
									border-top: 15px solid <?php echo esc_attr( $box_color ); ?>;
								}
							<?php endif; ?>
							<?php if ( $content_color !== '' ) : ?>
								.sd-testimonials-style8-<?php echo esc_attr( $uniqueid ); ?> .sd-test-content {
									color: <?php echo esc_attr( $content_color ); ?>;
								}
							<?php endif; ?>
							<?php if ( $section_title_color !== '' ) : ?>
								.sd-testimonials-style8 .sd-section-title {
									color: <?php echo esc_attr( $section_title_color ); ?> !important;
								}
							<?php endif; ?>
							<?php if ( $line_color !== '' ) : ?>
								.sd-testimonials-style8 .devider {
									background-color: <?php echo esc_attr( $line_color ); ?> !important;
								}
							<?php endif; ?>
							<?php if ( $section_desc_color !== '' ) : ?>
								.sd-testimonials-style8 .sd-section-desc {
									color: <?php echo esc_attr( $section_desc_color ); ?> !important;
								}
							<?php endif; ?>
							<?php if ( $title_color !== '' ) : ?>
								.sd-testimonials-style8-<?php echo esc_attr( $uniqueid ); ?> .sd-test-title {
									color: <?php echo esc_attr( $title_color ); ?> !important;
								}
							<?php endif; ?>
							<?php if ( $desc_color !== '' ) : ?>
								.sd-testimonials-style8-<?php echo esc_attr( $uniqueid ); ?> .sd-test-desc {
									color: <?php echo esc_attr( $desc_color ); ?> !important;
								}
							<?php endif; ?>
							<?php if ( $bullet_color !== '' ) : ?>
								.sd-testimonials-style8-<?php echo esc_attr( $uniqueid ); ?> .owl-dots .owl-dot span {
									background: <?php echo esc_attr( $bullet_color ); ?>;
								}
							<?php endif; ?>
							<?php if ( $bullet_color_hover !== '' ) : ?>
								.sd-testimonials-style8 .owl-dots .owl-dot:hover span,
								.sd-testimonials-style8-<?php echo esc_attr( $uniqueid ); ?> .owl-dots .owl-dot.active span {
									background: <?php echo esc_attr( $bullet_color_hover ); ?> !important;
								}
							<?php endif; ?>
						</style>
					<?php endif; ?>

					<script type="text/javascript">
						jQuery(document).ready(function(){
							jQuery('.sd-testimonials-style8-<?php echo $uniqueid; ?>').owlCarousel({
								loop: true,
								margin: 30,
								nav: false,
								dots: true,
								autoplay: true,
								responsiveClass: true,
								responsive: {
									0: {
										items: 1

									},
									1650: {
										items: 1
									}
								}
							});
						});
					</script>
					<div class="testimonial9 sd-testimonials-style8">
						<div class="row">
							<div class="col-lg-5 text-white col-md-6">
								<?php if ( ! empty( $section_title ) ) : ?>
									<h2 class="m-t-40 text-white sd-section-title"><?php echo esc_html( $section_title ); ?></h2>
									<span class="devider bg-white"></span>
								<?php endif; ?>
								<?php if ( ! empty( $section_desc ) ) : ?>
									<p class="sd-section-desc"><?php echo esc_html( $section_desc ); ?></p>
								<?php endif; ?>
							</div>
								<div class="col-lg-6 col-md-6 ml-auto">
									<div class="owl-carousel owl-theme testi9 sd-testimonials-style8-<?php echo $uniqueid; ?>">
										<?php if ( $sd_query->have_posts() ) : while ( $sd_query->have_posts() ) : $sd_query->the_post(); ?>
											<div class="item">
												<div class="card card-shadow">
													<div class="p-40">
														<h5 class="text sd-test-content"><?php the_content(); ?></h5>
													</div>
												</div>
												<div class="d-flex no-block align-items-center">
													<div class="customer-thumb">
														<?php if ( has_post_thumbnail() ) : ?>
															<?php the_post_thumbnail( array( 60, 60 ), array( 'class' => 'circle' ) ); ?>
														<?php endif; ?>
													</div>
													<?php $test_desc = rwmb_meta( 'sd_test_desc' ); ?>
													<?php if ( ! empty( $test_desc ) ) : ?>
														<div class="">
															<h6 class="font-bold m-b-0 text-white sd-test-title"><?php the_title(); ?></h6><span class="font-13 text-white sd-test-desc"><?php echo esc_html( $test_desc ); ?></span>
														</div>
													<?php endif; ?>
												</div>
											</div>
										<?php endwhile; endif;  wp_reset_postdata(); ?>
									</div>
								</div>
						</div>
					</div>
				<?php endif; ?>

			<?php return ob_get_clean();	
		}
		add_shortcode( 'sd_testimonials','sd_latest_testimonials' );
	}

	// Register shortcode to VC

	add_action( 'init', 'sd_latest_testimonials_vcmap' );

	if ( ! function_exists( 'sd_latest_testimonials_vcmap' ) ) {
		function sd_latest_testimonials_vcmap() {
			
			$terms = get_terms( array(
				'taxonomy' => 'testimonial-category',
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
				'name'              => esc_html__( 'Testimonials', 'wrapkit' ),
				'description'       => esc_html__( 'Testimonials', 'wrapkit' ),
				'base'              => "sd_testimonials",
				'class'             => "sd_testimonials",
				'category'          => esc_html__( 'WrapKit', 'wrapkit' ),
				'icon'              => plugin_dir_url( __DIR__ ) . 'images/vc-icons/testimonials-icon-min.png',
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
								esc_html__( 'Style 5', 'wrapkit') => 'style5',
								esc_html__( 'Style 6', 'wrapkit') => 'style6',
								esc_html__( 'Style 7', 'wrapkit') => 'style7',
								esc_html__( 'Style 8', 'wrapkit') => 'style8',
							),
						'save_always'   => true,
						'admin_label'   => true,
						'description'	=> esc_html__( 'Select the layout of the testimonials', 'wrapkit' ),
					),
					array(
						'type'			=> 'dropdown',
						'class'			=> '',
						'heading'		=> esc_html__( 'Columns', 'wrapkit' ),
						'param_name'	=> 'cols',
						'value' => 
							array( 
								esc_html__( '1', 'wrapkit') => '1',
								esc_html__( '2', 'wrapkit') => '2',
								esc_html__( '3', 'wrapkit') => '3',
							),
						'save_always'   => true,
						'description'	=> esc_html__( 'Select the layout of the testimonials', 'wrapkit' ),
						'dependency'  => array(
							'element' => 'style',
							'value'   => array( 'style6' ),
						),
					),
					array(
						'type'        => 'textfield',
						'class'       => '',
						'heading'     => esc_html__( 'Number of items to show', 'wrapkit' ),
						'param_name'  => 'items',
						'value'       => '3',
						'save_always' => true,
						'description' => esc_html__( 'Insert the number of items to show.', 'wrapkit' ),
						'dependency'  => array(
							'element' => 'style',
							'value'   => array( 'style2', 'style3', 'style4', 'style5', 'style6', 'style7', 'style8' ),
						),
					),
					array(
						'type'        => 'textfield',
						'class'       => '',
						'heading'     => esc_html__( 'Section Title', 'wrapkit' ),
						'param_name'  => 'section_title',
						'value'       => esc_html__( 'What Our Customers Say', 'wrapkit' ),
						'save_always' => true,
						'description' => esc_html__( 'Insert the section title.', 'wrapkit' ),
						'dependency'  => array(
							'element' => 'style',
							'value'   => array( 'style8' ),
						),
					),
					array(
						'type'        => 'textarea',
						'class'       => '',
						'heading'     => esc_html__( 'Section Description', 'wrapkit' ),
						'param_name'  => 'section_desc',
						'value'       => esc_html__( 'We care what our customers think of us and so should you. We are partners in your business and your success is ours in your business.', 'wrapkit' ),
						'save_always' => true,
						'description' => esc_html__( 'Insert a short description text.', 'wrapkit' ),
						'dependency'  => array(
							'element' => 'style',
							'value'   => array( 'style8' ),
						),
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
					
					// Styling

					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Box Background Color', 'wrapkit' ),
						'param_name'  => 'box_color',
						'value'       => '',
						'group'       => esc_html__( 'Styling', 'wrapkit' ),
						'dependency'  => array(
							'element' => 'style',
							'value'   => array( 'style1', 'style2', 'style6', 'style8' ),
						),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Box Border Color', 'wrapkit' ),
						'param_name'  => 'box_border_color',
						'value'       => '',
						'group'       => esc_html__( 'Styling', 'wrapkit' ),
						'dependency'  => array(
							'element' => 'style',
							'value'   => array( 'style6' ),
						),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Title Color', 'wrapkit' ),
						'param_name'  => 'title_color',
						'value'       => '',
						'group'       => esc_html__( 'Styling', 'wrapkit' ),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Content Text Color', 'wrapkit' ),
						'param_name'  => 'content_color',
						'value'       => '',
						'group'       => esc_html__( 'Styling', 'wrapkit' ),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Quote Color', 'wrapkit' ),
						'param_name'  => 'quote1_color',
						'value'       => '',
						'group'       => esc_html__( 'Styling', 'wrapkit' ),
						'dependency'  => array(
							'element' => 'style',
							'value'   => array( 'style1', 'style3', 'style5' ),
						),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Quote Background Color', 'wrapkit' ),
						'param_name'  => 'quote1_bg',
						'value'       => '',
						'group'       => esc_html__( 'Styling', 'wrapkit' ),
						'dependency'  => array(
							'element' => 'style',
							'value'   => array( 'style1', 'style3', 'style5' ),
						),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Title Band Background Color', 'wrapkit' ),
						'param_name'  => 'title_band_color',
						'value'       => '',
						'group'       => esc_html__( 'Styling', 'wrapkit' ),
						'dependency'  => array(
							'element' => 'style',
							'value'   => array( 'style2' ),
						),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Line Color', 'wrapkit' ),
						'param_name'  => 'line_color',
						'value'       => '',
						'group'       => esc_html__( 'Styling', 'wrapkit' ),
						'dependency'  => array(
							'element' => 'style',
							'value'   => array( 'style2', 'style5', 'style8' ),
						),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Active Item Line Color', 'wrapkit' ),
						'param_name'  => 'active_line_color',
						'value'       => '',
						'group'       => esc_html__( 'Styling', 'wrapkit' ),
						'dependency'  => array(
							'element' => 'style',
							'value'   => array( 'style5' ),
						),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Description Color', 'wrapkit' ),
						'param_name'  => 'desc_color',
						'value'       => '',
						'group'       => esc_html__( 'Styling', 'wrapkit' ),
						'dependency'  => array(
							'element' => 'style',
							'value'   => array( 'style2', 'style3', 'style4', 'style5', 'style7', 'style8' ),
						),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Carousel Bullet Color', 'wrapkit' ),
						'param_name'  => 'bullet_color',
						'value'       => '',
						'group'       => esc_html__( 'Styling', 'wrapkit' ),
						'dependency'  => array(
							'element' => 'style',
							'value'   => array( 'style2', 'style6', 'style7', 'style8' ),
						),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Carousel Bullet Hover Color', 'wrapkit' ),
						'param_name'  => 'bullet_color_hover',
						'value'       => '',
						'group'       => esc_html__( 'Styling', 'wrapkit' ),
						'dependency'  => array(
							'element' => 'style',
							'value'   => array( 'style2', 'style6', 'style7', 'style8' ),
						),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Image Background Color', 'wrapkit' ),
						'param_name'  => 'img_bg',
						'value'       => '',
						'group'       => esc_html__( 'Styling', 'wrapkit' ),
						'dependency'  => array(
							'element' => 'style',
							'value'   => array( 'style3' ),
						),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Active Box Background Color', 'wrapkit' ),
						'param_name'  => 'active_box_bg',
						'value'       => '',
						'group'       => esc_html__( 'Styling', 'wrapkit' ),
						'dependency'  => array(
							'element' => 'style',
							'value'   => array( 'style7' ),
						),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Active Box Text Color', 'wrapkit' ),
						'param_name'  => 'active_box_txt',
						'value'       => '',
						'group'       => esc_html__( 'Styling', 'wrapkit' ),
						'dependency'  => array(
							'element' => 'style',
							'value'   => array( 'style7' ),
						),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Section Title Color', 'wrapkit' ),
						'param_name'  => 'section_title_color',
						'value'       => '',
						'group'       => esc_html__( 'Styling', 'wrapkit' ),
						'dependency'  => array(
							'element' => 'style',
							'value'   => array( 'style8' ),
						),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Section Description Color', 'wrapkit' ),
						'param_name'  => 'section_desc_color',
						'value'       => '',
						'group'       => esc_html__( 'Styling', 'wrapkit' ),
						'dependency'  => array(
							'element' => 'style',
							'value'   => array( 'style8' ),
						),
					),
				),
			));
		}
	}
}