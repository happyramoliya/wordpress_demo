<div class="wrap">
    <h1>API Settings</h1>
    <form method="post" action="<?php echo admin_url('admin-post.php'); ?>">
        <input type="hidden" name="action" value="save_api_settings">
        <label for="api_key">API Key</label>
        <input type="text" name="api_key" id="api_key" value="<?php echo esc_attr(get_option('api_key', 'your_default_api_key_here')); ?>" />
        <?php submit_button(); ?>
    </form>
</div>
