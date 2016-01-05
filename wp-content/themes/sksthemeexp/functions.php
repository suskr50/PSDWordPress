<?php
/**
 * sksthemeexp functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sksthemeexp
 */

if ( ! function_exists( 'sksthemeexp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sksthemeexp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on sksthemeexp, use a find and replace
	 * to change 'sksthemeexp' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'sksthemeexp', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'sksthemeexp' ),
		'social' => esc_html__( 'Social Menu', 'sksthemeexp' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

/* add logo to Apperance -> Customize -> Site */
	// Create a custom image size for Site Logo.
add_image_size( 'mytheme-logo', 270, 200 );
 
// Declare theme support for Site Logo.
add_theme_support( 'site-logo', array(
    'size' => 'mytheme-logo',
) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	//add_theme_support( 'custom-background', apply_filters( 'sksthemeexp_custom_background_args', array(
	//	'default-color' => 'ffffff',
	//	'default-image' => '',
	//) ) );
}
endif;
add_action( 'after_setup_theme', 'sksthemeexp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sksthemeexp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sksthemeexp_content_width', 640 );
}
add_action( 'after_setup_theme', 'sksthemeexp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sksthemeexp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sksthemeexp' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
    'name'          => esc_html__('Footer Widgets', 'sksthemeexp' ),
    'description'   => __( 'Footer widgets area appears in the footer of the site.', 'my-simone' ),
    'id'            => 'sidebar-2',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h1 class="widget-title">',
    'after_title'   => '</h1>',
) );

}
add_action( 'widgets_init', 'sksthemeexp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sksthemeexp_scripts() {
	wp_enqueue_style( 'sksthemeexp-style', get_stylesheet_uri() );
wp_enqueue_style( 'sksthemeexp-layout-style' , get_template_directory_uri() . '/layouts/content-sidebar.css');
                

wp_enqueue_style( 'sksthemeexp-style' , get_template_directory_uri() . '/layouts/content-sidebar.css');
                
 
wp_enqueue_style( 'sksthemeexp-google-fonts', 'http://fonts.googleapis.com/css?family=Lato:100,300,400,400italic,700,900,900italic|PT+Serif:400,700,400italic,700italic' );
                    
// FontAwesome
wp_enqueue_style('sksthemeexp_fontawesome', 'http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css');
                
	wp_enqueue_script( 'sksthemeexp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'sksthemeexp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sksthemeexp_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
