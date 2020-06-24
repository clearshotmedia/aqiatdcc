<?php
/**
 * Breadcrumbs.
 *
 * @package aqia
 */

// Bail if front page.
if ( is_front_page() || is_home() ) {
	return;
}

if ( ! function_exists( 'breadcrumb_trail' ) ) {
    require get_template_directory() . '/inc/breadcrumbs.php';
}
?>

<div id="breadcrumb">
	<div class="container">
<div class="row ">
	<div class="col ">
	
	<?php
	$breadcrumb_args = array(
		'container'   => 'div',
		'show_browse' => false,
	);
	breadcrumb_trail( $breadcrumb_args );
	?>
	</div>
	</div>
</div>
</div><!-- #breadcrumb -->