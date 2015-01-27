<?php get_header(); ?>
<div class="strata index-strata">
    <div class="container">
        <div class="row">
            <div class="col-md-12 content">


                <?php while ( have_posts() ) : the_post(); ?>

                    <div class="pagination">
                        <?php echo previous_post_link('%link','<span class="glyphicon glyphicon-chevron-left"></span> Previous'); ?>
                        <?php echo next_post_link('%link', 'Next <span class="glyphicon glyphicon-chevron-right"></span>'); ?>
                    </div>

                    <!-- bloc-21 -->
                    <div class="row">
                        <div class="col-sm-12">
                            <?php echo image_div(get_post_thumbnail_url($post->ID), '12x5'); ?>
                        </div>
                    </div>
                    <!-- bloc-21 END -->

                    <!-- bloc-22 -->
                    <div class="row">
                        <div class="col-sm-4">
                            <h1><a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a></h1>
                        </div>
                        <div class="col-sm-8">
                            <?php the_content(); ?>
                            <?php
                            $pdf = get_field('pdf');
                            if ($pdf): ?>
                                <?php $pdf = wp_get_attachment_url($pdf);?>
                                <p>
                                    <?php echo do_shortcode("[button label='Download as PDF' url='$pdf' new='true' ]"); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- bloc-22 END -->
                <?php endwhile; ?>
            </div>

        </div>
    </div>
</div>

<?php the_global_block('clients-block'); ?>
<?php the_global_block('newsletter-block'); ?>
<?php the_global_block('contact-block'); ?>

<?php get_footer(); ?>
