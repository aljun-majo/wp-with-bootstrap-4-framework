<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TGA_Underscores
 */

get_header();
?>
<div class="row"><!-- .row -->
	

	<div id="primary" class="content-area col-12 col-md-8 col-xl-9">
		<main id="main" class="site-main"> 

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary --><!-- end of .col -->
	<div class="col-12 col-md-4 col-xl-3">	
		<?php 
		get_sidebar();
		?>
	</div><!-- end of .col -->
</div><!-- end of .row -->
<?php 
get_footer();
