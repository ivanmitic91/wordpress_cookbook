<!DOCTYPE html>
<html <?php language_attributes();?>

<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head();?>
</head>

<body <?php body_class();?>
<header id="cookbook_header">
    <h1 class="site-title"><?=get_bloginfo();?></h1>
    <nav>
        <?php wp_nav_menu(array(

    'theme_location' => 'header_menu',

));?>
    </nav>

</header>
    <hr>





