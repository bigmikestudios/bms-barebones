<?php

/// CUSTOMIZED STUFF FOR DUNLOP WESTERN STAR

function dws_load_scripts() {
    wp_enqueue_style('google-fonts', 'http://fonts.googleapis.com/css?family=Alfa+Slab+One|Roboto+Condensed:400italic,700italic,400,700');
}
add_action('wp_enqueue_scripts', 'dws_load_scripts');
