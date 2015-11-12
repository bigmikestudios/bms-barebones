<?php
$featured_image = false;

if (is_tax()){
    // vars
    $queried_object = get_queried_object();
    // load thumbnail for this taxonomy term (term object)
    $featured_image = get_field('term_image', $queried_object);
    $featured_image = $featured_image['sizes']['max'];
}

else if (is_page()) {
    $featured_image = get_post_thumbnail_url($post->ID, 'max' )  ;
}
?>
<?php if($featured_image): ?>
    <div class="strata featured-image">
        <img class="img-responsive" src="<?php echo $featured_image; ?>" />
        <?php $featured_image_content = get_field('featured_image_content'); if ($featured_image_content): ?>
            <div class="featured-image-overlay content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo apply_filters('the_content', $featured_image_content); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>