<?php
    define( 'ATTACHMENTS_SETTINGS_SCREEN', false ); // disable the Settings screen
    add_filter( 'attachments_default_instance', '__return_false' ); // disable the default instance


    function philosophy_gallery_images($attachments){
        $post_id = null;
        if ( isset($_REQUEST['post']) || isset($_REQUEST['post_ID']) ){ //condition for showing specific format attachment box
            $post_id = empty( $_REQUEST['post_id'] ) ? $_REQUEST['post']: $_REQUEST['post_ID'];
        }
        if(!$post_id || get_post_format($post_id)!='gallery'){
            return;
        }

        $fields = array(
            array(
                'name'      =>  'title',
                'type'      =>  'text',
                'label'     => __('Title', 'philosophy'),
            ),
        );
        $args = array(
            'label'         => 'Our Post Attachments',
            'post_type'     => array('post'),
            'filetype'      => array('image'),
            'note'          => 'Add Gallery image',
            'button_text'   => __( 'Attach Gallery Image', 'philosophy' ),
            'fields'        => $fields,

        );
        $attachments->register( 'gallery', $args );
    }
    add_action( 'attachments_register', 'philosophy_gallery_images' );




