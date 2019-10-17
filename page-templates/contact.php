<?php

//Template Name: Contact Page


the_post();
get_header() ?>

<!-- s-content
    ================================================== -->
<section class="s-content s-content--narrow s-content--no-padding-bottom">

    <article class="row format-standard">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                <?php the_title() ?>
            </h1>

        </div> <!-- end s-content__header -->



        <div class="s-content__media col-full">
            <div class="s-content__post-thumb">
                <?php the_post_thumbnail() ?>
            </div>
        </div> <!-- end s-content__media -->


        <!-- Contact Maps Widgets Area -->
        <div>
            <?php if(is_active_sidebar('contact-maps')){
                    dynamic_sidebar('contact-maps');
                } ?>
        </div>

        <div class="col-full s-content__main">
            <!-- Single Post Main Content Start -->
            <?php the_content() ?>

            <!-- Contact Page Widget Sidebar Start     -->
            <div class="row block-1-2 block-tab-full">
                <?php if(is_active_sidebar('contact-info')){
                    dynamic_sidebar('contact-info');
                } ?>
            </div>
        </div> <!-- end s-content__main -->

        <!-- Contact Form Section  -->


        <div class="contact-form">
            <h3><?php _e("Say Hello", "philosophy"); ?></h3>
            <?php if( get_field("contact_form_shortcode") ){
                echo do_shortcode(get_field("contact_form_shortcode"));
            } ?>
        </div>
        <!-- end form -->

    </article>



    <?php get_footer() ?>