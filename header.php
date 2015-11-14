<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <meta charset="<?php bloginfo('charset'); ?>">
    <title>
        <?php wp_title(); ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>

    <!-- Fav and touch icons -->
    <!--[if IE]><link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico"><![endif]-->
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico">

    <!--
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    -->
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>"/>

    <!--enables hover state on touch devices...-->
    <script>
        document.addEventListener("touchstart", function(){}, true);
    </script>
    <style>
        /*enables hover state on touch devices*/
        a:hover, a:active {
            -webkit-tap-highlight-color: rgba(0,0,0,0);
            -webkit-user-select: none;
            -webkit-touch-callout: none
        }
        /* hides admin bar on mobile*/
        @media screen and ( max-width: 991px ) {
            #wpadminbar { display: none;}
            html { margin-top: 0 !important; }
            * html body { margin-top: 0 !important; }
        }
    </style>


</head>

<body <?php body_class(); ?>>
<div class="page-container">
    <div class="page-inner">

    <!-- MOBILE NAV (note that the HTML this exposes is in the footer) -->
    <div class="strata mobile-navbar visible-xs visible-sm">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-2"><a href="#mmenu"><i id="open_close"></i></a></div>
                <div class="col-xs-10 text-right">
                    <p class="home-button-wrapper">
                        <a class="home-button" href="<?php echo site_url(); ?>"> </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="strata mobile-spacer visible-xs visible-sm">
        <!-- put here to push the rest of the content below the navbar. -->
    </div>

    <!-- BRANDING -->
    <div class="strata branding visible-md visible-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <p class="home-button-wrapper">
                        <a class="home-button" href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
                    </p>
                </div>
                <div class="col-md-9">
                        <div class="desktop-navbar">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <?php wp_nav_menu(array('theme_location' => 'primary-menu')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- PAGE CONTENT -->
    <div class="page-content">
        <div class="page-content-inner">
