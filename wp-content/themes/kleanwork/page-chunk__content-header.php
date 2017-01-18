					<header class="js-top-banner">
						<div class="band band--banner band--dark js-banner-picture band--picture js-show-picture-banner b-lazy-bg" <?php if ( has_post_thumbnail() ) { print('style="background-image:url(' . get_the_post_thumbnail_url() . ');"'); } ?> >
							<div class="wrap">
								<h2 class="entry-title caps"><?php one_field('custom_heading'); ?></h2>
								<p class="manchet"><?php one_field('custom_subheading'); ?></p>
							</div>
						</div>
					</header>