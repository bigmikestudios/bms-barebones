<?php get_header(); ?>
  <div class="row">
    <div class="span8 content">
      <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
      <?php endwhile; ?>
    </div>
    <div class="span4 sidebar">
      <?php
      if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('right-sidebar') ) :
      endif; ?>
    </div>
  </div>
<?php get_footer(); ?>