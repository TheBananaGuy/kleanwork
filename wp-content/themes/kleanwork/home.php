<?php get_header(); 
$page_for_posts = get_option('page_for_posts');
?>

				<div class="band band--dark">
					<div class="wrap limit-width">
						<h2 class="caps"><?php if(the_field('custom_heading', $page_for_posts)) {the_field('custom_heading', $page_for_posts);} ?></h2>
						<p class="manchet"><?php if(the_field('custom_subheading', $page_for_posts)) {the_field('custom_subheading', $page_for_posts);} ?></p>
					</div>
				</div>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<a href="<?php the_permalink(); ?>">
					<div class="band band--opening">
						<div class="wrap limit-width">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header>
								<h2 class="entry-title"><?php the_title(); ?></h2>
								<p class="manchet spacing">@ <?php the_field('opening_location'); ?></p>

<?php // edit_post_link(); ?>

								</header>
									<section class="entry-content">

<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

<?php surround_one_field('opening_short', '<h3>', '</h3>'); ?>

									<div class="entry-links"><?php wp_link_pages(); ?></div>
								</section>
							</article>
						</div>
					</div>
				</a>


<?php // if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>

<?php 
$argh = array(
	'page_id' => $page_for_posts
);
$the_query = new WP_Query( $argh );
// The Loop
if ( $the_query->have_posts() ) :  $the_query->the_post();
call_content_block(2, $page_for_posts); endif;
// Reset Post Data
wp_reset_postdata();
?>
			
<?php // get_sidebar(); ?>
<?php get_footer(); ?>