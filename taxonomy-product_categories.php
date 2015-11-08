<?php get_header(); ?>
<div class="strata index-strata">
    <div class="container">
        <div class="row">
            <div class="col-md-12 content">
                <div class="row">
                    <div class="col-md-3">
                        <?php get_template_part('sidebar', $post->post_type); ?>
                    </div>
                    <div class="col-md-9">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part('content', $post->post_type); ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>

