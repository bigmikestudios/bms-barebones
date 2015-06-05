<?php if (has_post_thumbnail($post->ID)): ?>
    <div class="row">
        <div class="col-sm-12">
            <?php echo image_div(get_post_thumbnail_url($post->ID), '12x5'); ?>
        </div>
    </div>
    <?php endif;?>
<h3>
    <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
    </a>
</h3>
<?php the_content(); ?>