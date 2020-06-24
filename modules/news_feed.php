<?php 
    $args = array( 'numberposts' => '4' );
    $recent_posts = wp_get_recent_posts( $args );
    $background = get_sub_field('background_image');
?>

<section id="news-feed" class="module">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-12"> <h2>Latest News</h2></div>
            <div class="col-md-6">
            <div id="newsout"></div>
                <img src="<?php echo $background;?>" alt="background news">
            </div>
            <div class="col-md-6 px-3 posts">
            <?php foreach( $recent_posts as $recent ){  ?>
            <a id="<?php echo $recent["ID"];?>" href="#"><div class="post-inner"  style="margin-bottom:5px;">
                <div class="row">
                    <div class="col-sm-2 date"><h3>07
                    </h3><h6>JUL</h6></div>
                    <div class="col-sm-10"><span class="news-heading"><?php echo $recent["post_title"]; ?></span>
                    <span class="meta"><?php echo date('M Y ', strtotime($recent["post_date"])); ?></span>
                </div>
                </div></div> </a>

            <?php } ?> <!-- end foreach -->
                
                
            
                
            </div>
            <div class="col-12 my-3 align-center">
                <a href="/news"><button class="secondary-button">All News</button></a>
            </div>
        </div>
    </div>
</section>