<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="header">
					<h2 class="entry-title"><?php the_title(); ?></h2>

<?php // edit_post_link(); ?>

					</header>

<?php // if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

<?php // the_content(); ?>

				<div class="content-wrap">
					<div class="band band--image band--dark">
						<img class="b-lazy b-loaded" src="<?php the_post_thumbnail_url(); ?>">
					</div>
					<div class="band band--quote">
						<div class="wrap grid-group">
							<div class="quote__content icon-citat grid size-12">
								<div><?php one_field('internship_testimonial'); ?></div>
							</div>
						</div>
					</div>
					<div class="band band--article">
						<div class="wrap">
							<div class="grid-group">
								<div class="grid size-8 size-12--portable">
									
									<?php one_field('internship_story'); ?>
								</div>
								<div class="grid size-4 size-12--portable boxes">
									<div class="line-header"></div>
									<h2><?php one_field('internship_specialization'); ?></h2>
									<ul>
										<?php surround_one_field('internship_institution', '<li>Supervised by ', '</li>'); ?>
										<?php surround_one_field('internship_website', '<li>Portfolio: ', '</li>'); ?>
										<?php surround_one_field('internship_email', '<li>Contact email: ', '</li>'); ?>
										<?php surround_one_field('internship_phone', '<li>Phone: ', '</li>'); ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>

<?php // if(the_field('bonus_area')) {the_field('bonus_area');} ?>

						<div class="entry-links"><?php wp_link_pages(); ?></div>
				</article>

<?php // all_the_fields( array("internship_specialization", "internship_institution") ); ?>

<?php // if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>