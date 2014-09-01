<?php
// =============================================================================

//////////////////////////
//
// THEME CONFIGURATION & CONSTANTS
//
//////////////////////////

// =============================================================================

// INCLUDES
// for bootstrap type nav...
require 'inc/wp_bootstrap_navwalker.php';

// for home page slider and any other acf fields...
require 'inc/acf_fields.inc.php';

// for option tree fields
require 'inc/option_tree_fields.inc.php';

// This old thing...
add_theme_support( 'menus');
add_theme_support( 'post-thumbnails' ); 




//////////////////////////
//
// LESS.CSS
//
//////////////////////////

// =============================================================================

// compile less
// only if we aren't in admin:
if ( is_admin() or (in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php', 'xmlrpc.php' ) ) ) ) {
	// silence is golden
} else {
  
  require 'less.php/Cache.php';
  Less_Cache::$cache_dir = get_template_directory().'/css-cache';
  
  $files = array();
  $files[get_template_directory().'/less/style.less'] = '../style-less.css';
  
  $css_file_name = Less_Cache::Get( $files );
  
  global $css_file_uri;
  $css_file_uri = get_stylesheet_directory_uri().'/css-cache/'.$css_file_name;
  
  function my_styles_method() {
    global $css_file_uri;
	  wp_enqueue_style('style-less', $css_file_uri);
  }
  add_action('wp_enqueue_scripts', 'my_styles_method');
 
}

// =============================================================================

//////////////////////////
//
// HOOKS and FILTERS
//
//////////////////////////

// ============================================================================= 

// add scripts
function my_scripts_method() {
  $stylesheet_dir = get_bloginfo('stylesheet_directory');
  
  wp_enqueue_script( 'jquery' );
  
  wp_register_script( 'bootstrap', $stylesheet_dir.'/bootstrap/js/bootstrap.min.js');
  wp_enqueue_script( 'bootstrap' );
  
  wp_register_script( 'modernizr', $stylesheet_dir.'/js/modernizr.js');
  wp_enqueue_script( 'modernizr' );
  
  wp_register_script( 'off-canvas-menu', $stylesheet_dir.'/off-canvas-menu/js/main.js', array(), '', true);
  wp_enqueue_script( 'off-canvas-menu' );
  
  wp_register_script( 'script', $stylesheet_dir.'/js/script.js');
  wp_enqueue_script( 'script' );
}    
add_action('wp_enqueue_scripts', 'my_scripts_method');

// register wp_nav_menu
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
	register_nav_menus( array(
	'primary-menu' => 'Primary Menu'
	)
	);
}

// =============================================================================

//////////////////////////
//
// WIDGETS
//
//////////////////////////

// =============================================================================

register_sidebar(array(
  'name' => __( 'Right Hand Sidebar' ),
  'id' => 'right-sidebar',
  'description' => __( 'Widgets in this area will be shown on the right-hand side.' ),
  'before_title' => '<h3>',
  'after_title' => '</h3>'
));

?>