<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aqia
 */

get_header();
?>

<header class="entry-header offers">
	<div class="container">
	<?php post_type_archive_title( '<h1 class="entry-title">', '</h1>' );	?>
		</div>
		
		<?php get_template_part( 'template-parts/breadcrumbs' ); 
		 $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full'); 
		 $featured_image = $img[0];
		?>

	</header><!-- .entry-header -->
		
	<div class="jumbotron entry-image" style="background:url('<?php echo the_field('offer_header_image', 'option');  ?>'); background-position:center;background-size: cover;">
	<?php	post_type_archive_title( '<h1 class="main-title">', '</h1>' ); ?>
	</div>
	<div class="lead">


</div>
	
	<div id="primary" class="content-area container">
		<main id="main" class="site-main">
			<div class="row">
				<div class="col-12">
				<?php echo the_field('offer_content_area', 'option'); 
		
				?>

				</div>

			</div>
		<div class="row">
		<div class="left-sidebar col-lg-3">
	<div class="navigation-sidebar">
		<div><h4>Select Offer Category</h4></div>

	<div class="filter-wrap">
    <div class="category">
       
		<div id="filters" class="filters">
    <button data-filter="*" class=" all is-checked">All</button>
 <?php 
 $terms = get_terms( array(
	'taxonomy' => 'offer_type',
'hide_empty' => false,
) ); // get all categories, but you can use any taxonomy
 $count = count($terms); //How many are they?
 if ( $count > 0 ){  //If there are more than 0 terms
 foreach ( $terms as $term ) {  //for each term:
 echo "<button class='fil' data-filter='.".$term->slug."'>" . $term->name . "</button>\n";
 //create a list item with the current term slug for sorting, and name for label
 }
 } 
 ?>
</div>
    </div>
 
    
</div>

	</div>
</div>


	<div class="post-content   col-lg-9">

<div id="generic_price_table">	
<?php 
$termse = get_terms( array(
	'taxonomy' => 'offer_type',
'hide_empty' => false,
) );
$args = array(
	'post_type' => 'offer',
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'orderby' => 'date',
	'order' => 'DESC',
	'tax_query'      => array(
		array(
			'taxonomy' => 'offer_type',
			'field'    => 'id',
			'terms'    => array('legal')
		),
	),
);

$the_query = new WP_Query( $args ); //Check the WP_Query docs to see how you can limit which posts to display ?>
<?php


if ( $the_query->have_posts() ) : ?>
    <div id="isotope-list">
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
	$termsArray = get_the_terms( $post->ID, 'offer_type' );  //Get the terms for this particular item
	$termsString = ""; //initialize the string that will contain the terms
		foreach ( $termsArray as $term ) { // for each term 
			$termsString .= $term->slug.' '; //create a string that has all the slugs 
		}
	?> 
	<div class="<?php echo $termsString;?> item"> <?php // 'item' is used as an identifier (see Setp 5, line 6) 
	get_template_part( 'template-parts/content-part-offer' );?>

	</div> <!-- end item -->
    <?php endwhile;  ?>
    </div> <!-- end isotope-list -->
<?php endif; ?>
</div>
	</div>
	
</div>

		</main><!-- #main -->
	</div><!-- #primary -->
	<footer class="entry-footer">
		<div id="partners" class="smaller container ">
			<div class="row ">
                <div class="col-12">

			

					<h3>Members & Partners</h3>
            
 
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
            </div></div>
		</footer><!-- .entry-footer -->
<?php
get_footer();