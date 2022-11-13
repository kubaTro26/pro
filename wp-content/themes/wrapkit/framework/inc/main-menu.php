<?php
/**
 * Main Menu
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
<?php if ( has_nav_menu( 'main-header-menu' ) ) : ?>
	<?php wrapkit_main_menu(); ?>
<?php endif; ?>
