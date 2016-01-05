<?php
/*
  * Template Name: Gallery Page
  */
get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part ('snip_featured_image'); ?>
    <div class="strata content">
        <div class="container">
            <div class="row">
                <div class="col-md-2 visible-md visible-lg">
                    <?php get_sidebar(); ?>
                </div>
                <div class="col-md-9">
                    <?php $the_content = get_the_content(); if ($the_content): ?>
                        <?php echo apply_filters('the_content', $the_content) ?>
                    <?php endif; ?>

                    <!-- === GALLERY === -->

                    <?php $photo_gallery = get_field('gallery'); if ($photo_gallery): ?>
                        <div class="gallery">
                            <div class="row">
                                <div class="lightgallery regular-columns">
                                    <?php foreach ($photo_gallery as $img): ?>
                                        <a href="<?php echo $img['url']; ?>"

                                           data-sub-html="<h2><?php echo $img['title']; ?></h2><p><?php echo $img['caption']; ?></p>"
                                           class="gallery-item col-md-4 col-xs-6 col-lg-3">
                                            <img src="<?php echo $img['sizes']['sm']; ?>" class="thumb"/>
                                            <div class="photo-frame">
                                                <div class="photo-container" style="background-image: url(<?php echo $img['sizes']['medium']; ?>)">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/transparent_7x5.png" />
                                                </div>

                                            </div>
                                            <p class="photo-title"><?php echo $img['title']; ?> </p>

                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php $below_gallery_content = get_field('below_gallery_content'); if ($below_gallery_content): ?>
                        <?php echo $below_gallery_content; endif; ?>

                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>
<?php get_footer(); ?>



