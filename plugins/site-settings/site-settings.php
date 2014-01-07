<?php

/*
Plugin Name: GC4W Settings
Version: 1.0
Plugin URI: http://gc4women.org
Description: Set site settings
Author: Alvin Grant
Author URI: http://alvingrant.com
*/


/*  ====== INSTRUCTIONS FOR ADDING FIELDS ======


In admin_init()
---------------

- Add section (if necessary) -

Syntax:   add_settings_section('cbsradiocom_settings_SECTION', 'LABEL', array($this, 'section_cbsradiocom_settings'), 'cbsradiocom-settings');
Example:  add_settings_section('cbsradiocom_settings_playit', 'Play.it', array($this, 'section_cbsradiocom_settings'), 'cbsradiocom-settings');


- Add field -

Syntax:   add_settings_field('FIELD', 'LABEL', array($this, 'FIELD_cb'), 'cbsradiocom-settings', 'cbsradiocom_settings_SECTION');
Example:  add_settings_field('playit_news_genre_id', 'Play.it News Genre ID', array($this, 'playit_news_genre_id_cb'), 'cbsradiocom-settings', 'cbsradiocom_settings_playit');


In set_defaults()
-----------------

- Add array key/value pair

Syntax:   'FIELD' => DEFAULT_VALUE,
Example:  'playit_news_genre_id' => 12121,


Add callback function
---------------------

Basic Syntax (amend for whatever input type is needed):
function FIELD_cb {
    echo '<input type="text" value="'.self::get_setting('FIELD_id').'" id="FIELD" name="cbsradiocom_settings[FIELD]" />';
}

Example:
function playit_news_genre_id_cb() {
    echo '<input type="text" size="8" value="'.self::get_setting('playit_news_genre_id').'" id="playit_news_genre_id" name="cbsradiocom_settings[playit_news_genre_id]" />';
}


Access
------

- Default value will be returned if a value has not yet been set in admin -

$value = cbsradiocom_get_option('FIELD');

*/

class GC4WSettings {

    function add_admin_page() {
        add_options_page('GC4W Settings', 'GC4W Settings', 'manage_options', 'gc4w-settings', array($this, 'display_page'));
    }

    function display_page() {
        ?>
        <div class="wrap">
            <div id="icon-options-general" class="icon32"><br></div>
            <h2>GC4W Settings</h2>

            <form action="options.php" method="post">
                <?php settings_fields('gc4w_settings'); ?>
                <?php do_settings_sections('gc4w-settings'); ?>

                <p><input name="Submit" type="submit" value="Save Changes" /></p>
            </form>
        </div>
        <?php
    }

    function admin_init() {
        register_setting('gc4w_settings', 'gc4w_settings');

        // LFM section
        add_settings_section('gc4w_social', 'Social Settings', array($this, 'section_gc4w_settings'), 'gc4w-settings');

        add_settings_field('twitter_url', 'Twitter Url', array($this, 'twitter_url'), 'gc4w-settings', 'gc4w_social');
        add_settings_field('facebook_url', 'Facebook Url', array($this, 'facebook_url'), 'gc4w-settings', 'gc4w_social');
        add_settings_field('pinterest_url', 'Pinterest Url', array($this, 'pinterest_url'), 'gc4w-settings', 'gc4w_social');
        add_settings_field('instagram_url', 'Instagram Url', array($this, 'instagram_url'), 'gc4w-settings', 'gc4w_social');
        add_settings_field('linkedin_url', 'LinkedIn Url', array($this, 'linkedin_url'), 'gc4w-settings', 'gc4w_social');

        // Homepage call to action
        add_settings_section('action_call', 'Call to Action', array($this, 'section_gc4w_settings'), 'gc4w-settings');

        add_settings_field('action_header', 'Header Call', array($this, 'action_header'), 'gc4w-settings', 'action_call');
        add_settings_field('action_sub', 'Sub Call', array($this, 'action_sub'), 'gc4w-settings', 'action_call');
        add_settings_field('action_link', 'Permalink', array($this, 'action_link'), 'gc4w-settings', 'action_call');
    }

    private function set_defaults($name = '') {
        $defaults = array(
                          'twitter_url' => 'http://twitter.com',
                          'facebook_url' => 'http://facebook.com',
                          'pinterest_url' => 'http://pinterest.com',
                          'instagram_url' => 'http://instagram.com',
                          'linkedin_url' => 'http://linkedin.com',
                          'action_header' => 'Headline goes here.',
                          'action_sub' => 'Subheadline goes here.',
                          'action_link' => '#',
                         );

        // if no $name, then this call is to reset all defaults
        if ( ! $name) {
            update_option('gc4w_settings', $defaults);
            return;
        }


        $options = get_option('gc4w_settings');

        // if no $options, then no settings have been set; set defaults
        if ( ! $options) {
            self::set_defaults();
        }

        // if item exists in options, return it (though, if this function is being called, then this check should have already been done)
        if (array_key_exists($name, $options)) {
            return $options[$name];
        }

        // if no default exists for $name, return null
        if ( ! array_key_exists($name, $defaults)) {
            return;
        }

        // add new default value and return it
        $options[$name] = $defaults[$name];
        update_option('gc4w_settings', $options);

        return $defaults[$name];
    }
    

    function section_gc4w_settings() {}


    function twitter_url() {
        echo '<input type="text" size="40" value="'.self::get_setting('twitter_url').'" id="twitter_url" name="gc4w_settings[twitter_url]" />';
    }    

    function facebook_url() {
        echo '<input type="text" size="40" value="'.self::get_setting('facebook_url').'" id="facebook_url" name="gc4w_settings[facebook_url]" />';
    }

    function pinterest_url(){
        echo '<input type="text" size="40" value="'.self::get_setting('pinterest_url').'" id="pinterest_url" name="gc4w_settings[pinterest_url]" />';
    }

    function instagram_url(){
        echo '<input type="text" size="40" value="'.self::get_setting('instagram_url').'" id="instagram_url" name="gc4w_settings[instagram_url]" />';
    }

    function linkedin_url(){
        echo '<input type="text" size="40" value="'.self::get_setting('linkedin_url').'" id="linkedin_url" name="gc4w_settings[linkedin_url]" />';
    }

    function action_header(){
        echo '<input type="text" size="40" value="'.self::get_setting('action_header').'" id="action_header" name="gc4w_settings[action_header]" />';
    }

    function action_sub(){
        echo '<input type="text" size="40" value="'.self::get_setting('action_sub').'" id="action_sub" name="gc4w_settings[action_sub]" />';
    }

    function action_link(){
        echo '<input type="text" size="40" value="'.self::get_setting('action_link').'" id="action_link" name="gc4w_settings[action_link]" />';
    }

    function get_setting($name = '') {
        if ( ! $name) {
            return;
        }

        $options = get_option('gc4w_settings');

        if ( ! $options) {
            self::set_defaults();
        }

        if (array_key_exists($name, $options)) {
            return $options[$name];
        }

        return self::set_defaults($name);
    }
}



function gc4w_get_option($key) {
    return GC4WSettings::get_setting($key);
}

$gc4w_settings = new GC4WSettings();
add_action('admin_init', array($gc4w_settings, 'admin_init'));
add_action('admin_menu', array($gc4w_settings, 'add_admin_page'));
