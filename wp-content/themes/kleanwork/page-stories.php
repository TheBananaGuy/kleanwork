<?php get_header(); ?>

			<section id="content" role="main">

<?php

if( $post->post_parent !== 0 ) {
	$child_template = 'page-'.get_post_ancestors($post->post_name).'-child';
    get_template_part($child_template);
} else {
    get_template_part('page-stories-main');
}

?>

<?php
/* Get the Page Slug to Use as a Body Class, this will only return a value on pages! */
$class = '';
/* is it a page */
if( is_page() ) { 
	global $post;
        /* Get an array of Ancestors and Parents if they exist */
	$parents = get_post_ancestors( $post->ID );
        /* Get the top Level page->ID count base 1, array base 0 so -1 */ 
	$id = ($parents) ? $parents[count($parents)-1]: $post->ID;
	/* Get the parent and set the $class with the page slug (post_name) */
        $parent = get_post( $id );
	$class = $parent->post_name;
}
?>

<?php
global $post;
$parents = get_post_ancestors( $post->ID );
/* Get the ID of the 'top most' Page if not return current page ID */
$id = ($parents) ? $parents[count($parents)-1]: $post->ID;
if(has_post_thumbnail( $id )) {
	get_the_post_thumbnail( $id, 'thumbnail');
}
?>

			</section>
			
<?php // get_sidebar(); ?>
<?php get_footer(); ?>