<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package tdcc
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>


	<?php dynamic_sidebar( 'sidebar-1' ); ?>

