<?php get_header() ?>


<!-- s-content
    ================================================== -->
<section class="s-content">

    <div class="row masonry-wrap">
        <div class="">

            <div class="grid-sizer"></div>

            <?php while( have_posts() ): the_post(); ?>

            <!-- get_template_part("post-formats/post", get_post_format());  -->

            <h2 class="text-center"><?php the_title(); ?></h2>
            <p><?php the_content(); ?></p>
            <?php endwhile; ?>
        </div> <!-- end masonry -->
    </div> <!-- end masonry-wrap -->



    <!-- Codestar Metabox Upload and Image Field Showing-->
    <div class="metabox-option">
        <h2><?php _e('Metabox Option', 'philosophy'); ?></h2>
        <?php
        $philosophy_page_metabox = get_post_meta(get_the_ID(), 'page-upload-metabox', true);
        echo $philosophy_page_metabox['page-upload']."<br>";
        // $philosophy_page_metabox['img-upload'];
        echo wp_get_attachment_image( $philosophy_page_metabox['img-upload'], 'medium');
        ?>



    <!-- Showing Gallery Images -->
    <h2>Gallery Images</h2>
    <?php 
    echo $philosophy_page_metabox['page-gallery'];

    echo "<br>";

    if($philosophy_page_metabox['page-gallery']){
        $philosophy_gallery_ids = explode(',', $philosophy_page_metabox['page-gallery']);
        foreach($philosophy_gallery_ids as $philosophy_gallery_id){
            echo wp_get_attachment_image( $philosophy_gallery_id, 'medium');
        }
    }
    ?>


    <!-- Codestar Fieldset Area Showing -->
    <h2>FieldSet Area</h2>
    <?php
    global $post;
    echo $philosophy_page_metabox['fieldset_1']['fieldset_1_text']."<br>";

    $fieldset_img_src = $philosophy_page_metabox['fieldset_1']['fieldset_1_upload']; //get img src link

    echo "<img width='50%' src='$fieldset_img_src' />"."<br>"; // src link to convert img 

    echo $philosophy_page_metabox['fieldset_1']['fieldset_1_textarea'];
    ?>


    </div>
</section> <!-- s-content -->

<?php get_footer(); ?>