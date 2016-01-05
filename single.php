<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <div class="strata single-<?php echo $post->post_type; ?> content">
        <div class="container">
            <div class="row">
                <div class="col-md-2 visible-md visible-lg">
                    <?php get_sidebar(); ?>
                </div>
                <div class="col-md-10">
                    <?php get_template_part('content', $post->post_type); ?>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>
<?php get_footer(); ?>
