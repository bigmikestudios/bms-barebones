<?php

/// CUSTOMIZED STUFF FOR THIS PROJECT


// =========================================================================================================== CONSTANTS

define('FACEBOOK_LINK', 'https://www.facebook.com/diamondfireplaceandstone');
define('TWITTER_LINK', 'https://twitter.com/diamondfireplac');
define('LINKEDIN_LINK', 'https://www.linkedin.com');
define('GOOGLE_LINK', 'https://plus.google.com/118018189852846385971/posts');
define('HOUZZ_LINK', 'http://www.houzz.com/pro/diamondfireplace/diamond-fireplace-and-stone');
define('DATEFORMAT', 'F j, Y');
define('SERVICE_APPT_URI', site_url().'/book-a-service-appointment');

// ===================================================================================================== SCRIPTS AND CSS

function bms_add_scripts() {
    $stylesheet_dir = get_template_directory_uri();

    if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', false, '2.1.3');
        wp_enqueue_script('jquery');
    }

    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,700|Lato:400,700,400italic,700italic,900');

    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');

    wp_enqueue_style('socicon', $stylesheet_dir . '/lib/socicon-font-v26/socicon.css');

    wp_register_script('marka', $stylesheet_dir . '/lib/marka-0.3.1/src/js/marka.js', array(), '', true);
    wp_enqueue_script('marka');

    wp_enqueue_style('mmenu', $stylesheet_dir . '/lib/jQuery.mmenu-master/src/css/jquery.mmenu.css');
    wp_register_script('mmenu', $stylesheet_dir . '/lib/jQuery.mmenu-master/src/js/jquery.mmenu.min.js', array(), '', true);
    wp_enqueue_script('mmenu');

    wp_enqueue_style('swipebox', $stylesheet_dir . '/lib/swipebox-master/src/css/swipebox.min.css');
    wp_register_script('swipebox', $stylesheet_dir . '/lib/swipebox-master/src/js/jquery.swipebox.min.js', array(), '', true);
    wp_enqueue_script('swipebox');

}
add_action('init','bms_add_scripts');

// =================================================================================================== CUSTOM POST TYPES

// PRODUCTS
add_action( 'init', 'register_cpt_products' );

function register_cpt_products() {

    $labels = array(
        'name' => _x( 'Product', 'product' ),
        'all_items' => _x( 'All Products', 'product' ),
        'singular_name' => _x( 'Product', 'product' ),
        'add_new' => _x( 'Add New', 'product' ),
        'add_new_item' => _x( 'Add New Product', 'product' ),
        'edit_item' => _x( 'Edit Product', 'product' ),
        'new_item' => _x( 'New Product', 'product' ),
        'view_item' => _x( 'View Product', 'product' ),
        'search_items' => _x( 'Search Products', 'product' ),
        'not_found' => _x( 'No product found', 'product' ),
        'not_found_in_trash' => _x( 'No product found in Trash', 'product' ),
        'parent_item_colon' => _x( 'Parent Product:', 'product' ),
        'menu_name' => _x( 'Product', 'product' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,

        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies' => array( 'product_categories' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,


        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'product', $args );
}

// =========================================================================================== CHECK IF SHOWROOM IS OPEN

function is_open() {

    date_default_timezone_set('America/Edmonton');

    $open = false;

    // generally, this should suffice...

    $dw = date("w");
    $time = intval(date("Gi"));

    if (in_array($dw, array(1,2,3,5))) {
        // open today!
        if ($time > 930 and $time < 1730) $open = true;
    };

    if ($dw == 4) {
        if ($time > 930 and $time < 1900) $open = true;
    }

    if ($dw == 6 ) {
        if ($time > 1000 and $time < 1600) $open = true;
    }

    // but check the DB for exceptions...

    // is there an entry for this date in the DB?
    $dates = get_field('holiday_hours', 'options');

    if ($dates) {
        $today = date('Ymd');
        foreach($dates as $date) {

            if ($date['date'] == $today) {
                if (!$date['open']) {
                    $open = false;
                } else {
                    if ($time >= intval($date['open']) && $time <= intval($date['close'])) {
                        $open = true;
                    } else {
                        $open = false;
                    }
                }
            }
        }
    }

    return $open;
}


// ============================================================================ SHORTCODE TO DISPLAY IF SHOWROOM IS OPEN

function df_is_open_func () {
    return (is_open()) ? "The showroom is currently open." : "The showroom is currently closed.";
}
add_shortcode('df_is_open', 'df_is_open_func');

// =================================================================================================== CUSTOM TAXONOMIES

// PRODUCT CATEGORIES
add_action( 'init', 'register_taxonomy_product_categories' );
function register_taxonomy_product_categories() {

    $labels = array(
        'name' => _x( 'Product Categories', 'product_categories' ),
        'singular_name' => _x( 'Product Category', 'product_categories' ),
        'search_items' => _x( 'Search Product Categories', 'product_categories' ),
        'popular_items' => _x( 'Popular Product Categories', 'product_categories' ),
        'all_items' => _x( 'All Product Categories', 'product_categories' ),
        'parent_item' => _x( 'Parent Product Category', 'product_categories' ),
        'parent_item_colon' => _x( 'Parent Product Category:', 'product_categories' ),
        'edit_item' => _x( 'Edit Product Category', 'product_categories' ),
        'update_item' => _x( 'Update Product Category', 'product_categories' ),
        'add_new_item' => _x( 'Add New Product Category', 'product_categories' ),
        'new_item_name' => _x( 'New Product Category', 'product_categories' ),
        'separate_items_with_commas' => _x( 'Separate product categories with commas', 'product_categories' ),
        'add_or_remove_items' => _x( 'Add or remove product categories', 'product_categories' ),
        'choose_from_most_used' => _x( 'Choose from the most used product categories', 'product_categories' ),
        'menu_name' => _x( 'Product Categories', 'product_categories' ),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => false,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'product_categories', array('product'), $args );
}

// FOR EACH PRODUCT CATEGORY, CREATE TYPES, FOR EACH TYPE, CREATE MANUFACTURERS

function create_types() {
    $product_categories = get_terms( 'product_categories');
    foreach($product_categories as $cat) {
        $slug = $cat->slug.'-by-type';
        $name = $cat->name.' By Type';

        $labels = array(
            'name' => _x( $name, $slug ),
            'singular_name' => _x( $name, $slug ),
            'search_items' => _x( 'Search '.$name, $slug ),
            'popular_items' => _x( 'Popular '.$name, $slug ),
            'all_items' => _x( 'All '.$name, $slug ),
            'parent_item' => _x( 'Parent '.$name, $slug ),
            'parent_item_colon' => _x( 'Parent '.$name.':', $slug ),
            'edit_item' => _x( 'Edit '.$name, $slug ),
            'update_item' => _x( 'Update '.$name, $slug ),
            'add_new_item' => _x( 'Add New '.$name, $slug ),
            'new_item_name' => _x( 'New '.$name, $slug ),
            'separate_items_with_commas' => _x( 'Separate '.strtolower($name).' with commas', $slug ),
            'add_or_remove_items' => _x( 'Add or remove '.strtolower($name), $slug ),
            'choose_from_most_used' => _x( 'Choose from the most used '.strtolower($name), $slug ),
            'menu_name' => _x( $name, $slug ),
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'show_in_nav_menus' => true,
            'show_ui' => true,
            'show_tagcloud' => true,
            'show_admin_column' => false,
            'hierarchical' => true,

            'rewrite' => true,
            'query_var' => true
        );

        register_taxonomy( $slug, array('product'), $args );

        // get the types...
        $types = get_terms($cat->slug.'-by-type');

        //trace($types);

        foreach($types as $type) {

            //trace($type);

            $slug = $type->slug.'-mfr';
            $name = $type->name.' By Manufacturer';

            //trace($slug);

            //trace($name);

            $labels = array(
                'name' => _x( $name, $slug ),
                'singular_name' => _x( $name, $slug ),
                'search_items' => _x( 'Search '.$name, $slug ),
                'popular_items' => _x( 'Popular '.$name, $slug ),
                'all_items' => _x( 'All '.$name, $slug ),
                'parent_item' => _x( 'Parent '.$name, $slug ),
                'parent_item_colon' => _x( 'Parent '.$name.':', $slug ),
                'edit_item' => _x( 'Edit '.$name, $slug ),
                'update_item' => _x( 'Update '.$name, $slug ),
                'add_new_item' => _x( 'Add New '.$name, $slug ),
                'new_item_name' => _x( 'New '.$name, $slug ),
                'separate_items_with_commas' => _x( 'Separate '.strtolower($name).' with commas', $slug ),
                'add_or_remove_items' => _x( 'Add or remove '.strtolower($name), $slug ),
                'choose_from_most_used' => _x( 'Choose from the most used '.strtolower($name), $slug ),
                'menu_name' => _x( $name, $slug ),
            );

            $args = array(
                'labels' => $labels,
                'public' => true,
                'show_in_nav_menus' => true,
                'show_ui' => true,
                'show_tagcloud' => true,
                'show_admin_column' => false,
                'hierarchical' => true,

                'rewrite' => true,
                'query_var' => true
            );

            //trace($args);
            register_taxonomy( $slug, array('product'), $args );
        }
    }
}
add_action('init','create_types');

// ===================================================== HIDE TYPE TAXONOMIES EXCEPT WHEN IN APROPRIATE PRODUCT CATEGORY

function remove_custom_taxonomy()
{
    global $post;
    $this_post_cat = wp_get_post_terms($_GET['post'], 'product_categories');
    $slugs = array();
    foreach($this_post_cat as $cat) {
        $slugs[] = $cat->slug;
    }

    $product_categories = get_terms( 'product_categories');
    foreach($product_categories as $cat) {
        if (!in_array($cat->slug, $slugs)) {
            remove_meta_box($cat->slug.'-by-typediv', 'product', 'side' );
        }

        // now, remove the manufacturers...
        $this_post_types = wp_get_post_terms($_GET['post'], $cat->slug.'-by-type');
        $type_slugs = array();
        foreach($this_post_types as $type) {
            $type_slugs[] = $type->slug;
        }

        $types = get_terms( $cat->slug.'-by-type' );
        foreach($types as $this_type) {
            if (!in_array($this_type->slug, $type_slugs)) {
                remove_meta_box($this_type->slug.'-mfrdiv', 'product', 'side' );
            }
        }

    }
}
add_action( 'admin_menu', 'remove_custom_taxonomy' );

// ===================================================================================================== GET CRUMB ARRAY

function bms_get_seg($this_tax_slug, $post) {
    $this_tax = get_taxonomy($this_tax_slug);
    $terms = wp_get_post_terms($post->ID, $this_tax_slug);

    $seg = false;
    if (count($terms>0)){
        if (!empty($terms[0])) {
            $my_term = $terms[0];
            $seg = array();
            $seg['tax_name'] = $this_tax->label;
            $seg['tax_slug'] = $this_tax_slug;
            $seg['term_name'] = $my_term->name;
            $seg['term_slug'] = $my_term->slug;
            $seg['term_url'] = get_term_link($my_term);
        }
    }
    return($seg);
}

function bms_get_crumb($post) {
    $return = array();
    $cat = bms_get_seg('product_categories', $post);
    if ($cat) {
        $return['product_categories'] = $cat;

        // we have a category. What about a type?
        $type = bms_get_seg($return['product_categories']['term_slug'].'-by-type', $post);
        if ($type) {
            $return[$type['tax_slug']] = $type;

            // we have a type. What about a manufacturer?
            $mfr = bms_get_seg($type['term_slug'].'-mfr', $post);
            if ($mfr) {
                $return[$mfr['tax_slug']] = $mfr;
            }
        }
    }

    return $return;
}

// ============================================================================================ SHORTCODE: SHARE BUTTONS

function bms_share_links_func() {
    global $post;
    $the_title = get_the_title($post);

       // $img = get_post_thumbnail_url($post->ID, 'full');
    //  trace($img);

    $img = get_template_directory_uri().'/img/diamond-fireplace-logo.jpg';
    if (has_post_thumbnail($post->ID))
        $img = get_post_thumbnail_url($post->ID);

    $return='';
    $return.='<div class="meta">';
    $return.='<p class="share-links">Share: <br>';
    $return.='<a href="mailto:?&subject='. urlencode($the_title).' at Diamond Fireplace&body=I%20thought%20you%20might%20be%20interested%20in%20this:%20'. urlencode(" ".$the_title." ".get_permalink()).'" target="_blank">';
    $return.='<span class="glyphicon glyphicon-envelope"></span>';
    $return.='</a>';
    $return.=' <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='. urlencode(get_permalink()).'"><span class="socicon-facebook"> </span></a>';
    $return.=' <a target="_blank" href="https://twitter.com/home?status='. urlencode(" ".$the_title." ".get_permalink()).'"><span class="socicon-twitter"> </span></a>';
    $return.=' <a target="_blank" href="https://plus.google.com/share?url='. urlencode(get_permalink()).'"><span class="socicon-google"> </span></a>';
    $return.=' <a target="_blank" href="https://pinterest.com/pin/create/button/?url='. urlencode(get_permalink()).'&media='. urlencode($img).'&description="><span class="socicon-pinterest"> </span></a>';
    $return.='</p>';
    $return.='</div>';
    return $return;
}
add_shortcode('bms_share_links','bms_share_links_func');

// ============================================================================================= SHORTCODE: SOCIAL ICONS

function df_social_icons_func()
{
    ob_start();
    ?>
    <ul class="social-icons-list">
        <li class="facebook">
            <a href="<?php echo FACEBOOK_LINK; ?>" target="_blank">
                <span class="sr-only">Facebook</span>
                <span class="socicon-facebook"></span>
            </a>
        </li>
        <li class="twitter">
            <a href="<?php echo TWITTER_LINK; ?>" target="_blank">
                <span class="sr-only">Twitter</span>
                <span class="socicon-twitter"></span>
            </a>
        </li>
        <li class="googleplus">
            <a href="<?php echo GOOGLE_LINK; ?>" target="_blank">
                <span class="sr-only">Google+</span>
                <span class="socicon-google"></span>
            </a>
        </li>
        <li class="houzz">
            <a href="<?php echo HOUZZ_LINK; ?>" target="_blank">
                <span class="sr-only">Houzz</span>
                <span class="socicon-houzz"></span>
            </a>
        </li>
    </ul>
    <?php
    $return = ob_get_clean();
    $return = str_replace(array("\r", "\n"), '', $return);
    return $return;
}
add_shortcode('df_social_icons', 'df_social_icons_func');

// ===================================================================================== BODYCLASS - FOR PRODUCT IN MENU

// add category nicenames in body and post class
function category_id_class( $classes ) {
    $q = get_queried_object();

    if (    $q->taxonomy or
            $q->post_type == "product" or
            $q->name == "product") {
        $classes[] = "product-section";
    }

    return $classes;
}
add_filter( 'body_class', 'category_id_class' );

