<?php

function cookbook_post_type()
{

    register_post_type('recipe', array(

        'labels' => array(

            'name' => 'Recipes',
            'add_new_item' => 'Add New Recipe',
            'edit_item' => 'Edit Recipe',
            'singuler_name' => 'Recipe',
            'all_items' => 'All Recipes',
        ),
        'public' => true,
        'menu_icon' => 'dashicons-book',
    ));

}

add_action('init', 'cookbook_post_type');
