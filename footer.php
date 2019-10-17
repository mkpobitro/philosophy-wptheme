 <!-- s-extra
    ================================================== -->
 <section class="s-extra">

     <div class="row top">
         <!-- Popular Posts Section -->
         <div class="col-eight md-six tab-full popular">
             <h3><?php _e("Popular Posts", "philosophy"); ?></h3>

             <div class="block-1-2 block-m-full popular__posts">
                 <?php 
                    $philosophy_popular_posts = new WP_Query(array(
                        "posts_per_page"        => 6,
                        "ignore_sticky_posts"   => 1,
                        "orderby"              => 'comment_count',
                    ));

                    While( $philosophy_popular_posts->have_posts() ){
                    $philosophy_popular_posts->the_post(); ?>
                    <article class="col-block popular__post">
                        <a href="<?php the_permalink() ?>" class="popular__thumb">
                            <?php the_post_thumbnail() ?>
                        </a>
                        <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span><?php _e("By", "philosophy") ?></span> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta("ID"))); ?>"> <?php the_author() ?></a></span>
                            <span class="popular__date"><span><?php _e("on", "philosophy") ?></span> <time datetime="2017-12-19"><?php echo get_the_date() ?></time></span>
                        </section>
                    </article>

                    <?php }
                wp_reset_query();
                ?>

             </div> <!-- end popular_posts -->
         </div> <!-- end popular -->

         <div class="col-four md-six tab-full about">
            <?php 
                if( is_active_sidebar('before-ftr-right') ){
                    dynamic_sidebar('before-ftr-right');
                }
            ?>

         </div> <!-- end about -->

     </div> <!-- end row -->

     <!-- Footer Tag Section -->
     <div class="row bottom tags-wrap">
         <div class="col-full tags">
             <h3><?php _e("Tags", "philosophy") ?></h3>

             <div class="tagcloud">
                <?php the_tags("","","") ?>
             </div> 
         </div> <!-- end tags -->
     </div> <!-- end tags-wrap -->

 </section> <!-- end s-extra -->


 <!-- s-footer
    ================================================== -->
 <footer class="s-footer">

     <div class="s-footer__main">
         <div class="row">

             <div class="col-two md-four mob-full s-footer__sitelinks">

                 <h4><?php _e("Quick Links", "philosophy") ?></h4>

                <?php 
                    wp_nav_menu(array(
                        'theme_location'    => 'fl',
                        'menu_class'        => 's-footer__linklist',
                        'menu_id'           => 'footer_left'
                    ));
                ?>

             </div> <!-- end s-footer__sitelinks -->

             <div class="col-two md-four mob-full s-footer__archives">

                 <h4><?php _e("Archives", "philosophy") ?></h4>
                 <?php 
                    wp_nav_menu(array(
                        'theme_location'    => 'fm',
                        'menu_class'        => 's-footer__linklist',
                        'menu_id'           => 'footer_medium'
                    ));
                ?>

             </div> <!-- end s-footer__archives -->

             <div class="col-two md-four mob-full s-footer__social">

                 <h4><?php _e("Social", "philosophy") ?></h4>
                 <?php 
                    wp_nav_menu(array(
                        'theme_location'    => 'fr',
                        'menu_class'        => 's-footer__linklist',
                        'menu_id'           => 'footer_right'
                    ));
                ?>

             </div> <!-- end s-footer__social -->

             <!-- Footer Right Widget Section -->
             <div class="col-five md-full end s-footer__subscribe">

                    <?php 
                        if(is_active_sidebar("footer-right")){
                            dynamic_sidebar("footer-right");
                        }
                    ?>

                 <div class="subscribe-form">
                     <form id="mc-form" class="group" novalidate="true">

                         <input type="email" value="" name="EMAIL" class="email" id="mc-email"
                             placeholder="Email Address" required="">

                         <input type="submit" name="subscribe" value="Send">

                         <label for="mc-email" class="subscribe-message"></label>

                     </form>
                 </div>

             </div> <!-- end s-footer__subscribe -->

         </div>
     </div> <!-- end s-footer__main -->

            <!-- Footer Bottom Section -->
     <div class="s-footer__bottom">
         <div class="row">
             <div class="col-full">
                 <div class="s-footer__copyright">
                     <?php 
                        if(is_active_sidebar("footer-bottom")){
                            dynamic_sidebar("footer-bottom");
                        }
                     ?>
                 </div>

                 <div class="go-top">
                     <a class="smoothscroll" title="Back to Top" href="#top"></a>
                 </div>
             </div>
         </div>
     </div> <!-- end s-footer__bottom -->

 </footer> <!-- end s-footer -->


 <!-- preloader
    ================================================== -->
 <div id="preloader">
     <div id="loader">
         <div class="line-scale">
             <div></div>
             <div></div>
             <div></div>
             <div></div>
             <div></div>
         </div>
     </div>
 </div>


 <?php wp_footer() ?>

 </body>

 </html>