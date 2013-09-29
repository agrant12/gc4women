<?php 

	//Add support for Wordpress custom menus
	add_action('init', 'register_my_menu');

	//Register area for custom menu
	function register_my_menu(){
		register_nav_menu('primary', __('Primary Menu') );
	}

	//Enable post theumbnails
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(520, 250, true);

	//Widget enabled sidebar
	if ( function_exists('register_sidebar') )
		register_sidebar();

	//Custom Backgrounds
	add_theme_support('custom-background');
?>