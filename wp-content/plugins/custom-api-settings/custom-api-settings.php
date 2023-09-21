<?php
/*
Plugin Name: Custom API Settings Plugin
Description: This plugin saves API settings and provides a function to retrieve them.
Version: 1.0
*/

function save_api_settings() {
    if (isset($_POST['api_key'])) {
        update_option('api_key', $_POST['api_key']);
        echo "API Key saved successfully!";
    }
}

add_action('admin_post_save_api_settings', 'save_api_settings');

function add_admin_menu() {
    add_options_page('API Settings', 'API Settings', 'manage_options', 'api-settings', 'api_settings_page');
}

function api_settings_page() {
    include('settings-page.php');
}

add_action('admin_menu', 'add_admin_menu');
