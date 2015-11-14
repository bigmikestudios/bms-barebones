<?php

/// CUSTOMIZED STUFF FOR THIS PROJECT


// =========================================================================================================== CONSTANTS

define('FACEBOOK_LINK', 'https://www.facebook.com');
define('TWITTER_LINK', 'https://twitter.com');
define('LINKEDIN_LINK', 'https://www.linkedin.com');
define('GOOGLE_LINK', 'https://plus.google.com');
define('HOUZZ_LINK', 'http://www.houzz.com');
define('DATEFORMAT', 'F j, Y');


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



// =================================================================================================== CUSTOM TAXONOMIES



// ============================================================================================ SHORTCODE: SHARE BUTTONS

function bms_share_links_func() {
    global $post;
    $the_title = get_the_title($post);

       // $img = get_post_thumbnail_url($post->ID, 'full');
    //  trace($img);

    $img = get_template_directory_uri().'/img/logo.png';
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

