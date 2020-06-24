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
<header class="entry-header ">
	<div class="container">
    <div class="row"> <div class="col align-self-end"><a href="http://skillsalliance.com.au/store" target="_blank" class="elearn">QFSR Skills Alliance eLearning Portal <i class="icofont-swoosh-right"></i></a></div></div>
		</div>
		
		<?php get_template_part( 'template-parts/breadcrumbs' ); ?>

	</header>
	<div>



    <div class="container-fluid hero-slider" style="background:url('<?php the_field('header_image'); ?>');">
      
    <div class="row"><div class="col-sm-12">
   
</div></div></div>

<div class="lead">


</div>



<div id="feature-section" class="container">
  




  <div class="row my-2">
    <div class="col-md-6 feature-block">
      <div class="inner">
        <h4> Title</h4>
        
        <?php
	$args = array( 'numberposts' => '4' );
	$recent_posts = wp_get_recent_posts( $args );
	foreach( $recent_posts as $recent ){
    ?> <div class="event"><?php
    echo '<p><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </p> ';
    echo '<p class="meta">' . date('M Y ', strtotime($recent["post_date"]));
    $cats = get_the_category($recent["ID"]);
    foreach($cats as $cat)
    {
        echo $cat->name." "  . '</p>';
    }
    ?></div><?php
	}
	wp_reset_query();
?>
<div class="buttoncell">
<button>View All <i class="icofont-thin-right"></i> </button></div>
      </div>
    </div>
    <div class="col-md-6 feature-block">
      <div class="inner">
       
       <?php echo do_shortcode( '[custom-facebook-feed]' );    ?>            
      </div>
    </div>
  </div>




  <?php
  if( have_rows('one_third_two_thirds') ):
  while( have_rows('one_third_two_thirds') ): the_row();

  $heading = get_sub_field('link_heading');
    
?>
  <div class="row my-4">
    <div class="col-md-4 feature-block">
    <div class="inner">
        <h4><?php echo $heading;  ?></h4>
        <?php 
        if( have_rows('links') ):
          while ( have_rows('links') ) : the_row();

          ?>  <a href="<?php the_sub_field('link_url');?>"><button><?php 
          echo the_sub_field('link_name'); ?><i class="icofont-thin-right"></i></button></a> <?php
        endwhile;
      endif;
    endwhile;
  endif;
        ?>
       
                   
      </div>
    </div>
    <div class="col-md-8 feature-block">
    <div class="inner">
    <h4>Title</h4>
    <form action="#" method="post">
            <input type="hidden" name="u" value="484702357559971dd84b491ce">
            <input type="hidden" name="id" value="4a7ea877d6">
				
					<p>text</p>
			
						<input type="email" class="form-control" name="MERGE0" id="MERGE0" placeholder="Enter your email"  value required>
            <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                <input type="text"  tabindex="-1" value="">
                            </div>
						
            
							<input type="submit"  value="TEXT">
						
			</form>			
    </div>
    </div>
  </div>
</div>
      
       

    



</div></div>

</div>

        <div id="partners" class=" container ">
        

         
            <div class="row ">
                <div class="col-12">
            
  <h3>TITLE</h3>
  <section class="customer-logos slider">
  <?php
	if( have_rows('partner', 'option') ):	
 	// loop through the rows of data
	while ( have_rows('partner', 'option') ) : the_row();
	?>  <div class="slide"><a href="
	<?php echo the_sub_field('partner_link'); ?>"><img src="<?php echo the_sub_field('partner_image');?>"> </a></div><?php
    endwhile;
		else :
    // no rows found
	endif; ?>
      
   </section>
   


                </div>
            </div>
        </div>
	</div><!-- .entry-content -->

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
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-newsletter">
		<div class="modal-content">
    <form action="https://skillsalliance.us20.list-manage.com/subscribe/post" method="post">
            <input type="hidden" name="u" value="484702357559971dd84b491ce">
            <input type="hidden" name="id" value="4a7ea877d6">
				<div class="modal-header">
					<h4>Subscribe to our newsletter</h4>	
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span>&times;</span></button>
				</div>
				<div class="modal-body">					
					<p>Signup for the AQIA newsletter.</p>
					<div class="input-group">
						<input type="email" class="form-control" name="MERGE0" id="MERGE0" placeholder="Enter your email"  value required>
            <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                <input type="text" name="b_484702357559971dd84b491ce_4a7ea877d6" tabindex="-1" value="">
                            </div>
						<span class="input-group-btn">
            
							<input type="submit" class="btn btn-primary" value="Subscribe">
						</span>
					</div>
				</div>
			</form>			
		</div>
	</div>
</div>
</article><!-- #post-<?php the_ID(); ?> -->
