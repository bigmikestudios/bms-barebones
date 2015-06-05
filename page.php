<?php get_header(); ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <div class="strata content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php get_template_part("content",$post->post_type); ?>
                </div>
                <div class="col-md-4">
                    <?php get_template_part("sidebar",$post->post_type); ?>
                </div>
            </div>
        </div>
    </div>
  <?php endwhile; ?>
<?php get_footer(); ?>
