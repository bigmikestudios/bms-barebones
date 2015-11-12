<div class="row">
    <div class="col-md-5">
        <h3 class="title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>
        <p class="date"><?php the_time(DATEFORMAT); ?></p>
        <?php echo do_shortcode("[bms_share_links]"); ?>
    </div>
    <div class="col-md-7">
        <?php if (has_post_thumbnail($post->ID)): ?>
            <?php the_post_thumbnail('sm'); ?>
        <?php endif;?>
        <?php the_content(); ?>

        <div class="navigation clearfix">
            <p class="pull-left">
                <?php previous_post_link( '%link', '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Previous' , TRUE); ?>
            </p>
            <p class="pull-right">
                <?php next_post_link( '%link', 'Next <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>' , TRUE); ?>
            </p>
        </div>
    </div>
</div>