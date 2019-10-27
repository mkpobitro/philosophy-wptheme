<?php

/**
 * Template Name: Shortcode Example
 */

the_post();
get_header() ?>

<!-- s-content
    ================================================== -->
<section class="s-content s-content--narrow s-content--no-padding-bottom">

    <article class="row format-standard">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                <?php the_title() ?>
                <?php the_content(); ?>
            </h1>

        </div> <!-- end s-content__header -->


    </article>



<?php get_footer() ?>