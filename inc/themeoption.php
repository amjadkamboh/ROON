<?php

$options = array (
  
  array( "name" => $themename." Options",
	  "type" => "title"),
	
   
  array( "name" => "General",
	  "type" => "section"),
  array( "type" => "open"),
	
  array( "name" => "Colour Scheme",
	  "desc" => "Select the colour scheme for the theme",
	  "id" => $shortname."_color_scheme",
	  "type" => "select",
	  "options" => array("blue", "red", "green"),
	  "std" => "blue"),
	   
	   
	   
  array( "name" => "Custom CSS",
	  "desc" => "Want to add any custom CSS code? Put in here, and the rest is taken care of. This overrides any other stylesheets. eg: a.button{color:green}",
	  "id" => $shortname."_custom_css",
	  "type" => "textarea",
	  "std" => ""),        
	   
  array( "type" => "close"),
  array( "name" => "Homepage",
	  "type" => "section"),
  array( "type" => "open"),
   
  array( "name" => "Homepage header image",
	  "desc" => "Enter the link to an image used for the homepage header.",
	  "id" => $shortname."_header_img",
	  "type" => "text",
	  "std" => ""),
	   
   
  array( "type" => "close"),
  array( "name" => "Footer",
	  "type" => "section"),
  array( "type" => "open"),
	   
  array( "name" => "Footer copyright text",
	  "desc" => "Enter text used in the right side of the footer. It can be HTML",
	  "id" => $shortname."_footer_text",
	  "type" => "textarea",
	  "std" => ""),
	   
	
  array( "type" => "close")
	
  );
$themename = "AKDesk";
$shortname = "AKD";
function akdtheme_add_admin() {

  global $themename, $shortname, $options;

  if ( $_GET['page'] == basename(__FILE__) ) {

	  if ( 'save' == $_REQUEST['action'] ) {

		  foreach ($options as $value) {
			  update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

		  foreach ($options as $value) {
			  if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

		  header("Location: admin.php?page=functions.php&saved=true");
		  die;

	  } 
	  else if( 'reset' == $_REQUEST['action'] ) {

		  foreach ($options as $value) {
			  delete_option( $value['id'] ); }

		  header("Location: admin.php?page=functions.php&reset=true");
		  die;

	  }
  }

  add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'akdtheme_admin');
}
function akdtheme_admin() {

  global $themename, $shortname, $options;
  $i=0;

  if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
  if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>
<div class="wrap akd_wrap">
  <h2><span class="dashicons dashicons-admin-settings"></span> <?php echo $themename; ?> Settings</h2>
  <div class="akd_opts">
	  <form method="post">
		  <?php foreach ($options as $value) {
			  switch ( $value['type'] ) {
				  case "open":
				  ?>
				  <?php break;
				  case "close":
				  ?>
				  </div>
		  </div>
		  <br />
		  <?php break;
		  case "title":
		  ?>
		  <p>To easily use the <?php echo $themename;?> theme, you can use the menu below.</p>

  <?php break;
		  case 'text':
  ?>

  <div class="akd_input akd_text">
	  <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	  <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
	  <small><?php echo $value['desc']; ?></small>

  </div>
  <?php
			  break;

		  case 'textarea':
  ?>

  <div class="akd_input akd_textarea">
	  <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	  <textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
	  <small><?php echo $value['desc']; ?></small>

  </div>

  <?php
			  break;

		  case 'select':
  ?>

  <div class="akd_input akd_select">
	  <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

	  <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
		  <?php foreach ($value['options'] as $option) { ?>
		  <option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
	  </select>

	  <small><?php echo $value['desc']; ?></small>
  </div>
  <?php
			  break;

		  case "checkbox":
  ?>

  <div class="akd_input akd_checkbox">
	  <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

	  <?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
	  <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />


	  <small><?php echo $value['desc']; ?></small>
  </div>
  <?php break;
		  case "section":

			  $i++;

  ?>

  <div class="akd_section">
	  <div class="akd_title"><h3><?php echo $value['name']; ?></h3><span class="submit"><input class="page-title-action" name="save<?php echo $i; ?>" type="submit" value="Save changes" />
		  </span></div>
		  <div class="akd_options">


		  <?php break;

	  }
  }
		  ?>

		  <input type="hidden" name="action" value="save" />
		  </form>
		  <form method="post">
		  <p class="submit">
		  <input name="reset" type="submit" class="page-title-action" value="Reset" />
		  <input type="hidden" name="action" value="reset" />
		  </p>
		  </form>
		  </div> 


		  <?php
}



add_action('admin_init', 'akdtheme_add_init');
add_action('admin_menu', 'akdtheme_add_admin');


function akdtheme_add_init() {
  $file_dir=get_bloginfo('template_directory');
  wp_enqueue_style("optionspanelcss", $file_dir."/inc/themefunctions/options_panel.css", false, "1.0", "all");
  wp_enqueue_script("optionspanelcssjs", $file_dir."/inc/themefunctions/options_panel.js", false, "1.0");
}