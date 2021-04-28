<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ROON
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'roon' ); ?></a>

<header id="header-site" class="site-header">
	<div class="wrap">
		<div class="site-logo">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$roon_description = get_bloginfo( 'description', 'display' );
			if ( $roon_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $roon_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-logo -->
		<div class="header-right">
			<div class="header-search-form">
				<?php get_search_form(); ?>
				<nav id="header-navigation" class="header-navigation">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'roon-right-menu',
							'menu_id'        => 'right-header-menu',
						)
					);
				?>
				</nav><!-- #Header Right Menu -->
			</div>
		</div>
	</div>		
</header><!-- #masthead -->
<nav id="site-navigation" class="main-navigation">
	<div class="wrap">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'roon' ); ?></button>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			)
		);
		?>
	</div>
</nav><!-- #site-navigation -->
<div class="site-inner"><!-- site-inner -->