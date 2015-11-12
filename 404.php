<?php get_header(); ?>
    <div class="strata section-title">
        <h1>404</h1>
    </div>
    <div class="strata strata-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 content">
                    <?php
                        $content = get_field('404_page_content', 'options');
                        if (content):
                            echo apply_filters('the_content', $content);
                        else:
                            ?>
                            <h1>Page Not Found</h1>
                            <p>Sorry, but the page you were trying to view does not exist.</p>
                            <?php
                        endif;
                        ?>
                </div>
                <div class="col-md-4 sidebar">
                    <?php get_template_part('sidebar', '404'); ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>