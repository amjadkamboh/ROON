<?php
/**
 * Adding Menu FOr header Right
 */
function roon_custom_new_menu() {
    register_nav_menu('roon-right-menu',__( 'Header Right Menu' ));
}
add_action( 'init', 'roon_custom_new_menu' );

/**
 * Adding Dashicons in WordPress Front-end
 */
function load_dashicons_front_end() {
  wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );

?>