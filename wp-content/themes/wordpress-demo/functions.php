<?php
/**
 * wordpress-demo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wordpress-demo
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wordpress_demo_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on wordpress-demo, use a find and replace
		* to change 'wordpress-demo' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wordpress-demo', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'wordpress-demo' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'wordpress_demo_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'wordpress_demo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wordpress_demo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wordpress_demo_content_width', 640 );
}
add_action( 'after_setup_theme', 'wordpress_demo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wordpress_demo_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wordpress-demo' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wordpress-demo' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wordpress_demo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wordpress_demo_scripts() {
	wp_enqueue_style( 'wordpress-demo-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'wordpress-demo-style', 'rtl', 'replace' );

	wp_enqueue_script( 'wordpress-demo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'script-js', get_template_directory_uri(). '/js/script.js', array(), '', true);

}
add_action( 'wp_enqueue_scripts', 'wordpress_demo_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function get_latest_category_posts() {
    // Try to get the data from the transient
    $cached_posts = get_transient('latest_category_posts');

    if (false === $cached_posts) {
        // If the transient doesn't exist or has expired, query the latest posts
        $args = array(
            'category_name' => 'cat1', // Replace with your desired category slug
            'posts_per_page' => 2, // Number of posts to retrieve
            'orderby' => 'date',
            'order' => 'DESC',
        );

        $query = new WP_Query($args);

        // Check if there are posts
        if ($query->have_posts()) {
            $cached_posts = array();

            while ($query->have_posts()) {
                $query->the_post();
                $post_data = array(
                    'title' => get_the_title(),
                    'permalink' => get_permalink(),
                );
                $cached_posts[] = $post_data;
            }

            // Cache the data for 12 hours (12 hours * 60 minutes * 60 seconds)
            set_transient('latest_category_posts', $cached_posts, 12 * 60 * 60);

            // Reset the post data
            wp_reset_postdata();
        } else {
            // If no posts were found, set an empty array in the transient to avoid repeated queries
            set_transient('latest_category_posts', array(), 12 * 60 * 60);
        }
    }

    return $cached_posts;
}
