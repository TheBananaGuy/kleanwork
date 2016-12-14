<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />

<?php wp_head(); ?>
		
		<script type="text/javascript" src="<?php print_source(); ?>main.js"></script>

	</head>

	<body <?php body_class(); ?>>
		<div id="wrapper" class="hfeed">
			<header id="header" role="banner">

		        <div id="pseudo-header">
		            <div class="header">

		                    <a href="/"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="<?php print_source(IMAGE_FOLDER); ?>logo.svg" height="66" width="462" alt="Logo" class="logo b-lazy" /></a>
		                
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
		        <div class="header__menu js-header-menu">
		                    <div class="header__menu__band">
		                        <a href="/vores-kompetencer"><h2>VORES KOMPETENCER</h2></a>
		                    </div>
		                    <div class="header__menu__band">
		                        <a href="/the-journey-formular"><h2>BESTIL THE JOURNEY</h2></a>
		                    </div>
		                    <div class="header__menu__band">
		                        <a href="/projekter-cases"><h2>PROJEKTER  &amp; CASES</h2></a>
		                    </div>
		                    <div class="header__menu__band">
		                        <a href="/moed-klean"><h2>M&#216;D KLEAN</h2></a>
		                    </div>
		        </div>
		        <div id="header-container" class="header__outer stick">
		            <div class="header__menu js-header-menu">
		                
		                        <div class="header__menu__band js-menu-band">
		                            <a href="/vores-kompetencer"><h2>VORES KOMPETENCER</h2></a>
		                        </div>
		                        <div class="header__menu__band js-menu-band">
		                            <a href="/the-journey-formular"><h2>BESTIL THE JOURNEY</h2></a>
		                        </div>
		                        <div class="header__menu__band js-menu-band">
		                            <a href="/projekter-cases"><h2>PROJEKTER  &amp; CASES</h2></a>
		                        </div>
		                        <div class="header__menu__band js-menu-band">
		                            <a href="/moed-klean"><h2>M&#216;D KLEAN</h2></a>
		                        </div>

		            </div>
		            <div class="header">
		                    <a href="/"><img class="b-lazy logo" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="/assets/build/images/logo.svg" height="66" width="462" alt="Logo" /></a>
		                
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

<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>

				</nav>
			</header>
			<div id="container">