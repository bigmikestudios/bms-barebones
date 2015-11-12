
<div class="strata section-title">
    <h3>Contact</h3>
</div>


<div class="strata promotion">
    <?php $panels = get_field('footer_promotion_4_panels', 'options'); if ($panels): ?>
        <div class="promotion-4-panels-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <?php foreach($panels as $panel): ?>
                        <div class="col-md-3">
                            <div class="promotion-panel clearfix">
                                <?php echo image_div($panel['image']['ID'], "7x5"); ?>
                                <div class="promotion-panel-content">
                                    <?php echo $panel['text']; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php $footer_content_top = get_field('footer_content_top', 'options'); if ($footer_content_top): ?>
    <div class="strata footer-content-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php echo $footer_content_top; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="strata footer-content-left-right">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php $footer_content_left = get_field('footer_content_left', 'options'); if ($footer_content_left): ?>
                    <div class="footer-content-left">
                        <div class="valign-outer">
                            <div class="valign-inner">
                                <?php echo $footer_content_left; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <?php $footer_content_right = get_field('footer_content_right', 'options'); if ($footer_content_right): ?>
                    <div class="footer-content-right">
                        <div class="valign-outer">
                            <div class="valign-inner">
                                <?php echo $footer_content_right; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="strata contact">
    <div class="contact-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php echo do_shortcode('[contact-form-7 id="5" title="Contact form 1"]'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-map">

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2507.4752222600123!2d-113.98821268378887!3d51.06277697956452!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x537164d3134ff66f%3A0x6f369b4a88ba95ea!2sDiamond+Fireplace+%26+Stone+Distributors+Ltd!5e0!3m2!1sen!2sca!4v1447059649446&style=saturation:-100" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

    </div>

</div>


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