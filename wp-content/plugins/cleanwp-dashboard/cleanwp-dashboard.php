<?php
function cleanwp_dashboard_activate() {
    // 1. Delete Post ID 1
    wp_delete_post(1, true);

    // 2. Delete Post ID 22
    wp_delete_post(22, true);

    // 3. Check and Delete Hello Dolly and Akismet plugins
    $plugins = get_plugins();
    if (isset($plugins['hello.php'])) {
        deactivate_plugins('hello.php');
        delete_plugins(['hello.php']);
    }
    if (isset($plugins['akismet/akismet.php'])) {
        deactivate_plugins('akismet/akismet.php');
        delete_plugins(['akismet/akismet.php']);
    }

    update_option('permalink_structure', '/%postname%/');

    // 5. Delete the default "Sample Page"
    $default_page = get_page_by_title('Sample Page');
    if ($default_page) {
        wp_delete_post($default_page->ID, true);
    }
}

// Hook into plugin activation
register_activation_hook(__FILE__, 'cleanwp_dashboard_activate');
