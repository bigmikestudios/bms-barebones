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

// This old thing...
add_theme_support( 'menus');


// =============================================================================

//////////////////////////
//
// OPTION TREE
//
//////////////////////////

// =============================================================================

/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );

/**
 * Optional: set 'ot_show_new_layout' filter to false.
 * This will hide the "New Layout" section on the Theme Options page.
 */
add_filter( 'ot_show_new_layout', '__return_false' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
load_template( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );

/**
 * Theme Options
 */
load_template( trailingslashit( get_template_directory() ) . 'inc/theme-options.php' );

// =============================================================================

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
  Less_Cache::$cache_dir = get_template_directory().'/cache';
  
  $files = array();
  $files[get_template_directory().'/css/style.less'] = '/css/style-less.css';
  
  $css_file_name = Less_Cache::Get( $files );
  
  $css_file_uri = get_stylesheet_directory_uri().'/cache/'.$css_file_name;
  
	wp_enqueue_style('style-less', $css_file_uri);
 
}

//die($css_file_name);


  /*
	require 'inc/lessc.inc.php';
	
	try {
    
    $inputFile = get_template_directory().'/style.less';
    $outputFile = get_template_directory().'/css/style-less.css';
    
		$less = new lessc;

    // create a new cache object, and compile
    $cache = $less->cachedCompile($inputFile);
    
    file_put_contents($outputFile, $cache["compiled"]);
    
    // the next time we run, write only if it has updated
    $last_updated = $cache["updated"];
    $cache = $less->cachedCompile($cache);
    if ($cache["updated"] > $last_updated) {
        file_put_contents($outputFile, $cache["compiled"]);
    }

	} catch (exception $ex) {
		exit('lessc fatal error:<br />'.$ex->getMessage());
	}
  */

// =============================================================================

//////////////////////////
//
// HOOKS and FILTERS
//
//////////////////////////

// =============================================================================



// =============================================================================


  

// add scripts
function my_scripts_method() {
  $stylesheet_dir = get_bloginfo('stylesheet_directory');
  
  wp_enqueue_script( 'jquery' );
  
  wp_register_script( 'bootstrap', $stylesheet_dir.'/bootstrap/js/bootstrap.min.js');
  wp_enqueue_script( 'bootstrap' );
  
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