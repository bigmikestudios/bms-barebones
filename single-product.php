

<?php get_header(); ?>


<div class="strata section-title">
    <h1>Products</h1>
</div>

<?php get_template_part ('snip_promotion'); ?>

<?php get_template_part ('snip_social'); ?>

<?php get_template_part ('snip_crumb'); ?>

<div class="strata">
    <div class="container">
        <div class="row">
            <div class="col-md-12 content">
                <?php while ( have_posts() ) : the_post(); ?>

                    <div class="row">
                        <div class="col-md-9 col-md-push-3">
                            <?php get_template_part('content', $post->post_type); ?>
                        </div>
                        <div class="col-md-3 col-md-pull-9">
                            <?php get_template_part('sidebar', $post->post_type); ?>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>
