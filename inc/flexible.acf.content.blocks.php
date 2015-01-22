<?php

// set up global block picker
function acf_load_color_field_choices( $field ) {

    // reset choices
    $field['choices'] = array();


    // get the textarea value from options page without any formatting
    $choices = array();

    if (have_rows('blocks','option')) {
        while ( have_rows('blocks') ) : the_row();
            $name = get_sub_field('name');
            if ($name) $choices[]=get_sub_field('name');

        endwhile;
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

add_filter('acf/load_field/name=global_block', 'acf_load_color_field_choices');