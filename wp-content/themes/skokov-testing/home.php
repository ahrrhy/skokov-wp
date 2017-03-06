<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package skokov-testing
 */

get_header(); ?>

    <div id="primary" class="col-sm-8 content-area">
        <main id="main" class=" site-main blog-site-main" role="main">

            <ul class="row grid news-list">

                <!-- Cite -->
                <li class="col-sm-6 grid-sizer"></li>
                <li class="col-sm-6 cite-item grid-item ability">
                    <p class="cite-text"><?php echo get_theme_mod('cite_textbox'); ?>

                    </p>
                    <span class="cite-author">
                            <?php echo get_theme_mod('cite_author_textbox'); ?>
                        </span>
                </li>
                <!-- All Posts -->

            <?php
                while ( have_posts() ) : the_post();
            ?>
                <li class="col-sm-6 grid-item news-post minus-left-padding minus-right-padding">
                    <?php get_template_part( 'template-parts/content', 'blog' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

                    ?>

                </li>
            <?php
                endwhile; // End of the loop.
            ?>
            </ul>
            <div class="row text-center pagination-wrap"><?php  my_pagenavi(); ?></div>
        </main><!-- #main -->

    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script>
$('.grid').masonry({
            // set itemSelector so .grid-sizer is not used in layout
            itemSelector: '.grid-item',
            // use element for option
            columnWidth: '.grid-sizer',
            percentPosition: true
        });
    </script>