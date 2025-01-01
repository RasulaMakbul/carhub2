<?php


/*
 * Plugin Name:       Custom Post and Blocs
 * Plugin URI:        
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 6.7
 * Requires PHP:      8.2+
 * Author:            Rasula Makbul
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

//  if(!defined('ABSPATH')){
//     exit;
//  }



add_action("admin_notices","hw_success_message");

function hw_success_message() {
   echo '<div class="notice notice-success is-dismissible"><p>I\'m a success message</p></div>';
}


add_action("admin_notices","hw_error_message");

function hw_error_message() {
   echo '
   <div class="notice notice-error is-dismissible">
   <p>I\'m a error message</p>
   </div>
   ';
}


add_action("admin_notices","hw_warning_message");

function hw_warning_message() {
   echo '
   <div class="notice notice-warning is-dismissible">
   <p>I\'m a warning message</p>
   </div>
   ';
}


add_action("admin_notices","hw_info_message");

function hw_info_message() {
   echo '
   <div class="notice notice-info is-dismissible">
   <p>I\'m a info message</p>
   </div>
   ';
}


add_action("wp_dashboard_setup", "hw_dashboard_widget");

function hw_dashboard_widget() {
   wp_add_dashboard_widget( "wp_hello_world_plugin","HW Hello World Widget", "hw_custom_admin_widet");
}

function hw_custom_admin_widet() {
   echo "This is a custom admin widget ";
}