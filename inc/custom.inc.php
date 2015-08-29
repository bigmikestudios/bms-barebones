<?php

/// CUSTOMIZED STUFF FOR WATSON

function watson_load_scripts() {
    //wp_enqueue_style('google-fonts', 'http://fonts.googleapis.com/css?family=Alfa+Slab+One|Roboto+Condensed:400italic,700italic,400,700');
    wp_register_script('fonts', 'http://fast.fonts.net/jsapi/12485115-f2cb-41ae-b485-35790435fe6e.js');
    wp_enqueue_script('fonts');
}
add_action('wp_enqueue_scripts', 'watson_load_scripts');
