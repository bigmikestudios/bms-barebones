<?php get_header(); ?>
    <div class="strata strata-page">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-md-offset-2 content">
                    <?php
                        $content = get_field('404_page_content', 'options');
                        if ($content):
                            echo apply_filters('the_content', $content);
                        else:
                            ?>
                            <h1>Oops! This is Awkward.</h1>
                            <p>You may be looking for something that doesn’t exist, or we may have moved something.</p>
                            <p>Don’t worry – it’s probably still around here somewhere. Try browsing through the site menu or searching:</p>
                            <?php
                        endif;
                        ?>
                        <?php echo get_search_form(); ?>
                </div>
                <div class="col-md-4 sidebar">
                    <?php get_template_part('sidebar', '404'); ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>