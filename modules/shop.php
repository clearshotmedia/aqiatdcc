<?php 
$heading = get_sub_field('section_heading');
$background = get_sub_field('background_image');
$subheading = get_sub_field('section_subheading');
$secondheading = get_sub_field('second_heading');
$paragraph = get_sub_field('paragraph_text');
$button1 = get_sub_field('button_1');
$button2 = get_sub_field('button_2');
?>

<section id="shop-section" class="module" style="background:url('<?php echo $background; ?>'); background-size:cover;">
    <div class="container">
        <div class="row align-center">
            <div class="col-12">
            <h2><?php echo $heading; ?></h2>
            <?php if ($subheading){ ?>
            <h6 class="secondary"><?php echo $subheading; ?></h6>
            <?php } ?>
            </div>
            <div class="col-6 offset-md-3 py-3">
            <h2><?php echo $secondheading; ?></h2>
            <p><?php echo $paragraph; ?></p>
            </div>
            </div>
            <div class="row py-5 align-center">
            <div class="col-12">
            <button class="<?php echo $button1['button_type']; ?>">
            <?php echo $button1['button_text']; ?> </button> <button class="<?php echo $button2['button_type']; ?>"><?php echo $button2['button_text']; ?></button>
            </div>
        </div>
    </div>

</section>