<?php get_header(); ?>
<?php
$this_tax = $wp_query->query_vars['taxonomy'];
$this_term_slug = $wp_query->query[$this_tax];
$this_term = get_term_by('slug',$this_term_slug,$this_tax);

$portfolio_categories = get_terms('portfolio_categories', array('parent'=>$this_term->term_id));
$propulsion_types = get_terms('propulsion_types');

$these_posts_pts = array();

foreach ($posts as $p) {
    $these_pts = wp_get_post_terms($p->ID, 'propulsion_types', array());
    foreach($these_pts as $this_pt) {
        $these_posts_pts[] = $this_pt->term_id;
    }
}


$pt_tree = array();
foreach($propulsion_types as $type){
    $parent = $type->parent;
    if ($parent == 0 && in_array($type->term_id, $these_posts_pts)) {
        $pt_tree[$type->term_id] = $type;
    }
}
foreach($propulsion_types as $type){
    $parent = $type->parent;
    if ($parent != 0 && in_array($type->term_id, $these_posts_pts)) {
        if (!isset($pt_tree[$parent]->children)) $pt_tree[$parent]->children = array();
        $pt_tree[$parent]->children[$type->term_id] = $type;
    }
}


?>
    <div class="strata content">
        <div class="container">
            <div class="row">
                <div class="col-md-2 visible-md visible-lg">
                    <?php get_sidebar(); ?>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-11">
                            <?php echo apply_filters('the_content', term_description( $this_term->term_id, $this_tax ));  ?>
                        </div>
                    </div>

                    <!-- === GALLERY === -->
                    <?php $photo_gallery = get_field('gallery', $this_term); if ($photo_gallery): ?>
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

                    <?php $below_gallery_content = get_field('after_gallery', $this_term); if ($below_gallery_content): ?>
                        <?php echo $below_gallery_content; endif; ?>

                    <?php if (get_field('show_chooser', $this_term)): ?>

                        <!-- === CHOOSER === -->
                        <div class="tug-chooser-wrapper">
                            <div class="row">
                                <div class="col-md-2 ">
                                    <div class="tug-chooser-sidebar">

                                        <!-- DESKTOP -->
                                        <div class="visible-lg visible-md">
                                            <?php if (!empty($portfolio_categories) or !empty($pt_tree)): ?>
                                                <p class="heading">Filter By:</p>
                                            <?php endif; ?>

                                            <?php if (!empty($portfolio_categories)): ?>
                                                <p class="tax-label">Operational Types</p>

                                                <ul class="tug-chooser portfolio-category-chooser">
                                                    <?php foreach ($portfolio_categories as $portfolio_category):   ?>
                                                        <li>
                                                            <a href="<?php echo get_term_link($portfolio_category); ?>" data-filter-target="portfolio-category-<?php echo $portfolio_category->term_id; ?>">
                                                                <div class="icon">
                                                                    <i class="fa fa-square-o off"></i>
                                                                    <i class="fa fa-check-square-o on"></i>
                                                                </div>
                                                                <?php echo $portfolio_category->name; ?></a></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                                <?php $portfolio_category_chooser_html = ob_get_clean(); echo $portfolio_category_chooser_html; ?>
                                            <?php endif; ?>

                                            <?php if (!empty($pt_tree)): ?>
                                                <p class="tax-label">Propulsion Types</p>

                                                <ul class="tug-chooser propulsion-type-chooser">
                                                    <?php foreach ($pt_tree as $propulsion_type):   ?>
                                                        <li>
                                                            <a href="<?php echo get_term_link($propulsion_type); ?>" data-filter-target="propulsion-type-<?php echo $propulsion_type->term_id; ?>">
                                                                <div class="icon">
                                                                    <i class="fa fa-square-o off"></i>
                                                                    <i class="fa fa-check-square-o on"></i>
                                                                </div>
                                                                <?php echo $propulsion_type->name; ?></a>

                                                            <?php if ($propulsion_type->children): ?>
                                                                <ul>
                                                                    <?php foreach ($propulsion_type->children as $child): ?>
                                                                        <li>
                                                                            <a href="<?php echo get_term_link($child); ?>" data-filter-target="propulsion-type-<?php echo $child->term_id; ?>">
                                                                                <div class="icon">
                                                                                    <i class="fa fa-square-o off"></i>
                                                                                    <i class="fa fa-check-square-o on"></i>
                                                                                </div>
                                                                                <?php echo $child->name; ?>
                                                                            </a>
                                                                        </li>
                                                                    <?php endforeach; ?>
                                                                </ul>
                                                            <?php endif; ?>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>

                                            <p><a class="reset-filters">Reset</a></p>
                                        </div>

                                        <!-- MOBILE -->
                                        <div class="visible-sm visible-xs">
                                            <ul class="choosers">
                                                <?php if (!empty($portfolio_categories)): ?>
                                                    <li><a data-toggle="modal" data-target="#portfolio-category-chooser-mobile">Filter By Operational Task <i class="fa fa-arrow-right"></i></a></li>
                                                <?php endif; ?>

                                                <?php if (!empty($pt_tree)): ?>
                                                    <li><a data-toggle="modal" data-target="#propulsion-type-chooser-mobile">Filter By Propulsion Type <i class="fa fa-arrow-right"></i></a></li>
                                                <?php endif; ?>
                                            </ul>

                                            <!-- PORTFOLIO CATEGORY MODAL -->
                                            <div id="portfolio-category-chooser-mobile" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                                                            <h4 class="modal-title"><a data-dismiss="modal"><i class="ralicon-arrow-left"></i> Apply Operational Filter</a></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul class="tug-chooser portfolio-category-chooser">
                                                                <?php foreach ($portfolio_categories as $portfolio_category):   ?>
                                                                    <li>
                                                                        <a href="<?php echo get_term_link($portfolio_category); ?>" data-filter-target="portfolio-category-<?php echo $portfolio_category->term_id; ?>">
                                                                            <div class="icon">
                                                                                <i class="fa fa-square-o off"></i>
                                                                                <i class="fa fa-check-square-o on"></i>
                                                                            </div>
                                                                            <?php echo $portfolio_category->name; ?></a></li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <!-- PROPULSION TYPE MODAL -->
                                            <div id="propulsion-type-chooser-mobile" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                                                            <h4 class="modal-title"><a href="#" data-dismiss="modal"><i class="ralicon-arrow-left"></i> Apply Propulsion Filter</a></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul class="tug-chooser propulsion-type-chooser">
                                                                <?php foreach ($pt_tree as $propulsion_type):   ?>
                                                                    <li>
                                                                        <a href="<?php echo get_term_link($propulsion_type); ?>" data-filter-target="propulsion-type-<?php echo $propulsion_type->term_id; ?>">
                                                                            <div class="icon">
                                                                                <i class="fa fa-square-o off"></i>
                                                                                <i class="fa fa-check-square-o on"></i>
                                                                            </div>
                                                                            <?php echo $propulsion_type->name; ?></a>

                                                                        <?php if ($propulsion_type->children): ?>
                                                                            <ul>
                                                                                <?php foreach ($propulsion_type->children as $child): ?>
                                                                                    <li>
                                                                                        <a href="<?php echo get_term_link($child); ?>" data-filter-target="propulsion-type-<?php echo $child->term_id; ?>">
                                                                                            <div class="icon">
                                                                                                <i class="fa fa-square-o off"></i>
                                                                                                <i class="fa fa-check-square-o on"></i>
                                                                                            </div>
                                                                                            <?php echo $child->name; ?></a>
                                                                                    </li>
                                                                                <?php endforeach; ?>
                                                                            </ul>
                                                                        <?php endif; ?>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10 ">
                                    <!-- TUG THUMBNAILS -->
                                    <p class="tug-chooser-thumb-heading">Series Options</p>
                                    <div class="tug-chooser-thumbnails">
                                        <div class="row">
                                            <?php while ( have_posts() ) : the_post(); ?>
                                                <div class="col-md-3 col-sm-4 col-xs-6">
                                                    <?php get_template_part('contentlisting',$post->post_type); ?>
                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                    </div>
                                    <div class="row visible-sm visible-xs">
                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <a class="reset-filters">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>