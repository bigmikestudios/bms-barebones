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
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title>
<?php bloginfo('name'); ?>
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
<link rel="shortcut icon" href="../assets/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
</head>

<body>
<div class="viewport">
  <div class="frame">
      <div id="menu" class="menu nav-collapse collapse width hidden-desktop">
        <div class="collapse-inner">
          
          <div class="navbar-content">
          <?php
             wp_nav_menu( array(
              'theme_location' => 'main-menu', // Setting up the location for the main-menu, Main Navigation.
              'menu_class' => 'nav nav-tabs nav-stacked', //Adding the class for dropdowns
              'fallback_cb' => 'wp_page_menu', //if wp_nav_menu is unavailable, WordPress displays wp_page_menu function, which displays the pages of your blog.
              )
            );
          ?>
          </div>
        </div>
      </div>
      <div class="view">
        <div class="navbar navbar-inverse  hidden-desktop">
          <div class="navbar-inner">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#menu"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
        </div>
        <div id="view-content">
          <div class="container">
            <header>
                <div class="row">
                  <div class="span8"> Logo </div>
                  <div class="span4"> Call to action </div>
                </div>
            </header>
            <div class="navigation visible-desktop">
              <div class="container">
                <div class="row">
                  <div class="span12">
                    <?php
                       wp_nav_menu( array(
                        'theme_location' => 'main-menu', // Setting up the location for the main-menu, Main Navigation.
                        'menu_class' => 'sf-menu', //Adding the class for dropdowns
                        'fallback_cb' => 'wp_page_menu', //if wp_nav_menu is unavailable, WordPress displays wp_page_menu function, which displays the pages of your blog.
                        )
                      );
                    ?>
                  </div>
                </div>
              </div>
            </div>
