<?php
/*
  * Template Name: 2 Column Teaser
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
                <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-11">
                                <?php $the_content = get_the_content(); if ($the_content): ?>
                        <?php echo apply_filters('the_content', $the_content) ?>
                    <?php endif; ?>
                            </div>
                        </div>

                    <?php $teasers = get_field('teasers'); if ($teasers): ?>
                        <div class="two-col-teasers">
                                <div class="row regular-columns">
                                    <?php foreach ($teasers as $teaser): ?>
                                        <div class="col-sm-6 col-md-6 col-lg-6">
                                            <div class="two-col-teaser-wrapper">
                                                <div class="row">
                                                    <?php if ($teaser['image']): ?>
                                                    <div class="col-sm-5 col-sm-push-7">
                                                        <a href="<?php echo $teaser['link']; ?>">
                                                            <img class="img-responsive" src="<?php echo $teaser['image']['sizes']['sm'] ;?>" />
                                                        </a>
                                                    </div>
                                                    <?php endif; ?>
                                                    <div  class="
                                                            <?php if($teaser['image']): ?>
                                                                col-sm-7 col-sm-pull-5
                                                            <?php else: ?>
                                                                col-sm-12
                                                            <?php endif; ?>
                                                            ">
                                                        <h3><a href="<?php echo $teaser['link']; ?>"><?php echo $teaser['heading']; ?></a></h3>
                                                        <?php echo apply_filters('the_content',$teaser['content']); ?>
                                                        <p class="more-link"><a href="<?php echo $teaser['link']; ?>"><?php echo ($teaser['button_label']) ? $teaser['button_label'] : "More"; ?> <i class="fa fa-arrow-right"></i></a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
<?php endwhile; ?>
<?php get_footer(); ?>