<?php

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
	
	wp_register_style('bootstrap-responsive', $stylesheet_dir.'/bootstrap/css/bootstrap-responsive.min.css');
	wp_enqueue_style('bootstrap-responsive');
	
	wp_register_style('google-fonts', 'http://fonts.googleapis.com/css?family=Bitter:400,700,400italic');
	wp_enqueue_style('google-fonts');

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

// =============================================================================

function add_our_scripts() {
 
    if (!is_admin()) { // Add the scripts, but not to the wp-admin section.
    // Adjust the below path to where scripts dir is, if you must.
    $scriptdir = get_bloginfo('template_url');
 
    // Remove the wordpresss inbuilt jQuery.
    // wp_deregister_script('jquery');
 
    // Lets use the one from Google AJAX API instead.
    // wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js', false, '1.4.2');
    // Register the Superfish javascript file
    wp_register_script( 'superfish', $scriptdir.'/js/superfish.js', false, '1.4.8');
    // Now the superfish CSS
    wp_register_style( 'superfish-css', $scriptdir.'/css/superfish.css', false, '1.4.8');
 
    //load the scripts and style.
    wp_enqueue_script('jquery');
    wp_enqueue_script('superfish');
    wp_enqueue_style('superfish-css');
    } // end the !is_admin function
} //end add_our_scripts function
 
//Add our function to the wp_head. You can also use wp_print_scripts.
add_action( 'wp_head', 'add_our_scripts',0);

?>