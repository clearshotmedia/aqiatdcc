<section id="countdown" class="module">

    <div class="container">
      

        <?php

$post_object = get_sub_field('cricketmatch');

if( $post_object ): 

    global $post;
	// override $post
	$post = $post_object;
	setup_postdata( $post ); 
    $object_id = $post_object->ID; // THE OBJECT ID
	?>

        <div class="row">


        <div class="col-md-6">
            <h6 class="secondary">Next Match </h6>

            <div class="match-container">
            <img class="home" src="<?php echo the_field('home_team_logo'); ?>" alt="">
            <h5 class="match"><?php echo the_field('home_team'); ?> </h5> vs <h5 class="match"><?php echo the_field('away_team'); ?></h5><img class="away" src="<?php echo the_field('away_team_logo'); ?>" alt="">
            </div>
                <span id="matchtime"><?php echo the_field('match_date'); ?>
                </span> 
                <span class="date">
                <?php  echo date("jS F, Y", strtotime(get_field('match_date'))); ?></span><br> <span class="location">
                <?php the_field('match_location'); ?></span>
        </div>
        <div class="col-md-4 align-center">  <ul>
        <li><span id="days"></span>days</li>
        <li><span id="hours"></span>Hours</li>
        <li><span id="minutes"></span>Minutes</li>
        <li><span id="seconds"></span>Seconds</li>
        </ul></div>
        <div class="col-md-2">
            <button class="secondary-button">View Results <i class="icofont-thin-right"></i></button>
           
        </div>
        <hr class="separator">
        </div>
    





    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
    </div>
</section>