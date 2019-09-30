<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Test Hello Plugin class
 *
 * @author Alexander Vitkalov <nechin.va@gmail.com>
 * @copyright (c) 28.09.2019, Vitkalov
 * @version 1.0
 */
class Hello_Plugin {
	/**
	 * @var null
	 */
	protected static $_instance = null;
	/**
	 * @var null
	 */
	public $hooks = null;

	/**
	 * Hello_Plugin constructor.
	 */
	public function __construct() {
		$this->includes();
		$this->hooks = new Hello_Hooks();
		$this->bind_hooks();
	}

	/**
	 * Get instance
	 *
	 * @return Hello_Plugin|null
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Include files
	 */
	private function includes() {
		require_once TH_PLUGIN_DIR_INCLUDES . '/class-hello-hooks.php';
	}

	/**
	 * Bind hooks
	 */
	private function bind_hooks() {
		add_action( 'wp_enqueue_scripts', [ $this->hooks, 'enqueue_scripts' ] );

		// TODO использовать другой хук, чтобы не было дублей для списка записей
		add_filter( 'the_content', [ $this->hooks, 'the_content' ] );
	}

	/**
	 * Run execution
	 */
	public function run() {
	}

}
