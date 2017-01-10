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
							<div class="grid-group grid-group--reverse">
								<div class="grid size-4 size-12--portable boxes spacing">
									<div class="line-header"></div>
									<h2><?php one_field('internship_specialization'); ?></h2>
									<ul>
										<?php surround_one_field('internship_photo', '<img class="center" src="', '" alt="Photo of the intern" />'); ?>
										<?php surround_one_field('internship_institution', '<li>Studied at ', '</li>'); ?>
										<?php surround_one_field('internship_website', '<li>Portfolio: <a href="http://'.get_field('internship_website').'">', '</a></li>'); ?>
										<?php surround_one_field('internship_email', '<li>Contact email: <a href="mailto:'.get_field('internship_email').'">', '</a></li>'); ?>
									</ul>
								</div>
								<div class="grid size-8 size-12--portable">
									
									<?php one_field('internship_story'); ?>
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