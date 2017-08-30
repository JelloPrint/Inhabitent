<?php
/**
 * The header for our theme.
 *
 * @package inhabitent_Theme
 */

 ?><!DOCTYPE html>
 <html <?php language_attributes(); ?>>
	 <head>
		 <meta charset="<?php bloginfo( 'charset' ); ?>">
		 <meta name="viewport" content="width=device-width, initial-scale=1">
		 <link rel="profile" href="http://gmpg.org/xfn/11">
		 <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
 
	 <?php wp_head(); ?>
	 </head>
 
	 <body <?php body_class(); ?>>
		 <div id="page" class="hfeed site">
			 <a class="skip-link screen-reader-text" href="#content"><?php esc_html( 'Skip to content' ); ?></a>
 
			 <header id="masthead" class="site-header" role="banner">
			 	<div class="container">	
				 	<div class="site-branding">
					 <div class="logo">
						 <a href="<?php echo esc_url( home_url('/') ); ?>"><img class="green-tent-logo" src="<?php echo get_template_directory_uri(); ?>/images/inhabitent-logo-tent.svg" alt="Image of Inhabitent logo"></a>
						 <h1 class="site-title screen-reader-text">
						 <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></h1></a>
					 </div><!-- .logo -->
				 </div><!-- .site-branding -->
			 
				 <nav id="site-navigation" class="main-navigation" role="navigation">
					 <div class="main-navigation-container">
							<?php esc_html( 'Primary Menu' ); ?>
						 	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					 			<div class="header-search">
						 			<span class="search-toggle"><i class="fa fa-search"></i></span>
						 			<?php get_search_form(); ?>
					 			</div><!-- .header-search -->
					 	</div><!-- .main-navigation-container -->
				 </nav><!-- .main-navigation -->
			 </header><!-- #masthead -->
			</div><!-- .page. -->
		
			<div id="content" class="site-content">