
</div>
<!--/ .page-content-inner -->
</div>
<!--/ .page-content -->


<div class="strata strata-footer">
    <div class="container">
        <div class="row">
            <footer>

                <?php $columns = get_field('footer_columns', 'options'); ?>
                <?php if ($columns): ?>
                    <div class="col-md-12">
                        <div class="row">
                            <?php foreach ($columns as $col): ?>
                                <?php $col_width = 12/count($columns); ?>
                                <div class="col-md-<?php echo $col_width; ?>">
                                    <?php echo apply_filters('the_content', $col['content']); ?>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                <?php endif; ?>



                <div class="col-md-11 col-md-offset-1">
                    <h3 class="footer-brand">WATSON</h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu',
                        'depth' => 2,
                    ));
                    ?>
                </div>






            </footer>
        </div>
    </div>
    <div class="bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-11 col-md-offset-1">
                    <div class="subfooter-row">
                        <div class="social-icons">
                            <ul class="social-media">
                                <li class="twitter"><a href="<?php echo TWITTER_LINK; ?>"<i class="socicon">a</i></a></li>
                                <li class="linkedin"><a href="<?php echo LINKEDIN_LINK; ?>"<i class="socicon">j</i></a></li>
                            </ul>
                        </div>
                        <div class="subfooter-menu">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'subfooter-menu',
                                'depth' => 2,
                            ));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

</body>
</html>