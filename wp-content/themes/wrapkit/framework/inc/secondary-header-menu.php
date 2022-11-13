<?php
/**
 * Secondary Header Menu
 *
 * @package	WrapKit
 * @author Skat
 * @copyright 2018, Skat Design
 * @link https://skat.tf
 * @since WrapKit 1.0
 * @version 1.0
 */
 
$wrapkit_data = wrapkit_global();

?>
<?php if ( has_nav_menu( 'secondary-header-menu' ) ) : ?>
	<?php wrapkit_secondary_header_menu(); ?>
<?php endif; ?>
