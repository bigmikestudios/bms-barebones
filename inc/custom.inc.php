<?php

/// CUSTOMIZED STUFF FOR THIS PROJECT

// ===================================================================================================== SCRIPTS AND CSS

function bms_add_scripts() {
    $stylesheet_dir = get_template_directory_uri();
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,700');
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
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




