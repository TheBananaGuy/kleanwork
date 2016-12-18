<?php get_header(); ?>

			<section id="content" role="main">

<?php
$page_for_posts = get_option('page_for_posts');
if(the_field('needs_main_content', $page_for_posts)) {the_field('needs_main_content', $page_for_posts);} ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<a href="<?php the_permalink(); ?>">
					<div class="band band--opening">
						<div class="wrap">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header>
								<h2 class="entry-title"><?php the_title(); ?></h2>

<?php // edit_post_link(); ?>

								</header>
									<section class="entry-content">

<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

<?php the_content(); ?>

									<div class="entry-links"><?php wp_link_pages(); ?></div>
								</section>
							</article>
						</div>
					</div>
				</a>


<?php // if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>

			</section>
			
<?php // get_sidebar(); ?>
<?php get_footer(); ?>