<div class="generic_content">

<div class="generic_head_price clearfix row no-gutters">
<div class="generic_head_content  col-sm-3">						
	<div class="head">
        <div class="tag">
        <?php $terms = wp_get_post_terms( $post->ID, array( 'offer_type' ) ); ?>
<?php foreach ( $terms as $term ) : ?>
<?php echo $term->name; ?>
<?php endforeach; ?>
        </div>
	  <?php the_post_thumbnail(); ?>
	</div>								
</div>
     <div class="generic_price_tag clearfix col-sm-9">	
	<span class="currency"><?php
	the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' ); ?></span> 
	<hr class="separator">
	<?php the_excerpt(); ?>
    <a  href="<?php echo esc_url( get_permalink() ); ?>"><button class="generic_price_btn">Find Out More</button></a>
    
	</div>
								
	

</div></div>