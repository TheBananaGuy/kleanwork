<?php get_header(); ?>

			<section id="content" role="main">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="js-top-banner">
						<div class="band band--banner band--dark js-banner-picture band--picture js-show-picture-banner b-lazy-bg" <?php if ( has_post_thumbnail() ) { print('style="background-image:url(' . get_the_post_thumbnail_url() . ');"'); } ?> >
							<div class="wrap">
								<h1 class="entry-title"><?php the_title(); ?></h1>
							</div>
							
						</div>
					</header>

					

<?php // edit_post_link(); ?>

					<section class="entry-content">

<?php // if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

						<div class="band">
							<div class="wrap">

<?php the_content(); ?>
		
							</div>
						</div>

<?php // if(the_field('bonus_area')) {the_field('bonus_area');} 
all_the_fields( array("main_one", "main_two", "main_three") );
?>

						<div class="entry-links"><?php wp_link_pages(); ?></div>
					</section>
				</article>

<?php // if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>

			</section>
			
<?php // get_sidebar(); ?>
<?php get_footer(); ?>