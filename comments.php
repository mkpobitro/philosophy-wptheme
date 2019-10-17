</section> <!-- s-content -->

<div class="comments-wrap mt-0">

    <div id="comments" class="row">
        <div class="col-full">

            <h3 class="h2">
                <?php $philosophy_cn = get_comments_number();
                if($philosophy_cn<=1){
                    echo $philosophy_cn." ".__("comment", "philosophy");
                }else{
                    echo $philosophy_cn." ".__("Comments","philosophy");
                } ?>
            </h3>

            <!-- commentlist -->
            <ol class="commentlist">

            <?php wp_list_comments() ?>

            </ol> <!-- end commentlist -->

            <?php the_comments_pagination(array(
                'screen_reader_text'    => __("pagination", "philosophy"),
                'prev_text'             => '<'.__("Previous Comments", "philosophy"),
                'next_text'             => '>'.__("Next Comments", "philosophy"),
            ));
            ?>

            <!-- respond
                ================================================== -->
            <div class="respond">

                <h3 class="h2"><?php _e("Add Comment", "philosophy") ?></h3>

                 <!-- end form -->
                 <?php comment_form(); ?>
                 <!-- end form -->

            </div> <!-- end respond -->

        </div> <!-- end col-full -->

    </div> 