<?php
/*
 * Template Name: Horizontal Buttons
 */
get_header(); ?>
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

                    <?php $buttons = get_field('buttons'); if ($buttons): ?>
                        <div class="horizontal-buttons">
                            <?php $i=0; foreach ($buttons as $button): ?>
                                <div class="h-button-wrapper h-button-wrapper-<?php echo $i++; ?>" style="background-image: url(<?php echo $button['image']['url']; ?>);">
                                    <a href="<?php echo $button['link']; ?>">
                                        <div class="h-button-title" style="background-color: <?php echo hex2rgba($button['color'], 0.7); ?>">
                                            <div class="title">
                                                <?php echo $button['label']; ?>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <style scoped>

    </style>
<?php endwhile; ?>
<?php get_footer(); ?>