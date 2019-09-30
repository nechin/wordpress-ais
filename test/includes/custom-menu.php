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
 * Class Test_Theme_Walker_Nav_Menu
 */
class Test_Theme_Walker_Nav_Menu extends Walker_Nav_Menu {
	// add main/sub classes to li's and links
	function start_el( &$output, $item, $depth = 0, $args = [], $id = 0 ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
		} else {
			$t = "\t";
		}
		$indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

		// build html
		$output .= $indent . '<li>';

		// link attributes
		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
		$class      = $item->url == get_permalink() || trim( $item->url, '/' ) == site_url() && is_front_page() ? 'active' : '';
		$class      .= trim( $item->url, '/' ) == site_url( 'contact' ) ? ' contact_btn' : '';
		$attributes .= $class ? ' class="' . $class . '"' : '';

		$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
			$args->before,
			$attributes,
			$args->link_before,
			apply_filters( 'the_title', $item->title, $item->ID ),
			$args->link_after,
			$args->after
		);

		// build html
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/**
 * Render menu
 *
 * @param $menu_id
 */
function test_theme_nav_menu( $menu_id ) {
	// main navigation menu
	$args = [
		'theme_location'  => 'top',
		'container'       => 'nav',
		'container_id'    => 'top-navigation-primary',
		'container_class' => 'top-navigation',
		'menu_class'      => 'menu main-menu menu-depth-0 menu-even',
		'echo'            => true,
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 10,
		'menu_id'         => $menu_id,
		'walker'          => new Test_Theme_Walker_Nav_Menu
	];

	// print menu
	wp_nav_menu( $args );
}
