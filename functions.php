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
	
    wp_register_style( 'superfish-css', $stylesheet_dir.'/css/superfish.css', false, '1.4.8');
    wp_enqueue_style('superfish-css');

}

// =============================================================================

// add scripts
function my_scripts_method() {
	$stylesheet_dir = get_bloginfo('stylesheet_directory');
	
    wp_enqueue_script( 'jquery' );
	
	wp_register_script( 'bootstrap', $stylesheet_dir.'/bootstrap/js/bootstrap.min.js');
    wp_enqueue_script( 'bootstrap' );	
	
	wp_register_script( 'superfish', $stylesheet_dir.'/js/superfish.js', false, '1.4.8');
    wp_enqueue_script('superfish');
	
	wp_register_script( 'script', $stylesheet_dir.'/js/script.js');
    wp_enqueue_script( 'script' );
}    
 
add_action('wp_enqueue_scripts', 'my_scripts_method');

// =============================================================================

?>