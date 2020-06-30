<?php 
$heading = get_sub_field('section_heading');
$background = get_sub_field('background_colour');
?>

<section id="sponsor-details" style="background-color:<?php echo $background;?>">
    <div class="container">

    
        <div class="row">
            <div class="col-12 align-center"> 
            <h2>  <?php echo $heading; ?></h2>
            </div>
        </div>

<div class="row">
        <?php

// check if the repeater field has rows of data
if( have_rows('sponsor') ):

 	// loop through the rows of data
    while ( have_rows('sponsor') ) : the_row();
       ?>


        <div class="col-md-6">
            <div class="card text-center">
            <img src="<?php the_sub_field('image'); ?>" alt="" class="card-img-top">

            <div class="card-body">
            <h3 class="card-title"><?php the_sub_field('sponsor_title'); ?></h3>
            <p class="card-text"><?php the_sub_field('paragraph'); ?></p>
                <?php $link = get_sub_field('link');?>
            <a href="<?php echo $link['url']; ?>"><button><?php echo $link['title']; ?></button></a>
            </div>
            </div>
        </div>
    <?php endwhile;

else :

    // no rows found

endif;

?>
</div>
    </div>
</section>

