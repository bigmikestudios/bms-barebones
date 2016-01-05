<?php
/*
 * xTemplatexName: Blocks
 */
?>
<?php get_header(); ?>
<div class="container">
  <div class="row">
    <div class="col-md-2 visible-md visible-lg">
      <?php get_sidebar(); ?>
    </div>
    <div class="col-md-10">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php $blocks = get_field('blocks'); ?>
        <?php if ($blocks): ?>
          <?php foreach ($blocks as $block): ?>
            <?php the_block($block); ?>
          <?php endforeach ?>
        <?php endif; ?>
        <?php $global_blocks = get_field('global_blocks'); ?>
        <?php if ($global_blocks): ?>
        <?php endif; ?>
      <?php endwhile; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
