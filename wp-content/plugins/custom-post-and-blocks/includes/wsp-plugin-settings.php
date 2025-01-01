<?php

if(!defined('ABSPATH')){
    exit;
}

function wsp_add_settings_page(){
    add_options_page(
        'Plugin Name Setting',
        'Plugin Name',
        'Manage Options',
        'wsp-plugin-settings',
        'wsp_render_settings_page'
    );
}

add_action('admin_menu','wsp_add_settings_page');

function wsp_render_settings_page(){
    ?>
    <div class="wrap">
        <h1><?php echo esc_html__('Plugin Name Settings', 'plugin-name'); ?></h1>
        <p><?php echo_esc_html__('This is the setting page of my plugin.','plugin-name') ?></p>
    </div>
    <?php
}