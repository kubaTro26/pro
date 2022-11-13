<?php
/**
 * Theme Search Form
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
?>

<div class="sd-search clearfix">
	<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>/">
		<input class="sd-search-input" name="s" type="text" size="25"  maxlength="128" value="<?php the_search_query(); ?>" placeholder="<?php esc_attr_e( 'Search', 'wrapkit' ); ?>" />
		<button class="sd-search-button sd-opacity-trans"><i class="fa fa-search"></i></button>
	</form>
</div>