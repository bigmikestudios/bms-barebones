<?php
/*
  * Template Name: Home Page
  */
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>

    <div class="hero">

        <!-- IMAGE -->
        <img class="hero-image" src="<?php echo get_post_thumbnail_url($post->ID, 'max' ); ?>" />

        <!-- BUTTONS ON THE LEFT -->
        <?php $home_page_image_buttons = get_field('home-page-image-buttons'); if ($home_page_image_buttons): ?>
            <ul class="hero-buttons">
                <?php foreach($home_page_image_buttons as $button): ?>
                    <li>
                        <a href="<?php echo $button['link']; ?>"
                            <?php if ($button['color']): ?>
                                style="background-color: <?php echo $button['color']; ?>"
                            <?php endif; ?>>
                            <?php echo  $button['label_line_1']; ?>
                            <?php if ($button['label_line_2']): ?>
                                <br><?php echo $button['label_line_2']; ?>
                            <?php endif; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <!-- TEXT OVERLAY -->
        <?php $content = get_field('image_text_overlay'); if ($content): ?>
            <div class="hero-text-overlay">
                <?php echo $content; ?>
            </div>
        <?php endif; ?>

    </div>

    <!-- TEASERS -->
    <?php $teasers = get_field('teasers'); if ($teasers): ?>
        <?php $i=0; foreach ($teasers as $teaser): ?>


            <?php if ($teaser['color']): ?>
                <style scoped>
                    .home-page-teaser.home-page-teaser-<?php echo $i; ?> {
                        background-color: <?php echo $teaser['color']; ?>
                    }
                    @media screen and (min-width: 992px) {
                        .home-page-teaser.home-page-teaser-<?php echo $i; ?> .teaser-content {
                            background-color: <?php echo hex2rgba($teaser['color'], 0.7); ?>
                        }
                    }
                </style>
            <?php endif; ?>
            <div class="home-page-teaser home-page-teaser-<?php echo $i; ?>">

                <div class="teaser-img" style="background-image: url('<?php echo $teaser['image']['sizes']['max']; ?>')"> </div>

                <div class="teaser-content">
                    <?php echo $teaser['content']; ?>
                    <a class="teaser-button" href="<?php echo $teaser['link']; ?>">
                        <?php echo $teaser['button_label']; ?> <i class="fa fa-arrow-right"></i>
                    </a>
                </div>


            </div>
        <?php $i++; endforeach; ?>
    <?php endif; ?>


<?php endwhile; ?>
<?php get_footer(); ?>