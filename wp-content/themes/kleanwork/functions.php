<?php
add_action( 'after_setup_theme', 'kleanwork_setup' );
function kleanwork_setup()
{
load_theme_textdomain( 'kleanwork', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'kleanwork' ) )
);
}
add_action( 'wp_enqueue_scripts', 'kleanwork_load_scripts' );
function kleanwork_load_scripts()
{
wp_enqueue_script( 'jquery' );
}
add_action( 'comment_form_before', 'kleanwork_enqueue_comment_reply_script' );
function kleanwork_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'kleanwork_title' );
function kleanwork_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'kleanwork_filter_wp_title' );
function kleanwork_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'kleanwork_widgets_init' );
function kleanwork_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'kleanwork' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function kleanwork_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'kleanwork_comments_number' );
function kleanwork_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}

//                  ADDITIONAL SHEET!

    // print theme source folder function and statics for it
define("IMAGE_FOLDER", "source/img/");

function print_source($source_folder = null) {
    $root_folder = esc_url( home_url( '/' ) );
    $path_folder = "wp-content/themes/kleanwork/";
    $complete_path = $root_folder . $path_folder . $source_folder;
    print $complete_path;
}

    //	custom walker menu class
class Walker_Custom_Menu extends Walker_Nav_Menu {
// replace the <li> starting tag
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $output .= sprintf( 
'
<div class="header__menu__band js-menu-band"><a href="%s"%s><h2>%s</h2></a></div>
',
            $item->url,
            ( $item->object_id === get_the_ID() ) ? ' class="current"' : '',
            $item->title
        );
    }
// override this to remove ending <li> tag
    function end_el(&$output, $item, $depth) 
    {
        $output .= '';
    }
}
// create the shortcode
function wp_custom_menu() {
wp_nav_menu( array(
'walker' => new Walker_Custom_Menu(),
'theme_location'	=>	'main-menu',
'container'			=>	'',
'menu_class'		=>	'',
'items_wrap'		=>	'<div id="%1$s" class="%2$s header__menu js-header-menu">%3$s</div>'
) );
}

// printing fields shorteners
function one_field($name) {
    if(the_field($name)) {the_field($name); }
}
function all_the_fields($names) {
    foreach($names as $name) {
        one_field($name);
    }
}
function surround_one_field ($name, $start_tag = '', $end_tag = '') {
    if (the_field($name)) {
        print ($start_tag); the_field($name); print ($end_tag);
    }
}
function surround_all_fields ($names, $start_tags = '', $end_tags = '') {
    foreach ($names as $name) {
        if (the_field($name)) {
            print ($start_tags); the_field($name); print ($end_tags);
        }
    }
}