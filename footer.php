<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ROON
 */

?>
	</div><!-- .site-inner -->
	<footer id="site-footer" class="site-footer">
		<div class="site-info wrap">
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'ROON' ), 'ROON', '<a href="#">Amjad Kamboh</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #site-footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
