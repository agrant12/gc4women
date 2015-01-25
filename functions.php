<?php

	// Use wp_nav_menu
	register_nav_menu( 'primary', __( 'Primary Menu', 'gc4women' ) );

	//Register plugins
	include(dirname(__FILE__).'/plugins/site-settings/site-settings.php');
	include(dirname(__FILE__).'/plugins/post_types/post_types.php');
	include(dirname(__FILE__).'/plugins/advanced-custom-fields/acf.php');
	include(dirname(__FILE__).'/plugins/multiple-post-thumbnails/multi-post-thumbnails.php');
	include(dirname(__FILE__).'/plugins/carousel/carousel.php');
	include(dirname(__FILE__).'/plugins/instagram/instagram.php');
	include(dirname(__FILE__).'/plugins/newsletter/newsletter.php');

	//Register Widgets
	register_widget('GC4W_Newsletter_Widget');

	// Load JS Files
	add_action('wp_enqueue_scripts', 'load_javascript_files');

	function load_javascript_files(){
		wp_register_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'), '1.7');
		wp_register_script('tote', get_template_directory_uri() . '/js/jquery.totemticker.min.js', array('jquery'), '1.7');
		wp_register_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.8');
		wp_enqueue_script('tote');
		wp_enqueue_script('script');
		
		if(is_front_page()){
			wp_enqueue_script('flexslider');
		}
	}

	// Check if url is valid
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

	if(!$facebook_url && !$twitter_url && !$pinterest_url) return false;
	?>
		<div class="social">
			<ul>
				<?php if(is_valid_url($facebook_url)): ?>
					<a title="GC4Women Facebook" href="<?php echo $facebook_url; ?>" target="_blank">
						<i class="icon-facebook-squared facebook"></i>
					</a>
				<?php endif; ?>
				<?php if(is_valid_url($twitter_url)): ?>
					<a title="GC4Women Twitter" href="<?php echo $twitter_url; ?>" target="_blank">
						<i class="icon-twitter twitter"></i>
					</a>
				<?php endif; ?>
				<?php if(is_valid_url($pinterest_url)): ?>
					<a title="GC4Women Pinterest" href="<?php echo $pinterest_url; ?>" target="_blank">
						<i class="icon-pinterest-squared pinterest"></i>
					</a>
				<?php endif; ?>
				<?php if(is_valid_url($linkedin_url)): ?>
					<a title="GC4Women LinkedIn" href="<?php echo $linkedin_url; ?>" target="_blank">
						<i class="icon-linkedin-squared linkedin"></i>
					</a>
				<?php endif; ?>
			</ul>
		</div><?php
	}

	function donations($args=array()) {
		$args = array_merge(array(
			'we_care' => esc_url(GC4WSettings::get_setting('we_care')),
			'donate' => esc_url(GC4WSettings::get_setting('donate')),
		), $args);

		$we_care = $args['we_care'];
		$donate = $args['donate'];

		if(!$we_care && !$donate) return false;
		?>
		<div class="donate">
			<ul>
				<?php if (is_valid_url($we_care)): ?>
					<li>
						<a href="<?php echo $we_care; ?>" target="_blank">We Care</a>
					</li>
				<?php endif; ?>
				<?php if (is_valid_url($donate)): ?>
					<li>
						<a href="<?php echo $donate; ?>" target="_blank">Donate</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
		<?php
	}

	//Enable post thumbnails
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(250, 250, true);

	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'category-thumb', 350, 9999, false ); //300 pixels wide (and unlimited height)
		add_image_size( 'homepage-thumb', 450, 250, true ); //(cropped)
		add_image_size( 'carousel', 1025, 350, true);
	}

	if (class_exists('MultiPostThumbnails')) {

		new MultiPostThumbnails(array('label' => 'Secondary Image', 'id' => 'secondary-image', 'post_type' => 'event'));
		new MultiPostThumbnails(array('label' => 'Secondary Image', 'id' => 'secondary-image', 'post_type' => 'post'));
		new MultiPostThumbnails(array('label' => 'Secondary Image', 'id' => 'secondary-image', 'post_type' => 'page'));
	}

	//Widget enabled sidebar
	if ( function_exists('register_sidebar') )
		register_sidebar();

	//Widget enabled footer
	function gc4w_widget_init(){
		register_sidebar(array(
			'name' => 'Front Page Sidebar',
			'id' => 'frontpage-sidebar',
			'description' => 'Appears in the homepage area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		));
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
		register_sidebar(array(
			'name' => 'Home Page Sidebar',
			'id' => 'homepage-sidebar',
			'description' => 'Appears in the homepage area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		));
	}
	add_action('widgets_init','gc4w_widget_init');

	//Custom Backgrounds
	add_theme_support('custom-background');

	// Truncate Strings
	function truncate($string, $start = 0, $end = 25) {
		$word = substr($string, $start, $end);

		if (strlen($string) > $end) {
			$word = $word . '...';
		}

		echo $word;
	}

	// Rewrite custom post pagination
	function rewrite(){
		add_rewrite_rule( 'news/page/([^/]*)/?', 'index.php?pagename=news&paged=$matches[1]', 'top' );
	}
	add_action( 'init', 'rewrite');


	// Fontello
	add_action( 'init', 'fontello_icons' );

	function fontello_icons() {
		wp_register_style( 'fontello-codes', get_bloginfo('stylesheet_directory') . '/css/fontello-codes.css', array(), '1.0', 'all' );
		wp_register_style( 'fontello-embedded', get_bloginfo('stylesheet_directory') . '/css/fontello-embedded.css', array(), '1.0', 'all' );
		wp_register_style( 'fontello', get_bloginfo('stylesheet_directory') . '/css/fontello.css', array(), '1.0', 'all' );
		wp_register_style( 'fontello-ie7-codes', get_bloginfo('stylesheet_directory') . '/css/fontello-ie7-codes.css', array(), '1.0', 'all' );
		wp_register_style( 'fontello-ie7', get_bloginfo('stylesheet_directory') . '/css/fontello-ie7.css', array(), '1.0', 'all' );
		wp_enqueue_style( 'fontello-codes' );
		wp_enqueue_style( 'fontello-embedded' );
		wp_enqueue_style( 'fontello' );
		wp_enqueue_style( 'fontello-ie7-codes' );
		wp_enqueue_style( 'fontello-ie7' );
	}
?>