<?php if (!is_front_page()): ?>
<div class="strata ral-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if (is_single() && $post->post_type == "series"): ?>
                    <a href="<?php echo site_url(); ?>">Home</a> &gt; <a href="<?php echo site_url(); ?>/designs/">Designs</a> &gt; <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php elseif (is_single() && $post->post_type == "post"): ?>
                    <a href="<?php echo site_url(); ?>">Home</a> &gt; <a href="<?php echo site_url(); ?>/news/">News</a> &gt; <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php else : ?>
                    <a href="<?php echo site_url(); ?>">Home</a> &gt;
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary-menu',
                        'menu_class' => 'breadcrumbs-list',
                        'items_wrap' => '%3$s',
                        'container' => false,
                        'walker' => new SH_BreadCrumbWalker()
                    ));
                endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

