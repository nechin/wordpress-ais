<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Test
 * @since 1.0
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

get_template_part( 'partials/content' );
?>
<div class="container">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

			<?php
			// Show the selected front page content.
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'partials/single' );
				endwhile;
			else :
				?>
                <section class="no-results not-found">
                    <header class="page-header">
                        <h1 class="page-title"><?php _e( 'Nothing Found', 'test' ); ?></h1>
                    </header>
                </section>
			<?php
			endif;
			?>

        </main><!-- #main -->
    </div><!-- #primary -->
    <div class="clearfix"></div>
</div>

<?php
get_footer();
