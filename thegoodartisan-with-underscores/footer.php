<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TGA_Underscores
 */

?>

	</div><!-- #content --><!-- end of .container -->

	<footer id="colophon" class="site-footer">
		<div class="site-info text-center bg-dark py-5 text-white">
			<a class="btn-link" href="<?php echo esc_url( __( 'https://wordpress.org/', 'tga-underscores' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'tga-underscores' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'tga-underscores' ), 'TheGoodArtisan', '<a class="btn-link" href="http://thegoodartisan.com">TheGoodArtisan</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
