<?php

    // Adding Bootstrap 4
    function load_bootstrap(){
        wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/libs/jquery/dist/jquery.min.js');
        wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/libs/bootstrap/dist/js/bootstrap.min.js');
        wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/stylesheets/libs.min.css');
    }
    add_action('wp_enqueue_scripts', 'load_bootstrap');

    // Adding tether
    function load_tether(){
        wp_enqueue_script('tether-js', get_template_directory_uri().'/libs/tether/dist/js/tether.min.js');
        wp_enqueue_style('tether-css', get_template_directory_uri().'/libs/tether/dist/css/tether.min.css');
        wp_enqueue_style('tether-theme-arrows', get_template_directory_uri().'/libs/tether/dist/css/tether-theme-arrows.min.css');
        wp_enqueue_style('tether-theme-arrows-dark', get_template_directory_uri().'/libs/tether/dist/css/tether-theme-arrows-dark.min.css');
        wp_enqueue_style('tether-theme-basic', get_template_directory_uri().'/libs/tether/dist/css/tether-theme-basic.min.css');
    }

    // Adding CSS
    function skokov_resources(){
        wp_enqueue_style('style', get_template_directory_uri().'/stylesheets/style.css');
        wp_enqueue_script('common', get_template_directory_uri().'/js/common.js');
    }
    add_action('wp_enqueue_scripts', 'skokov_resources');

    // Navigation Menus
        register_nav_menus(array(
           'primary' => __( 'Primary Menu' ),
            'footer' => __( 'Footer Menu' ),
        ));


    /*
     * Adding custom settings on wp-admin
     */
    add_action('admin_menu', function(){
        add_theme_page('Настроить', 'Настроить', 'edit_theme_options', 'customize.php');
    });
    /*
     * Add sections, parameters, and controls on admin
     */
    add_action('customize_register', function($customizer){
        $customizer -> add_section(
            'example_section_one',
            array(
                'title' => 'Мои настройки',
                'description' => 'Секция-пример',
                'priority' => 35,
            )
        );
        $customizer -> add_setting(
            'copyright_textbox',
            array('default' => 'Моя компания')
        );
        $customizer->add_control(
            'copyright_textbox',
            array(
                'label' => 'Текст копирайта',
                'section' => 'example_section_one',
                'type' => 'text',
            )
        );
    });
?>