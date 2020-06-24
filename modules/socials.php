
<?php 
$heading = get_sub_field('heading');
$background = get_sub_field('background_image');
$subheading = get_sub_field('subheading');
$paragraph = get_sub_field('paragraph_text');

?>
<section id="socials" class="module">
    <div class="container align-center">
        <div class="row">
            <div class="col-12"><h2><?php echo $heading; ?></h2>
                <h6 class=" subheading"><?php echo $subheading; ?></h6>
        </div>
        <div class="col-12 py-3">
            <p><?php echo $paragraph; ?></p>
        </div>
        <div class="col-12">
        <?php if( have_rows('social_media') ):

// loop through the rows of data
while ( have_rows('social_media') ) : the_row();
 ?>
       
       <?php if (get_sub_field('icon') == 'facebook'){ ?>
        <a href="<?php get_sub_field('link');?>"><i class="fa fa-facebook-square"></i></a>
       <?php } elseif (get_sub_field('icon') == 'instagram') {?>
       
        <a href="<?php get_sub_field('link');?>"><i class="fa fa-instagram-square"></i></a>
       <?php } else { ?>
        <a href="<?php get_sub_field('link');?>"> <i class="fa fa-twitter-square"></i></a>
       <?php } ?>
        <?php endwhile;
        endif; ?>
         </div>
        </div>

    </div>
</section>