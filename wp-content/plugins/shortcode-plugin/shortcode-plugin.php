<?php

/*
 * Plugin Name:       Shortcode Widget
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

 add_shortcode("message", "sp_show_static_message");

 function sp_show_static_message(){
    return "<p style='font-size:40px; font-weight:bold; color:red;'>Hello I am a simple static message</p>";
 }


 add_shortcode("student","sp_handle_student_data");

 function sp_handle_student_data($attributes) {
    $attributes = shortcode_atts(array(
        "name"=>"Default Student",
        "email"=>"Default Email",
        
    ), $attributes, "student");

    return "<h3>Student Data: Name- {$attributes['name']}  & Email - {$attributes['email']}</h3>";
 }