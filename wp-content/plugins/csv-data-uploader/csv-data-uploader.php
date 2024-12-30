<?php

/*
* Plugin Name: CSV Data Uploader
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

define("CDU_PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));

add_shortcode("csv-data-uploader", "cdu_display_uploader_form");

function cdu_display_uploader_form() {
    // return "<h2>This is data uploader form</h2>";

    ob_start();

    include_once(CDU_PLUGIN_DIR_PATH."template/cdu_form.php");

    $template=ob_get_contents();

    ob_end_clean();

    return $template;
}


register_activation_hook(__FILE__,"cdu_create_table");

function cdu_create_table() {
    global $wpdb;

    $table_name = $wpdb->prefix . "students_date";
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "
        CREATE TABLE $table_name (
            id INT NOT NULL AUTO_INCREMENT,
            name VARCHAR(30) DEFAULT NULL,
            email VARCHAR(30) DEFAULT NULL,
            age INT DEFAULT NULL,
            phone VARCHAR(30) DEFAULT NULL,
            photo VARCHAR(120) DEFAULT NULL,
            PRIMARY KEY (id)
        ) $charset_collate;
    ";

    require_once ABSPATH . "wp-admin/includes/upgrade.php";

    dbDelta($sql);

    if ($wpdb->last_error) {
        error_log("Database Error: " . $wpdb->last_error);
        error_log("SQL Command: " . $sql);
    }
}

add_action('wp_enqueue_scripts','cdu_add_script_file');


function cdu_add_script_file() {
    wp_enqueue_script('cdu_script_js',plugin_dir_url(__FILE__)."assets/script.js",array('jquery'));
    wp_localize_script("cdu_script_js","cdu_object",array(
        "ajax_url"=>admin_url('admin-ajax.php')
    ));
}

//capture ajax requese
add_action("wp_ajax_cdu_submit_form_data","cdu_ajax_handler"); //when user is logged in
add_action("wp_ajax_nopriv_cdu_submit_form_data","cdu_ajax_handler"); //when user is logged out

function cdu_ajax_handler() {

    if($_FILES['csv_data_file']){
        $csv_file=$_FILES['csv_data_file']['tmp_name'];
        $handle=fopen($csv_file,"r");
    } else{
        echo json_encode(array(
                "status"=>1,
                "message"=>"No File Found"
            ));
        }
    
    exit;
}