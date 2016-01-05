
<h1 class="title">
    <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
    </a>
</h1>
<p class="date"><?php the_time(DATEFORMAT); ?></p>
<?php echo do_shortcode("[bms_share_links]"); ?>
<?php if (has_post_thumbnail($post->ID)): ?>
    <?php the_post_thumbnail('sm'); ?>
<?php endif;?>
<?php the_content(); ?>

<div class="navigation clearfix">
    <p class="pull-left">
        <?php previous_post_link( '%link', '<i class="fa fa-arrow-left"></i> Previous' , TRUE); ?>
    </p>
    <p class="pull-right">
        <?php next_post_link( '%link', 'Next <i class="fa fa-arrow-right"></i>' , TRUE); ?>
    </p>
</div>