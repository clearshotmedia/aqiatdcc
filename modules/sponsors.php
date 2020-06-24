<?php

?>

<section id="sponsors" class="module">
    <div class="c">
        <div class="row no-gutters">

        <?php
        if( have_rows('sponsor_square') ):

            // loop through the rows of data
            while ( have_rows('sponsor_square') ) : the_row();
        ?>
            <div class="col-sm-3 spon">
                <div class="spon-inner">
                    <a href="<?php the_sub_field('link');?>">
                    <div class="content-overlay"></div>
                    <img class="content-image" src="<?php the_sub_field('background_image');?>">
                    <div class="content-details fadeIn-top">
        <h3><?php echo the_sub_field('sponsor_name'); ?></h3>
        <?php if (get_sub_field('hover_text')) {?>
        <p><?php echo the_sub_field('hover_text'); ?></p> <?php } ?>
      </div>
                    </a>
                </div>
            </div>

          

            <?php endwhile;
        endif; ?>
        </div>
    </div>
</section>