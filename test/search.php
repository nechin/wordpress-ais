<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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

        <header class="page-header">
			<?php if ( have_posts() ) : ?>
                <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'test' ),
						'<span>' . get_search_query() . '</span>' ); ?></h1>
			<?php else : ?>
                <h1 class="page-title"><?php _e( 'Nothing Found', 'test' ); ?></h1>
			<?php endif; ?>
        </header><!-- .page-header -->

        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

				<?php
				if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						get_template_part( 'partials/single' );

					endwhile; // End of the loop.

					the_posts_pagination(
						[
							'prev_text'          => '<span>' . __( 'Previous page', 'test' ) . '</span>',
							'next_text'          => '<span>' . __( 'Next page', 'test' ) . '</span>',
							'before_page_number' => '<span>' . __( 'Page', 'test' ) . ' </span>',
						]
					);

				else :
					?>

                    <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.',
							'test' ); ?></p>
					<?php
					get_search_form();

				endif;
				?>

            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .wrap -->
    <div class="clearfix"></div>
</div>

<?php
get_footer();
