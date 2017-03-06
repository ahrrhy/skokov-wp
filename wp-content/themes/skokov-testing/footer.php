<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package skokov-testing
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class=" site-footer container" role="contentinfo">

        <section class="row footer-widget-area">
            <div class="col-sm-4"><?php if (is_active_sidebar('first-footer-area')){
                    dynamic_sidebar('first-footer-area');
                }; ?>
            </div>
            <div class="col-sm-4"><?php if (is_active_sidebar('second-footer-area')){
                    dynamic_sidebar('second-footer-area');
                }; ?>
            </div>
            <div class="col-sm-4"><?php if (is_active_sidebar('third-footer-area')){
                    dynamic_sidebar('third-footer-area');
                }; ?>
            </div>



        </section>

		<div class="row site-info">
            <p class="copyright col-sm-6"><?php echo get_theme_mod('copyright_textbox'); ?></p>
            <div class="col-sm-6 footer-menu">
                <?php wp_nav_menu( array( 'theme_location' => 'Footer Menu', 'container' => '', 'container_class' => '', 'menu_id' => 'footer-menu', 'menu_class' => 'custom-footer-menu' ) ); ?>
            </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
