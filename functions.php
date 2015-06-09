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
// require 'inc/wp_bootstrap_navwalker.php';
// if you decide to use this, call it in the template like so:
/*
wp_nav_menu(array(
        'theme_location' => 'primary-menu',
        'depth' => 2,
        'container' => 'div',
        'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
        'menu_class' => 'nav navbar-nav',
        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
        'walker' => new wp_bootstrap_navwalker())
);
*/

// for home page slider and any other acf fields...
//require 'inc/acf_fields.inc.php';

// for recommended and required plugins...
require 'inc/required-recommended-plugins.inc.php';

// for ACF Options page...
require 'inc/acf_options.inc.php';

// for ACF Flexible Content Blocks site...
require 'inc/blocks.inc.php';

// define custom post types...
require 'inc/custom.post.types.inc.php';

// move admin bar to the bottom. This is useful if you are using off-canvas menus...
// require 'inc/move-admin-bar-to-bottom.inc.php';

// =============================================================================

add_action( 'after_setup_theme', 'bms_custom_setup' );

if ( ! function_exists( 'bms_custom_setup' ) ):
    function bms_custom_setup() {

        // This old thing...
        add_theme_support( 'menus');
        add_theme_support( 'post-thumbnails' );

    }
endif; // bms_custom_setup

// =============================================================================
// CONSTANTS

define('FACEBOOK_LINK', 'https://www.facebook.com/roofixinc');
define('LINKEDIN_LINK', 'https://www.linkedin.com');
define('GOOOGLEPLUS_LINK', 'https://plus.google.com/108387352072337871049/posts');

// =============================================================================

//////////////////////////
//
// HELPER
//
//////////////////////////

// =============================================================================

// trace, for the troubleshootin'
function trace($arg) {
    $ts = "";
    $type = gettype($arg);
    switch ($type) {
        case ("boolean") :
            $ts = ($arg) ? "true" : "false";
            break;
        case ("integer") :
        case ("double") :
        case ("float") :
        case ("string") :
            $ts = $arg;
            break;
        case ("array") :
        case ("object") :
            $ts = print_r($arg, true);
            break;
        default :
            $ts = "type: $type";
            break;
    }
    error_log($ts);
    print "<pre>";
    print $ts;
    print "</pre>";

    global $wpdb;
    $table_name = $wpdb->prefix."bms_trace";

    if( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) != $table_name ) {
        if ( ! empty( $wpdb->charset ) )
            $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
        if ( ! empty( $wpdb->collate ) )
            $charset_collate .= " COLLATE $wpdb->collate";

        $sql = "CREATE TABLE " . $table_name . " (
			`id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			`date_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			`description` longtext NOT NULL,
			PRIMARY KEY (`id`)
		) $charset_collate;";
        $wpdb->query($sql);
    }

    $wpdb->insert( $table_name, array('description'=>$ts) );
}

// =============================================================================

// return the url of a featured image, given the post's id and desired size

function get_post_thumbnail_url ($post_id, $size="full")
{
    $thumb_id = get_post_thumbnail_id($post_id);
    $thumb = wp_get_attachment_image_src($thumb_id, $size);
    return ($thumb['0']);
}

// =============================================================================

// return HTML markup for a responsive image based on the custom CSS defined in this theme

function image_div( $image_url, $frame_size = "square", $image_size = "full") {
    ob_start();
    ?>
    <div class="image" style="background-image: url(<?php echo $image_url; ?>)">
        <img src="<?php echo get_stylesheet_directory_uri()."/img/transparent_$frame_size.png"; ?>" />
    </div>
    <?php
    $return = ob_get_clean();
    return $return;
}

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

function button($atts )
{
    $atts = shortcode_atts(array(
        'url' => site_url(),
        'label' => "click here!",
        'new' => false,
    ), $atts, 'button');

    $return = "<a class='btn btn-default' href='".$atts['url']."'";
    if ($atts['new']) $return .= " target='_blank'";
    $return .= ">".$atts['label']."</a>";
    return $return;
}
add_shortcode( 'button', 'button' );

// =============================================================================

