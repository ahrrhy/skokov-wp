<?php
/*
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package skokov-testing
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'skokov-testing' ); ?></a>

        <header id="masthead" class="site-header container" role="banner">
                <div class="site-branding-hide site-branding">

                    <?php
                    if ( is_front_page() && is_home() ) : ?>
                        <h1 class="site-title" ><?php bloginfo( 'name' ); ?></h1>
                    <?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                        <?php
                    endif;

                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                        <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                        <?php
                    endif; ?>
                </div><!-- .site-branding -->

                <nav id="site-navigation" class="row main-navigation" role="navigation">
                    <!-- Logo -->
                    <h1 class="col-sm-6 logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php the_header_image_tag(); ?></a></h1>
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'skokov-testing' ); ?></button>
                    <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'container' => '', 'container_class' => 'col-sm-6', 'menu_id' => 'primary-menu', 'menu_class'      => 'custom-menu' ) ); ?>
                </nav><!-- #site-navigation -->

        </header><!-- #masthead -->

        <div id="content" class="container site-content">
            <h1 class="row page-title" style="background: url(' <?php echo get_theme_mod('img-upload'); ?>') 0 0/100% no-repeat ;" >
                <span class="word-bg"><?php wp_title('');; ?></span>
            </h1>