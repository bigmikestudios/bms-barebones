<?php
/*
  * Template Name: Gallery Page
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

    <!-- === GALLERY === -->

    <?php $photo_gallery = get_field('photo_gallery'); if ($photo_gallery): ?>
        <div class="strata gallery">
            <div class="container-fluid">
                <div class="gallery">
                    <div class="row">
                        <?php foreach($photo_gallery as $photo): ?>
                            <div class="col-md-4 col-xs-6">
                                <div class="gallery-item">
                                    <a rel="photo-gallery" href="<?php echo $photo['url']; ?>" class="swipebox">
                                        <div class="image" style="background-image: url(<?php echo $photo['sizes']['sm']; ?>);">
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/transparent_16x9.png">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>


<?php endwhile; ?>
<?php get_footer(); ?>