<?php get_header(); ?>
    <div class="strata strata-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 content">
                    <h1>Page Not Found</h1>
                    <p>You could return <a href="<?php echo site_url(); ?>">to the home page</a>, or use this handy dandy search form:</p>
                    <p><?php echo get_search_form(); ?></p>
                </div>
                <div class="col-md-4 sidebar">
                    <?php get_template_part('sidebar', '404'); ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>