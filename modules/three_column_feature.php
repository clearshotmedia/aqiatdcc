<?php

  //if( have_rows('three_column_feature') ):

 // while( have_rows('three_column_feature') ): the_row();

  $column_1 = get_sub_field('column_1');
  $column_2 = get_sub_field('column_2');
  $column_3 = get_sub_field('column_3');
//  endwhile;
//endif;
?>

<section id="feature-section" class="three_column_feature">
<div class="container">

<div class="row mb-4">
    <div class="col-md-4  feature-block">
      <div class="inner">
      <h4><?php echo $column_1['title'];  ?></h4>
      <p>
      <?php echo $column_1['text'];  ?>
      </p>
      <div class="buttoncell">
      <a href="<?php echo $column_1['link']; ?>"> <button class="feature"><?php echo $column_1['link_text'];  ?> <i class="icofont-thin-right"></i></button></a>
    </div></div>
    </div>
    <div class="col-md-4 feature-block">  <div class="inner">
      <h4><?php echo $column_2['title'];?></h4>
      <p>
      <?php echo $column_2['text'];?>
      </p>
      <div class="buttoncell">
      <a href="<?php echo $column_2['link']; ?>"> <button class="feature"><?php echo $column_2['link_text'];?> <i class="icofont-thin-right"></i></button></a></div>
    </div> </div>
    <div class="col-md-4 feature-block">  <div class="inner">
      <h4><?php echo $column_3['title'];?></h4>
      <p>
      <?php echo $column_3['text'];?>
      </p><div class="buttoncell">
      <a href="<?php echo $column_3['link']; ?>"> <button class="feature"><?php echo $column_3['link_text'];?><i class="icofont-thin-right"></i></button></a></div>
    </div> </div>
  </div>
  </div>
</section>