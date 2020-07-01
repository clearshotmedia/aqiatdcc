<?php 
    $args = array( 'numberposts' => '4' );
    $recent_posts = wp_get_recent_posts( $args );
    $background = get_sub_field('background_image');
?>

<section id="news-feed" class="module">
    <div class="container">
        <div class="row ">
        
            <div class="col-md-6 d-none d-md-block">
        
            <div id="newsout">  
            
              </div>
                <img src="<?php echo $background;?>" alt="background news">
            </div>
            <div class="col-md-6 posts d-none d-md-block">
            <div class="inner">
            <h3>Latest News</h3>
            <?php foreach( $recent_posts as $recent ){  ?>

            <a id="<?php echo $recent["ID"];?>" href="#">

            <div class="post-inner"  style="margin-bottom:10px;">
                <div class="row">
                    <div class="col-2 date">
                    <h3>
                    <?php echo date('d', strtotime($recent["post_date"])); ?>
                    </h3>
                    <h6><?php echo date('M', strtotime($recent["post_date"])); ?></h6>
                    </div>

                    <div class="col-10"><span class="news-heading"><?php echo $recent["post_title"]; ?></span>
                    <span class="meta">View News</span>
                </div>
                </div> <!--row -->
                </div> <!-- post inner -->
                </a>

            <?php } ?> <!-- end foreach -->
                
                
            
                
            </div></div>

            <div class="col-md-6 post-mob d-block d-md-none">
            <div class="inner">
            <h3>Latest News</h3>
            <?php foreach( $recent_posts as $recent ){  ?>

            <a id="<?php echo $recent["ID"];?>" href="/<?php echo $recent['post_name']; ?>">

            <div class="post-inner"  style="margin-bottom:10px;">
                <div class="row">
                    <div class="col-2 date">
                    <h3>
                    <?php echo date('d', strtotime($recent["post_date"])); ?>
                    </h3>
                    <h6><?php echo date('M', strtotime($recent["post_date"])); ?></h6>
                    </div>

                    <div class="col-10"><span class="news-heading"><?php echo $recent["post_title"]; ?></span>
                    <span class="meta">View News</span>
                </div>
                </div> <!--row -->
                </div> <!-- post inner -->
                </a>

            <?php } ?> <!-- end foreach -->
                
                
            
                
            </div></div>
           
        </div>
    </div>
</section>