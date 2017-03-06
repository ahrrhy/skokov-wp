
<?php

/*
Template Name: Blog Template
*/

/**
 * Template part for displaying blog content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package skokov-testing
 */

?>

    <?php the_post_thumbnail(); ?>
    <article  id="post-<?php the_ID(); ?>" <?php post_class(' news-description-holder'); ?>>

        <header class="entry-header ">
            <?php
                if ( is_single() ) :
                    the_title( '<h1 class="entry-title">', '</h1>' );
                else :
                    the_title( '<h2 class="entry-title news-header arrow_box"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                endif;
                 ?>
        </header><!-- .entry-header -->

        <div class="entry-content news-description ">

               <?php
               the_excerpt(); ?>


            <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'skokov-testing' ),
                'after'  => '</div>',
            ) );
            ?>
        </div><!-- .entry-content -->

        <?php if ( get_edit_post_link() ) : ?>
            <footer class="entry-footer">
                <p class="meta-info">
                    <a href="#" class="fa fa-heart" aria-hidden="true"></a>5
                    <span>
                        by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
                    / <a href="<?php the_permalink() ?>#comments">
                        <?php comments_number('0 comments', '1 comments', '% comments'); ?>
                    </a>
                    / <?php the_time('M. d, Y'); ?>
                    </span>
                </p>
            </footer><!-- .entry-footer -->
        <?php endif; ?>
    </article><!-- #post-## -->
