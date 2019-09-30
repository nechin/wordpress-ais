<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Test
 * @since 1.0
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<div class="container">
    <div class="wrap">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					get_template_part( 'partials/single' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					the_post_navigation(
						[
							'prev_text' => '<span>' . __( 'Previous', 'test' ) . '</span>',
							'next_text' => '<span>' . __( 'Next', 'test' ) . '</span>',
						]
					);

				endwhile; // End of the loop.
				?>

            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .wrap -->
    <div class="clearfix"></div>
</div>
<?php
get_footer();
