<div class="strata strata-footer">
  <div class="container">
    <div class="row">
      <footer>
        <div class="col-md-12">

            <?php
            wp_nav_menu(array(
                    'theme_location' => 'footer-menu',
                    'depth' => 1,
//                    'container' => 'div',
//                    'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
//                    'menu_class' => 'nav navbar-nav',
//                    'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
//                    'walker' => new wp_bootstrap_navwalker()
            ));
            ?>


        </div>
      </footer>
    </div>
  </div>
</div>

<!-- OFF CANVAS MENU WRAPPERS... -->
</div>
<!--/#inner-wrap-->
</div>
<!--/#outer-wrap--> 
<!-- END OFF CANVAS MENU WRAPPERS -->

<div class="back-to-top visible-sm visible-xs">
  <div class="back-to-top-outer">
    <div class="back-to-top-inner"> <a href="#top"><span class="glyphicon glyphicon-chevron-up"></span></a> </div>
  </div>
</div>

<!-- MMENU -->
<nav id="mmenu">
    <?php
    wp_nav_menu( array(
            'theme_location'    => 'mobile-menu',
            'depth'             => 2,
        )
    );
    ?>
</nav>

<?php wp_footer(); ?>

</body></html>