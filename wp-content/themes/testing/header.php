<!DOCTYPE html>
<html <?php language_attributes();?>>
    <header>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width">
        <title><?php bloginfo('name'); ?></title>
        <?php wp_head();?>
    </header>
    <body <?php body_class(); ?> >

        <header class="container site-header">
            <nav class="navbar navbar-toggleable-md navbar-light row justify-content-between site-nav ">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="col">
                    <?php show_easylogo(); ?>
                </div>

                <?php
                        $args = array(
                            'theme_location' => 'primary',
                            'menu'            => '',
                            'container'       => 'div',
                            'container_class' => 'collapse navbar-collapse col',
                            'container_id'    => 'navbarSupportedContent',
                            'menu_class'      => 'row custom-menu',
                            'menu_id'         => '',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth'           => 0,
                            'walker'          => '',
                        );
                        wp_nav_menu($args);

                ?>
            </nav>

        </header>


