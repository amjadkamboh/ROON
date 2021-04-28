<?php

function roon_custom_new_menu() {

    register_nav_menu('roon-right-menu',__( 'Header Right Menu' ));
    
}
add_action( 'init', 'roon_custom_new_menu' );

?>