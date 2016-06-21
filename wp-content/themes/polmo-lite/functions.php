<?php
/**
 * Polmo functions and definitions
 *
 * @package Polmo
 */


global $jeweltheme_polmo;

define('JWPOLMO', wp_get_theme()->get( 'Name' ));

define('JWCSS', get_template_directory_uri().'/assets/css/');

define('JWJS', get_template_directory_uri().'/assets/js/');

define('JWT_FEATURED_EMAGE','https://www.youtube.com/watch?v=qZ92n79Ul5A','polmo-lite');

if ( ! function_exists( 'polmo_setup' ) ) {
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function polmo_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Polmo, use a find and replace
		 * to change 'polmo-lite' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'polmo-lite', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 35,
			'flex-height' => true,
			) );


		add_editor_style();

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
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */

		add_theme_support( 'post-thumbnails' );

		add_image_size( 'polmo-blog-thumb', '900', '400', true );

		add_image_size( 'polmo-home-blog', '375', '275', true );

		add_image_size( 'polmo-portfolio', '650', '440', true );



		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'polmo-lite' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption') );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array('aside','audio','chat','image','link','quote','status') );


		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'jeweltheme_polmo_custom_background_args', array(
			'default-color' 	=> 'ffffff',
			'default-image' 	=>  '',
		) ) );
	}
} // polmo_setup
add_action( 'after_setup_theme', 'polmo_setup' );



function polmo_excerpt( $length ) {
	return $length;
}
add_filter( 'excerpt_length', 'polmo_excerpt', 999 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jeweltheme_polmo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jeweltheme_polmo_content_width', 640 );
}
add_action( 'after_setup_theme', 'jeweltheme_polmo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function jeweltheme_polmo_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'polmo-lite' ),
		'id'            => 'blog-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar', 'polmo-lite' ),
		'id'            => 'footer-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget col-sm-3 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Menu', 'polmo-lite' ),
		'id'            => 'footer-menu',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget widget_menu %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'jeweltheme_polmo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function polmo_lite_scripts() {


		wp_enqueue_script("jquery");
		wp_enqueue_style( 'jeweltheme_polmo-style', get_stylesheet_uri() );

		
		if ( is_page() && basename(get_page_template()) == "front-page.php") {

			//CSS
			wp_enqueue_style( 'bootstrap', JWCSS . 'bootstrap.min.css');
			wp_enqueue_style( 'animate', JWCSS . 'animate.min.css');
			wp_enqueue_style( 'font-awesome', JWCSS . 'font-awesome.min.css');
			wp_enqueue_style( 'magnific-popup', JWCSS . 'magnific-popup.css');
			wp_enqueue_style( 'bxslider', JWCSS . 'jquery.bxslider.css');
			wp_enqueue_style( 'polmo-theme', JWCSS . 'theme.css');
			wp_enqueue_style( 'polmo-responsive', JWCSS . 'responsive.min.css');

			//Google Fonts			
			wp_register_style('polmo-googleFontsLato','//fonts.googleapis.com/css?family=Lato:300,400,700,900');
			wp_enqueue_style( 'polmo-googleFontsLato'); 

			wp_register_style('polmo-googleFontsLatoBelgrano','//fonts.googleapis.com/css?family=Belgrano');
			wp_enqueue_style( 'polmo-googleFontsLatoBelgrano');


			//JS
			wp_enqueue_script( 'modernizr', JWJS . 'modernizr-2.8.3-respond-1.4.2.min.js', array(), '', false );
			wp_enqueue_script( 'wow', JWJS . 'wow.js', array(), '', true );
			wp_enqueue_script( 'waypoints', JWJS . 'waypoints.js', array(), '', true );
			wp_enqueue_script( 'polmo-custom.min', JWJS . 'custom.min.js', array(), '', true );	

		} else {

			// Blog Page

			//CSS
			wp_enqueue_style( 'bootstrap', JWCSS . 'bootstrap.min.css');			
			wp_enqueue_style( 'font-awesome', JWCSS . 'font-awesome.min.css');			
			wp_enqueue_style( 'polmo-theme', JWCSS . 'theme.css');
			wp_enqueue_style( 'polmo-responsive', JWCSS . 'responsive.min.css');

			//Google Fonts			
			wp_register_style('polmo-googleFontsLato','//fonts.googleapis.com/css?family=Lato:300,400,700,900');
			wp_enqueue_style( 'polmo-googleFontsLato'); 

			wp_register_style('polmo-googleFontsLatoBelgrano','//fonts.googleapis.com/css?family=Belgrano');
			wp_enqueue_style( 'polmo-googleFontsLatoBelgrano');

			//JS
			wp_enqueue_script( 'modernizr', JWJS . 'modernizr-2.8.3-respond-1.4.2.min.js', array(), '', false );
			wp_enqueue_script( 'polmo-custom.min', JWJS . 'custom.min.js', array(), '', true );
			wp_enqueue_script( 'wow', JWJS . 'wow.js', array(), '', true );		
			wp_enqueue_script( 'waypoints', JWJS . 'waypoints.js', array(), '', true );
			
			
		}

	wp_enqueue_script( 'jeweltheme_polmo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'jeweltheme_polmo-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'polmo_lite_scripts' );


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

/**
 * Sanitization
 */
require get_template_directory() . '/inc/sanitization.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
* Quick Styles
*
*/
require get_template_directory() . '/inc/quick_styles.php';



/*===================================================================================
 * Search Form
 * =================================================================================*/
add_filter('get_search_form', 'jeweltheme_polmo_search_form');

function jeweltheme_polmo_search_form($form) {
	$form = '<form role="search" class="search-form" method="get" action="' . esc_url( home_url( '/' ) ) . '" >
		<input class="search-field" type="text" name="s" id="s" value="' . esc_attr( get_search_query() ) . '" placeholder="Search" required>
		 <button type="submit" id="search-submit" class="search-submit"><i class="fa fa-search"></i></button>
	</form>';

return $form;
}


function jeweltheme_polmo_trim_excerpt($text) {
  return rtrim($text,'[...]');
}
add_filter('get_the_excerpt', 'jeweltheme_polmo_trim_excerpt');


//Excerp Length
function jeweltheme_polmo_excerpt_length($length) {    
    return 20;
}
add_filter('excerpt_length', 'jeweltheme_polmo_excerpt_length');


// Get Blog Link
function jeweltheme_polmo_get_blog_link(){
    $blog_post = get_option("page_for_posts");
    if($blog_post){
        $permalink = get_permalink($blog_post);
    }
    else
        $permalink = home_url( '/' );
    
    return $permalink;
}



function jeweltheme_polmo_get_custom_posts($category_name, $limit = 20, $order = "DESC"){
    $args = array(
        "posts_per_page" => $limit,
        "post_type" => 'post',
        "category" => $category_name,
        "orderby" => "ID",
        "order" => "DESC",
    );
    $custom_posts = get_posts($args);
    return $custom_posts;
}


//BxSlider Custom Script
function jeweltheme_polmo_footer_slider_script() {
	if ( !( basename(get_page_template()) == "footer-home.php" ) ) { ?>
    <script>
    	jQuery(document).ready(function($) {
    		"use strict";
    		jQuery(".bxslider").bxSlider({auto:!0,preloadImages:"all",mode:"horizontal",captions:!1,controls:!0,pause:4000,speed:1200,onSliderLoad:function(){jQuery(".bxslider>li .slide-inner").eq(1).addClass("active-slide"),jQuery(".slide-inner.active-slide .slider-title").addClass("wow animated bounceInDown"),jQuery(".slide-inner.active-slide .slide-description").addClass("wow animated bounceInRight"),jQuery(".slide-inner.active-slide .btn").addClass("wow animated zoomInUp")},onSlideAfter:function(e,i,n){console.log(n),jQuery(".active-slide").removeClass("active-slide"),jQuery(".bxslider>li .slide-inner").eq(n+1).addClass("active-slide"),jQuery(".slide-inner.active-slide").addClass("wow animated bounceInRight")},onSlideBefore:function(){jQuery(".slide-inner.active-slide").removeClass("wow animated bounceInRight"),jQuery(".one.slide-inner.active-slide").removeAttr("style")}});
	});
    </script>
<?php } }
add_action( 'wp_footer', 'jeweltheme_polmo_footer_slider_script', 100 );
