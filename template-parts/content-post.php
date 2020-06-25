<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aqia
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="row">
	<div class="post-content   col-lg-12">



	
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aqia' ),
			'after'  => '</div>',
		) );
		?>
		<p>By: <?php echo get_field('author_name');?>  - Posted on:<?php
				aqia_posted_on();?></p>
	</div>


</div>

	<!-- .entry-content -->

	
</article><!-- #post-<?php the_ID(); ?> -->
