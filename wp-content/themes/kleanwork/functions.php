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

    // GET THE SOURCE FOLDER FOR THEM IMAGES

define("IMAGE_FOLDER", "source/img/");

function print_source($source_folder = null) {
    $root_folder = esc_url( home_url( '/' ) );
    $path_folder = "wp-content/themes/kleanwork/";
    $complete_path = $root_folder . $path_folder . $source_folder;
    print $complete_path;
}

    //	ADAPTING THE MENU BY MAKING A WALKER CLASS EXTENSION

class Walker_Custom_Menu extends Walker_Nav_Menu {
// replace the <li> starting tag
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $output .= sprintf( 
'
<div class="header__menu__band js-menu-band caps"><a href="%s"%s><h2>%s</h2></a></div>
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

    // AAL TEH KUSTOM FEELD FUNKTEONZ

// check existence and and apply the base printing method
function one_field($name) {
    if(get_field($name)) {the_field($name); }
}

// do the same for an array of selected fields
function all_the_fields($names) {
    foreach($names as $name) {
        one_field($name);
    }
}

// do the same for an enumerated group of fields (must start from a plain 1, not 01)
function field_loop($field_name) {
    for ($counter = 1; get_field($field_name.$counter); $counter++) {
        one_field($field_name.$counter);
    }
}

// optional surrounding tags for step one
function surround_one_field($name, $start_tag = '', $end_tag = '') {
    if (get_field($name)) {
        echo $start_tag.get_field($name).$end_tag;
    }
}

// optional surrounding tags for step two
function surround_all_fields($names, $start_tags = '', $end_tags = '') {
    foreach ($names as $name) {
        surround_one_field($name, $start_tags, $end_tags);
    }
}

// optional surrounding tags for step three
function surround_field_loop ($field_name, $start_tags = '', $end_tags = '') {
    for ($counter = 1; get_field($field_name.$counter); $counter++) {
        surround_one_field($field_name.$counter, $start_tags, $end_tags);
    }
}

// call content blocks on a page, depending on how many are included through admin section
function call_content_block ($block_amount, $relevance = false) {
    for ($counter=1; $counter<($block_amount+1); $counter++) {
        $partition_heading = "part-".$counter."_heading";
        $partition_content = "part-".$counter."_content";
        $partition_link = "part-".$counter."_link";
        $partition_image = "part-".$counter."_image";
        $partition_style = "part-".$counter."_style";
        $partition_call = "part-".$counter."_call";
        $partition_button;
        if (get_field($partition_style, $relevance) != "band") {
            $partition_button = "button button--light";
        } else {
            $partition_button = "button button--secondary";
        }
        echo '
                        <div class="'.get_field($partition_style, $relevance).'">
                            <div class="wrap">
                                <h2 class="caps">'.get_field($partition_heading, $relevance).'</h2>
        ';
                                surround_one_field($partition_image, '<img class="spacing" src="', '" alt="'.get_field($partition_call, $relevance).'" />');
        echo '
                                <p>'.get_field($partition_content, $relevance).'</p>
                                <a class="'.$partition_button.' caps landmark" href="'.get_field($partition_link, $relevance).'" target="_self">'.get_field($partition_call, $relevance).'</a>
                            </div>
                        </div>
        ';
    }
}