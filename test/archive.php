<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
<?php if ( have_posts() ) : ?>
    <header class="page-header">
		<?php
		the_archive_title( '<h1 class="page-title">', '</h1>' );
		the_archive_description( '<div class="taxonomy-description">', '</div>' );
		?>
    </header><!-- .page-header -->
<?php endif; ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) :
				?>
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					get_template_part( 'partials/single' );
				endwhile;

				the_posts_pagination(
					[
						'prev_text'          => '<span>' . __( 'Previous page', 'test' ) . '</span>',
						'next_text'          => '<span>' . __( 'Next page', 'test' ) . '</span>',
						'before_page_number' => '<span>' . __( 'Page', 'test' ) . ' </span>',
					]
				);

			else : ?>

                <div class="page-title"><?php _e( 'Nothing Found', 'test' ); ?></div>

			<?php
			endif;
			?>

        </main><!-- #main -->
    </div><!-- #primary -->
    <div class="clearfix"></div>
</div>
<?php
get_footer();
