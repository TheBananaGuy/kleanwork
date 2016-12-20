<?php get_header(); ?>

<?php
if ($post->post_parent === 30) {	// ID of the stories page
    get_template_part('page-stories-child'); // template name for the stories page subpages
} else {
?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="header">
					<h2 class="entry-title"><?php the_title(); ?></h2>

<?php // edit_post_link(); ?>

					</header>

<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
<?php the_content(); ?>
<?php // if(the_field('bonus_area')) {the_field('bonus_area');} ?>

						<div class="entry-links"><?php wp_link_pages(); ?></div>
				</article>

<?php // if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>

			
<?php // get_sidebar(); ?>
<?php 
};
?>
<?php get_footer(); ?>