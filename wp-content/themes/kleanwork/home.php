<?php get_header(); 
$page_for_posts = get_option('page_for_posts');
?>

			<section id="content" role="main">
				<div class="band band--dark">
					<div class="wrap">
						<h1><?php if(the_field('openings_heading', $page_for_posts)) {the_field('openings_heading', $page_for_posts);} ?></h1>
						<?php if(the_field('openings_content', $page_for_posts)) {the_field('openings_content', $page_for_posts);} ?>
					</div>
				</div>


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