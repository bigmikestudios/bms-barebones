<?php 
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>

<div class="strata strata-page">
  <div class="container">
    <div class="row">
      <?php $slider = get_field('slider'); ?>
      <?php if ($slider): ?>
      <div class="col-md-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <?php $active="active"; $i=0; foreach($slider as $slide): ?>
            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" class="<?php echo $active; $active=""; ?>"></li>
            <?php $i++; endforeach; ?>
          </ol>
          
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <?php $active="active"; $i=0; foreach($slider as $slide): ?>
            <div class="item <?php echo $active; $active=""; ?>">
              <div class="image" style="background: url(http://lorempixel.com/1200/500/abstract/); "> <img alt="dimension" src="<?php echo get_stylesheet_directory_uri(); ?>/img/transparent_12x5.png" /> </div>
              <div class="carousel-caption">
                <?php if ($slide['headline']): ?>
                <h2><?php echo $slide['headline']; ?></h2>
                <?php endif; ?>
                <?php if ($slide['positioning_statement']): ?>
                <h3><?php echo $slide['positioning_statement']; ?></h3>
                <?php endif; ?>
                <?php if ($slide['subhead']): ?>
                <h4><?php echo $slide['positioning_statement']; ?></h4>
                <?php endif; ?>
                <?php foreach ($slide['call_to_action'] as $cta): ?>
                <a class="btn btn-default" href="<?php echo $cta['button_url']; ?>" <?php if ($cta['new_window']): ?>target="new"<?php endif; ?>><?php echo $cta['button_label']; ?></a>
                <?php endforeach; ?>
              </div>
            </div>
            <?php $i++; endforeach; ?>
          </div>
          
          <!-- Controls --> 
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a> </div>
      </div>
      <?php endif; ?>
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
