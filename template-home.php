<?php
/*
  * Template Name: Home Page
  */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

    <!-- === FEATURED IMAGE === -->

    <?php
    $featured_image = false;
    $featured_image = get_post_thumbnail_url($post->ID, 'max' )  ;
    get_template_part ('snip_featured_image'); ?>


    <!-- === TITLE === -->

    <?php
    if (get_field('show_title') == true):
        $display_title = get_field('page_display_title');
        $title = ($display_title) ? $display_title : get_the_title();
        ?>
    <div class="strata section-title">
        <h1><?php echo $title ?></h1>
    </div>
    <?php endif; ?>


    <!-- === CONTENT === -->

    <?php $the_content = get_the_content(); if ($the_content): ?>
        <div class="strata content">
            <div class="container">
                <div class="col-md-8 col-md-offset-2">
                    <?php echo apply_filters('the_content', $the_content) ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- === PRODUCTS === -->

    <div class="strata section-title">
        <h2>Products</h2>
    </div>

    <div class="strata product-category-gallery">
        <div class="container-fluid">
            <div class="gallery">
            <div class="row">
                <?php
                $terms = get_terms('product_categories', array(
                    'hide_empty' => false
                ));
                foreach($terms as $term): ?>
                <?php
                $term_image = get_field('term_image', $term);
                if (!$term_image) {
                    $term_image = get_stylesheet_directory_uri()."/img/placeholder.jpg";
                } else {
                    $term_image = $term_image['sizes']['sm'];
                }
                ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="gallery-item">
                            <a href="<?php echo get_term_link($term); ?>">
                                <?php echo image_div($term_image, "7x5"); ?>
                                <p><?php echo $term->name; ?></p>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            </div>
        </div>
    </div>

    <?php $the_content = get_field('products_content'); if ($the_content): ?>
        <div class="strata content">
            <div class="container">
                <div class="col-md-12">
                    <?php echo apply_filters('the_content', $the_content) ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- === SERVICES === -->

    <div class="strata section-title">
        <h2>Services</h2>
    </div>

    <?php $the_content = get_field('services_content_top'); if ($the_content): ?>
        <div class="strata content services-content-top">
            <div class="container">
                <div class="col-md-12">
                    <?php echo apply_filters('the_content', $the_content) ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php $img = get_field('services_image'); if ($img):
        $img_src = $img['sizes']['max'];
        ?>
        <div class="strata content services-image">
            <img class="img-responsive" src="<?php echo $img_src; ?>"/>
        </div>
    <?php endif; ?>

    <?php $the_content = get_field('services_content_bottom'); if ($the_content): ?>
        <div class="strata content services-content-bottom">
            <div class="container">
                <div class="col-md-8 col-md-offset-2">
                    <?php echo apply_filters('the_content', $the_content) ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- === PROMOTIONS === -->

    <?php if (get_field('show_promotion') ==  true): ?>
    <div class="strata section-title">
        <h2>Sales &amp; Promotions</h2>
    </div>

        <?php get_template_part ('snip_social'); ?>
        <?php get_template_part ('snip_promotion', 'panels'); ?>

    <?php endif; ?>


  <?php endwhile; ?>
<?php get_footer(); ?>