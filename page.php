<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part ('snip_featured_image'); ?>
    <div class="strata content">
        <div class="container">
            <div class="row">
                <div class="col-md-2 visible-md visible-lg">
                    <?php get_sidebar(); ?>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-11">
                            <?php $the_content = get_the_content(); if ($the_content): ?>
                                <?php echo apply_filters('the_content', $the_content) ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>
<?php get_footer(); ?>