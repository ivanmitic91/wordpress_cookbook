<?php
get_header();
?>
<section class="single_recipe">

<?php
while (have_posts()) {

    the_post();
    ob_start();
    the_content();
    $content = ob_get_clean();

    if (strpos($content, "<img")) {

        ?>

<h2><?=the_title();?></h2>

<p><?=the_content();?></p>

<p><a href="<?=get_permalink();?>">Read more</a></p>

<?php

    } else {

        ?>

<h2><?=the_title();?></h2>

<p><?=the_content();?></p>


<img width="300px" src="<?=get_option('chanel_name');?>">

<p><a href="<?=get_permalink();?>">Read more</a></p>

<?php
}
}?>
</section>
<?php
get_footer();
?>

