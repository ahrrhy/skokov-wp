<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package skokov-testing
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
            the_post_thumbnail('', array( 'src' => $src,
                'class' => "header-img img-responsive",
                'alt' => trim(strip_tags( $wp_postmeta->_wp_attachment_image_alt )),));
			the_title( '<h1 class="entry-title single-article-header"> <span class="header-description arrow_box">', '</span></h1>' );
		else :
			the_title( '<h2 class="entry-title arrow_box"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		    <?php if(is_single()) : ?>
                <div class="entry-meta header-info">
			        <?php skokov_testing_posted_on(); ?>
                </div><!-- .entry-meta -->
            <?php else: ?>
                <div class="entry-meta">
                    <?php skokov_testing_posted_on(); ?>
                </div><!-- .entry-meta -->
            <?php endif; ?>
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'skokov-testing' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

            if(! is_single() ){
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'skokov-testing' ),
                    'after'  => '</div>',
                ) );
            }
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php skokov_testing_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
