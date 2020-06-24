
<div id="inner_image_slider" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    
      <?php 
  $z = 0;
  while ( have_rows('slide') ) : the_row();?>
  <div class="carousel-item <?php if ($z==0) { echo 'active';} ?>">
      <img class="d-block w-100" src="<?php the_sub_field('image');?>">
    </div>
<?php 
$z++;
endwhile; ?>


  </div>
</div>