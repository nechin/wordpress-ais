<?php
/**
 * Test Child Theme functions and definitions
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
 * Enqueues scripts and styles.
 */
function test_child_theme_scripts() {
	// Theme stylesheets
	wp_enqueue_style( 'test-child-theme-style', get_theme_file_uri( '/assets/css/style-child.css' ) );
	test_theme_scripts();
}

add_action( 'wp_enqueue_scripts', 'test_child_theme_scripts' );
