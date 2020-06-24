<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aqia
 */

?>

<article id="post-<?php the_ID(); ?>">


	<?php // aqia_post_thumbnail(); ?>
	
    <div class="row">
<div class=" order-lg-2  col-lg-9">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aqia' ),
			'after'  => '</div>',
		) );
		?>
	</div>
	<div class="left-sidebar col-lg-3 order-lg-1">

	<div class="navigation-sidebar">
		<div><h4>Event Details</h4></div>
  <div class="event-sidebar">
            <h6>Date:</h6>
			<?php   $event_date = get_post_meta( get_the_ID(), 'event_date', true );
			 $event_location = get_post_meta( get_the_ID(), 'event_location', true );
			 $event_address = get_post_meta( get_the_ID(), 'event_address', true );
			 $event_contact = get_post_meta( get_the_ID(), 'event_contact', true );
			
			?>
            <p><?php echo $event_date;?></p>
            <h6>Location:</h6>
            <p><?php echo $event_location;?> </p>
            <p> <?php echo $event_address;?></p>
            <h6>Event Contact:</h6>
            <p><?php echo $event_contact;?></p>
 
        </div>

	</div>

	</div>

	<!-- .entry-content -->
</div>
<!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'aqia' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
