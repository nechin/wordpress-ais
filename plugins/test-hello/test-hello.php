<?php
/**
 * Plugin Name: Test hello (test plugin)
 * Plugin URI: http://vitkalov.ru/
 * Description: This is the test plugin that show text "Hello World!" on front page with text color, depending on the time of day
 * Author: Alexander Vitkalov <nechin.va@gmail.com>
 * Version: 1.0.0
 * Author URI: http://vitkalov.ru
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Hello_Plugin' ) ) {
	define( 'TH_PLUGIN_PATH', __FILE__ );
	define( 'TH_PLUGIN_DIR', dirname( TH_PLUGIN_PATH ) );
	define( 'TH_PLUGIN_URL', plugins_url( null, TH_PLUGIN_PATH ) );
	define( 'TH_PLUGIN_BASE', plugin_basename( dirname( TH_PLUGIN_PATH ) ) );
	define( 'TH_PLUGIN_DIR_INCLUDES', TH_PLUGIN_DIR . '/includes' );
	require_once TH_PLUGIN_DIR_INCLUDES . '/class-hello-plugin.php';
}
try {
	$th_base = Hello_Plugin::instance();
	$th_base->run();
} catch ( Exception $e ) {
	exit( $e->getMessage() );
}

/**
 * Get the instance
 *
 * @return \Hello_Plugin|null
 */
function th() {
	return Hello_Plugin::instance();
}
