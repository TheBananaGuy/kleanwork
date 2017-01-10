			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="content-wrap">
<!-- 					<div class="band band--image band--dark">
						<img class="b-lazy b-loaded" src="<?php // the_post_thumbnail_url(); ?>">
					</div> -->
					<div class="band band--dark">
						<div class="wrap">
							<h2><?php the_title() ?></h2>
						</div>
					</div>
<!-- 					<div class="band band--dark band--quote">
						<div class="wrap grid-group">
							<div class="quote__content icon-citat grid size-12">
								<div><?php // one_field('opening_short'); ?></div>
							</div>
						</div>
					</div> -->
					<div class="band band--article">
						<div class="wrap">
							<div class="grid-group grid-group--reverse">
								<div class="grid size-4 size-12--portable boxes spacing">
									<div class="line-header"></div>
									<h2><?php one_field('opening_type'); ?></h2>
									<ul>
										<?php  surround_one_field('opening_location', '<li>Location: ', '</li>'); ?>
										<?php // surround_field_loop('test', '<li>', '</li>'); ?>
									</ul>
								</div>
								<div class="grid size-8 size-12--portable">
									
									<?php one_field('opening_main'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>

			</article>