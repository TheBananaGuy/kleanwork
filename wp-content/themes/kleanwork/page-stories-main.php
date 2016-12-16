<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="header">
					<h1 class="entry-title"><?php the_title(); ?></h1>

<?php // edit_post_link(); ?>

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
// global $post;
$child_pages_query_args = array(
    'post_type'   => 'page',
    'post_parent' => $post->ID,
    'orderby'     => 'menu_order'
);

$child_pages = new WP_Query( $child_pages_query_args );

if ( $child_pages->have_posts() ) : while ( $child_pages->have_posts() ) : $child_pages->the_post();
    ?>
    <div class="child-thumb">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </div>
    <?php
endwhile; endif;

// Be kind; rewind
wp_reset_postdata();
?>