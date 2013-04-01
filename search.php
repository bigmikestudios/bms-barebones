<?php get_header(); ?>

<div class="row">
  <div class="span8 content">
    <?php if ( have_posts() ) : ?>
    <h1>Search Results for
      <?php the_search_query(); ?>
    </h1>
    <?php /* Start the Loop */ ?>
    <?php while ( have_posts() ) : the_post(); ?>
    <h3><a href="<?php the_permalink(); ?>">
      <?php the_title(); ?>
      </a></h3>
    <?php the_excerpt(); ?>
    <hr/>
    <?php endwhile; ?>
    <?php
			global $wp_query;
			$big = 999999999; // need an unlikely integer
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages
			) );
			?>
    <?php else : ?>
    <h1>Nothing Found</h1>
    <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords</p>
    <?php get_search_form(); ?>
    <?php endif; ?>
  </div>
  <div class="span4 sidebar">
    <?php
      if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('right-sidebar') ) :
      endif; ?>
  </div>
</div>
<?php get_footer(); ?>
