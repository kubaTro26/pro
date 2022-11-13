<?php 
/**
 * Theme Normal Page
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */

get_header(); 
?>
<!--left col-->

<div class="sd-blog-page">
	<div class="container">
		<div class="row"> 
			<div class="col-md-8">
				<div class="sd-left-col">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'framework/inc/post-formats/single', get_post_format() ); ?>
					<?php endwhile; else: ?>
						<p> <?php esc_html_e( 'Sorry, no posts matched your criteria', 'wrapkit' ) ?>. </p>
					<?php endif; ?>
					<?php
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
				</div>
				<!-- sd-left-col -->
			</div>
			<!-- col-md-8 -->
			<?php get_sidebar(); ?>
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</div>
<!-- sd-blog-page -->
<?php get_footer(); ?>
