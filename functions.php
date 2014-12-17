<?php
/* @todo: Set up MMenu instead of the current off canvas menu */
/* @todo: Get rid of widgets */
/* @todo: get rid of bootstrap nav - just use off canvas and the animated icon */

// =============================================================================

//////////////////////////
//
// THEME CONFIGURATION & CONSTANTS
//
//////////////////////////

// INCLUDES
// for bootstrap type nav...
require 'inc/wp_bootstrap_navwalker.php';

// for home page slider and any other acf fields...
require 'inc/acf_fields.inc.php';

// for recommended and required plugins...
require 'inc/required-recommended-plugins.inc.php';


// for ACF Options page...
require 'inc/acf_options.inc.php';

// =============================================================================

add_action( 'after_setup_theme', 'bms_custom_setup' );

if ( ! function_exists( 'bms_custom_setup' ) ):
    function bms_custom_setup() {

        // This old thing...
        add_theme_support( 'menus');
        add_theme_support( 'post-thumbnails' );

    }
endif; // bms_custom_setup




//////////////////////////
//
// LESS.CSS
//
//////////////////////////

// =============================================================================

// compile less
// only if we aren't in admin:
if (is_admin() or (in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php', 'xmlrpc.php')))) {
    // silence is golden
} else {

    require 'inc/less.php/Cache.php';
    Less_Cache::$cache_dir = get_template_directory() . '/css-cache';

    $files = array();
    $files[get_template_directory() . '/less/style.less'] = '../style-less.css';

    $css_file_name = Less_Cache::Get($files);

    global $css_file_uri;
    $css_file_uri = get_stylesheet_directory_uri() . '/css-cache/' . $css_file_name;

    function my_styles_method()
    {
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

// add options page (depends on ACF Pro)
/*if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Theme General Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Header Settings',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Footer Settings',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'theme-general-settings',
    ));

}*/

// add scripts
function my_scripts_method() {
    $stylesheet_dir = get_bloginfo('stylesheet_directory');

    wp_enqueue_script( 'jquery' );

    wp_register_script( 'bootstrap', $stylesheet_dir.'/bootstrap/js/bootstrap.min.js');
    wp_enqueue_script( 'bootstrap' );

    wp_register_script('mmenu', $stylesheet_dir . '/jQuery.mmenu-master/src/js/jquery.mmenu.min.js', array(), '', true);
    wp_enqueue_script('mmenu');

    wp_enqueue_style('mmenu', $stylesheet_dir . '/jQuery.mmenu-master/src/css/jquery.mmenu.css');

    wp_enqueue_style('socicon', $stylesheet_dir . '/socicon/socicon.css');

    wp_register_script('marka', $stylesheet_dir . '/marka-0.3.1/src/js/marka.js', array(), '', true);
    wp_enqueue_script('marka');


    wp_register_script( 'script', $stylesheet_dir.'/js/script.js');
    wp_enqueue_script( 'script' );
}
add_action('wp_enqueue_scripts', 'my_scripts_method');

// register wp_nav_menu
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
    register_nav_menus( array(
            'primary-menu' => 'Primary Menu',
            'mobile-menu' => 'Mobile Menu',
            'footer-menu' => 'Footer Menu'
        )
    );
}



// removing dashboard widgets
function bms_custom_remove_dashboard_widgets() {
    global $wp_meta_boxes;

    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);

    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);

    $wp_meta_boxes['dashboard']['normal']['core']['dashboard_welcome'] = Array('id' => 'dashboard_welcome','title' => 'Administration Interface', 'callback' => 'wp_dashboard_welcome', 'args' =>'');
    $wp_meta_boxes['dashboard']['normal']['core']['dashboard_shortcodes'] = Array('id' => 'dashboard_shortcode','title' => 'Important Shortcodes', 'callback' => 'wp_dashboard_shortcode', 'args' =>'');
    //$wp_meta_boxes['dashboard']['side']['core']['dashboard_support'] = Array('id' => 'dashboard_support','title' => 'Support', 'callback' => 'wp_dashboard_support', 'args' =>'');
    $wp_meta_boxes['dashboard']['side']['core']['dashboard_links'] = Array('id' => 'dashboard_links','title' => 'Post Feature Images', 'callback' => 'wp_dashboard_links', 'args' =>'');

}
add_action('wp_dashboard_setup', 'bms_custom_remove_dashboard_widgets' );

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

// =============================================================================

//////////////////////////
//
// SHORTCODES
//
//////////////////////////

// =============================================================================



