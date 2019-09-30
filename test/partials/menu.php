<?php
/**
 * Template part for displaying menu
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

<section class="navi-sec">
    <div class="container">
        <?php the_widget( 'Search_Widget' ); ?>

        <?php test_theme_nav_menu('top-menu'); ?>
        <div class="clearfix"></div>
    </div>
</section><!--navi-sec end-->
