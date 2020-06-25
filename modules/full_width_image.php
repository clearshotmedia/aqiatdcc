<?php 
$background = get_sub_field('image');
$height = get_sub_field('section_height');

if ($height == 'large') {
    $vh = '80vh';
} else if ($height == 'medium') {
    $vh = '45vh';
} else {
    $vh = '25vh';
}
?>

<section id="full_width_image" style="background:url('<?php echo $background; ?>'); background-size:cover; height:<?php echo $vh; ?>">
</section><div class="lead">


</div>