<?php
/*
 * Template Name: Blocks
 */
?>
<?php get_header(); ?>
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
<?php get_footer(); ?>
