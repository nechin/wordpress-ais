<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Hooks class
 *
 * @author Alexander Vitkalov <nechin.va@gmail.com>
 * @copyright (c) 28.09.2019, Vitkalov
 * @version 1.0
 */
class Hello_Hooks {
	/**
	 * Hello_Hooks constructor.
	 */
	public function __construct() {
	}

	/**
	 * Enqueue css style on front page
	 */
	public function enqueue_scripts(  ) {
		if ( is_front_page() ) {
			wp_enqueue_style( 'test-hello', TH_PLUGIN_URL . '/assets/css/style.css' );
		}
	}

	/**
	 * Show the post content filter
	 *
	 * @param $content
	 *
	 * @return string
	 */
	public function the_content( $content ) {
		if ( is_front_page() ) {
			$class = 'evening';
			$hours = date( 'H', current_time( 'timestamp' ) );

			if ( $hours > 10 && $hours < 17 ) {
				$class = 'day';
			} elseif ( $hours > 22 || $hours < 6 ) {
				$class = 'night';
			}
			$content = '<span class="hello-block hello-text-' . $class . '">Hello World!</span> ' . $content;
		}

		return $content;
	}

}
