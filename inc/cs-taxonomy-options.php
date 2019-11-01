<?php

function philosophy_csf_taxonomy(){
    CSFramework_Taxonomy::instance( array() );
}
add_action('init','philosophy_csf_taxonomy');


function philosophy_language_options($options){

    $options[]    = array(
        'id'        => 'custom_taxonomy_option',
        'taxonomy' => 'language', // or array( 'category', 'post_tag' )
      
        // begin: fields
        'fields'    => array(
      
          // begin: a field
          array(
            'id'    => 'featured_image',
            'type'  => 'image',
            'title' => __('Featured Image', 'philosophy'),
          ),
        ), // end: fields
      );

    return $options;
}
add_filter('cs_taxonomy_options', 'philosophy_language_options');



