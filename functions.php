<?php

	// Use wp_nav_menu
	register_nav_menu( 'primary', __( 'Primary Menu', 'gc4women' ) );

	//Register custom plugins
	include(dirname(__FILE__).'/plugins/site-settings/site-settings.php');
	//include(dirname(__FILE__).'/plugins/post_types/post_types.php');

	add_action('wp_enqueue_scripts', 'load_javascript_files');

	function load_javascript_files(){
		wp_register_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'), '1.7');
		wp_register_script('tote', get_template_directory_uri() . '/js/jquery.totemticker.min.js', array('jquery'), '1.7');
		wp_register_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.7');
		wp_enqueue_script('tote');
		wp_enqueue_script('script');
		
		if(is_front_page()){
			wp_enqueue_script('flexslider');
		}
	}

	function is_valid_url($url) {
		return preg_match('/^http(s)?:\/\/[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i', $url);
	}

	// Call to Action
	function action_call($args=array()){
		$args = array_merge(array(
			'action_header' => GC4WSettings::get_setting('action_header'),
			'action_sub' => GC4WSettings::get_setting('action_sub'),
			'action_link' => esc_url(GC4WSettings::get_setting('action_link')),
		), $args);

		$action_header = $args['action_header'];
		$action_sub = $args['action_sub'];
		$action_link = $args['action_link'];

		if(!$action_header && !$action_sub && !$action_link) return false;
		?>
		<div class="action_call">
			<?php if ($action_header): ?>
				<h3><?php echo $action_header; ?></h3>
			<?php endif; ?>
			<?php if ($action_sub): ?>
				<p><?php echo $action_sub; ?></p>
			<?php endif; ?>
			<?php if ($action_link): ?>
				<a href="<?php echo $action_link; ?>">Learn More</a>
			<?php endif; ?>
		</div><?php
	}

	// Social Settings

	function gc4w_social_widget($args=array()){
		$args = array_merge(array(
			'facebook_url' => esc_url(GC4WSettings::get_setting('facebook_url')),
			'twitter_url' => esc_url(GC4WSettings::get_setting('twitter_url')),
			'pinterest_url' => esc_url(GC4WSettings::get_setting('pinterest_url')),
			'linkedin_url' => esc_url(GC4WSettings::get_setting('linkedin_url')),
		), $args);

		if(empty($label)){
			$label = "Follow Us";
		}
		$facebook_url = $args['facebook_url'];
		$twitter_url = $args['twitter_url'];
		$pinterest_url = $args['pinterest_url'];
		$linkedin_url = $args['linkedin_url'];

	if(!$facebook_url || !$twitter_url || !$pinterest_url) return false;
	?>
	<div class="social">
	<ul>
		<?php if(is_valid_url($facebook_url)): ?>
			<li class="facebook">
				<a href="<?php echo $facebook_url; ?>" target="_blank">Facebook</a>
			</li>
		<?php endif; ?>
		<?php if(is_valid_url($twitter_url)): ?>
			<li class="twitter">
				<a href="<?php echo $twitter_url; ?>" target="_blank">Twitter</a>
			</li>
		<?php endif; ?>
		<?php if(is_valid_url($pinterest_url)): ?>
			<li class="pinterest">
				<a href="<?php echo $pinterest_url; ?>" target="_blank">Pinterest</a>
			</li>
		<?php endif; ?>
		<?php if(is_valid_url($linkedin_url)): ?>
			<li class="linkedin">
				<a href="<?php echo $linkedin_url; ?>" target="_blank">Linkedin</a>
			</li>
		<?php endif; ?>
	</ul>
	    </div><?php
	}

	//Enable post thumbnails
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(250, 250, true);

	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'category-thumb', 350, 9999, true ); //300 pixels wide (and unlimited height)
		add_image_size( 'homepage-thumb', 450, 250, true ); //(cropped)
	}

	if (class_exists('MultiPostThumbnails')) {

	new MultiPostThumbnails(array(
		'label' => 'Secondary Image',
		'id' => 'secondary-image',
		'post_type' => 'post'
	 ) );

	}

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
		register_sidebar(array(
			'name' => 'Footer Sidebar 4',
			'id' => 'footer-sidebar-4',
			'description' => 'Appears in the footer area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		));
	}
	add_action('widgets_init','gc4w_widget_init');

	//Custom Backgrounds
	add_theme_support('custom-background');
?>