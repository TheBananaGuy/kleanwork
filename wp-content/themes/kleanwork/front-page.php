<?php get_header(); ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="js-top-banner">
						<div class="band band--banner band--dark js-banner-picture band--picture js-show-picture-banner b-lazy-bg" <?php if ( has_post_thumbnail() ) { print('style="background-image:url(' . get_the_post_thumbnail_url() . ');"'); } ?> >
							<div class="wrap">
								<h2 class="entry-title"><?php one_field('main_heading'); ?></h2>
								<p><?php one_field('main_subheading'); ?></p>
							</div>
							
						</div>
					</header>

					

<?php // edit_post_link(); ?>

					<section class="entry-content">

<?php // if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

						<div class="band">
							<div class="wrap">


		
							</div>
						</div>

<?php // if(the_field('bonus_area')) {the_field('bonus_area');} 
// all_the_fields( array("main_one", "main_two", "main_three") );
?>

<?php
for ($counter=1; $counter<4; $counter++) {
	$partition_heading = "main_".$counter."_heading";
	$partition_content = "main_".$counter."_content";
	print('
						<div class="band">
							<div class="wrap">
								<h2>'); one_field($partition_heading); print('</h2>
								'); one_field($partition_content);	 print('
							</div>
						</div>
	');
}
?>

						<div class="entry-links"><?php wp_link_pages(); ?></div>
					</section>
				</article>

<?php // if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>

			
<?php // get_sidebar(); ?>
<?php get_footer(); ?>