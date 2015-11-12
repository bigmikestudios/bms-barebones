

<?php get_header(); ?>



<?php while ( have_posts() ) : the_post(); ?>
    <div class="strata section-title">
        <h1>Blog</h1>
    </div>


    <div class="strata single-<?php echo $post->post_type; ?> content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php get_template_part('content', $post->post_type); ?>
                </div>
            </div>
        </div>
    </div>

<?php endwhile; ?>
<?php get_footer(); ?>
