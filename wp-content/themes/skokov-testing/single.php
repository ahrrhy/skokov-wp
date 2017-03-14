<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package skokov-testing
 */

get_header(); ?>

	<div id="primary" class="content-area">
            <main id="main" class="col-sm-8 site-main blog-site-main" role="main">
                <?php
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content', get_post_format() );
                    if (! is_single()){
                        the_post_navigation();
                    }
                ?>
                <?php dynamic_sidebar( 'share-widget' ); ?>
                <?php dynamic_sidebar( 'related-widget' ); ?>
                <?php  // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    endwhile; // End of the loop. ?>
            </main><!-- #main -->

	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
