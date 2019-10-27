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


        <!-- Showing all chapter under this book -->
            <?php $book_title = get_the_title(); ?>
            <h2><?php _e("{$book_title} Book Chapters", "philosophy"); ?></h2>
            <?php
            $philosophy_cptr_args = array(
                'post_type'     => 'chapter',
                'posts_per_page'=>  '',
                'meta_key'      => 'parent_book',
                'meta_value'    => get_the_ID(),
            );

            $philosophy_chapters = new WP_Query($philosophy_cptr_args);
            while($philosophy_chapters->have_posts()){
                $philosophy_chapters->the_post();
                $philosophy_cptr_link = get_the_permalink();
                $philosophy_cptr_title = get_the_title();

                printf("<a href='%s'>%s</a>"."<br>",$philosophy_cptr_link,$philosophy_cptr_title);
            } 
            wp_reset_query();
            ?>



            <!-- CMB2 Attached posts ( chapter showing under every books) -->

            <h2><?php _e("Chapters", "philosophy"); ?></h2>
            <?php
            $philosophy_cmb2_chapters = get_post_meta(get_the_ID(), 'attached_cmb2_attached_posts', true);
            print_r($philosophy_cmb2_chapters);

            foreach($philosophy_cmb2_chapters as $pch){
                $philosophy_chptr_link = get_the_permalink($pch);
                $philosophy_chptr_title = get_the_title($pch);

                printf("<a href='%s'>%s</a>",$philosophy_chptr_link, $philosophy_chptr_title);
            }
            ?>





            <!-- start s-content__tags -->
            <p class="s-content__tags">
                <span><?php _e("Post Tags", "philosophy") ?></span>

                <span class="s-content__tag-list">
                    <?php the_tags("", "", "") ?>
                </span>
            </p> <!-- end s-content__tags -->


            <!-- For Showing Languages -->
            <p class="s-content__tags">
                <span><?php _e("Language", "philosophy") ?></span>

                <span class="s-content__tag-list">
                    <?php the_terms(get_the_ID(),"language", "", "", "") ?>
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