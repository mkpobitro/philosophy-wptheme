<?php

require_once( get_theme_file_path( "inc/tgm.php" ));
require_once( get_theme_file_path( "inc/cmb2-attached-posts.php") );
require_once( get_theme_file_path( "lib/attachments.php") );
require_once( get_theme_file_path( "widgets/social-icons-widget.php") );
require_once( get_theme_file_path( "lib/csf/cs-framework.php") );
// require_once( get_theme_file_path( "inc/cs-metabox-options.php") );
// require_once( get_theme_file_path( "inc/cs-shortcode-options.php") );
// require_once( get_theme_file_path( "inc/cs-taxonomy-options.php") );
require_once( get_theme_file_path( "inc/cs-framework-options.php") );

//Codestar Framework 
define( 'CS_ACTIVE_FRAMEWORK',  true );
define( 'CS_ACTIVE_METABOX',    true );
define( 'CS_ACTIVE_TAXONOMY',   true );
define( 'CS_ACTIVE_SHORTCODE',  true );
define( 'CS_ACTIVE_CUSTOMIZE',  false );


//For Codestar metabox theme color
define( 'CS_ACTIVE_LIGHT_THEME',   false ); //defalut will be false

if( site_url()=="localhost/basic-theme.dev" ){
	define("VERSION", time());
}else{
	define("VERSION", wp_get_theme()->get("VERSION"));
}



function philosophy_setup(){
    load_theme_textdomain( "philosophy", get_theme_file_path("/languages") );
    add_theme_support( "title-tag" );
    add_theme_support( "post-thumbnails" );
    add_theme_support( "html5", array("search-form", "comment-list") );
    add_theme_support( "custom-logo" );
    add_theme_support( "post-formats", array("image", "gallery", "audio", "video", "link", "quote") );
    add_editor_style( "/assets/css/editor-style.css" );

    register_nav_menus(array(
        'pm'       => __('Primary Menu', 'philosophy'),
        'fl'       => __('Footer Left Menu', "philosophy"),
        'fm'       => __('Footer Medium Menu', 'philosophy'),
        'fr'       => __('Footer Right Menu', 'philosophy'),
    ));

    add_image_size("philosophy-square-400", 400, 400, true);
}
add_action("after_setup_theme", "philosophy_setup");




function philosophy_assets(){
    wp_enqueue_style( "font-awesome-css", get_theme_file_uri("/assets/css/font-awesome/css/font-awesom.css"),null,1.0 );
    wp_enqueue_style( "fonts-css", get_theme_file_uri("/assets/css/fonts.css"),null,1.0 );
    wp_enqueue_style( "base-css", get_theme_file_uri("/assets/css/base.css"),null,1.0 );
    wp_enqueue_style( "vendor-css", get_theme_file_uri("/assets/css/vendor.css"),null, 1.0 );
    wp_enqueue_style( "main-css", get_theme_file_uri("/assets/css/main.css"),null, 1.0 );
    wp_enqueue_style( "philosophy-css", get_stylesheet_uri() );

    wp_enqueue_script( "modernizr-js", get_theme_file_uri("assets/js/modernizr.js"), null, 1.0) ;
    wp_enqueue_script( "pace-min-js", get_theme_file_uri("assets/js/pace.min.js"), null, 1.0 );
    wp_enqueue_script( "plugins-js", get_theme_file_uri("assets/js/plugins.js"), array("jquery"),1.0, true );
    wp_enqueue_script( "main-js", get_theme_file_uri("assets/js/main.js"), array("jquery"),1.0, true );
}
add_action("wp_enqueue_scripts", "philosophy_assets");



// blog home page pagination
    function philosophy_pagination(){
        global $wp_query;
        $links = paginate_links(array(
            'current'       => max(1,get_query_var('paged')),
            'total'         => $wp_query->max_num_pages,
            'type'          => 'list',
            'mid_size'      => apply_filters("philosophy_pagination_mid_size", 1)
        ));

        $links = str_replace("page-numbers", "pgn__num", $links);
        $links = str_replace("<ul class='pgn__num'>", "<ul>", $links);
        $links = str_replace("prev pgn__num", "pgn__prev", $links);
        $links = str_replace("next pgn__num", "pgn__next", $links);
        echo $links;
    }



    remove_action("term_description", "wpautop");



function philosophy_widgets(){
// about page sidebar
    register_sidebar( array(
        'name'          => __( 'About Page', 'philosophy' ),
        'id'            => 'about',
        'description'   => __( 'Widgets in this area will be shown only for About Page.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="col-block %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => '</h3>',
    ) );

    
// Contact Page Maps Area
    register_sidebar( array(
        'name'          => __( 'Contact Page Maps', 'philosophy' ),
        'id'            => 'contact-maps',
        'description'   => __( 'Widgets in this area will be shown only for Contact Page.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="col-block %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => '</h3>',
    ) );

// Contact Page 2 Column Widgets area
    register_sidebar( array(
        'name'          => __( 'Contact Page Widgets', 'philosophy' ),
        'id'            => 'contact-info',
        'description'   => __( 'Widgets in this area will be shown only for Contact Page.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="col-block %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => '</h3>',
    ) );

// Before Footer Right Widgets area
    register_sidebar( array(
        'name'          => __( 'Before Footer Right Section', 'philosophy' ),
        'id'            => 'before-ftr-right',
        'description'   => __( 'Widgets in this area will be shown before Footer Right.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="about %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );

    
// Footer Right Widgets area
    register_sidebar( array(
        'name'          => __( 'Footer Right Area', 'philosophy' ),
        'id'            => 'footer-right',
        'description'   => __( 'Widgets in this area will be shown Footer Right Area.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

// Footer Bottom Widgets area
    register_sidebar( array(
        'name'          => __( 'Footer Bottom Section', 'philosophy' ),
        'id'            => 'footer-bottom',
        'description'   => __( 'Widgets in this area will be shown Footer Bottom area.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="s-footer__copyright %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => __( 'Header Top Section', 'philosophy' ),
        'id'            => 'header-top',
        'description'   => __( 'Widgets in this area will be shown Header top area.', 'philosophy' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );


}
add_action("widgets_init", "philosophy_widgets"); 




// Search Form Filter
// if(!function_exists("philosophy_search_form")){ //plugable function
// }
function philosophy_search_form($form){
    $homedir = home_url();
    $label = __("Search For", "philosophy");
    $post_type = <<<PT
<input type="hidden" name="post_type" value="post">
PT;

    if(is_post_type_archive("book")){ //for book it will only search from books custom post type
        $post_type = <<<PT
<input type="hidden" name="post_type" value="book">
PT;
    }

    $newForm = <<<FORM
    <form role="search" method="get" class="header__search-form" action="">
    <label>
        <span class="hide-content">{$label}</span>
        <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="{$label}" autocomplete="off">
    </label>
    {$post_type}
    <input type="submit" class="search-submit" value="Search">
</form>
FORM;
    return $newForm;
}
add_action("get_search_form", "philosophy_search_form");





/*/ Custom Action hook added for category page
function category_before_title(){
    echo "Before Category Title";
}
add_action("philosophy_before_category_title", "category_before_title");

function category_after_title(){
    echo "After Category Title";
}
add_action("philosophy_after_category_title", "category_after_title");


function category_before_desc(){
    echo "<p>Before Category Description</p>";
}
add_action("philosophy_before_category_desc", "category_before_desc");

function category_after_desc(){
    echo "After Category Description";
}
add_action("philosophy_after_category_desc", "category_after_desc"); */






// Custom Filter Hook Added for file MOdification. Its always return value

function mid_size_pagination($size){
    return 2;
}
add_filter("philosophy_pagination_mid_size","mid_size_pagination");


function philosophy_top_text($param1, $param2){
    return strtoupper($param1)." ".ucwords($param2);
}
add_filter("philosophy_text","philosophy_top_text",10,2);


function philosophy_home_banner_class($class){
    if(is_home()){
        return $class;
    }else{
        return "";
    }
}
add_filter("philosophy_home_banner_class","philosophy_home_banner_class");




//For checking Hook Priority
function category_before_title1(){
    echo "Before Category Title 1<br>";
}
add_action("philosophy_before_category_title", "category_before_title1");

function category_before_title2(){
    echo "Before Category Title 2<br>";
}
add_action("philosophy_before_category_title", "category_before_title2",7);

function category_before_title3(){
    echo "Before Category Title 3<br>";
}
add_action("philosophy_before_category_title", "category_before_title3",9);




// For Remove Hook
remove_action("philosophy_before_category_title", "category_before_title3",9);
remove_action("philosophy_before_category_title", "category_before_title2",7);
remove_action("philosophy_before_category_title", "category_before_title1");


    //For Creating Slug for Chapter Post Type
    function philosophy_cpt_slug_fix($post_link, $id){
        $p = get_post($id);
        if( is_object($p) && "chapter"==get_post_type($id) ){
            $parent_post_id = get_field("parent_book");
            $parent_post    = get_post($parent_post_id);
            if($parent_post){
                $post_link = str_replace("%book%", $parent_post->post_name, $post_link);
            }
        }
        return $post_link;
    }
    add_filter("post_type_link", "philosophy_cpt_slug_fix",1,2);




//Custom PosT types and taxonomy terms page showing languages instead of Tags in footer

function philosophy_footer_heading_language($title){
    if(is_post_type_archive( "book" ) || is_tax("language")){

        $title = __("Language", "philosophy");
    }
    return $title;
}

 add_filter("philosophy_footer_heading_tags", "philosophy_footer_heading_language");   


function philosophy_footer_item_language($items){
    if(is_post_type_archive("book") || is_tax("language")){
        $items = get_terms(array(
            'taxonomy'  => 'language',
        ));
    }
    return $items;
}
 add_filter("philosophy_footer_item_tags", "philosophy_footer_item_language");



 