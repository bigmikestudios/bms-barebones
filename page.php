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

            <?php foreach ($global_blocks as $item): ?>
              <?php the_global_block($item['global_block']); ?>
            <?php endforeach ?>
          <?php endif; ?>

        <?php endwhile; ?>
<?php get_footer(); ?>
