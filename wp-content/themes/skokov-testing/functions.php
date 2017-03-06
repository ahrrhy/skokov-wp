<?php
/*
 * skokov-testing functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package skokov-testing
 */

if ( ! function_exists( 'skokov_testing_setup' ) ) :
/*
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function skokov_testing_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on skokov-testing, use a find and replace
	 * to change 'skokov-testing' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'skokov-testing', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'skokov-testing' ),
        'Footer Menu' => esc_html__('Footer Menu', 'skokov-testing')
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'skokov_testing_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'skokov_testing_setup' );

/*
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function skokov_testing_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'skokov_testing_content_width', 640 );
}
add_action( 'after_setup_theme', 'skokov_testing_content_width', 0 );

/*
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function skokov_testing_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'skokov-testing' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'skokov-testing' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="aside-section-header">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'skokov_testing_widgets_init' );

/*
 * Enqueue scripts and styles.
 */
// Отключаем jQuery WordPress
function jquery_another_version() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_stylesheet_directory_uri() .'/libs/jquery/dist/jquery.min.js', array(), '');
}

add_action( 'wp_enqueue_scripts', 'jquery_another_version' );

function skokov_testing_scripts() {
	wp_enqueue_style( 'skokov-testing-style', get_stylesheet_uri() );

	wp_enqueue_script( 'skokov-testing-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'skokov-testing-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );


    wp_enqueue_script('jq-js', get_template_directory_uri().'/libs/jquery/dist/jquery.min.js');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/libs/bootstrap/dist/js/bootstrap.min.js');
    wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/libs/bootstrap/dist/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-themes-css', get_template_directory_uri().'/libs/bootstrap/dist/css/bootstrap-theme.min.css');


    wp_enqueue_style('my-style', get_template_directory_uri().'/stylesheets/style.css', 'true');
    wp_enqueue_script('common', get_template_directory_uri().'/js/common.js');


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skokov_testing_scripts' );


/**
 * Adding custom settings
 */
add_action('customize_register', function($customizer){
    $customizer->add_section(
        'example_section_one',
        array(
            'title' => 'My',
            'description' => 'Секция-пример',
            'priority' => 35,
        )
    );
    $customizer->add_setting(
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
});  /* Usage = <?php echo get_theme_mod('copyright_textbox'); ?> */
add_action('customize_register', function($header_bg){
    $header_bg->add_setting('img-upload');
    $header_bg->add_control(
    new WP_Customize_Image_Control(
        $header_bg,
        'img-upload',
        array(
            'label' => 'Загрузка изображения',
            'section' => 'example_section_one',
            'settings' => 'img-upload'
        )
    )
);
}); /* Usage = inline style url <?php echo get_theme_mod('img-upload'); ?> */
add_action('customize_register', function($cite){
    $cite->add_section(
        'example_section_one',
        array(
            'title' => 'My',
            'description' => 'Секция-пример',
            'priority' => 35,
        )
    );
    $cite->add_setting(
        'cite_textbox',
        array('default' => 'Cite')
    );
    $cite->add_control(
        'cite_textbox',
        array(
            'label' => 'Cite text',
            'section' => 'example_section_one',
            'type' => 'text',
        )
    );
});
add_action('customize_register', function($cite_author){
    $cite_author->add_section(
        'example_section_one',
        array(
            'title' => 'My',
            'description' => 'Секция-пример',
            'priority' => 35,
        )
    );
    $cite_author->add_setting(
        'cite_author_textbox',
        array('default' => 'Cite')
    );
    $cite_author->add_control(
        'cite_author_textbox',
        array(
            'label' => 'Cite Author',
            'section' => 'example_section_one',
            'type' => 'text',
        )
    );
});


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/*
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function font_awesome() {
    if (!is_admin()) {
        wp_register_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css');
        wp_enqueue_style('font-awesome');
    }
}
add_action('wp_enqueue_scripts', 'font_awesome');

// Add Pagination
function my_pagenavi() {
    global $wp_query;
    $big = 999999999; // уникальное число для замены
    $args = array(
        'base'    => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format'  => '',
        'current' => max( 1, get_query_var('paged') ),
        'total'   => $wp_query->max_num_pages,
        'type' => 'list',
        'prev_text' => 'Prev',
        'next_text' => 'Next',
        'end_size' => 1,
        'mid_size' => 2
    );
    $result = paginate_links( $args );
    // удаляем добавку к пагинации для первой страницы
    $result = str_replace( '/page/1/', '', $result );

    echo $result;
}


/**
 * Adding Categories
 */
// Register our tweaked Category widget
function myprefix_widgets_init() {
    register_widget( 'WP_Widget_Categories_custom' );
}
add_action( 'widgets_init', 'myprefix_widgets_init' );

/**
 * Duplicated and tweaked WP core Categories widget class
 */
class WP_Widget_Categories_Custom extends WP_Widget {

    function __construct() {
        $widget_ops = array( 'classname' => 'widget_categories widget_categories_custom', 'description' => __( "A list of categories, with slightly tweaked output.", 'mytextdomain'  ) );
        parent::__construct( 'categories_custom', __( 'Categories Custom', 'mytextdomain' ), $widget_ops );
    }

    function widget( $args, $instance ) {
        extract( $args );

        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Categories Modified', 'mytextdomain'  ) : $instance['title'], $instance, $this->id_base);

        echo $before_widget;
        if ( $title )
            echo $before_title . $title . $after_title;
        ?>

        <ul class="categories-list row">
            <?php
            // Get the category list, and tweak the output of the markup.
            $pattern = '#<li([^>]*)><a([^>]*)>(.*?)<\/a>\s*\(([0-9]*)\)\s*<\/li>#i';  // removed ( and )

            // $replacement = '<li$1><a$2>$3</a><span class="cat-count">$4</span>'; // no link on span
            // $replacement = '<li$1><a$2>$3</a><span class="cat-count"><a$2>$4</a></span>'; // wrap link in span
            $replacement = '<li class="category col-md-6"><a$2><span class="right-arrow">&gt;</span><span class="for-cat-name">$3</span> </a>'; // give cat name and count a span, wrap it all in a link

            $subject      = wp_list_categories( 'echo=0&orderby=name&exclude=&title_li=&depth=1&show_count=1' );
            echo preg_replace( $pattern, $replacement, $subject );
            ?>
        </ul>
        <?php
        echo $after_widget;
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['count'] = 1;
        $instance['hierarchical'] = 0;
        $instance['dropdown'] = 0;

        return $instance;
    }

    function form( $instance ) {
        //Defaults
        $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
        $title = esc_attr( $instance['title'] );
        $count = true;
        $hierarchical = false;
        $dropdown = false;
        ?>
        <p><label for="<?php echo $this->get_field_id('title', 'mytextdomain' ); ?>"><?php _e( 'Title:', 'mytextdomain'  ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>"<?php checked( $count ); ?> disabled="disabled" />
        <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e( 'Show post counts', 'mytextdomain'  ); ?></label><br />
        <?php
    }
}



/**
 * Adding Archive
 */
// Register our tweaked Category Archives widget
function myprefix_archives_widgets_init() {
    register_widget( 'WP_Widget_Archives_Custom' );
}
add_action( 'widgets_init', 'myprefix_archives_widgets_init' );

/**
 * Duplicated and tweaked WP core Categories widget class
 */
class WP_Widget_Archives_Custom extends WP_Widget {

    /**
     * Sets up a new Archives widget instance.
     *
     * @since 2.8.0
     * @access public
     */
    function __construct() {
        $widget_ops = array(
            'classname' => 'widget_archive widget_archive_custom',
            'description' => __( 'A monthly archive of your site&#8217;s Posts.' ),
            'customize_selective_refresh' => true,
        );
        parent::__construct('archives_custom', __('Archives Custom'), $widget_ops);
    }

    /**
     * Outputs the content for the current Archives widget instance.
     *
     * @since 2.8.0
     * @access public
     *
     * @param array $args Display arguments including 'before_title', 'after_title',
     * 'before_widget', and 'after_widget'.
     * @param array $instance Settings for the current Archives widget instance.
     */
    public function widget( $args, $instance ) {
        $c = ! empty( $instance['count'] ) ? '1' : '0';
        $d = ! empty( $instance['dropdown'] ) ? '1' : '0';

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Archives Custom' ) : $instance['title'], $instance, $this->id_base );

        echo $args['before_widget'];
        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        if ( $d ) {
            $dropdown_id = "{$this->id_base}-dropdown-{$this->number}";
            ?>
            <label class="screen-reader-text" for="<?php echo esc_attr( $dropdown_id ); ?>"><?php echo $title; ?></label>
            <select id="<?php echo esc_attr( $dropdown_id ); ?>" name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'>
                <?php
                /**
                 * Filters the arguments for the Archives widget drop-down.
                 *
                 * @since 2.8.0
                 *
                 * @see wp_get_archives()
                 *
                 * @param array $args An array of Archives widget drop-down arguments.
                 */
                $dropdown_args = apply_filters( 'widget_archives_dropdown_args', array(
                    'type'            => 'monthly',
                    'format'          => 'option',
                    'show_post_count' => $c
                ) );

                switch ( $dropdown_args['type'] ) {
                    case 'yearly':
                        $label = __( 'Select Year' );
                        break;
                    case 'monthly':
                        $label = __( 'Select Month' );
                        break;
                    case 'daily':
                        $label = __( 'Select Day' );
                        break;
                    case 'weekly':
                        $label = __( 'Select Week' );
                        break;
                    default:
                        $label = __( 'Select Post' );
                        break;
                }
                ?>

                <option value=""><?php echo esc_attr( $label ); ?></option>
                <?php wp_get_archives( $dropdown_args ); ?>

            </select>
        <?php } else { ?>
          <ul class="categories row">
                <?php
                /**
                 * Filters the arguments for the Archives widget.
                 *
                 * @since 2.8.0
                 *
                 * @see wp_get_archives()
                 *
                 * @param array $args An array of Archives option arguments.
                 */
                wp_get_archives( apply_filters( 'widget_archives_args', array(
                    'type'            => 'monthly',
                    'limit'           => '12',
                    'format'          => 'custom',
                    'before'          => '<li class="category col-md-6"><span class="right-arrow">&gt;</span><span class="for-cat-name">',
                    'after'           => '</span></li>',
                    'show_post_count' => true
                ) ) );
                ?>
            </ul>
            <?php
        }

        echo $args['after_widget'];
    }

    /**
     * Handles updating settings for the current Archives widget instance.
     *
     * @since 2.8.0
     * @access public
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            WP_Widget_Archives::form().
     * @param array $old_instance Old settings for this instance.
     * @return array Updated settings to save.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $new_instance = wp_parse_args( (array) $new_instance, array( 'title' => '', 'count' => 0, 'dropdown' => '') );
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['count'] = $new_instance['count'] ? 1 : 0;
        $instance['dropdown'] = $new_instance['dropdown'] ? 1 : 0;

        return $instance;
    }

    /**
     * Outputs the settings form for the Archives widget.
     *
     * @since 2.8.0
     * @access public
     *
     * @param array $instance Current settings.
     */
    public function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'count' => 0, 'dropdown' => '') );
        $title = sanitize_text_field( $instance['title'] );
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
        <p>
            <input class="checkbox" type="checkbox"<?php checked( $instance['dropdown'] ); ?> id="<?php echo $this->get_field_id('dropdown'); ?>" name="<?php echo $this->get_field_name('dropdown'); ?>" /> <label for="<?php echo $this->get_field_id('dropdown'); ?>"><?php _e('Display as dropdown'); ?></label>
            <br/>
            <input class="checkbox" type="checkbox"<?php checked( $instance['count'] ); ?> id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" /> <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Show post counts'); ?></label>
        </p>
        <?php
    }
}
//makes thumbnail a link
add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );

function my_post_image_html( $html, $post_id, $post_image_id ) {

    $html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';
    return $html;

}
// Add Footer Widget Area
    function footerWidgets(){
        register_sidebar(array(
            'name' => 'First Footer',
            'id' => 'first-footer-area',
            'description'   => esc_html__( 'Add widgets here.', 'skokov-testing' ),
            'before_widget' => '<section id="%1$s" class=" widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="aside-section-header">',
            'after_title'   => '</h2>'
        ));
        register_sidebar(array(
            'name' => 'Second Footer',
            'id' => 'second-footer-area',
            'description'   => esc_html__( 'Add widgets here.', 'skokov-testing' ),
            'before_widget' => '<section id="%1$s" class=" widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="aside-section-header">',
            'after_title'   => '</h2>'
        ));
        register_sidebar(array(
            'name' => 'Third Footer',
            'id' => 'third-footer-area',
            'description'   => esc_html__( 'Add widgets here.', 'skokov-testing' ),
            'before_widget' => '<section id="%1$s" class=" widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="aside-section-header">',
            'after_title'   => '</h2>'
        ));
    }
    add_action('widgets_init', 'footerWidgets');
