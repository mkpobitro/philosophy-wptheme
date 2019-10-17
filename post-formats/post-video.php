    <?php 
    $philosophy_video_file = "";
    if(function_exists("the_field")){
        $philosophy_video_file = get_field("source_file");
    } ?>


    <article class="masonry__brick entry format-video" data-aos="fade-up">

        <?php if($philosophy_video_file): ?>
        <div class="entry__thumb video-image">
            <a href="<?php echo esc_url($philosophy_video_file); ?>" data-lity>
                <?php the_post_thumbnail("philosophy-square-400") ?>
            </a>
        </div>
        <?php endif; ?>

        <!-- post-summery -->
        <?php get_template_part("template-parts/common/post/summery"); ?>

    </article> <!-- end article -->