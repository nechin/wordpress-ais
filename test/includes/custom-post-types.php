<?php
/**
 * Register custom post types.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * News post type
 */
define( 'TEST_THEME_NEWS_POST_TYPE', 'news' );

function test_theme_custom_news(){
	register_post_type(TEST_THEME_NEWS_POST_TYPE, array(
		'labels'             => array(
			'name'               => __( 'News', 'test' ),
			'singular_name'      => __( 'One News', 'test' ),
			'add_new'            => __( 'Add New', 'test' ),
			'add_new_item'       => __( 'Add News', 'test' ),
			'edit_item'          => __( 'Edit News', 'test' ),
			'new_item'           => __( 'New News', 'test' ),
			'view_item'          => __( 'View News', 'test' ),
			'search_items'       => __( 'Search News', 'test' ),
			'not_found'          => __( 'News Not Found', 'test' ),
			'not_found_in_trash' => __( 'News Not Found in Trash', 'test' ),
			'parent_item_colon'  => '',
			'menu_name'          => __( 'News', 'test' )

		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
	) );
}

add_action('init', 'test_theme_custom_news');
