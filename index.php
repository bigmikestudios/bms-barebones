<?php get_header(); ?>

<div class="strata content blog-list">
  <div class="container">
    <div class="row">
      <div class="col-md-2 visible-md visible-lg">
        <?php get_sidebar($post->post_type); ?>
      </div>
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-11">
            <?php if (is_category()): ?>
            <?php echo apply_filters('the_content', category_description()); ?>
            <?php endif; ?>

            <?php while ( have_posts() ) : the_post(); ?>
              <?php get_template_part('contentlisting', $post->post_type); ?>
            <?php endwhile; ?>

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

          </div>
        </div>
        <div class="row">
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
