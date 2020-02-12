<?php

function cookbook_resources()
{
    wp_enqueue_style('font-awesome', '//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Roboto:400,400i,700&display=swap');
    wp_enqueue_style('bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
    wp_enqueue_style('cookbook_styles', get_stylesheet_uri(), null, microtime());

}

add_action('wp_enqueue_scripts', 'cookbook_resources');

function cookbook_features()
{
    add_theme_support('title-tag');

    register_nav_menu('header_menu', 'Header Menu Location');
}

add_action('after_setup_theme', 'cookbook_features');

add_action('theme_option_cookbook', 'admin_theme_option');

// Theme options

add_action('admin_menu', 'admin_theme_option');

function admin_theme_option()
{
    add_menu_page(
        'Theme Options Title',
        'Theme Options Menu',
        'edit_theme_options',
        'theme-options',
        'my_theme_options',
        'dashicons-star-filled'
    );

}

function my_theme_options()
{
    settings_errors();
    ?>

    <div>

    <form action="options.php" method="post" enctype="multipart/form-data">

            <?php
settings_fields('section');
    do_settings_sections('theme-options');
    submit_button();
    ?>

     </form>


    </div>

    <?php

}

function theme_options_setting()
{

    add_settings_section(
        'section',
        'Recipe image',
        null,
        "theme-options"
    );

    add_settings_field(

        "chanel_name",
        "Chanel Name",
        "display_chanel_name",
        "theme-options",
        "section"
    );

    register_setting('section', 'chanel_name', "handle_file_upload");

}

add_action('admin_init', 'theme_options_setting');

function display_chanel_name()
{
    ?>

    <input type="file" name="chanel_name" value="" id="chanel_name">

    <?php

}

function handle_file_upload($option)
{
    if (!empty($_FILES["chanel_name"]["tmp_name"])) {
        $urls = wp_handle_upload($_FILES["chanel_name"], array('test_form' => false));
        $temp = $urls["url"];
        return $temp;
    }

    return $option;
}
