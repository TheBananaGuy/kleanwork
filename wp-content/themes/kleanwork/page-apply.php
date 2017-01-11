<?php get_header(); ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="js-top-banner">
						<div class="band band--banner band--dark js-banner-picture band--picture js-show-picture-banner b-lazy-bg" <?php if ( has_post_thumbnail() ) { print('style="background-image:url(' . get_the_post_thumbnail_url() . ');"'); } ?> >
							<div class="wrap">
								<h2 class="entry-title caps"><?php the_title(); ?></h2>
							</div>
							
						</div>
					</header>


						<div class="band band--article">
							<div class="wrap">
								<div class="grid-group">
									<div class="grid size-8 size-12--portable">

<?php the_content(); ?>

										<form>
											<input class="float_input" required="" type="text" name="apply_name">
											<select required="">

												<option>Position</option>

												<option>---</option>
<?php
// global $post;
$child_pages_query_args = array(
    'post_type'   => 'post'
);

$child_pages = new WP_Query( $child_pages_query_args );

if ( $child_pages->have_posts() ) : while ( $child_pages->have_posts() ) : $child_pages->the_post();
print ('
												<option>'); the_title(); print('</option>
');

endwhile; endif;

// Be kind; rewind
wp_reset_postdata();
?>

												<option>---</option>

												<option>Unsolicited application</option>

											</select>
											<input class="float_input" required="" type="email" name="apply_email">
											<input class="float_input" required="" type="tel" name="apply_phone">
											<input class="right" type="submit" name="apply_apply" value="Apply now!">
										</form>

									</div>
								</div>
							</div>
						</div>

						<div class="wrap grid-group">
							<div class="grid size-4 size-6--palm">
								<img class="center" src="<?php print_source(IMAGE_FOLDER); ?>placeholder_protrait.jpg">
							</div>
							<div class="grid grid--last size-4 size-6--palm">
								<img class="center" src="<?php print_source(IMAGE_FOLDER); ?>placeholder2_protrait.jpg">
							</div>
						</div>

				</article>

<?php endwhile; endif; ?>

<?php get_footer(); ?>