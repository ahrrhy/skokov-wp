
<?php

    get_header();

    if(have_posts()) :
        while (have_posts()) : the_post(); ?>
            <article class="container post">
                <div class="row">
                    <h2 class="col"><?php the_title();?></h2>
                    <p><?php the_content(); ?></p>
                </div>
            </article>

   <?php endwhile;

    else :
        echo '<p>No content found</p>';
    endif;

    get_footer();
?>