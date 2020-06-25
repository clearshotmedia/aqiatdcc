<?php


  $video = get_sub_field('video_code');
  $video_title = get_sub_field('title');
  $video_text = get_sub_field('text');
  $button_1 = get_sub_field('button_1');
  $button_2 = get_sub_field('button_2');
 ?>

<section id="feature-section" class="video_text_link">
<div class="container">
<div class="row my-4">
    <div class="col-sm-12 feature-block">
      <div class="inner">
        <div class="row">
        <div class="col-md-8 video"><?php echo $video; ?></div>
        <div class="col-md-4">
          <div class="inner">
        <h4><?php  echo $video_title; ?></h4>
        <p><?php  echo $video_text; ?></p>

        <div class="buttoncell">
        <a href="<?php echo $button_1['url']; ?>"><button class="feature"><?php echo $button_1['title'];?><i class="icofont-thin-right"></i></button></a></div>
      <div class="buttoncell">
      <a href="<?php echo $button_2['url']; ?>"><button class="feature"><?php echo $button_2['title'];?><i class="icofont-thin-right"></i></button></a></div></div>
        </div>
</div>
      </div>
    </div>
  </div>
</div>
</section>