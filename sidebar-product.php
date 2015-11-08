<!-- sidebar.php -->

<?php
$this_taxonomy = 'product_categories';
$terms = get_terms( $this_taxonomy );
$this_post_terms = wp_get_post_terms($post->ID, $this_taxonomy);
?>

<p>Product Categories</p>
<ul class="taxonomy <?php echo $this_taxonomy; ?>">
    <?php foreach($terms as $term): ?>
        <?php
        $current = "";
         if (has_term($term->term_id, $this_taxonomy, $post->ID)) $current = " current ";
         ?>
        <li class="<?php echo $current; ?>"><a href="<?php echo get_term_link($term ); ?>"><?php echo $term->name; ?></a></li>
    <?php endforeach ?>
</ul>

<?php

// what product categories?
$this_post_cats = $this_post_terms;
foreach($this_post_cats as $this_post_cat) {
    $this_taxonomy = $this_post_cat->slug."-by-type";
    $terms = get_terms( $this_taxonomy );
    $this_post_terms = wp_get_post_terms($post->ID, $this_taxonomy);
    ?>

    <p>Types</p>
    <ul class="taxonomy <?php echo $this_taxonomy; ?>">
        <?php foreach($terms as $term): ?>
            <?php
            $current = "";
            if (has_term($term->term_id, $this_taxonomy, $post->ID)) $current = " current ";
            ?>
            <li class="<?php echo $current; ?>"><a href="<?php echo get_term_link($term ); ?>"><?php echo $term->name; ?></a></li>
        <?php endforeach ?>
    </ul>
    <?php
}
?>


<?php
// what type manufacturers?

$this_post_types = $this_post_terms;
foreach($this_post_types as $this_post_type) {
    $this_taxonomy = $this_post_type->slug."-mfr";
    $terms = get_terms( $this_taxonomy );
    $this_post_terms = wp_get_post_terms($post->ID, $this_taxonomy);

    ?>
    <p>Manufacturers</p>
    <ul class="taxonomy <?php echo $this_taxonomy; ?>">
        <?php foreach($terms as $term): ?>
            <?php
            $current = "";
            if (has_term($term->term_id, $this_taxonomy, $post->ID)) $current = " current ";
            ?>
            <li class="<?php echo $current; ?>"><a href="<?php echo get_term_link($term ); ?>"><?php echo $term->name; ?></a></li>
        <?php endforeach ?>
    </ul>
    <?php
}
?>