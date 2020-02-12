<?php /* Template Name: Submit Recipe */

get_header();

$recipes = new WP_Query(array(

    'posts_per_page' => 4,
    'post_type' => 'recipe',
    'post_status' => 'publish',

));

if (isset($_POST['ispost'])) {

    $post_title = $_POST['title'];

    $post_content = $_POST['recipe_content'];

    $new_post = array(
        'post_title' => $post_title,
        'post_content' => $post_content,
        'post_status' => 'pending',
        'post_name' => uniqid(),
        'post_type' => 'recipe',
    );

    if (empty($post_title) || empty($post_content)) {

        $message = "Title and Description is required!";

    } else {

        $new_post = wp_insert_post($new_post);

        if (!function_exists('wp_generate_attachment_metadata')) {
            require_once ABSPATH . "wp-admin" . '/includes/image.php';
            require_once ABSPATH . "wp-admin" . '/includes/file.php';
            require_once ABSPATH . "wp-admin" . '/includes/media.php';
        }
        if ($_FILES) {
            foreach ($_FILES as $file => $array) {
                if ($_FILES[$file]['error'] !== UPLOAD_ERR_OK) {
                    return "upload error : " . $_FILES[$file]['error'];
                }
                $attach_id = media_handle_upload($file, $new_post);
            }
        }

        if ($attach_id > 0) {
            $post = get_post($new_post, 'ARRAY_A');
            $image = wp_get_attachment_image_src($attach_id);
            $image_tag = '<img class="image-blog" src="' . $image[0] . '" /><br>';

            $post['post_content'] = $image_tag . $post['post_content'];

            $post_id = wp_update_post($post);
            wp_redirect('/cookbook/');
            exit;
        }

    }

}

?>
<section class="container">

<div class="col-sm-12 text-center">
    <h3>Add New Recipe</h3>
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="ispost" value="1" />
        <input type="hidden" name="userid" value="" />
        <div class="col-md-12">
            <label class="control-label">Title</label>
            <input type="text" class="form-control" name="title" />
        </div>

        <div class="col-md-12">
            <label class="control-label">Content</label>
            <textarea class="form-control" rows="8" name="recipe_content"></textarea>
        </div>

        <div class="col-md-12">
            <label class="control-label">Upload Recipe Image</label>
            <input type="file" name="thumbnail" class="form-control" />
        </div>

        <div class="col-md-12">
            <input type="submit" class="btn btn-warning mt-5" value="INSERT RECIPE" name="submitpost" />
        </div>
    </form>
    <div class="clearfix"></div>
</div>
    <p class="text-danger"><?php echo $message ?></p>

</section>

<?php

get_footer();
