<?php
/**
 * Template Name: Page: Full Width
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
<main>
	<section>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'sd-full-width clearfix' ); ?>> 
				<?php the_content(); ?>
			</article>
			<!-- sd-full-width -->
		<?php endwhile; else: ?>
			<article>
				<p><?php esc_htm_e( 'Sorry, no posts matched your criteria', 'wrapkit' ) ?>.</p>
			</article>
		<?php endif; ?>
	</section>
</main>
<?php get_footer(); ?>