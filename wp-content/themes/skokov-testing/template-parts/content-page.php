<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package skokov-testing
 */

?>

<article  id="post-<?php the_ID(); ?>" <?php post_class('container'); ?>>
	<header class="entry-header ">
        <h1 class="entry-title ">
            <?php the_title(); ?>
        </h1>
    </header><!-- .entry-header -->

	<div class="entry-content row">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'skokov-testing' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer row">
            <?php

            ?>

		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
