<div class="sidebar sidebar-product">


<?php

// SINGLE POST
if (is_single()) {
    $crumb = bms_get_crumb($post);

    foreach($crumb as $c) {
        ?>
        <p class="tax-name"><?php echo $c['tax_name']; ?></p>
        <ul class="tax tax-<?php echo $c['tax_slug']; ?>">
            <?php $terms = get_terms($c['tax_slug']); ?>
            <?php foreach($terms as $term):
                $current = "";
                if (has_term($term->term_id, $c['tax_slug'], $post->ID)) $current = " current ";
                ?>
                <li class="<?php echo $current; ?>"><a href="<?php echo get_term_link($term ); ?>"><?php echo $term->name; ?></a></li>
            <?php endforeach; ?>

        </ul>
        <?php
    }
// TAXONOMY
} else  if (is_tax()) {
    $this_tax_slug = $wp_query->query_vars['taxonomy'];
    $kgo = true;
    $crumb = bms_get_crumb($post);
    $depth = 0;

    foreach($crumb as $c) {
        if ($kgo):
            $depth ++;
        ?>
            <p class="tax-name"><?php echo $c['tax_name']; ?></p>
            <ul class="tax tax-<?php echo $c['tax_slug']; ?>">
                <?php $terms = get_terms($c['tax_slug']); ?>
                <?php foreach($terms as $term):
                        $current = "";
                        if (has_term($term->term_id, $c['tax_slug'], $post->ID)) {
                            $current = " current ";
                            $current_taxonomy = $c['tax_slug'];
                            $current_term = $term;
                        }
                        ?>
                            <li class="<?php echo $current; ?>"><a href="<?php echo get_term_link($term ); ?>"><?php echo $term->name; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <?php if ($c['tax_slug'] == $this_tax_slug) $kgo = false; ?>
        <?php endif; ?>
        <?php
    }

    $tax_slug = false;
    switch($depth) {
        case (0):
            break;
        case(1):
            $tax_slug = $current_term->slug.'-by-type';
            break;
        case(2):
            $tax_slug = $current_term->slug.'-mfr';
            break;
    }

    if ($tax_slug) {
        $terms = get_terms($tax_slug);
        if (count($terms)>0) {

            $tax = get_taxonomy($tax_slug);

            ?>

            <p class="tax-name"><?php echo $tax->labels->name ?></p>
            <ul class="tax tax-<?php echo $tax_slug; ?>">
                <?php foreach($terms as $term): ?>
                    <li><a href="<?php echo get_term_link($term ); ?>"><?php echo $term->name; ?></a></li>
                <?php endforeach; ?>
            </ul>

            <?php
        }
    }
// PRODUCT ARCHIVE
} else if (is_archive()) {
    $tax_slug = 'product_categories';
    $tax = get_taxonomy('product_categories');
    ?>
    <p class="tax-name"><?php echo $tax->label; ?></p>
    <ul class="tax tax-<?php echo $tax_slug; ?>">
        <?php $terms = get_terms($tax_slug); ?>
        <?php foreach($terms as $term): ?>

            <li class=""><a href="<?php echo get_term_link($term ); ?>"><?php echo $term->name; ?></a></li>
        <?php endforeach; ?>

    </ul>
    <?php
}

?>

</div>