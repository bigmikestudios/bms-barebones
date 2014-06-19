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

<?php /*
<!-- OFF CANVAS NAV STUFF -->
<!--[if (gt IE 8) | (IEMobile)]><!-->
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/off-canvas-menu/css/partone.css">
<!--<![endif]-->
<!--[if (lt IE 9) & (!IEMobile)] >
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/off-canvas-menu/css/ie.css">
<![endif]-->
<!--- END OFF CANVAS NAV STUFF -->
*/ ?>
</head>

<body <?php body_class(); ?>>
<!-- OFF CANVAS MENU WRAPPERS... -->
<div id="outer-wrap">
<div id="inner-wrap">
<!-- END OFF CANVAS MENU WRAPPERS -->

<div class="strata nav-strata-mobile visible-xs visible-sm">
  <header id="top" role="banner">
    <div class="block">
      <h1 class="block-title"><a class="logo" href="<?php echo site_url(); ?>"><span><?php echo bloginfo('site_title'); ?></span></a></h1>
      <a class="nav-btn" id="nav-open-btn" href="#nav"><span class="glyphicon glyphicon-align-justify"></span></a> </div>
  </header>
  <nav id="nav" role="navigation">
    <div class="block">
      <h2 class="block-title"><?php the_title(); ?></h2>
      <!-- <p><a href="<?php echo site_url(); ?>">HOME</a></p>-->
      <?php 
            wp_nav_menu( array(
                'menu'              => 'primary-menu',
                'theme_location'    => 'primary-menu',
                'depth'             => 2,
                )
            );
            ?>
      <a class="close-btn" id="nav-close-btn" href="#top"><span class="glyphicon glyphicon-remove-circle"></span></a> </div>
  </nav>
</div>

<nav class="navbar navbar-default navbar-static-top hidden-xs hidden-sm" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
                <?php bloginfo('name'); ?>
            </a>
        </div>

        <?php
            wp_nav_menu( array(
                'menu'              => 'primary-menu',
                'theme_location'    => 'primary-menu',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
    </div>
</nav>

<div class="container">
<header>
  <div class="row">
    <div class="col-md-8"> Logo </div>
    <div class="col-md-4"> Call to action </div>
  </div>
</header>
