<?php
/*
Plugin Name: Custom Ajax Search
Description: Implement Ajax-based search functionality.
Version: 1.0
Author: Your Name
*/

// Plugin code will go here
function enqueue_custom_ajax_search_scripts() {
    wp_enqueue_script('custom-ajax-search-script', plugins_url('/js/custom-ajax-search.js', __FILE__), array('jquery'), '1.0', true);
    wp_enqueue_style('custom-ajax-search-style', plugins_url('/css/custom-ajax-search.css', __FILE__), array(), '1.0');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_ajax_search_scripts');

function custom_ajax_search_form() {
    ob_start(); ?>
    <form action="/" method="get" id="custom-ajax-search-form">
        <input type="text" id="search" name="s" value="<?php the_search_query(); ?>" />
        <input type="submit" value="Search" style="display:none;" />
    </form>
    <div id="search-results"></div>
    <?php
    return ob_get_clean();
}

function custom_ajax_search() {
    $search_query = $_GET['query'];

    $args = array(
        's' => $search_query,
        'post_type' => 'post', // Change to your custom post type if needed
        'post_status' => 'publish'
    );

    $search = new WP_Query($args);

    if ($search->have_posts()) {
        while ($search->have_posts()) : $search->the_post();
            the_title();
            // Display other information as needed
        endwhile;
        wp_reset_postdata();
    } else {
        echo 'No results found';
    }

    wp_die();
}
add_action('wp_ajax_custom_ajax_search', 'custom_ajax_search');
add_action('wp_ajax_nopriv_custom_ajax_search', 'custom_ajax_search'); // For non-logged in users

function custom_ajax_search_shortcode() {
    return custom_ajax_search_form();
}
add_shortcode('custom_ajax_search', 'custom_ajax_search_shortcode');
