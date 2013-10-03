<?php
    /** Step 2 (from text above). */
    add_action('admin_menu', 'gc4w_plugin_menu' );

    /** Step 1. */
    function gc4w_plugin_menu() {
        add_options_page( 'GC4W Plugin Options', 'GC4W Settings', 'manage_options', 'my-unique-identifier', 'gc4w_plugin_options' );
    }

    /** Step 3. */
    function gc4w_plugin_options() {
        if ( !current_user_can( 'manage_options' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }
        ?>
        <form action="options.php" method="post">
            <?php settings_fields('gc4w_settings'); ?>
            <?php do_settings_sections('gc4w-settings'); ?>
            <p><input name="Submit" type="submit" value="Save Changes" /></p>
        </form>
        <?php
    }
    function admin_init(){
        register_settings('gc4w_settings', 'gc4w_settings');

        //Social Feed section
        add_settings_section('gc4w_settings_tw', 'Social Feeds', array($this, 'section_gc4w_settings'), 'gc4w_settings');

        add_settings_field('twitter_api', 'Twitter Api Key', array($this, 'twitter_api_gc4w'), 'gc4w-settings', 'gc4w_settings_twitter');
    }

    function twitter_api_gc4w(){
        echo '<input type="text" size="2" value"'.self::get_setting('twitter_api').'" id="twitter_api" name="gc4w_settings[twitter_api]" />';
    }
?>