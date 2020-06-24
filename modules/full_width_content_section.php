<?php 
$content = get_sub_field('content_area');
$colour = get_sub_field('background_colour');
$textcolour = get_sub_field('text_colour');
 if (get_sub_field('background_image')){
     
     $background = get_sub_field('background_image');
 }
?>

<?php if(get_sub_field('background_image')){ ?>
    <section id="full_width_content_section" style="background:url('<?php echo $background; ?>'); background-size:cover; background-position:center;">
<?php } else { ?>
<section id="full_width_content_section" style="background:<?php echo $colour; ?>">
<?php } ?>

    <div class="container">
        <div class="row">
            <div class="col-12 content" style="color: <?php echo $textcolour; ?> !important;"><?php echo $content; ?></div>
        </div>
    </div>
</section>