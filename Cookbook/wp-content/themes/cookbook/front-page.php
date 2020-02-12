<?php
get_header();

$recipes = new WP_Query(array(

    'posts_per_page' => 10,
    'post_type' => 'recipe',
    'post_status' => 'publish',
));

?>
    <section class="container text-center">

<?php

while ($recipes->have_posts()) {

    $recipes->the_post();

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
    echo '<hr>';

}

?>
    </section>

    <hr>


<?php

get_footer();