<?php

/*
Plugin Name: GC4W Custom Carousel
Version: 1.0
Plugin URI: http://gc4women.org
Description: Set carousel
Author: Alvin Grant
Author URI: http://alvingrant.com
*/

class GC4WCarousel {

    function add_admin_page() {
        add_menu_page('GC4W Carousel', 'GC4W Carousel', 'manage_options', 'gc4w-carousel', array($this, 'display_page'));
    }

    function display_page() {
        ?>
        <div class="wrap">
            <div id="icon-options-general" class="icon32"><br></div>
            <h2>GC4W Carousel</h2>

            <form action="options.php" method="post">
                <?php settings_fields('gc4w_carousel'); ?>
                <?php do_settings_sections('gc4w-carousel'); ?>

                <p><input name="Submit" type="submit" value="Save Changes" /></p>
            </form>
        </div>
        <?php
    }

    function admin_init() {
        register_setting('gc4w_carousel', 'gc4w_carousel');

        // LFM section
        add_settings_section('gc4w_slide', 'Carousel Slides', array($this, 'section_gc4w_carousel'), 'gc4w-carousel');

        add_settings_field('slide1', 'Slide 1 Post ID', array($this, 'slide1'), 'gc4w-carousel', 'gc4w_slide');
        add_settings_field('slide2', 'Slide 2 Post ID', array($this, 'slide2'), 'gc4w-carousel', 'gc4w_slide');
        add_settings_field('slide3', 'Slide 3 Post ID', array($this, 'slide3'), 'gc4w-carousel', 'gc4w_slide');
        add_settings_field('slide4', 'Slide 4 Post ID', array($this, 'slide4'), 'gc4w-carousel', 'gc4w_slide');
        
    }

    private function set_defaults($name = '') {
        $defaults = array(
        	'slide1' => '',
        	'slide2' => '',
        	'slide3' => '',
        	'slide4' => ''
        	);

        // if no $name, then this call is to reset all defaults
        if ( ! $name) {
            update_option('gc4w_carousel', $defaults);
            return;
        }


        $options = get_option('gc4w_carousel');

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
    

    function section_gc4w_carousel() {}


    function slide1() {
        echo '<input type="text" size="40" value="'.self::get_setting('slide1').'" id="slide1" name="gc4w_carousel[slide1]" />';
    }

    function slide2() {
        echo '<input type="text" size="40" value="'.self::get_setting('slide2').'" id="slide2" name="gc4w_carousel[slide2]" />';
    }  

    function slide3() {
        echo '<input type="text" size="40" value="'.self::get_setting('slide3').'" id="slide3" name="gc4w_carousel[slide3]" />';
    }    

    function slide4() {
        echo '<input type="text" size="40" value="'.self::get_setting('slide4').'" id="slide4" name="gc4w_carousel[slide4]" />';
    }  

    function get_setting($name = '') {
        if ( ! $name) {
            return;
        }

        $options = get_option('gc4w_carousel');

        if ( ! $options) {
            self::set_defaults();
        }

        if (array_key_exists($name, $options)) {
            return $options[$name];
        }

        return self::set_defaults($name);
    }
}

function gc4w_get_carousel_option($key) {
    return GC4WCarousel::get_setting($key);
}

$gc4w_carousel = new GC4WCarousel();
add_action('admin_init', array($gc4w_carousel, 'admin_init'));
add_action('admin_menu', array($gc4w_carousel, 'add_admin_page'));
