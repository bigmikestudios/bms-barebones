<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

    <div class="strata section-title">
        <h1><?php the_title(); ?></h1>
    </div>

    <?php get_template_part ('snip_featured_image'); ?>

    <?php $the_content = get_the_content(); if ($the_content): ?>
    <div class="strata content">
        <div class="container">
            <div class="col-md-12">
                <?php echo apply_filters('the_content', $the_content) ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

  <?php endwhile; ?>
<?php get_footer(); ?>