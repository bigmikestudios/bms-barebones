<?php


// =============================================================================

//////////////////////////
//
// CUSTOM POST TYPES
//
//////////////////////////

// =============================================================================

add_action( 'init', 'register_cpt_case_study' );

function register_cpt_case_study()
{

    $labels = array(
        'name' => _x('Case Studies', 'case_study'),
        'singular_name' => _x('Case Study', 'case_study'),
        'add_new' => _x('Add New', 'case_study'),
        'add_new_item' => _x('Add New Case Study', 'case_study'),
        'edit_item' => _x('Edit Case Study', 'case_study'),
        'new_item' => _x('New Case Study', 'case_study'),
        'view_item' => _x('View Case Study', 'case_study'),
        'search_items' => _x('Search Case Studies', 'case_study'),
        'not_found' => _x('No case studies found', 'case_study'),
        'not_found_in_trash' => _x('No case studies found in Trash', 'case_study'),
        'parent_item_colon' => _x('Parent Case Study:', 'case_study'),
        'menu_name' => _x('Case Studies', 'case_study'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,

        'supports' => array('title', 'editor', 'thumbnail'),

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

    register_post_type('case_study', $args);
}