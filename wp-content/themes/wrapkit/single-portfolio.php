<?php
/**
 * Theme Single Portfolio
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
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('sd-single-portfolio clearfix'); ?>> 
			<?php the_content(); ?>		
		</article>

	
	<?php endwhile; else: ?>
		<p><?php esc_html_e('Sorry, no posts matched your criteria', 'wrapkit') ?>.</p>
	<?php endif; ?>
	
<?php get_footer(); ?>