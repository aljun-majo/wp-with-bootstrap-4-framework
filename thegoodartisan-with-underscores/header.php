<?php
/**
 * The header for our theme After bootstrap 4 markup and WP_Bootstrap_Navwalker() has been added
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TGA_Underscores
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tga-underscores' ); ?></a>

	<header id="masthead" class="site-header">
		<nav id="thegoodartisan-navigation" class="navbar navbar-expand-md navbar-dark bg-dark" role="navigation">
			<div class="container"> 			 
		
		        <div id="thegoodartisan-logo">

					<h1>
						<a class="navbar-brand" title="Thegoodartisan Brand Logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php //bloginfo( 'name' ); ?>
							
						<?php
							//logo marckup with a element 
							//the_custom_logo();	

							//if logo set display the logo image
							if ( has_custom_logo() ) {

									$custom_logo_id = get_theme_mod( 'custom_logo' );
									$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );	

							        echo '<img class="img-fluid" src="'. esc_url( $logo[0] ) .'">
							        		<span class="site-title">' . get_bloginfo( 'name' ) . '</span>';
							} else {
							        echo get_bloginfo( 'name' );
							}

						?>						

						</a>
						
					</h1>	
					<?php			
						$tga_underscores_description = get_bloginfo( 'description', 'display' );
						if ( $tga_underscores_description || is_customize_preview() ) :
					?>
						<p class="site-description"><?php echo $tga_underscores_description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
			         
			                  
		      
		        </div><!-- #thegoodartisan-logo -->


				<button 
						class="navbar-toggler py-3" 
						type="button" 
						data-toggle="collapse" 
						data-target="#bs-example-navbar-collapse-1" 
						aria-controls="bs-example-navbar-collapse-1" 
						aria-expanded="false" 
						aria-label="Toggle navigation">
					<span class="navbar-toggler-menu"><?php 	
						esc_html_e( 'Menu', 'tga-underscores' ); 
					?></span>
				</button>

				<?php
					 wp_nav_menu( array(
					            'theme_location'    => 'menu-1',
					            'menu_id'        	=> 'primary-menu',
					            'depth'             => 2,
					            'container'         => 'div', 
					            'container_class'   => 'collapse navbar-collapse',
					            'container_id'      => 'bs-example-navbar-collapse-1', 
					            'menu_class'        => 'nav navbar-nav ml-auto',//ml-auto is nav links to align right
					            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback', 
					            'walker'            => new WP_Bootstrap_Navwalker()
							) );
				?>

			</div><!-- .container -->
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content container py-5"><!-- .container -->
