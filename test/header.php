<?php
/**
 * The header for this theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Test
 * @since 1.0
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
} ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="theme-layout">

	<?php
	get_template_part( 'partials/header' );

	if ( ! is_404() ) {
		get_template_part( 'partials/menu' );
	}

	if ( is_front_page() ) {
		get_template_part( 'partials/slider' );
	}
	?>

    <section class="main-content">