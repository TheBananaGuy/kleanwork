<?php get_header(); ?>

<?php
// var_dump(get_field('part-1_style')); 
// echo surround_one_field('part-1_style', '<div>', '</div>');
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<?php get_template_part( 'page-chunk__content-header' ); ?>
					

<?php // edit_post_link(); ?>

					<section class="entry-content">

<?php // if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

<?php // if(the_field('bonus_area')) {the_field('bonus_area');} 
// all_the_fields( array("main_one", "main_two", "main_three") );
?>

<?php
call_content_block(4);
?>

						<div class="entry-links"><?php wp_link_pages(); ?></div>
					</section>
				</article>

<?php // if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>

			
<?php // get_sidebar(); ?>
<?php get_footer(); ?>