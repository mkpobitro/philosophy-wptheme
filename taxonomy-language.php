<?php get_header() ?>


<!-- s-content
    ================================================== -->
<section class="s-content">

    <!-- Showing Taxonomy Title and Their Featured Image -->
    <h2 class="text-center"><?php single_cat_title(); ?></h2>
    <?php
    $term = get_queried_object();
    $term_meta = get_term_meta($term->term_id, 'custom_taxonomy_option', true);


    if(isset($term_meta['featured_image'])){
    echo "<center>".wp_get_attachment_image($term_meta['featured_image'], 'large')."</center>";
    }
    ?>

    <div class="row masonry-wrap">
        <h2 class="text-center"><?php _e("All Books Here", "philosophy"); ?></h2>
        <div class="masonry">

            <div class="grid-sizer"></div>

            <?php while( have_posts() ){
                the_post();

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