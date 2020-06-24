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
	<header class=" entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				aqia_posted_on();
				
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<hr class="brand-primary">
<div class="row py-3">

	<div class="entry-content order-lg-2  col-lg-9">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'aqia' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aqia' ),
			'after'  => '</div>',
		) );
		?>
	</div>
	<div class="left-sidebar col-lg-3 order-lg-1">

<div class="tt navigation-sidebar">
<div class="accordion" id="accordionExample">
<ul class="fa-ul">
<li id="headingOne">
	<a data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
	   <i class="fa-li fas fa-caret-down"></i>Services
</a>

</li>

<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
<?php

$args = array(
'depth'       => 1,
'sort_column' => 'menu_order, post_title',
'menu_class'  => 'menu',
'include'     => '',
'exclude'     => '15,17',
'echo'        => true,
'show_home'   => false,
'link_before' => '',
'link_after'  => ''
);

?>
<?php wp_page_menu( $args ); ?> 


		

	  
</div>


<li><i class="fa-li fa "></i><a href="/about-aqia">About Us</li>
<li><i class="fa-li fa"></i><a href="">Publications and Reports</li>
<li><i class="fa-li fa"></i><a href="">Contact Us</li>
</ul>


</div>


</div>



</div>
</div>
	<!-- .entry-content -->

	
</article><!-- #post-<?php the_ID(); ?> -->
