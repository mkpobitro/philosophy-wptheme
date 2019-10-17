<article class="masonry__brick entry format-standard" data-aos="fade-up">

    <div class="entry__thumb">
    <a href="<?php the_permalink() ?>" class="entry__thumb-link">
            <?php the_post_thumbnail("philosophy-square-400") ?>
        </a>
    </div>

    <!-- post-summery -->
    <?php get_template_part("template-parts/common/post/summery"); ?>

</article> <!-- end article -->