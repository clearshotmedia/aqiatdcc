
<?php 
$heading = get_sub_field('heading');
$background = get_sub_field('background_image');
$box1 = get_sub_field('box_1');
$box2 = get_sub_field('box_2');
$box3 = get_sub_field('box_3');
?>
<section id="three-box" class="module" style="background:url('<?php echo $background; ?>');background-size: cover;">


    <div class="container">
        <div class="row ">
            <div class="col-12 three-box-heading"><h2><?php echo $heading ?></h2></div>
        </div>
        <div class="row no-gutters align-center">
            <div class="col-md-4">
                <div class="box-inner team-box">
                    <h4><?php echo $box1['heading']; ?></h4>
                    <p><?php echo $box1['text_content']; ?></p>
                    <button><?php echo $box1['button_text']; ?></button>
                </div>
            </div>
            <div class="col-md-4">
            <div class="box-inner team-box">
            <h4><?php echo $box2['heading']; ?></h4>
            <p><?php echo $box1['text_content']; ?></p>
                    <button><?php echo $box2['button_text']; ?></button>
                            </div></div>
            <div class="col-md-4 ">
            <div class="box-inner team-box">
            <h4><?php echo $box3['heading']; ?></h4>
            <p><?php echo $box1['text_content']; ?></p>
                    <button><?php echo $box3['button_text']; ?></button>
            </div></div>
        </div>
    </div>

</section>