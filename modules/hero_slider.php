<section id="hero_slider" class="module">
<hr class="transition-timer-carousel-progress-bar" />


<div id="myCarousel" class="carousel slide" data-ride="carousel">


<ol class="carousel-indicators">
 <?php 
$i=0;
while( have_rows('slide') ): the_row();
if ($i == 0) {
echo '<li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
} else {
echo '<li data-target="#myCarousel" data-slide-to="'.$i.'"></li>';
}
$i++;
endwhile; ?>
</ol>
<div class="carousel-inner">
 <?php 
 $z = 0;
 while( have_rows('slide') ): the_row();
   $image = get_sub_field('image'); ?>

    <div class="carousel-item slides <?php if ($z==0) { echo 'active';} ?>">
  
    <img src="<?php echo $image; ?>">
    <div class="carousel-caption d-none d-md-block">

 
            <h1><?php the_sub_field('title_text');?></h1>    

            <a href="<?php echo the_sub_field('button_link');?>"><button class="secondary-button"><?php echo the_sub_field('button_text');?></button> </a>
            
            </div>

       
      
    </div>
<?php 
$z++;
endwhile; ?>    
  </div>
</div>


</section>

