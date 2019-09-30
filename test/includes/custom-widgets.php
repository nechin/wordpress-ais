<?php
/**
 * Register widgets area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Init sidebars
 */
function test_widgets_init() {
	register_sidebar(
		[
			'name'          => __( 'About Us', 'test' ),
			'id'            => 'about-us',
			'description'   => __( 'Add widgets here to show About Us text', 'test' ),
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
			'before_widget' => '<div class="about-us">',
			'after_widget'  => '</div>'
		]
	);

	register_sidebar(
		[
			'name'          => __( 'News', 'test' ),
			'id'            => 'our-news',
			'description'   => __( 'Add widgets here to show news', 'test' ),
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
			'before_widget' => '<div class="blog-section">',
			'after_widget'  => '</div>'
		]
	);
}

add_action( 'widgets_init', 'test_widgets_init' );

/**
 * Class About_Us_Widget
 */
class About_Us_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'about',  // Base ID
			__( 'About Us', 'test' )   // Name
		);

		add_action( 'widgets_init', function () {
			register_widget( 'About_Us_Widget' );
		} );
	}

	public $args = [
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'before_widget' => '<div class="about-us">',
		'after_widget'  => '</div>'
	];

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		echo '<p>';
		echo $instance['text'];
		echo '</p>';

		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$text  = ! empty( $instance['text'] ) ? $instance['text'] : '';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:',
					'test' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
			       value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'Text' ) ); ?>"><?php echo esc_html__( 'Text:',
					'test' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"
			          name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" cols="30"
			          rows="10"><?php echo esc_attr( $text ); ?></textarea>
		</p>
		<?php

	}

	public function update( $new_instance, $old_instance ) {
		$instance = [];

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['text']  = ( ! empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';

		return $instance;
	}
}

$about_us_widget = new About_Us_Widget();

/**
 * Class News_Widget
 */
class News_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'news',  // Base ID
			__( 'News List', 'test' )   // Name
		);

		add_action( 'widgets_init', function () {
			register_widget( 'News_Widget' );
		} );
	}

	public $args = [
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'before_widget' => '<div class="blog-section">',
		'after_widget'  => '</div>'
	];

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		echo '<div class="blog-posts">';

		$count = $instance['count'] ?: 1;
		$arguments  = [
			'post_type'      => TEST_THEME_NEWS_POST_TYPE,
			'post_status'    => 'publish',
			'posts_per_page' => $count,
			'order'          => 'ASC'
		];
		$posts = new WP_Query( $arguments );
		if ( $posts->have_posts() ) {
			while ( $posts->have_posts() ) {
				$posts->the_post();
				$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'test-theme-thumbnail' );
				echo '<div class="blog-post">';
				echo '<div class="post-img">';
				echo '<img src="' . esc_url( $thumbnail[0] ) . '" alt="">';
				echo '</div>';

				echo '<div class="post-info">';
				echo '<span class="posted-date">' . get_the_date( 'd, l Y' ) . '</span>';
				echo '<p>' . esc_html( get_the_content() ) . '</p>';
				echo '</div>';
				echo '</div>';
			}
		}
		wp_reset_query();

		echo '</div>';

		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$count = ! empty( $instance['count'] ) ? $instance['count'] : '';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:',
					'test' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
			       value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'Count' ) ); ?>"><?php echo esc_html__( 'Record count:',
					'test' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $count ); ?>">
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = [];

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['count'] = ( ! empty( $new_instance['count'] ) ) ? $new_instance['count'] : '';

		return $instance;
	}
}

$news_widget = new News_Widget();

/**
 * Class Search_Widget
 */
class Search_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'search',  // Base ID
			__( 'Search Form', 'test' )   // Name
		);

		add_action( 'widgets_init', function () {
			register_widget( 'Search_Widget' );
		} );
	}

	public $args = [
		'before_title'  => '',
		'after_title'   => '',
		'before_widget' => '',
		'after_widget'  => ''
	];

	public function widget( $args, $instance ) {
		echo '<form class="search_form">';
		echo '<input type="text" name="search" placeholder="' . __( 'Search', 'test' ) . '">';
		echo '</form>';
	}

	public function form( $instance ) {
	}

	public function update( $new_instance, $old_instance ) {
		return [];
	}
}

$search_widget = new Search_Widget();
