<?php 
    $background = get_sub_field('background_image');
    $subheading = get_sub_field('subheading');
    $mainheading = get_sub_field('main_heading');
    $paragraph = get_sub_field('paragraph_text');
    $buttonlink = get_sub_field('button_link');
    $buttontext = get_sub_field('button_text');

?>

<section id="academy" class="module" style="background:url('<?php echo $background; ?>');background-size: auto; background-position:bottom;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-6 align-center">
                <h6 class="secondary"><?php echo $subheading; ?></h6>
                <h1><?php echo $mainheading; ?></h1>
                <p><?php echo $paragraph; ?></p>

<button class="secondary-button"><?php echo $buttontext; ?></button>
            </div>
        </div>
    </div>
</section>