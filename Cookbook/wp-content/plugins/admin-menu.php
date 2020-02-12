<?php
ob_start();
// wp_enqueue_style('style', get_stylesheet_uri());
wp_enqueue_style('bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
/**
 * Plugin Name: Cookbook Admin Menu
 * Description: Read new recipes
 */

function cookbook_admin_menu()
{

    add_menu_page('Recipes',
        'New recipes',
        'manage_options',
        'cookbook-admin-menu',
        'cookbook_admin_menu_main',
        'dashicons-smiley',
        4
    );

}

function cookbook_admin_menu_main()
{

    $recipes = new WP_Query(array(

        'posts_per_page' => 10,
        'post_type' => 'recipe',
        'post_status' => 'pending',

    ));

    ?>
    <div class="container-fluid table-responsive">
        <table class="table table-dark">
        <tr>
            <th class="text-info text-center">Title</td>
            <th class="text-info text-center">Description</td>
    <?php

    global $wpdb;

    while ($recipes->have_posts()) {

        $recipes->the_post();

        ?>

        <tr>
            <td class="text-center" style="border: 1px solid black;" >
                <?=get_the_title();?>
            </td>

            <td class="text-center" style="border: 1px solid black;">
                <?=get_the_content();?>
            </td>


            <td>
                <form action="" method="POST">

                     <input type="hidden" name="id" value="<?=$recipes->posts[$recipes->current_post]->ID ?? null?>">
                     <input type="hidden" name="action" value="contact_form">

                         <button class="btn btn-primary">Publish</button>


                 </form>
            </td>

            </tr>

        <?php

    }

    if (isset($_POST['id'])) {

        $wpdb->update($wpdb->posts,
            array("post_status" => "publish"),
            array("ID" => htmlspecialchars(trim($_POST['id']))),
            array("%s"), array("%d"));

        header('Location:  http://localhost/cookbook/wp-admin/admin.php?page=cookbook-admin-menu');
    }

    ?>
              </tr>

        </table>

    </div>

    <?php

    wp_reset_postdata();
}

add_action('admin_menu', 'cookbook_admin_menu');

?>
