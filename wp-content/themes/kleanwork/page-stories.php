<?php get_header(); ?>

				<div class="content-wrap">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="header band band--dark">

<?php // edit_post_link(); ?>

						<div class="">
<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
							<div class="wrap limit-width">
							<h2 class="entry-title caps"><?php the_title(); ?></h2>
							</div>
						</div>
						</header>

							<div class="band">
								<div class="wrap">

<?php // the_content(); ?>

								</div>
							</div>
<?php // if(the_field('bonus_area')) {the_field('bonus_area');} ?>

							<div class="entry-links"><?php wp_link_pages(); ?></div>
					</article>

<?php // if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>

						

						<div class="band">
							<div class="wrap">


		


<?php
// global $post;
$child_pages_query_args = array(
    'post_type'   => 'page',
    'post_parent' => $post->ID,
    'orderby'     => 'menu_order',
    'order' => 'ASC'
);

$child_pages = new WP_Query( $child_pages_query_args );

if ( $child_pages->have_posts() ) : while ( $child_pages->have_posts() ) : $child_pages->the_post();
print ('
								<a class="block__link" href="'); the_permalink(); print('">
									<div class="block">
										<div class="block__image">
											<img src="'); one_field('internship_face'); print('">
											<div class="title">
												'); the_title(); print('
											</div>
										</div>
										<div class="block__content">
											<p>'); one_field('internship_testimonial'); print('</p>
										</div>
									</div>
								</a>
');

endwhile; endif;

?>
							</div>
						</div>
					</div>

<?php

// Be kind; rewind
wp_reset_postdata();

$argh = array(
	'pagename' => 'stories'
);
$the_query = new WP_Query( $argh );
if ( $the_query->have_posts() ) : $the_query->the_post();

call_content_block(1);
endif;

?>
			
<?php // get_sidebar(); ?>
<?php get_footer(); ?>