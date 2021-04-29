<?php

/**
 * Register Theme Option Page.
 *
 * @link https://developer.wordpress.org/reference/functions/add_theme_page/
 */
//call the 'add_menu_page' function with 'admin_menu' action hook
add_action( 'admin_menu', 'roon_manage_option_init' );

function roon_manage_option_init() {
	
	add_theme_page( 'ROON Theme', 'Theme Option', 'manage_options', 'roon-theme-option', 'roon_theme_option');

}


function roon_manage_option(){
	// General Setting For theme
	// https://developer.wordpress.org/reference/functions/register_setting/
	register_setting( 'roon_wp_option', 'roon_wp_option', 'roon_wp_option_validate' );
	// Add section 
	// https://developer.wordpress.org/reference/functions/add_settings_section/
	add_settings_section( 'general-setting', 'General Setting', 'callable_wp_option_general', 'roon-theme-option' );
	// Add Setting Fields 
	// https://developer.wordpress.org/reference/functions/add_settings_field/
	add_settings_field( 'header-top', 'Header Top', "header_top_callback", 'roon-theme-option', 'general-setting');
}
function callable_wp_option_general(){
	echo 'This is General Setting.';
}

function header_top_callback(){
	$option = get_option( 'roon_wp_option');
	?>
	<input type="checkbox" name="roon_wp_option[header-top]" value="<?php echo $option[header-top]; ?>">
	<?php	
}
function roon_theme_option (){
	if (! current_user_can( 'manage_options' )){
		wp_die('You do not have sufficient permission to access this page.' );
	}
	?>
	<div class="wrap">
		<h1>ROON Theme Option</h1>

		<form action="option.php" method="post">
		<?php
			settings_fields( 'roon_wp_option' );
			do_settings_sections( 'roon-theme-option' );
			submit_button();
		?>

		</form>
	</div>
	<?php
} 
?>