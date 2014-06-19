<?php get_header(); ?>
<div class="strata strata-page">
  <div class="container">
    <div class="row">
      <div class="col-md-8 content">
        <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile; ?>
      </div>
      <div class="col-md-4 sidebar">
        <ul>
          <?php
      if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('right-sidebar') ) :
      endif; ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
