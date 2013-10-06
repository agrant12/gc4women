<?php

/*
Plugin Name: GC4W Options Settings
Version: 1.0
Plugin URI: http://gc4women.org
Description: Set site settings
Author: Alvin Grant
Author URI: http://alvingrant.com
*/

add_action('admin_menu', 'gc4w_admin_add_page');

function gc4w_admin_add_page() {
    add_options_page('GC4W Page', 'GC4W Menu', 'manage_options', 'gc4w', 'gc4w_options_page');
}

function gc4w_options_page(){
    ?>
    <div>
        <?php screen_icon(); ?>
        <h2>GC4W Settings</h2>
        <form action="options.php" method="post">
            <?php settings_fields('gc4w_options'); ?>
            <?php do_settings_sections('gc4w'); ?>
            <br />
            <input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
        </form>
    </div>
    <?php
}

add_action('admin_init', 'gc4w_admin_init');

function gc4w_admin_init(){
    register_setting('gc4w_options', 'gc4w_options');
    add_settings_section('gc4w_main', 'API Settings', '', 'gc4w');
    add_settings_field('twitter_text_string', 'Twitter API Key', 'twitter_setting_string', 'gc4w', 'gc4w_main');
    add_settings_field('facebook_text_string', 'Facebok API Key', 'facebook_setting_string', 'gc4w', 'gc4w_main');
}

function twitter_setting_string(){
    $options = get_option('gc4w_options');
    echo "<input id='twitter_text_string' name='gc4w_options[text_string]' size='40' type='text' value='{$options['text_string']}' />";
}

function facebook_setting_string(){
    $options = get_option('gc4w_options');
    echo "<input id='facebook_text_string' name='gc4w_options[facebook_string]' size='40' type='text' value='{$options['facebook_string']}' />";
}

