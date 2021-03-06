<?php
/**
 * ROON Theme Customizer
 *
 * @package ROON
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function roon_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'roon_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'roon_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'roon_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function roon_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function roon_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function roon_customize_preview_js() {
	wp_enqueue_script( 'roon-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'roon_customize_preview_js' );

/**
 * Site Footer text
 */
function roon_customize_options( $wp_customize ) {
	$wp_customize->add_section( 'roon_theme_options', array(
		'title' => __( 'ROON Theme Options' ),
		'panel' => '', // Not typically needed.
		'priority' => 220,
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
	));

	$wp_customize->add_setting( 'searchid', array(
		'theme_supports' => '', // Rarely needed.
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'searchid', array(
		'type' => 'checkbox',
		'section' => 'roon_theme_options', // Required, core or custom.
		'label' => __( 'Hide Search' ),
		'description' => __( 'This is a Search control hide or show from header right.' ),
	) );

	$wp_customize->add_setting( 'topbarid', array(
		'theme_supports' => '', // Rarely needed.
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'topbarid', array(
		'type' => 'checkbox',
		'section' => 'roon_theme_options', // Required, core or custom.
		'label' => __( 'Hide Top Bar' ),
		'description' => __( 'This is a Hide Top Bar control hide or show from website right.' ),
	) );

	$wp_customize->add_setting( 'fbid_roon', array(
		'theme_supports' => '', // Rarely needed.
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'fbid_roon', array(
		'type' => 'url',
		'section' => 'roon_theme_options', // Required, core or custom.
		'label' => __( 'Facebook' ),
	) );
	$wp_customize->add_setting( 'twid_roon', array(
		'theme_supports' => '', // Rarely needed.
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'twid_roon', array(
		'type' => 'url',
		'section' => 'roon_theme_options', // Required, core or custom.
		'label' => __( 'Twitter' ),
	) );
	$wp_customize->add_setting( 'emaiid_roon', array(
		'theme_supports' => '', // Rarely needed.
		'default' => '',
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'emaiid_roon', array(
		'type' => 'email',
		'section' => 'roon_theme_options', // Required, core or custom.
		'label' => __( 'Email' ),
	) );
	$wp_customize->add_setting( 'numberid_roon', array(
		'theme_supports' => '', // Rarely needed.
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'numberid_roon', array(
		'type' => 'text',
		'section' => 'roon_theme_options', // Required, core or custom.
		'label' => __( 'Phone Number' ),
	) );
	
	$wp_customize->add_setting( 'themecolors_roon', array(
		'theme_supports' => '', // Rarely needed.
		'default' => 'default',
		'sanitize_callback' => 'sanitize_themecolors_roon',
	) );
	$wp_customize->add_control( 'themecolors_roon', array(
		'type' => 'select',
		'section' => 'roon_theme_options', // Required, core or custom.
		'label' => __( 'Theme color scheme' ),
		'choices'=> array(
			'default' => 'Default',
			'green_roon' => 'Green',
			'red_roon' => 'Red',
		),
	) );

}

add_action( 'customize_register', 'roon_customize_options' );

function sanitize_themecolors_roon($input){
	$valid = array('default','green_roon','red_roon');
	if(in_array($input, $valid, true)){
		return $input;
	}
	return 'default';
}
