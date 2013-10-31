<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php bloginfo('name'); ?> <?php wp_title('|', true, 'left' ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />

<?php 
	if( is_singular() && get_option('thread_comments'))
		wp_enqueue_script('comment-reply');

	wp_head();

	wp_get_archives('type=monthly&format=link');
?>
<?php wp_head(); ?>
</head>
<body>
	<div id="wrapper">
		<header>
			<a href="<?php echo esc_url(home_url('/')); ?>"><h1 id="site-title"><?php bloginfo('name'); ?></h1></a>
			<div id="search"><?php get_search_form(); ?></div>
			<div id="site-description"><?php bloginfo( 'description' ); ?></div>
			<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'menu_class' => 'nav', 'theme_location' => 'primary' ) ); ?>
		</header>
		