
<div class="strata strata-footer">
    <div class="container">
        <div class="row">
            <footer>
                <div class="col-md-12">
                    <p>Copyright &copy; Diamond Fireplace & Stone <?php echo Date('Y'); ?>. All Rights Reserved.</p>
                </div>
            </footer>
        </div>
    </div>
</div>

</div>
<!--/ .page-content-inner -->
</div>
<!--/ .page-content -->




</div>
<!--/ .page-inner -->
</div>
<!--/ .page-container -->

<!-- MMENU -->
<div class="hidden">
    <nav id="mmenu">
        <?php
        wp_nav_menu( array(
                'theme_location'    => 'mobile-menu',
                'depth'             => 2,
            )
        );
        ?>
    </nav>
</div>

<?php wp_footer(); ?>

<script type="text/javascript">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
    var pageTracker = _gat._getTracker("UA-17668170-1");
    pageTracker._initData();
    pageTracker._trackPageview();
</script>

</body>
</html>