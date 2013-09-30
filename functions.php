<?php 

	// Use wp_nav_menu
	register_nav_menu( 'primary', __( 'Primary Menu', 'gc4women' ) );

	//Enable post theumbnails
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(520, 250, true);

	//Widget enabled sidebar
	if ( function_exists('register_sidebar') )
		register_sidebar();

	//Widget enabled footer
	function gc4w_widget_init(){
		register_sidebar(array(
		'name' => 'Footer Siderbar 1',
		'id' => 'footer-sidebar-1',
		'description' => 'Appears in the footer area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title',
		'after_title' => '</h3>'
		));
		register_sidebar(array(
			'name' => 'Footer Siderbar 2',
			'id' => 'footer-sidebar-2',
			'description' => 'Appears in the footer area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title',
			'after_title' => '</h3>'
		));
		register_sidebar(array(
			'name' => 'Footer Siderbar 3',
			'id' => 'footer-sidebar-3',
			'description' => 'Appears in the footer area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title',
			'after_title' => '</h3>'
		));
	}
	add_action('widgets_init','gc4w_widget_init')

	//Custom Backgrounds
	//add_theme_support('custom-background');
?>