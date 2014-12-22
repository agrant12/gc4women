<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php bloginfo('name'); ?> <?php wp_title('|', true, 'left' ); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>
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
		<header id="top-header">
			<div class="hamburger"><a href="#">+</a></div>	
			<a href="<?php echo esc_url(home_url('/')); ?>"><h1 id="site-title"><?php bloginfo('name'); ?></h1></a>
			<div id="site-description"><?php bloginfo( 'description' ); ?></div>
			<ul class="social"><?php gc4w_social_widget(); ?><div class="donate"><a href="<?php echo home_url('/donate'); ?>">Donate to GC4W</a></div></ul>
		</header>
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'navigation' ) ); ?>
		