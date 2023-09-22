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

<?php
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
