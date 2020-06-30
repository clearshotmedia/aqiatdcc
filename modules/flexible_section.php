<?php 
$layout = get_sub_field('layout');
$left = get_sub_field('left_side');
$colour = get_sub_field('background_colour');
$textcolour = get_sub_field('text_colour');
// efault columns


switch ($layout) {
    case '48':
        $leftcol = 'col-md-4';
        $rightcol = 'col-md-8';
        break;
    case '84':
        $leftcol = 'col-md-8';
        $rightcol = 'col-md-4';
        break;
    case '66':
        $leftcol = 'col-md-6';
        $rightcol = 'col-md-6';
        break;
    case '57':
        $leftcol = 'col-md-5';
        $rightcol = 'col-md-7';
        break;
    case '75':
        $leftcol = 'col-md-7';
        $rightcol = 'col-md-5';
        break;
    default:
        $leftcol = 'col-md-4';
        $rightcol = 'col-md-8';
}
?>
<section id="flex" style="background:<?php echo $colour;?>">
<div class="container">
    <div class="row">
        <div class="<?php echo $leftcol; ?> ">
        <div class="inner" style="color:<?php echo $textcolour; ?>!important;">
        <?php 
        
        while(have_rows('left_side')) {
            the_row();
        
            tdcc_theme_partial('/modules/'.get_row_layout().'.php');
        }
        ?>
        </div>
        </div>
        <div class="<?php echo $rightcol; ?> ">
        <div class="inner">
        <?php 
        
        while(have_rows('right_side')) {
            the_row();
        
            tdcc_theme_partial('/modules/'.get_row_layout().'.php');
        }
        ?> </div>
        </div>
    </div>
</div>
</section>