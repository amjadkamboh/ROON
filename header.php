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
<!-- #Header Top -->
<?php 
$roon_topbar = get_theme_mod( 'topbarid', '' );
if ( !$roon_topbar ) :
?>
<div class="header-top-section" id="header-top">
	<div class="wrap">
		<div class="left-Header-top">
			<?php
			$roon_emaiid_roon = get_theme_mod( 'emaiid_roon', '' );
			if ( $roon_emaiid_roon ) :
			?>
			<a href="mailto:"><span class="dashicons dashicons-email"></span> Dummy@gmail.com</a>
			<?php endif; ?>
			<?php
			$roon_numberid_roon = get_theme_mod( 'numberid_roon', '' );
			if ( $roon_numberid_roon ) :
			?>
			<a href="tel:"><span class="dashicons dashicons-phone"></span> 111-111-111</a>
			<?php endif; ?>
		</div>
		<div class="right-Header-top">
			
			
			<?php
			$roon_fbid_roon = get_theme_mod( 'fbid_roon', '' );
			if ( $roon_fbid_roon ) :
			?>
			<a href="#"><span class="dashicons dashicons-facebook-alt"></span></a>
			<?php endif; ?>
			<?php
			$roon_twid_roon = get_theme_mod( 'twid_roon', '' );
			if ( $roon_twid_roon ) :
			?>
			<a href="#"><span class="dashicons dashicons-twitter"></span></a>
			<?php endif; ?>
			
		</div>
	</div>
</div>
<?php endif; ?>
<!-- #Site Header -->
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
				<?php
				$roon_search = get_theme_mod( 'searchid', '' );
				if ( !$roon_search ) :
				?>
				<span class="dashicons dashicons-search"></span>
				<?php get_search_form(); ?>
				<?php endif; ?>
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