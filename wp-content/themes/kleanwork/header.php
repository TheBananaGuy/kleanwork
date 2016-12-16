<!DOCTYPE html>
<html class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />

<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>
		
		<script type="text/javascript" src="<?php print_source(); ?>scripts/js/libs/jquery-3.1.1.min.js" async></script>
		<script type="text/javascript" src="<?php print_source(); ?>main.js" async></script>

	</head>

	<body <?php body_class(); ?>>
		<div id="wrapper" class="hfeed">
			<header id="header" role="banner">

		        <div id="pseudo-header">
		            <div class="header">
		                <a href="<?php print esc_url( home_url( '/' )); ?>"><img src="<?php print_source(IMAGE_FOLDER); ?>logo.svg" data-src="<?php print_source(IMAGE_FOLDER); ?>logo.svg" height="66" width="462" alt="Logo" class="logo b-lazy" /></a>
		                <div class="social js-open-social">
		                    <p><span class="icon icon-some"></span></p>
		                </div>
		                <div class="menu js-open-menu">
		                    <p>
		                        <span class="icon icon-menu">
		                            Menu
		                        </span>
		                    </p>
		                </div>
		            </div>
		        </div>

<?php wp_custom_menu(); ?>

		        <div id="header-container" class="header__outer stick">

<?php wp_custom_menu(); ?>

		            <div class="header">
	                    <a href="<?php print esc_url( home_url( '/' )); ?>"><img class="b-lazy logo" src="<?php print_source(IMAGE_FOLDER); ?>logo.svg" data-src="<?php print_source(IMAGE_FOLDER); ?>logo.svg" height="66" width="462" alt="Logo" /></a>
		                <div class="social js-open-social">
		                    <p><span class="icon icon-some"></span></p>
		                </div>
		                <div class="menu js-open-menu">
		                    <p>
		                        <span class="icon icon-menu">
		                            Menu
		                        </span>
		                    </p>
		                </div>
		            </div>
		        </div>
			
				<section id="branding">
					<div id="site-title"><?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1>'; } ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a><?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; } ?></div>
					<div id="site-description"><?php bloginfo( 'description' ); ?></div>
				</section>
				<nav id="menu" role="navigation">
					<div id="search">

<?php // get_search_form(); ?>

					</div>



				</nav>
			</header>
			<div id="container">