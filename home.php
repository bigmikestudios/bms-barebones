<?php
$blog_page_id = get_option( 'page_for_posts' );
$blog_page = get_post($blog_page_id);
get_header(); ?>

<?php get_header(); ?>

<div class="strata section-title">
    <h1>Blog</h1>
</div>

<div class="strata content blog-list">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part('contentlisting', $post->post_type); ?>
                <?php endwhile; ?>
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
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
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
