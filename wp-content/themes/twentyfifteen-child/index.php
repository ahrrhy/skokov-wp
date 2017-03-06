<?php 
    get_header();
?>


<?php if ( have_posts() ) : ?>
<?php
            // Start the loop.
            while ( have_posts() ) : the_post();
?>
<section class="about container" id="about">
    <div class="row">
        <h1 class="about-header text-center">We create quality designs.</h1>
        <p class="about-description text-center">We specialize in Web Design / Development and Graphic Design</p>
        <ul class="goods">
            <li class="col-xs-6 col-sm-3 col-sm-offset-0 col-md-2 col-md-offset-2 ico-cells">
                <div class="icoholder">
                    <div class="icon-on-goods">
                        <p class="text-center icon-description">redesigning with personality</p>
                        <p class="text-center desc">Lorem ipsum dolor sit amet,
                            consectetur.
                        </p>
                    </div>
                    <div class="goods-holder">
                        <img class="img-responsive goods-img" src="img/bog-post-img.png" alt="goods">
                        <p class="goods-describer">redesigning with personality</p>
                        <p class="link">in<a href="#" class="link-in">web design</a></p>
                    </div>
                </div>
            </li>
            <li class="col-xs-6  col-sm-3 col-md-2 col-md-offset-0 ico-cells">
                <div class="icoholder">
                    <div class="icon-on-goods">
                        <p class="text-center icon-description-second">redesigning with personality</p>
                        <p class="text-center desc">Lorem ipsum dolor sit amet,
                            consectetur.</p>
                    </div>
                    <div class="goods-holder">
                        <img class="img-responsive goods-img" src="img/bog-post-img.png" alt="goods">
                        <p class="goods-describer">redesigning with personality</p>
                        <p class="link">in<a href="#" class="link-in">web design</a></p>
                    </div>
                </div>
            </li>
            <li class="col-xs-6 col-sm-3 col-md-2 col-md-offset-0 ico-cells">
                <div class="icoholder">
                    <div class="icon-on-goods">
                        <p class="text-center icon-description-third">redesigning with personality</p>
                        <p class="text-center desc">Lorem ipsum dolor sit amet,
                            consectetur.
                        </p>
                    </div>
                    <div class="goods-holder">
                        <img class="img-responsive goods-img" src="img/bog-post-img.png" alt="goods">
                        <p class="goods-describer">redesigning with personality</p>
                        <p class="link">in<a href="#" class="link-in">web design</a></p>
                    </div>
                </div>
            </li>
            <li class="col-xs-6 col-sm-3 col-md-2 col-md-offset-0 ico-cells">
                <div class="icoholder">
                    <div class="icon-on-goods">
                        <p class="text-center icon-description-fourth">redesigning with personality</p>
                        <p class="text-center desc">Lorem ipsum dolor sit amet,
                            consectetur.</p>
                    </div>
                    <div class="goods-holder">
                        <img class="img-responsive goods-img" src="img/bog-post-img.png" alt="goods">
                        <p class="goods-describer">redesigning with personality</p>
                        <p class="link">in<a href="#" class="link-in">web design</a></p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
<?php
// End the loop.
            endwhile;

            // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
                'next_text'          => __( 'Next page', 'twentyfifteen' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
            ) );

        // If no content, include the "No posts found" template.
        else :
            get_template_part( 'content', 'none' );

        endif;
        ?>
<section class="portfolio container" id="portfolio">

    <div class="row">
        <h1 class="text-center portfolio-header"><span class="portfolio-header-span">our work</span></h1>
        <p class="portfolio-description text-center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
        <div class="portfolio-list masonry">
            <div class="portfolio-cells"><img src="img/portfolio-work-2.png" alt="work" class="img-responsive work"></div>
            <div class="portfolio-cells"><img src="img/portfolio-work-10.png" alt="work" class="img-responsive work"></div>
            <div class="portfolio-cells"><img src="img/portfolio-work-1.png" alt="work" class="img-responsive work"></div>
            <div class="portfolio-cells"><img src="img/portfolio-work-9.png" alt="work" class="img-responsive work"></div>
            <div class="portfolio-cells"><img src="img/portfolio-work-8.png" alt="work" class="img-responsive work"></div>
            <div class="portfolio-cells"><img src="img/portfolio-work-11.png" alt="work" class="img-responsive work"></div>
            <div class="portfolio-cells"><img src="img/portfolio-work-4.png" alt="work" class="img-responsive work"></div>
            <div class="portfolio-cells"><img src="img/portfolio-work-3.png" alt="work" class="img-responsive work"></div>
            <div class="portfolio-cells"><img src="img/portfolio-work-7.png" alt="work" class="img-responsive work"></div>
            <div class="portfolio-cells"><img src="img/portfolio-work-6.png" alt="work" class="img-responsive work"></div>
            <div class="portfolio-cells"><img src="img/portfolio-work-5.png" alt="work" class="img-responsive work"></div>
        </div>
    </div>
</section>
<section id="partners" class="partners container">

    <div class="row">
        <h1 class="partners-header"><span>our clients</span></h1>
        <p class="partners-description text-center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
        <ul class="slides col-xs-12" >
            <li class="slides-holder"><a><img src="img/client-1.png" alt="client" class="partner-logo img-responsive"></a></li>
            <li class="slides-holder"><a><img src="img/client-2.png" alt="client" class="partner-logo img-responsive"></a></li>
            <li class="slides-holder"><a><img src="img/client-3.png" alt="client" class="partner-logo img-responsive"></a></li>
            <li class="slides-holder"><a><img src="img/client-4.png" alt="client" class="partner-logo img-responsive"></a></li>
            <li class="slides-holder"><a><img src="img/client-5.png" alt="client" class="partner-logo img-responsive"></a></li>
            <li class="slides-holder"><a><img src="img/client-6.png" alt="client" class="partner-logo img-responsive"></a></li>
            <li class="slides-holder"><a><img src="img/client-7.png" alt="client" class="partner-logo img-responsive"></a></li>
            <li class="slides-holder"><a><img src="img/client-8.png" alt="client" class="partner-logo img-responsive"></a></li>
            <li class="slides-holder"><a><img src="img/client-1.png" alt="client" class="partner-logo img-responsive"></a></li>
        </ul>
    </div>
</section>

<?php
    get_footer();?>