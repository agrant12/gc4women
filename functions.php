<?php

	// Use wp_nav_menu
	register_nav_menu( 'primary', __( 'Primary Menu', 'gc4women' ) );

	//Register custom plugins
	include(dirname(__FILE__).'/plugins/site-settings/site-settings.php');
	include(dirname(__FILE__).'/plugins/post_types/post_types.php');

	function slider_method() {
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'slides', get_template_directory_uri().'/js/slides.min.jquery.js', array( 'jquery', 'easing' ), true );
	}
	add_action('wp_enqueue_scripts', 'slider_method');

	//Enable post theumbnails
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(520, 250, true);

	//Widget enabled sidebar
	if ( function_exists('register_sidebar') )
		register_sidebar();

	//Widget enabled footer
	function gc4w_widget_init(){
		register_sidebar(array(
		'name' => 'Footer Sidebar 1',
		'id' => 'footer-sidebar-1',
		'description' => 'Appears in the footer area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
		));
		register_sidebar(array(
			'name' => 'Footer Sidebar 2',
			'id' => 'footer-sidebar-2',
			'description' => 'Appears in the footer area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		));
		register_sidebar(array(
			'name' => 'Footer Sidebar 3',
			'id' => 'footer-sidebar-3',
			'description' => 'Appears in the footer area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		));
	}
	add_action('widgets_init','gc4w_widget_init');

	//Custom Backgrounds
	//add_theme_support('custom-background');
?>