<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aqia
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<?php // aqia_post_thumbnail(); ?>

	<div class="entry-content container">

	<div class="row">
			<div class="col-12">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aqia' ),
			'after'  => '</div>',
		) );
		?>
</div></div></div><!-- .entry-content -->
<?php

while(have_rows('module')) {
	the_row();

	tdcc_theme_partial('/modules/'.get_row_layout().'.php');
}

?>
	

	
</article><!-- #post-<?php the_ID(); ?> -->
