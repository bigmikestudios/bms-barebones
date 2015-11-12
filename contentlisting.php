
<div class="contentlisting contentlisting-<?php echo $post->post_type; ?>">
    <div class="row">
        <div class="col-md-2 col-sm-3">
            <div class="post-featured-image">
                <?php if (has_post_thumbnail($post->ID)): ?>
                    <?php the_post_thumbnail('sm'); ?>
                <?php endif;?>
            </div>
        </div>
        <div class="col-md-10 col-sm-9">
            <div class="post-excerpt">
                <h3>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h3>
                <p class="date"><?php the_time(DATEFORMAT); ?></p>
                <?php the_excerpt(); ?>
                <p class="readmore"><a href="<?php the_permalink(); ?>">Read More</a></p>
            </div>
        </div>
    </div>
</div>