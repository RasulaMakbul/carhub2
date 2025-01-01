<?php

/*
* Plugin Name: My Custom Widgets
* Plugin URI:
* Description: Handle the basics with this plugin.
* Version: 1.0.0
* Requires at least: 6.7
* Requires PHP: 8.2+
* Author: Rasula Makbul
* Author URI: https://author.example.com/
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Update URI: https://example.com/my-plugin/
* Text Domain: my-basics-plugin
* Domain Path: /languages
*/

if(!defined("ABSPATH")){
    exit;
}

include_once plugin_dir_path(__FILE__) . "My_Custom_Widget.php";

function mcw_register_widget() {
    register_widget("My_Custom_Widget");
}
add_action("widgets_init", "mcw_register_widget");