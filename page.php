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


<!-- Codestar Metabox Option Showing -->

    <div class="metabox-option">
        <h2><?php _e('Metabox Option', 'philosophy'); ?></h2>
        <?php
        $philosophy_page_metabox = get_post_meta(get_the_ID(), 'metabox-page', true);
        echo $philosophy_page_metabox['page_heading']."<br>";
        echo $philosophy_page_metabox['page_desc']."<br>";

        if($philosophy_page_metabox['is_fav']){
            echo $philosophy_page_metabox['fav_text'];
        }
        ?>
    </div>




</section> <!-- s-content -->

<?php get_footer(); ?>