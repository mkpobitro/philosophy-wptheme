  <?php

  function philosophy_theme_option_init(){
      $settings           = array(
          'menu_title'      => __('Philosophy Theme Options', 'philosophy'),
          'menu_type'       => 'submenu', // menu, submenu, options, theme, etc.
          'menu_parent'     => 'themes.php',
          'menu_slug'       => 'cs-option-panel',
          'ajax_save'       => false,
          'show_reset_all'  => true,
          'framework_title' => __('Philosophy Options', 'philosophy'),
          'menu_position'   => '20'
        );

      $options = philosophy_theme_options();
      new CSFramework( $settings, $options );
  }
  add_action('init','philosophy_theme_option_init');



function philosophy_theme_options(){
    $options  = array();
    $options[]    = array(
        'name'      => 'footer_options',
        'title'     => __('Footer Options', 'philosophy'),
        'icon'      => 'fa fa-edit',
        'fields'    => array(
          // a text field
            array(
                'id'    => 'footer_tag',
                'type'  => 'switcher',
                'title' => __('Show Footer Tag Section', 'philosophy'),
                'default'=> '1',
            ),
            // a textarea field
            array(
                'id'    => 'social_facebook',
                'type'  => 'text',
                'title' => __('Facebook URL', 'philosophy')
            ),
      
            array(
                'id'    => 'social_twitter',
                'type'  => 'text',
                'title' => __('Twitter URL', 'philosophy')
            ),
      
            array(
                'id'    => 'social_behance',
                'type'  => 'text',
                'title' => __('Behance URL', 'philosophy')
            ),
      
        )
      );


      $options[]    = array(
        'name'      => 'section_1',
        'title'     => __('Section #1', 'philosophy'),
        'icon'      => 'fa fa-repeat',
        'fields'    => array(
      
            // a text field
            array(
              'id'    => 'section_1_text',
              'type'  => 'text',
              'title' => 'Text Option Field',
            ),
        
            // a textarea field
            array(
              'id'    => 'section_1_textarea',
              'type'  => 'textarea',
              'title' => 'Textarea Option Field',
            ),
      
        )
      );


  // Making Group Field From Theme Option
  $options[]    = array(
    'name'      => 'group_section',
    'title'     => __('Group Section', 'philosophy'),
    'type'      => 'group',
    'icon'      => 'fa fa-edit',
    'fields'=> array(
      array(
          'id'              => 'unique_group',
          'type'            => 'group',
          'title'           => 'Group Field',
          'desc'            => 'Accordion title using the ID of the field.',
          'button_title'    => __('Add New', 'philosophy'),
          'accordion_title' => __('Group Field Options', 'philosophy'),
          'fields'          => array(
                array(
                    'id'          => 'text-data',
                    'type'        => 'text',
                    'title'       => __('Text Data', 'philosophy')
                ),
                array(
                    'id'          => 'image-data',
                    'type'        => 'image',
                    'title'       => __('Image Data', 'philosophy')
                ),
                
                array(
                    'id'          => 'book-select',
                    'type'        => 'select',
                    'title'       => __('Select Book', 'philosophy'),
                    'options'     => 'post',
                    'query_args'  => array(
                        'posts_per_page'    => -1,
                        'post_type'         => 'book'
                    )
                ),

                array(
                    'id'          => 'text-desc',
                    'type'        => 'textarea',
                    'title'       => __('Text Description', 'philosophy')
                ),
      
          ),
      ),


  ),
  );


  return $options;
}
// add_filter('cs_framework_options', 'philosophy_theme_options');