<?php

//Template Name: API Demo

get_header();
?>

<div class="wrap">
    <h1>API Settings</h1>
    <form method="post" action="<?php echo admin_url('admin-post.php'); ?>">
        <input type="hidden" name="action" value="save_api_settings">
        <label for="api_key">API Key</label>
        <input type="text" name="api_key" id="api_key"
            value="<?php echo esc_attr(get_option('api_key', 'a74f0a6d-780f-4c4e-b600-5af9eb1e6775')); ?>" />
        <?php submit_button(); ?>
    </form>
</div>

<?php echo do_shortcode('[display_api_data]'); ?>

<?php
get_footer();
?>






