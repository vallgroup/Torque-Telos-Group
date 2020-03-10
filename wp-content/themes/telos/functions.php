<?php
/**
 * Full Frame functions and definitions
 *
 * @package Full Frame
 * @since Full Frame 1.0
 */


// Control excerpt length 
function shorter_excerpt_length_for_search( $length ) {
	if (is_search()) {
		return 30;
	}
}
add_filter( 'excerpt_length', 'shorter_excerpt_length_for_search', 999 );

 
 
// Alter loop for archive-team.php 
function alter_archive_team( $query ) {
	if ( is_post_type_archive( 'team' ) ) {
		$query->set( 'orderby', 'menu_order');
		return;
	}
}
add_action( 'pre_get_posts', 'alter_archive_team' );
 
 

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Full Frame 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 1280; /* pixels */

/**
 * Set the theme option variable for use throughout theme.
 *
 * @since full_frame 1.0
 */
if ( ! isset( $theme_options ) )
	$theme_options = get_option( 'full_frame_options' );
global $theme_options;


if ( ! function_exists( 'full_frame_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Full Frame 1.0
 */
function full_frame_setup() {

	/**
	 * Custom template tags
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/tweaks.php' );

	/**
	* Custom metaboxes
	*/
	require( get_template_directory() . '/inc/metaboxes.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Full Frame, use a find and replace
	 * to change 'full_frame' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'full_frame', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	// add_theme_support( 'automatic-feed-links' );

	/**
	 * Add custom background support
	 */
	$args = array(
		'default-color' => 'bfbfbf'
	);

	add_theme_support( 'custom-background', $args );

	/**
	 * Add editor style support
	 */
	// add_editor_style( 'style-editor.css' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Set Image sizes
	 */
	set_post_thumbnail_size( 600, 400, true ); // default thumbnail
	update_option( 'thumbnail_size_w', 600, true );
	update_option( 'thumbnail_size_h', 400, true );
	update_option( 'medium_size_w', 900, true );
	update_option( 'medium_size_h', '', true );
	update_option( 'large_size_w', 1280, true );
	update_option( 'large_size_h', '', true );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'full_frame' ),
	) );

	/**
	 * Add support for the Aside Post Formats
	 */
	// add_theme_support( 'post-formats', array( 'aside', 'quote', 'image', 'gallery', 'video' ) );
}
endif; // full_frame_setup
add_action( 'after_setup_theme', 'full_frame_setup' );

/**
 * Register widgetized area and update footer with default widgets
 *
 * @since Full Frame 1.0
 */
function full_frame_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Footer Left', 'full_frame' ),
		'id' => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Center', 'full_frame' ),
		'id' => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Right', 'full_frame' ),
		'id' => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'full_frame_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function full_frame_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_script( 'full_frame', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '20120204', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120204' );
	}
}
add_action( 'wp_enqueue_scripts', 'full_frame_scripts' );

/**
 * Custom header image
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Theme options
 */
if ( file_exists( get_template_directory() . '/options/options.php' ) )
	require( get_template_directory() . '/options/options.php' );
if ( file_exists( get_template_directory() . '/options/options.php' ) && file_exists( get_template_directory() . '/theme-options.php' ) )
	require( get_template_directory() . '/theme-options.php' );
	
	

	
	
/* CUSTOM POST TYPE: Team
------------------------------------*/
	
function codex_custom_team() {
  $labels = array(
    'name' => 'Team',
    'singular_name' => 'Team',
    'add_new' => 'Add Team Member',
    'add_new_item' => 'Add Team Member',
    'edit_item' => 'Edit Team Member',
    'new_item' => 'New Team Member',
    'all_items' => 'Team Members',
    'view_item' => 'View Team Member',
    'search_items' => 'Search Team Members',
    'not_found' =>  'No team members found',
    'not_found_in_trash' => 'No team members found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Team'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'team' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => true,
    'menu_position' => 5,
    'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes' )
  ); 

  register_post_type( 'team', $args );
}
add_action( 'init', 'codex_custom_team' );


	
/* CUSTOM POST TYPE: Case Studies
------------------------------------*/
	
function codex_custom_casestudies() {
  $labels = array(
    'name' => 'Case Studies',
    'singular_name' => 'Case Study',
    'add_new' => 'Add Case Study',
    'add_new_item' => 'Add Case Study',
    'edit_item' => 'Edit Case Study',
    'new_item' => 'New Case Study',
    'all_items' => 'Case Studies',
    'view_item' => 'View Case Study',
    'search_items' => 'Search Case Studies',
    'not_found' =>  'No case studies found',
    'not_found_in_trash' => 'No case studies found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Case Studies'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'case-study' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => true,
    'menu_position' => 6,
    'supports' => array( 'title', 'thumbnail', 'excerpt', 'page-attributes' )
  ); 

  register_post_type( 'case_study', $args );
}
add_action( 'init', 'codex_custom_casestudies' );


	
	
/* SECURITY
------------------------------------*/

	// Clean header
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
	
	
	// Removes WP build metadata and detailed login error information for security
	remove_action('wp_head', 'wp_generator'); 
	function no_generator() { return ''; }  
	add_filter( 'the_generator', 'no_generator' );
	add_filter('login_errors',create_function('$a', "return null;"));



/* SIMPLE PAGE ORDERING FOR POSTS
------------------------------------*/

add_post_type_support( 'post', 'page-attributes' );



/* RENAME POSTS TO BUILDINGS
------------------------------------*/
function change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'Buildings';
	$submenu['edit.php'][5][0] = 'Buildings';
	$submenu['edit.php'][10][0] = 'Add Building';
	echo '';
}
add_action( 'init', 'change_post_object_label' );

function change_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Buildings';
	$labels->singular_name = 'Buildings';
	$labels->add_new = 'Add Building';
	$labels->add_new_item = 'Add Building';
	$labels->edit_item = 'Edit Building';
	$labels->new_item = 'Building';
	$labels->view_item = 'View Building';
	$labels->search_items = 'Search Buildings';
	$labels->not_found = 'No Buidings Found';
	$labels->not_found_in_trash = 'No Buildings found in Trash';
}
add_action( 'admin_menu', 'change_post_menu_label' );

function edit_admin_menus() {
	remove_submenu_page('edit.php','edit-tags.php?taxonomy=category');
	remove_submenu_page('edit.php','edit-tags.php?taxonomy=post_tag');
}
add_action( 'admin_menu', 'edit_admin_menus' );  
