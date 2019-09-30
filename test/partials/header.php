<?php
/**
 * Template part for displaying header content
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

<header>
    <div class="container">
        <div class="logo">
            <a href="<?php echo site_url() ?>" title="">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logo.png" alt="">
            </a>
        </div><!--logo end-->
        <div class="contact-info">
            <h3>+360 690 67 89</h3>
        </div><!--contact-info end-->
        <div class="menu-btn">
            <a href="#" title="">
                <span class="bar1"></span>
                <span class="bar2"></span>
                <span class="bar3"></span>
            </a>
        </div><!--menu-btn end-->
        <div class="clearfix"></div>
    </div>
</header><!--header end-->
