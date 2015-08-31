
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