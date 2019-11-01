<?php

function philosophy_csf_metabox(){
    CSFramework_Metabox::instance(array());
}
add_action('init','philosophy_csf_metabox');



function philosophy_page_metabox($options){

    $page_id = 0;
    if( isset( $_REQUEST['post'] ) || isset($_REQUEST['post_ID'])){
        $page_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }

    $current_page_template = get_post_meta($page_id, '_wp_page_template', true);
    // if( 'page-templates/about.php'!=$current_page_template ){ // if selected a single page template
    if( !in_array($current_page_template,array('page-templates/about.php', 'page-templates/contact.php', 'page-home-page-sections') )){ // if selected multiple page template
        return $options;
    }


    $options[] = array(
        'id'        => 'metabox-page',
        'title'     => __('Page Meta Info', 'philosophy'),
        'post_type' => array('page'),
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array( //1st section
                'name'  => 'first-section',
                'title' => __('First Section', 'philosophy'),
                'icon'  => 'fa fa-heart',
                'fields'=> array(
                    array(
                        'id'    => 'page_heading',
                        'type'  => 'text',
                        'title' => __('Page Heading', 'philosophy')
                    ),
                    array(
                        'id'    => 'page_desc',
                        'type'  => 'textarea',
                        'title' => __('Page Description', 'philosophy')
                    ),
                    array(
                        'id'    => 'is_fav',
                        'type'  => 'switcher',
                        'title' => __('Is Favorite?', 'philosophy'),
                        'default'=> 0
                    ),
                    
                    array(
                        'id'    => 'extra_check',
                        'type'  => 'switcher',
                        'title' => __('Extra Check', 'philosophy'),
                        'default'=> 0
                    ),

                    array(
                        'id'    => 'fav_text',
                        'type'  => 'text',
                        'title' => __('Favorite Text', 'philosophy'),
                        'dependency'=> array('is_fav|extra_check', '==|==', '1|1')
                    ),
                    
                    array(
                        'id'         => 'lang-select',
                        'type'       => 'checkbox',
                        'title'      => __('Select Languages', 'philosophy'),
                        'options'    => array(
                            'bangla'  => 'Bangla',
                            'english' => 'English',
                            'franch'  => 'Franch',
                        ),
                        'attributes'=> array(
                            'data-depend-id' => 'lang-select'
                        )
                        ),

                        array(
                        'id'    => 'extra_checkbox_data',
                        'type'  => 'text',
                        'title' => __('Extra Checkbox Data', 'philosophy'),
                        // 'dependency'=> array('lang-select_bangla|lang-select_english', '==|==', '1|1')
                        'dependency'=> array('lang-select', 'any', 'bangla,english')
                    ),
                    

                )
            ),

            array( //2nd section
                'name'  => 'second-section',
                'title' => __('Second Section', 'philosophy'),
                'icon'  => 'fa fa-image',
                'fields'=> array(
                    array(
                        'id'    => 'page_heading_2',
                        'type'  => 'text',
                        'title' => __('Page Heading 2', 'philosophy')
                    ),
                    array(
                        'id'    => 'page_desc_2',
                        'type'  => 'textarea',
                        'title' => __('Page Description 2', 'philosophy')
                    ),
                    array(
                        'id'    => 'is_fav_2',
                        'type'  => 'switcher',
                        'title' => __('Is Favorite? 2', 'philosophy'),
                        'default'=> 1
                    ),
                )
            ),



        ),


    );

    return $options;
}
add_filter('cs_metabox_options', 'philosophy_page_metabox');






//Codestar upload , image, gallery, fieldset , group field 
function philosophy_upload_metabox($options){
    $options[] = array(
        'id'        => 'page-upload-metabox',
        'title'     => __('Upload Files', 'philosophy'),
        'post_type' => array('page'),
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array( //1st section
                'name'  => 'first-section',
                'title' => __('First Section', 'philosophy'),
                'icon'  => 'fa fa-heart',
                'fields'=> array(
                    array( // cs upload field
                        'id'            => 'page-upload',
                        'type'          => 'upload',
                        'title'         => __('Upload PDF File', 'philosophy'),
                        'settings'      => array(
                            // 'upload_type'  => 'image',// at a time we can use only one type
                            'upload_type'  => 'application/pdf',// for pdf upload
                            // 'upload_type'  => 'video/mp4',// for video
                            'button_title' => 'Upload PDF',
                            'frame_title'  => 'Select a pdf',
                            'insert_title' => 'Use this pdf file',
                        ),
                    ),
                    array( // cs image field
                        'id'        => 'img-upload',
                        'type'      => 'image',
                        'title'     => __('Upload Image', 'philosophy'),
                        'add_title' => 'Add Image Now',
                    ),
                    array( // cs gallery field
                        'id'          => 'page-gallery',
                        'type'        => 'gallery',
                        'title'       => __('Upload Gallery Images', 'philosophy'),
                        'add_title'   => 'Gallery Images',
                        'edit_title'  => 'Edit Gallery Images',
                        'clear_title' => 'Remove Gallery Images',
                    ), 
                    array( //cs fieldset field
                        'id'        => 'fieldset_1',
                        'type'      => 'fieldset',
                        'title'     => 'Fieldset Field',
                        'fields'    => array(
                      
                            array(
                                'id'    => 'fieldset_1_text',
                                'type'  => 'text',
                                'title' => 'Text Field',
                            ),
                            array(
                                'id'    => 'fieldset_1_upload',
                                'type'  => 'upload',
                                'title' => 'Upload Field',
                            ),
                            array(
                                'id'    => 'fieldset_1_textarea',
                                'type'  => 'textarea',
                                'title' => 'Textarea Field',
                            ),
                      
                        ),
                      ), 
                    
                    array( // cs group field
                        'id'              => 'unique_option_901',
                        'type'            => 'group',
                        'title'           => 'Group Field',
                        'button_title'    => 'Add New',
                        'accordion_title' => 'Add New Field',
                        'fields'          => array(
                          array(
                            'id'    => 'feature_books',
                            'type'  => 'select',
                            'title' => __('Select a book', 'philosophy'),
                            'options'=> 'posts',
                            'query-args'    => array(
                                'post_type' => 'book',
                                'posts_per_page'=> -1,
                                'orderby'      => 'post_date',
                                'order'        => 'DESC',
                            ),
                          ),
                        ),
                      ),


                ),
            ),
        ),
    );

    return $options;
}
add_action('cs_metabox_options', 'philosophy_upload_metabox');




//২৪.৯ - আরো অ্যাডভান্সড কন্ডিশনের উপরে ভিত্তি করে কোডস্টার মেটাবক্স ডিসপ্লে করা

function philosophy_custom_post_types($options){

    $page_id = 0;
    if( isset( $_REQUEST['post'] ) || isset($_REQUEST['post_ID'])){
        $page_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }



    $options[] = array( //for making custom post type select options
        'id'        => 'page-custom-post-type',
        'title'     => __('Select Custom Post Type', 'philosophy'),
        'post_type' => array('page'),
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array( //1st section
                'name'  => 'first-section',
                // 'title' => __('First Section', 'philosophy'),
                'icon'  => 'fa fa-heart',
                'fields'=> array(
                    array( // cs upload field
                        'id'            => 'cpt_type',
                        'type'          => 'select',
                        'title'         => __('Select Custom Post Type', 'philosophy'),
                        'options'  => array(
                            'none'  => 'None',
                            'book'   => 'Book',
                            'chapter' => 'Chapter',
                        ),
                    ),


                ),
            ),
        ),
    );


    $page_meta_info = get_post_meta($page_id, 'page-custom-post-type', true);

    if(isset($page_meta_info['cpt_type']) && $page_meta_info['cpt_type']=='book'){
    $options[] = array( //after select book post type will show this book info
        'id'        => 'page-custom-post-type-book',
        'title'     => __('Options For Book', 'philosophy'),
        'post_type' => array('page'),
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array( //1st section
                'name'  => 'first-section',
                // 'title' => __('First Section', 'philosophy'),
                'icon'  => 'fa fa-heart',
                'fields'=> array(
                    array( // cs upload field
                        'id'            => 'cpt_type_book',
                        'type'          => 'text',
                        'title'         => __('Some Book Info', 'philosophy'),
                    ),
                ),
            ),
        ),
    );
}

    if(isset($page_meta_info['cpt_type']) && $page_meta_info['cpt_type'] =='chapter'){
    $options[] = array( //after select chapter post type will show this chapter info
        'id'        => 'page-custom-post-type-chapter',
        'title'     => __('Options For Chapter', 'philosophy'),
        'post_type' => array('page'),
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array( //1st section
                'name'  => 'first-section',
                // 'title' => __('First Section', 'philosophy'),
                'icon'  => 'fa fa-heart',
                'fields'=> array(
                    array( // cs upload field
                        'id'            => 'cpt_type_chapter',
                        'type'          => 'text',
                        'title'         => __('Some Chapter Info', 'philosophy'),
                    ),
                ),
            ),
        ),
    );

}

    return $options;
}
add_filter('cs_metabox_options', 'philosophy_custom_post_types');



//Group Field Demo

function philosophy_group_field_demo($options){ 
    $options[] = array(
        'id'        => 'group-demo-data',
        'title'     => __('Group Demo Data', 'philosophy'),
        'post_type' => array('post'),
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array( //1st section
                'name'  => 'first-section',
                // 'title' => __('First Section', 'philosophy'),
                'icon'  => 'fa fa-heart',
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
            ),
        ),
    );
    return $options;
}
add_filter('cs_metabox_options','philosophy_group_field_demo');





//another useful codestar field
function philosophy_useful_field_demo($options){ 
    $options[] = array(
        'id'        => 'useful-field-dem',
        'title'     => __('Useful field Demo', 'philosophy'),
        'post_type' => array('post'),
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array( //1st section
                'name'  => 'first-section',
                // 'title' => __('First Section', 'philosophy'),
                'icon'  => 'fa fa-heart',
                'fields'=> array(
                    array( //heading field
                        'type'    => 'heading',
                        'content' => __('Heading Title', 'philosophy'),
                      ),

                    array( //subheading field
                        'type'    => 'subheading',
                        'content' => __('Sub Heading Title', 'philosophy'),
                      ),

                    array( //content field
                        'type'    => 'content',
                        'content' => __('Lorem Ipsum Sit Amet Dolor amet', 'philosophy'),
                      ),
                      array( //icon field
                        'id'      => 'unique_option_802',
                        'type'    => 'icon',
                        'title'   => 'Icon Field',
                        'default' => 'fa fa-heart',
                      ),  
                      array( // color picker field
                        'id'      => 'unique_option_3002',
                        'type'    => 'color_picker',
                        'title'   => 'Color Picker Field',
                        'default' => '#ffbc00',
                      ),
                      array( // typography
                        'id'        => 'unique_option_4002',
                        'type'      => 'typography',
                        'title'     => 'Typography Field',
                        'default'   => array(
                          'family'  => 'Open Sans',
                          'variant' => '800',
                          'font'    => 'google', // this is helper for output
                        ),
                      ),
                      


                ),
            ),
        ),
    );
    return $options;
}
add_filter('cs_metabox_options','philosophy_useful_field_demo');

