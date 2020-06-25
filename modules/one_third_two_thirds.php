
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
