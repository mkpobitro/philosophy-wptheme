<?php 
/* 
 *Template Name: Featured Books
 */

get_header() ?>

<!-- s-content
    ================================================== -->
<section class="s-content">

    <div class="row masonry-wrap">
        <h2 class="text-center"><?php _e("Our Featured Books", "philosophy"); ?></h2>
        <div class="masonry">

            <div class="grid-sizer"></div>
            <?php
            $featured_posts = new WP_Query(array(
                'post_type'     => array('book'),
                'meta_key'      => 'is_featured',
                'meta_value'    => true,
                'posts_per_page'=> 4,
            )) 
            ?>
            <?php while( $featured_posts->have_posts() ){
                $featured_posts->the_post();

                get_template_part("post-formats/post", get_post_format()); 
            } ?>

            

        </div> <!-- end masonry -->
    </div> <!-- end masonry-wrap -->


<!-- Blog Home Page pagination Dynamic -->
    <div class="row">
        <div class="col-full">
            <nav class="pgn">
                <?php philosophy_pagination(); ?>
            </nav>
        </div>
    </div>


</section> <!-- s-content -->

<?php get_footer(); ?>