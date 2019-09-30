<?php
/**
 * Test Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Test
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function test_theme_setup() {
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'test', get_template_directory() . '/languages' );

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

	add_image_size( 'test-theme-featured-image', 2000, 1200, true );

	add_image_size( 'test-theme-thumbnail', 196, 107, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
		[
			'top' => __( 'Top Menu', 'test' ),
		]
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		[
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		]
	);

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support(
		'post-formats',
		[
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		]
	);

	// Add theme support for Custom Logo.
	add_theme_support(
		'custom-logo',
		[
			'width'      => 200,
			'height'     => 200,
			'flex-width' => true,
		]
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = [
		// Default to a static front page and assign the front and posts pages.
		'options'   => [
			'show_on_front'  => 'page',
			'page_on_front'  => '{{home}}',
			'page_for_posts' => '{{blog}}',
		],

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => [
			// Assign a menu to the "top" location.
			'top' => [
				'name'  => __( 'Top Menu', 'test' ),
				'items' => [
					'link_home',
					'page_about',
					'page_contact',
				],
			],
		],
	];
}

add_action( 'after_setup_theme', 'test_theme_setup' );

/**
 * Enqueues scripts and styles.
 */
function test_theme_scripts() {
	// Theme stylesheets
	wp_enqueue_style( 'test-theme-bootstrap', get_theme_file_uri( '/assets/css/bootstrap.min.css' ) );
	wp_enqueue_style( 'test-theme-slick', get_theme_file_uri( '/assets/css/slick.css' ) );
	wp_enqueue_style( 'test-theme-slick-theme', get_theme_file_uri( '/assets/css/slick-theme.css' ) );
	wp_enqueue_style( 'test-theme-style', get_theme_file_uri( '/assets/css/style.css' ) );
	wp_enqueue_style( 'test-theme-responsive', get_theme_file_uri( '/assets/css/responsive.css' ) );

	// Theme scripts
	wp_enqueue_script( 'test-theme-jquery', get_theme_file_uri( '/assets/js/jquery.min.js' ), [], false, true );
	wp_enqueue_script( 'test-theme-popper', get_theme_file_uri( '/assets/js/popper.js' ), [], false, true );
	wp_enqueue_script( 'test-theme-bootstrap', get_theme_file_uri( '/assets/js/bootstrap.min.js' ), [], false, true );
	wp_enqueue_script( 'test-theme-slick', get_theme_file_uri( '/assets/js/slick.js' ), [], false, true );
	wp_enqueue_script( 'test-theme-script', get_theme_file_uri( '/assets/js/script.js' ), [], false, true );
}

add_action( 'wp_enqueue_scripts', 'test_theme_scripts' );

/**
 * Test short code
 *
 * @param $atts
 *
 * @return string
 */
function test_short_code( $atts ){
	return '<div class="test-shortcode">Hello Wordl!</div>';
}
add_shortcode('test_shortcode', 'test_short_code');

/**
 * Implement the Custom Post types.
 */
require get_parent_theme_file_path( '/includes/custom-post-types.php' );

/**
 * Implement the Custom Widgets.
 */
require get_parent_theme_file_path( '/includes/custom-widgets.php' );

/**
 * Implement the Custom Menu.
 */
require get_parent_theme_file_path( '/includes/custom-menu.php' );
