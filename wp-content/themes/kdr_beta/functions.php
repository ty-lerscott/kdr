<?php
/**
 * kdr_beta functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kdr_beta
 */
if ( ! function_exists( 'kdr_beta_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kdr_beta_setup() {
	global $siteOptions;

	$siteOptions['url'] = 'wp-content/themes/kdr_beta/';

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on kdr_beta, use a find and replace
	 * to change 'kdr_beta' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'kdr_beta', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'kdr_beta' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'kdr_beta_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'kdr_beta_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kdr_beta_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kdr_beta_content_width', 640 );
}
add_action( 'after_setup_theme', 'kdr_beta_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kdr_beta_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'kdr_beta' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'kdr_beta_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kdr_beta_scripts() {
	wp_enqueue_style( 'hard-reset',get_template_directory_uri() . '/style.css');
	wp_enqueue_style( 'kdr_beta-style',get_template_directory_uri() . '/stylesheets/styles.css');
	
	if(is_home() || is_front_page()){
		wp_enqueue_style( 'kdr_beta-style-home',get_template_directory_uri() . '/stylesheets/home.css');
	}
	if(is_page_template('page-history.php')){
		wp_enqueue_style( 'kdr_beta-style-histroy',get_template_directory_uri() . '/stylesheets/history.css');
	}
	if(is_page_template('page-about.php')){
		wp_enqueue_style( 'kdr_beta-style-histroy',get_template_directory_uri() . '/stylesheets/about.css');
	}

	wp_enqueue_script( 'jquery_cdn', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js', array(), '20120206', true );
	wp_enqueue_script( 'kdr_beta-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );


	wp_enqueue_script( 'imageloader', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), '20120206', true );
	wp_enqueue_script( 'smartresize', get_template_directory_uri() . '/js/smartresize.min.js', array(), '20120206', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), '20120206', true );
	wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/js/lightbox.js', array(), '20120206', true );


	wp_enqueue_script( 'kdr_beta-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'kdr_beta-site', get_template_directory_uri() . '/js/site.js', array(), '20120206', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


}
add_action( 'wp_enqueue_scripts', 'kdr_beta_scripts' );

function corrected_homepage_image_gallery($shortcode_result){

	$image_title_pattern = "/alt=\\\".*\\\"/i";
	preg_match_all($image_title_pattern, $shortcode_result, $titles);
	foreach($titles as $index => $value){
		$titles[$index] = preg_replace('/\"/i','',preg_replace('/(alt)(=\")/i', '', $value));
	}

	$pattern = "/(http|https)\\:\\/\\/[a-zA-Z0-9:\\/\\-\\_.]+/i"; 
	preg_match_all($pattern, $shortcode_result, $results);
	
	$images_array = array();
	foreach($results[0] as $index => $result){
		$title = $titles[0][$index];
		$pair = ['url' => $result, 'title'=>$title];

		array_push($images_array, $pair);
	}
	return $images_array;
}

function getMenuParentList($menu){
	$parents = [];
	foreach($menu as $index=>$item):
		$parentID = (intval($item->menu_item_parent) > 0) ? intval($item->menu_item_parent) : null;
		if(!is_null($parentID)){
			array_push($parents, $parentID);
		}
	endforeach;
	$parents = array_unique($parents);
	$hierarchy;
	foreach($parents as $parent):
		$children = [];
		$title = '';
		foreach($menu as $index=>$submenu):
			if(intval($submenu->ID) === $parent){
				$title = $submenu->title;
				unset($menu[$index]);
			}
			elseif(intval($submenu->menu_item_parent) === $parent){
				array_push($children,$submenu); 
				unset($menu[$index]);
			}
		endforeach;
		$hierarchy[$title] = $children;
	endforeach;
	return $hierarchy;
}

function getSubMenuItems($menu, $parents){
	$submenu = [];
	foreach($parents as $parent):
		foreach($menu as $index=>$object):
			if(intval($object->menu_item_parent) === $parent):
				print($object->title . " ");
				array_push($submenu, $object);
				unset($menu[$index]);
			endif;
		endforeach;
		print("<br />");
	endforeach;
	

	// var_dump($submenu);
}





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
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
