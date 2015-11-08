

<?php get_header(); ?>

<div class="strata section-title">
    <h1>Products</h1>
</div>

<div class="strata promotion">
    <p>End of sunner BBQ Sale</p>
    <p>Up to 70% off</p>
</div>

<div class="strata 4 buttons">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                Panel
            </div>
            <div class="col-md-3">
                Panel
            </div>
            <div class="col-md-3">
                Panel
            </div>
            <div class="col-md-3">
                Panel
            </div>
        </div>
    </div>
</div>

<div class="strata social-media">
    <h3>The Hottest Deals</h3>
    <p>Follow us to stay up to date on our hot deals!</p>
    <ul>
        <li><a href="<?php FACEBOOK_LINK; ?>">Facebook</a></li>
        <li><a href="<?php TWITTER_LINK; ?>">Twitter</a></li>
        <li><a href="<?php GOOGLEPLUS_LINK; ?>">Google+</a></li>
        <li><a href="<?php MYSTERY_LINK; ?>">Mystery</a></li>

        <!--<div class="col-md-3">
                        <ul class="social_media">
                            <li class="facebook"><a href="<?php /*echo FACEBOOK_LINK; */?>" target="_blank">Facebook</a></li>
                            <li class="linkedin"><a href="<?php /*echo LINKEDIN_LINK; */?>" target="_blank">LinkedIn</a></li>
                            <li class="googleplus"><a href="<?php /*echo GOOOGLEPLUS_LINK; */?>" target="_blank">Google+</a></li>
                        </ul>
                    </div>-->
    </ul>
</div>

<div class="strata breadcrumb">
    <ul>
        <li>Path</li>
        <li>To</li>
        <li>Here</li>
    </ul>
</div>

<div class="strata">
    <div class="container">
        <div class="row">
            <div class="col-md-12 content">
                <?php while ( have_posts() ) : the_post(); ?>

                    <div class="row">
                        <div class="col-md-3">
                            <?php get_template_part('sidebar', $post->post_type); ?>
                        </div>
                        <div class="col-md-9">
                            <?php get_template_part('content', $post->post_type); ?>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>
