<?php
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
            <ul class="s-content__header-meta">
                <li class="date"><?php the_date() ?></li>
                <li class="cat">
                    In
                    <?php the_category(" ") ?>
                </li>
            </ul>
        </div> <!-- end s-content__header -->



        <div class="s-content__media col-full">
            <div class="s-content__post-thumb">
                <?php the_post_thumbnail() ?>
            </div>
        </div> <!-- end s-content__media -->


        <div class="col-full s-content__main">
            <!-- Single Post Main Content Start -->
            <?php the_content() ?>
            <!-- Single Post Main Content Start -->



<!-- Showing Group Filed from Metabox-->
            <?php
          echo "<h2>".__('Group Filed Value From Metabox', 'philosophy')."</h2>";
           $group_field_meta = get_post_meta(get_the_ID(), 'group-demo-data', true);
           $group_data = $group_field_meta['unique_group'];

        //  এটার আউটপুট আমরা ২ ভাবে বের করতে পারি। নিচে দেখানো হলো   
        /* echo $group_data[1]['text-data']."<br>";
           echo $group_data[1]['image-data']."<br>";
           echo $group_data[1]['book-select']."<br>";
           echo $group_data[1]['text-desc']; */

        foreach($group_data as $gd){
            echo esc_html($gd['text-data'])."<br>";
            echo wp_get_attachment_image( $gd['image-data'], 'medium')."<br>";
            echo get_the_title($gd['book-select'])."<br>";
            echo esc_html($gd['text-desc'])."<hr>";
        }


// Showing Group Field From Theme Option
        echo "<h2>".__('Group Filed Value From Theme Option', 'philosophy')."</h2>";
        $theme_option_group_data = cs_get_option('unique_group');
        foreach($theme_option_group_data as $togd){
            echo $togd['text-data']."<br>";
            echo wp_get_attachment_image( $togd['image-data'], 'medium')."<br>";
            echo get_the_title($togd['book-select'])."<br>";
            echo $togd['text-desc']."<hr>";
        }


        ?>





            <!-- start s-content__tags -->
            <p class="s-content__tags">
                <span><?php _e("Post Tags", "philosophy") ?></span>

                <span class="s-content__tag-list">
                    <?php the_tags("", "", "") ?>
                </span>
            </p> <!-- end s-content__tags -->



            <!-- Author Area Start -->
            <div class="s-content__author">
                <?php echo get_avatar(get_the_author_meta("ID")) ?>

                <div class="s-content__author-about">
                    <h4 class="s-content__author-name">
                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta("ID"))) ?> ">
                            <?php the_author() ?>
                        </a>
                    </h4>

                    <p>
                        <?php the_author_meta('description') ?>
                    </p>

                    <?php 
                    $philosophy_user_fb = get_field("facebook", "user_".get_the_author_meta("ID"));
                    $philosophy_user_tt = get_field("twitter", "user_".get_the_author_meta("ID"));
                    $philosophy_user_ld = get_field("linkedin", "user_".get_the_author_meta("ID"));
                    ?>
                    <ul class="s-content__author-social">
                        <?php if($philosophy_user_fb): ?>
                        <li><a href="<?php echo esc_url($philosophy_user_fb); ?>" target="_blank">Facebook</a></li>
                        <?php endif; ?>

                        <?php if($philosophy_user_tt): ?>
                        <li><a href="<?php echo esc_url($philosophy_user_tt); ?>" target="_blank">Twitter</a></li>
                        <?php endif; ?>

                        <?php if($philosophy_user_ld): ?>
                        <li><a href="<?php echo esc_url($philosophy_user_ld); ?>" target="_blank">Linkedin</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <!-- Author Area End -->



            <!-- Prev Next Post Start -->
            <div class="s-content__pagenav">
                <div class="s-content__nav">
                    <!-- prev post with title-->
                    <div class="s-content__prev">
                        <?php
                        $philosophy_prev_post = get_previous_post();
                        if($philosophy_prev_post): ?>
                        <a href="<?php echo get_the_permalink($philosophy_prev_post); ?>" rel="prev">
                            <span><?php _e("Previous Post", "philosophy") ?></span>
                            <?php echo get_the_title($philosophy_prev_post); ?>
                        </a>
                        <?php endif; ?>
                    </div>
                    <!-- Next Post with title -->
                    <div class="s-content__next">
                        <?php 
                        $philosophy_next_post = get_next_post();
                        if($philosophy_next_post): ?>

                        <a href="<?php echo get_the_permalink($philosophy_next_post) ?>" rel="next">
                            <span><?php _e("Next Post", "philosophy") ?></span>
                            <?php echo get_the_title($philosophy_next_post); ?>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div> <!-- end s-content__pagenav -->

        </div> <!-- end s-content__main -->

    </article>


    <!-- comments
    ================================================== -->
    </div>

    <!-- Start comments-wrap -->
    <?php if(!post_password_required()){
        comments_template();
    } ?>
    <!-- end row comments -->

    <?php get_footer() ?>