<?php get_header(); ?>

			<section id="content" role="main">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="header">
					<h1 class="entry-title"><?php the_title(); ?></h1>

<?php// edit_post_link(); ?>

					</header>
					<section class="entry-content">

<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

<?php the_content(); ?>



<?php // if(the_field('bonus_area')) {the_field('bonus_area');} ?>

						<div class="entry-links"><?php wp_link_pages(); ?></div>
					</section>
				</article>

<?php // if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>

<?php
    query_posts('post_type=page&post_parent='.$post->ID );
    if ( have_posts() ) while ( have_posts() ) : the_post();
?>

<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>

<pre><?php echo the_content(); ?></pre>

<?php
    endwhile; // end of the loop.
?>

			</section>
			
<?php // get_sidebar(); ?>
<?php get_footer(); ?>