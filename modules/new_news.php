
  <div class="row my-2">
    <div class="col-md-6 feature-block">
      <div class="inner">
        <h4> Title</h4>
        
        <?php
	$args = array( 'numberposts' => '4' );
	$recent_posts = wp_get_recent_posts( $args );
	foreach( $recent_posts as $recent ){
    ?> <div class="event"><?php
    echo '<p><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </p> ';
    echo '<p class="meta">' . date('M Y ', strtotime($recent["post_date"]));
    $cats = get_the_category($recent["ID"]);
    foreach($cats as $cat)
    {
        echo $cat->name." "  . '</p>';
    }
    ?></div><?php
	}
	wp_reset_query();
?>
<div class="buttoncell">
<button>View All <i class="icofont-thin-right"></i> </button></div>
      </div>
    </div>
    <div class="col-md-6 feature-block">
      <div class="inner">
       
       <?php echo do_shortcode( '[custom-facebook-feed]' );    ?>            
      </div>
    </div>
  </div>