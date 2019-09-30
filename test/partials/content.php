<?php
/**
 * Template part for displaying content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Test
 * @since 1.0
 * @version 1.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
} ?>

<div class="container">
<?php
if ( is_active_sidebar( 'about-us' ) ) {
	dynamic_sidebar( 'about-us' );
}

if ( is_active_sidebar( 'our-news' ) ) {
	dynamic_sidebar( 'our-news' );
} ?>
	<div class="clearfix"></div>
</div>
