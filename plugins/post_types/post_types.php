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

	register_post_type('programs',
		array(
			'labels' => array(
				'name' => 'Programs',
				'singular_name' => 'Program'
				),
			'menu_position' => 6,
			'taxonomies' => array('category'),
			'public' => true,
			'has_archives' => true,
			'supports' => array(
				'editor',
				'excerpt',
				'custom-fields',
				'comments',
				'title',
				'thumbnail',
				'category',
				),
			)
		);
	
	register_post_type('news',
		array(
			'labels' => array(
				'name' => 'News',
				'singular_name' => 'News'
				),
			'menu_position' => 4,
			'taxonomies' => array('category'),
			'public' => true,
			'has_archives' => true,
			'supports' => array(
				'editor',
				'excerpt',
				'custom-fields',
				'comments',
				'title',
				'thumbnail',
				'category',
				),
			)
		);
}

add_action('init', 'gc4w_custom_post_types');
