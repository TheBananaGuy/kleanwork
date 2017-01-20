<?php get_header(); ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php get_template_part( 'page-chunk__content-header' ); ?>


						<div class="band band--article">
							<div class="wrap">
								<div class="grid-group grid-group">

									<div class="grid size-8 size-12--portable">

										<?php surround_one_field('afterheader_heading', '<h2>', '</h2>'); ?>
										<?php surround_one_field('afterheader_text', '<p>', '</p>'); ?>
<?php // the_content(); ?>

										<form class="js-form" name="application-form" method="POST" action="" novalidate >

											<div class="grid-group">
												<div class="grid size-12">
														<select required="">

															<option>What are you applying for?</option>

															<option>---</option>
<?php
endwhile; endif;
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
												</div>
											</div>

											<div class="grid-group">
												<div class="grid size-12">
													<div class="float js-float float--label-hidden">
														<label class="float__label">Name</label>
														<input class="float__input" type="text" name="apply_name" placeholder="Name" data-hint="Your phone name" data-msg="Please enter name" required >
													</div>
												</div>
											</div>

											<div class="grid-group">
												<div class="grid size-12">
													<div class="float js-float float--label-hidden">
														<label class="float__label">E-mail</label>
														<input class="float__input" type="email" name="apply_mail" placeholder="e-mail" data-hint="Your e-mail address" data-msg="Please enter a valid e-mail" data-rule-email="true" required >
													</div>
												</div>
											</div>

											<div class="grid-group">
												<div class="grid size-12">
													<div class="float js-float float--label-hidden">
														<label class="float__label">Phone number</label>
														<input class="float__input" type="tel" name="apply_phone" placeholder="Phone number" data-hint="Your phone number" data-msg="Please enter a valid phone number" required >
													</div>
												</div>
											</div>

											<div class="grid-group">
												<div class="grid size-12">
													<div class="float js-float float--label-hidden">
														<label class="float__label">Application attachement</label>
														<input class="float__input file__dupe" type="text" name="apply_dummy" placeholder="Application attachement" required >
														<input class="float__input file__ghost" type="file" name="apply_file" data-hint="Your supporting materials (CV, portfolio, etc)" data-msg="Please attach a valid document" required >
													</div>
												</div>
											</div>

											<input class="right button--secondary" type="submit" name="apply_apply" value="Apply now!">

										</form>

									</div>

									<div class="grid size-4 size-12--portable boxes spacing">
										<div class="line-header"></div>
											<h2>NB!</h2>
										<ul>
											<?php surround_field_loop('afterheader_side_', '<li>', '</li>'); ?>
										</ul>
									</div>

								</div>
							</div>
						</div>

<?php
$argh = array(
	'pagename' => 'apply'
);
$the_query = new WP_Query( $argh );
if ( $the_query->have_posts() ) : $the_query->the_post();

call_content_block(2);
endif;
?>



				</article>

<?php  ?>

<?php get_footer(); ?>