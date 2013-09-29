<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title('|', true, 'right' ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />

<?php 
	if( is_singular() && get_option('thread_comments'))
		wp_enqueue_script('comment-reply');

	wp_head();

	wp_get_archives('type=monthly&format=link');
?>
</head>
<body>
	<div id="wrapper">
		<header>
			<h1 id="site-title"><a href="<?php echo get_option('home'); ?>"></a><?php bloginfo('name'); ?></h1>
		</header>
		<?php get_search_form(); ?>
		<nav>
			<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'menu_class' => 'nav', 'theme_location' => 'primary' ) ); ?>
		</nav>
		