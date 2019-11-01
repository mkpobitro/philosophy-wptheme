<?php

function philosophy_csf_shortcode(){
    CSFramework_Shortcode_Manager::instance(array());
}
add_action('init','philosophy_csf_shortcode');



// ২৪.১০ - কোডস্টার দিয়ে শর্টকোড এন্ট্রি দেয়ার ফর্ম বানানো

function philosophy_google_map_shortcode($options){
    $options[]     = array(
        'name'          => 'group_1',
        'title'         => 'Group #1',
        'shortcodes'    => array(
      
          array(
            'name'      => 'gmap',
            'title'     => 'Google Map',
            'fields'    => array(
                array(
                    'id'    => 'place',
                    'type'  => 'text',
                    'title' => __('Place', 'philosophy'),
                    'default'=> 'Satkhira, Bangladesh',
                    'help'  => __('Enter Place Here', 'philosophy'),
                ),
                array(
                    'id'    => 'width',
                    'type'  => 'text',
                    'title' => __('Width', 'philosophy'),
                    'default'=> '100%'
                ),
                array(
                    'id'    => 'height',
                    'type'  => 'text',
                    'title' => __('Height', 'philosophy'),
                    'default'=> '400px'
                ),
                array(
                    'id'    => 'zoom',
                    'type'  => 'text',
                    'title' => __('Height', 'philosophy'),
                    'default'=> 11
                ),
            ),
          ),
      
        )
      );
    return $options;
}
add_filter('cs_shortcode_options', 'philosophy_google_map_shortcode');