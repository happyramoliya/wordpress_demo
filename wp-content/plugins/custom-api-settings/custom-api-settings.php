<?php
/*
Plugin Name: Custom API Settings Plugin
Description: This plugin saves API settings and provides a function to retrieve them.
Author: Happy Patel
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


// Code for API Display
function display_api_data() {
    $url = "https://dummy.restapiexample.com/api/v1/employees";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        $employees_data = json_decode($response, true);

        if (isset($employees_data)) {
            echo '<div id="api-data">';
            echo '<h2>Employees Data</h2>';
            echo '<ul>';

            foreach ($employees_data['data'] as $employee) {
                echo '<li>';
                echo '<strong>Name:</strong> ' . $employee['employee_name'] . ', ';
                echo '<strong>Salary:</strong> ' . $employee['employee_salary'] . ', ';
                echo '<strong>Age:</strong> ' . $employee['employee_age'];
                echo '</li>';
            }

            echo '</ul>';
            echo '</div>';
        } else {
            echo '<p>No employee data available.</p>';
        }
    }
}

// Add a shortcode to display the API data
add_shortcode('display_api_data', 'display_api_data');








