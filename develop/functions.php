<?php
/**
 * barkbites functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package barkbites
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
function barkbites_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on barkbites, use a find and replace
		* to change 'barkbites' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'barkbites', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'barkbites' ),
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
			'barkbites_custom_background_args',
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
add_action( 'after_setup_theme', 'barkbites_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function barkbites_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'barkbites_content_width', 640 );
}
add_action( 'after_setup_theme', 'barkbites_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function barkbites_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'barkbites' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'barkbites' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'barkbites_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function barkbites_scripts() {
    wp_enqueue_style('barkbites-style', get_template_directory_uri() . '/style.css', '', _S_VERSION);
    wp_enqueue_script('barkbites-app-js', get_template_directory_uri() . '/scripts/site/app.min.js', array(), _S_VERSION, true);

	/* Splide */
	wp_enqueue_style('splide-css', get_template_directory_uri() . '/assets/css/splide.min.css', '', _S_VERSION);
    wp_enqueue_script('splide-js', get_template_directory_uri() . '/scripts/lib/splide.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('splide-config-js', get_template_directory_uri() . '/scripts/site/splide-config.min.js', array('splide-js'), _S_VERSION, true);
	
}
add_action('wp_enqueue_scripts', 'barkbites_scripts');


/* Make styles available in the block editor */
function mytheme_enqueue_block_editor_assets() {
	wp_enqueue_style('davidmcdonagh-block-editor-style', get_template_directory_uri() . '/style.css', '', _S_VERSION);
}
add_action( 'enqueue_block_editor_assets', 'mytheme_enqueue_block_editor_assets' );

/**
 * Register ACF Blocks
 */
function mytheme_register_all_blocks() {
    $block_directories = glob(get_template_directory() . "/blocks/*", GLOB_ONLYDIR);

    foreach ($block_directories as $block) {
        register_block_type($block);
    }
}
add_action('init', 'mytheme_register_all_blocks');

/**
 * ACF fields
 */
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    

    // update path
    $path = ABSPATH . '../develop/acf-json';

    // return
    return $path;
}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    
    // append path
    $paths[] = ABSPATH . '../develop/acf-json';
    $paths[] = get_template_directory() . '/acf-json';
    
    
    // return
    return $paths;
    
}

/**
 * Allow svgs
 */
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
  }
  
  add_filter('upload_mimes', 'cc_mime_types');


  /* Add woocommerce support */
  add_theme_support( 'woocommerce' );

  function get_acf($key, $post_id = null) {
    $field = get_field_object($key, $post_id);
    if (!$field) {
        return ''; // Return empty if the field doesn't exist
    }
    $value = $field['value'];
    $type = $field['type'];

    switch ($type) {
        case 'text':
        case 'textarea':
        case 'select':
            return esc_html($value);
        case 'url':
        case 'email':
        case 'image':
        case 'file':
            return esc_url($value);
        case 'wysiwyg':
            return wp_kses_post($value);
        case 'number':
        case 'range':
            return is_numeric($value) ? $value : 0;  // Ensure it's a number.
        default:
            return esc_html($value);  // Safe fallback for any unclassified types.
    }
}

// ADD ACF OPTIONS PAGE
if( function_exists('acf_set_options_page_title') )
{
    acf_add_options_page('Theme Options');
}

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
