<?php

/*
Plugin Name: GC4W Custom Post Types
Version: 1.0
Plugin URI: http://gc4women.org
Description: Set custom posttypes
Author: Alvin Grant
Author URI: http://alvingrant.com
*/

function my_spotlight() {
	$labels = array(
		'name'               => _x( 'Spotlight', 'post type general name' ),
		'singular_name'      => _x( 'Spotlight', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Spotlight Story' ),
		'add_new_item'       => __( 'Add New Spotlight' ),
		'edit_item'          => __( 'Edit Spotlight' ),
		'new_item'           => __( 'New Spotlight' ),
		'all_items'          => __( 'All Spotlights' ),
		'view_item'          => __( 'View Spotlight' ),
		'search_items'       => __( 'Search Spotlights' ),
		'not_found'          => __( 'No spotlights found' ),
		'not_found_in_trash' => __( 'No spotlights found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Spotlights'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Contains spotlight stories',
		'public'        => true,
		'menu_position' => 6,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
	);
	register_post_type( 'spotlight', $args );	
}
add_action( 'init', 'my_spotlight' );

?>