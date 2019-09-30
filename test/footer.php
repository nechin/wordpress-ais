<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Test
 * @since 1.0
 * @version 1.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
} ?>
        </section><!--main-content end-->

        <footer>
            <div class="container">
                <div class="ft-logo">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logo.png" alt="">
                </div><!--ft-logo end-->
                <div class="clearfix"></div>
            </div>
        </footer><!--footer end-->

    </div><!--theme-layout end-->

<?php wp_footer(); ?>
</body>
</html>
