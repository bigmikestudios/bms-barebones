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

<!-- BACK TO TOP
<a name="top" class="top"> </a>
<div class="back-to-top-wrapper">
    <div class="back-to-top"><a href="#top"><i class="i i-graphic-13 i-color-3 i-size-25px"> </i><br>Return to top</a></div>
</div> -->

<div class="page-container">
    <div class="page-inner">

        <!-- MOBILE NAV (note that the HTML this exposes is in the footer) -->
        <div class="strata mobile-navbar visible-xs visible-sm">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-9">
                        <p class="home-button-wrapper">
                            <a class="home-button" href="<?php echo site_url(); ?>"> </a>
                        </p>
                    </div>
                    <div class="col-xs-3 text-right"><a href="#mmenu" class="mobile-menu-toggle"><i id="open_close"></i></a></div>
                </div>
            </div>
        </div>
        <div class="strata mobile-spacer visible-xs visible-sm">
            <!-- put here to push the rest of the content below the navbar. -->
        </div>

        <div class="strata mobile-header-buttons visible-xs visible-sm clearfix">
            <ul class="mobile-cta-buttons">
                <li class="feedback">
                    <a href="<?php echo SEND_FEEDBACK_URL; ?>">Send Feedback</i></a>
                </li>
                <li class="client-login">
                    <a href="<?php echo CLIENT_LOGIN_URL; ?>">Client Login</a>
                </li>
                <li class="search">
                    <a data-toggle="modal" data-target="#ral-site-search" ?><i class="fa fa-search"></i></a>
                </li>
            </ul>
        </div>

        <!-- SEARCH MODAL -->
        <div id="ral-site-search" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-search"></i> Search</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo get_search_form(); ?>
                    </div>

                </div>
            </div>
        </div>

        <!-- BRANDING -->
        <div class="strata branding visible-md visible-lg">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-lg-6">
                        <p class="home-button-wrapper">
                            <a class="home-button" href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
                        </p>
                    </div>
                    <div class="col-md-5 col-lg-4">
                        <p class="tagline tagline-1">Innovation and Diversity</p>
                        <p class="tagline tagline-2">in Marine Design</p>
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <ul class="cta-buttons">
                            <li class="feedback">
                                <a href="<?php echo SEND_FEEDBACK_URL; ?>">Send Feedback <i class="fa fa-arrow-right"></i></a>
                            </li>
                            <li class="client-login">
                                <a href="<?php echo CLIENT_LOGIN_URL; ?>">Client Login <i class="fa fa-arrow-right"></i></a>
                            </li>
                            <li class="search">
                                <a data-toggle="modal" data-target="#ral-site-search" ?>Search <i class="fa fa-arrow-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <!-- DESKTOP NAV -->
        <div class="strata desktop-navigation visible-md visible-lg">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-lg-4">
                        <div class="desktop-navbar desktop-navbar-primary">
                            <?php wp_nav_menu(array('theme_location' => 'primary-menu', 'depth' => 2)); ?>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <div class="desktop-navbar desktop-navbar-secondary">
                            <?php wp_nav_menu(array('theme_location' => 'secondary-menu', 'depth' => 2)); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- PAGE CONTENT -->
        <div class="page-content">
            <div class="page-content-inner">

                <?php get_template_part('snip_breadcrumb'); ?>
