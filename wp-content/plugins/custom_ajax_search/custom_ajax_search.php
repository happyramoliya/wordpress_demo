<?php
/*
Plugin Name: Custom Ajax Search
Description: Implement Ajax-based search functionality.
Version: 1.0
Author: Happy Patel
*/

// Plugin code will go here
function enqueue_custom_ajax_search_scripts() {
    wp_enqueue_script('custom-ajax-search-script', plugins_url('/js/custom-ajax-search.js', __FILE__), array('jquery'), '1.0', true);

    // Pass ajaxurl to the JavaScript file
    wp_localize_script('custom-ajax-search-script', 'ajaxurl', admin_url('admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_ajax_search_scripts');


function custom_ajax_search_form() {
    ob_start(); ?>
    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" id="custom-ajax-search-form">
        <input type="text" id="search" name="s" value="<?php the_search_query(); ?>" placeholder="Search..." />
        <input type="submit" value="Search" />
    </form>
    <div id="search-results"></div>
    <?php
    return ob_get_clean();
}

function custom_ajax_search() {
    $search_query = $_POST['query'];

    $args = array(
        's' => $search_query,
        'post_type' => 'post',
        'post_status' => 'publish'
    );

    $search = new WP_Query($args);

    if ($search->have_posts()) {
        while ($search->have_posts()) : $search->the_post(); ?>
            <div class="blog-item">
                <div class="blog-feature-image">
                    <a href="<?php the_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>" alt="salesforce"></a>
                    <div class="blog-date"><span><?php echo get_the_date('j F, Y'); ?></span></div>
                </div>
                <div class="blog-list-content">
                    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                    <p><?php the_excerpt();?></p>
                </div>
            </div>
        <?php endwhile;
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
    




