<?php
/*
  * Template Name: People List
  */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part ('snip_featured_image'); ?>
    <div class="strata content">
        <div class="container">
            <div class="row">
                <div class="col-md-2 visible-md visible-lg">
                    <?php get_sidebar(); ?>
                    <p class="legend">
                        <i class="fa fa-square shareholder-icon"></i>
                        <span>indicates Shareholders on staff pages</span>
                    </p>
                </div>
                <div class="col-md-10">

                    <div class="row">
                        <div class="col-md-11">
                            <?php $the_content = get_the_content(); if ($the_content): ?>
                                <?php echo apply_filters('the_content', $the_content) ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php $people = get_field('people'); if ($people): ?>
                        <div class="people-list">
                            <div class="row regular-columns">
                                <?php foreach ($people as $person): ?>
                                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                                        <div class="person">
                                            <!-- IMAGE -->
                                            <?php echo image_div($person['image']['ID'], 'square'); ?>
                                            <ul class="info">
                                                <!-- NAME -->
                                                <?php if ($person['name']): ?>
                                                    <li class="name">
                                                        <?php echo ($person['name']);?>

                                                        <!-- SHAREHOLDER -->
                                                        <?php if ($person['shareholder']): ?>
                                                            <i class="fa fa-square shareholder-icon"></i>
                                                        <?php endif; ?>
                                                    </li>
                                                <?php endif; ?>

                                                <!-- QUALIFICATION -->
                                                <?php if ($person['qualification']): ?>
                                                    <li class="qualification">
                                                        <?php echo ($person['qualification']);?>
                                                    </li>
                                                <?php endif; ?>

                                                <!-- INSTITUTE -->
                                                <?php if ($person['institute']): ?>
                                                    <li class="institute">
                                                        <?php echo ($person['institute']);?>
                                                    </li>
                                                <?php endif; ?>

                                                <!-- FIRST YEAR -->
                                                <?php if ($person['first_year_of_employment']): ?>
                                                    <li class="first-year-of-employment">
                                                        Joined RAL in <?php echo ($person['first_year_of_employment']);?>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>
<?php get_footer(); ?>