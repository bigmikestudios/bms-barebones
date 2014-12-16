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

</head>

<body <?php body_class(); ?>>
<!-- OFF CANVAS MENU WRAPPERS... -->
<div id="outer-wrap">
    <div id="inner-wrap">
        <!-- END OFF CANVAS MENU WRAPPERS -->


        <!-- MOBILE NAV (note that the HTML this exposes is in the footer) -->
        <div class="strata mobile-navbar visible-xs visible-sm">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2"><a href="#mmenu"><i id="open_close"></i></a></div>
                    <div class="col-xs-10 text-right"><a href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="strata mobile-spacer visible-xs visibel-sm">
            <!-- put here to push the rest of the content below the navbar. -->2
        </div>

        <!-- DESKTOP NAV -->
        <nav class="navbar hidden-xs hidden-sm" role="navigation">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1><a href="<?php echo site_url(); ?>"><?php echo bloginfo('title'); ?></a></h1>
                    </div>

                    <?php
                    wp_nav_menu(array(
                            'theme_location' => 'primary-menu',
                            'depth' => 2,
                            'container' => 'div',
                            'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
                            'menu_class' => 'nav navbar-nav',
                            'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                            'walker' => new wp_bootstrap_navwalker())
                    );
                    ?>
                </div>
            </div>
        </nav>

