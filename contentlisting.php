
<div class="contentlisting contentlisting-<?php echo $post->post_type; ?>">
    <div class="post-excerpt">
        <?php if (has_post_thumbnail($post->ID)): ?>
            <div class="post-featured-image">
                <?php the_post_thumbnail('sm'); ?>
            </div>
        <?php endif;?>
        <h2>
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
        <p class="date"><?php the_time(DATEFORMAT); ?></p>
        <?php the_excerpt(); ?>
        <p class="readmore "><a href="<?php the_permalink(); ?>" class="btn">Read More <i class="fa fa-arrow-right"></i></a></p>
    </div>
</div>
