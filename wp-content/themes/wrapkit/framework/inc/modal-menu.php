<?php
/**
 * Modal Menu
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
<?php if ( has_nav_menu( 'modal-menu' ) ) : ?>
	<?php wrapkit_modal_menu(); ?>
<?php endif; ?>
