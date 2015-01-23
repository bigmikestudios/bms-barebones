<?php

// set up global block picker
function global_block_choices( $field ) {

    // reset choices
    $field['choices'] = array();


    // get the textarea value from options page without any formatting

    $global_blocks = get_field('blocks','option');
    //trace($global_blocks);
    $choices = array();

    foreach($global_blocks as $block) {
        if ($block['name']) $choices[] = $block['name'];
    }

    // remove any unwanted white space
    $choices = array_map('trim', $choices);


    // loop through array and add to field 'choices'
    if( is_array($choices) ) {
        foreach( $choices as $choice ) {
            $field['choices'][ $choice ] = $choice;
        }
    }

    // return the field
    return $field;

}

add_filter('acf/load_field/name=global_block', 'global_block_choices');

function the_block($block){
    ?>

    <div class="strata block <?php echo $block['name']; ?>">
        <div class="container">
            <div class="row">
    <?php
    switch ($block['acf_fc_layout']) {
        case ('columns'):
            $columns = count($block['columns']);
            $column_number = 12 / $columns;
            ?>
                        <?php foreach ($block['columns'] as $column): ?>
                            <div class="col-md-<?php echo $column_number; ?>">
                                <?php echo apply_filters('the_content', $column['content']); ?>
                            </div>
                        <?php endforeach; ?>
            <?php
            break;
        case ('4_images_under_a_description'):
            ?>
            <div class="col-sm-12">
                    <?php echo apply_filters('the_content', $block['description']); ?>
            </div>
            <div class="col-sm-12 col-md-8 col-md-offset-2">
                <?php foreach ($block['images'] as $image): ?>
                    <?php $image_url = $image['image']['url']; ?>
                    <?php $link_url = $image['url']; ?>
                    <?php $open_in_a_new_tab = $image['open_in_a_new_tab']; ?>
                    <div class="col-sm-3">
                        <?php if ($image['url']) :?>
                        <a href="<?php echo $image['url'];?>"
                           <?php if ($image['open_in_a_new_tab']): ?>target="_blank"<?php endif; ?>>

                            <img src="<?php echo $image_url; ?>" class="img-responsive center-block" alt='' />
                        </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>

            </div>
            <?php
            break;
        case ('2_thirds_and_1_third') :
            ?>
            <div class="col-sm-8">
                <?php echo apply_filters('the_content', $block['big_column']); ?>
            </div>
            <div class="col-sm-4">
                <?php echo apply_filters('the_content', $block['little_column']); ?>
            </div>
            <?php
            break;
        case ('divider'):
            ?>
            <div class="col-sm-12">
				<div class="divider-h">
					<span class="divider"></span>
				</div>
			</div>
            <?php
            break;
        default:
            ?>
            <p>NO OPTION FOR THIS LAYOUT (<?php echo $block['acf_fc_layout'] ;?>) EXISTS IN FUNCTION "the_block()".</p>
           <?php
            trace($block);
            break;
    }
    ?>

            </div>
        </div>
    </div>
    <?php
}

function the_global_block($name) {
    // get the global blocks.
    $global_blocks = get_field('blocks','option');

    // get the specific global block we are after.
    $my_block = false;
    foreach($global_blocks as $global_block) {
        //trace($global_block);
        if ($global_block['name'] == $name ) {
            the_block($global_block);
            return;
        }
    }
    // if we are here, we didn't find the block
    ?><p>NO GLOBAL BLOCK NAMED "<?php echo $name; ?>" EXISTS.</p><?php
}