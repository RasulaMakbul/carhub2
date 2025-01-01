<?php

/*
* Plugin Name: Database Backup in CSV Format
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


//create plugin menu
//export all data into csv format


add_action("admin_menu","tdcb_create_admin_manu");

//admin menu
function tdcb_create_admin_manu() {
    add_menu_page(
        "CSV Data Backup Plugin",
        "CSV Data Backup",
        "manage_options",
        "csv-data-backup",
        "tdcb_export_form",
        "dashicons-database-export",8
    );
}


//form layout
function tdcb_export_form() {
    // echo "<h3>This is from TDCB</h3>";
    ob_start();
    include_once plugin_dir_path(__FILE__).'template/table_data_backup.php';

    $layout=ob_get_contents();

    ob_end_clean();
    echo $layout;
}


//
add_action("admin_init","tbcd_handle_form_export");

function tbcd_handle_form_export() {
    if(isset($_POST['tdcb_export_button'])){
        global $wpdb;

        $table_name=$wpdb->prefix. 'students_date';
        $students=$wpdb->get_results(
            "SELECT * FROM {$table_name}",ARRAY_A
        );

        // echo "<pre>";
        // print_r($students);die;

        if(empty($students)){
            //Error Message
        }

        $file_name="student_data_".time().".csv";

        header("Content-Type:text/csv; charset:utf-8;");
        header("Content-Disposition:attachment; filename=".$file_name);

        $output=fopen("php://output","w");
        fputcsv($output,array_keys($students[0]));

        foreach($students as $student){
            fputcsv($output,$student);
        }

        fclose($output);
        exit;
    }
}