<?php
//////////////////////////
//
// THEME CONFIGURATION & CONSTANTS
//
//////////////////////////

// OPTION TREE

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

// Set the theme path to a constant
$url = get_bloginfo("template_url");
$temp = explode("wp-content/themes/",$url);
$active_theme_name = $temp[1];	// The second value will be the theme name
$theme_path =get_theme_root()."/".$active_theme_name."/";
define('THEME_PATH', $theme_path);

add_theme_support( 'menus');
require 'inc/wp_bootstrap_navwalker.php';

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
	require 'inc/lessc.inc.php';
	
	try {
    
    $inputFile = THEME_PATH.'style.less';
    $outputFile = THEME_PATH.'style.css';
    
		// lessc::ccompile(THEME_PATH.'/style.less.css', THEME_PATH.'/style.css');
		$less = new lessc;
		$less->setPreserveComments(true);
		//$less->checkedCompile(THEME_PATH.'style.less.css', THEME_PATH.'style.css');

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
}

// =============================================================================

//////////////////////////
//
// HOOKS and FILTERS
//
//////////////////////////

// =============================================================================

// add stylesheets
add_action('wp_print_styles', 'my_wp_print_styles');
function my_wp_print_styles() {
	$stylesheet_dir = get_bloginfo('stylesheet_directory');
	
	wp_register_style('bootstrap', $stylesheet_dir.'/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style('bootstrap');

}

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