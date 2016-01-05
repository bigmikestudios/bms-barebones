<!-- sidebar.php -->
<div class="sidebar">

    <!-- SUBNAV -->
    <?php
    // are we looking at a single series? If so, let's pretend we're on the design page.
    echo wp_nav_menu(array(
        'theme-location' => 'sidebar-menu',
        'depth' => 3,
        //'walker' => new Walker_Submenu()
    ));
    ?>

    <!-- SIDEBAR BUTTONS -->
    <?php
    if (is_page()) {
        $sidebar_buttons = get_field("sidebar_buttons", $post->ID);
        if ($sidebar_buttons) {
            ?>
            <ul class="sidebar-buttons">
                <?php foreach ($sidebar_buttons as $button): ?>
                    <li
                        <?php if ($button['color']): ?>style="background-color: <?php echo $button['color']; ?>;"<?php endif;?>>
                        <a href="<?php echo $button['link'];?>">
                            <?php echo $button['label_line_1']; ?>
                            <?php if ($button['label_line_2']): ?><br> <?php echo $button['label_line_2']; ?><?php endif; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php
        }
    }
    ?>
</div>