<?php

/*
Plugin Name: GC4W Custom Post Types
Version: 1.0
Plugin URI: http://gc4women.org
Description: Set custom posttypes
Author: Alvin Grant
Author URI: http://alvingrant.com
*/

function gc4w_custom_post_types(){
	register_post_type('spotlights',
		array(
			'labels' => array(
				'name' => 'Spotlights',
				'singular_name' => 'Spotlight'
				),
			'menu_position' => 5,
			'public' => true,
			'has_archive' => true,
			'supports' => array(
				'editor',
				'excerpt',
				'custom-fields',
				'comments',
				'title',
				'thumbnail',
				),
			)
		);
}

add_action('init', 'gc4w_custom_post_types');
