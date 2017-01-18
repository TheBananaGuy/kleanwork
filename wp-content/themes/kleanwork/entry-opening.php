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
									<h2>Location: <?php one_field('opening_location'); ?></h2>
									<ul>
										<?php surround_field_loop('opening_gist_', '<li>', '</li>'); ?>
										<?php // surround_field_loop('test', '<li>', '</li>'); ?>
									</ul>
								</div>
								<div class="grid size-8 size-12--portable">
									
									<?php field_loop('opening_block_'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>

                <div class="band band--cta">
                    <div class="wrap">
                        <h2 class="caps">Feeling lucky?</h2>
                        <p class="manchet">Why not give it a go then?</p>
                        <a class="button button--light caps landmark" href="<?php print esc_url( home_url( '/' ) ); ?>apply" target="_self">Apply for this position</a>
                    </div>
                </div>

			</article>