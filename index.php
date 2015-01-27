<?php get_header(); ?>
<div class="strata index-strata">
  <div class="container">
    <div class="row">
      <div class="col-md-12 content">
        <?php
			// Pagination:
			global $wp_query;
			$big = 999999999; // need an unlikely integer
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages
			) );
	  ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <h3><a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
          </a></h3>
        <?php the_content(); ?>
        <hr/>
        <?php endwhile; ?>
      </div>

    </div>
  </div>
</div>
<?php get_footer(); ?>
