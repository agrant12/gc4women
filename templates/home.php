<?php
/**
 * Template Name:  Home
 */

get_header();

$event_args = array(
	'post_type' => 'event', 
	'posts_per_page' => 3
);

$events = new WP_Query($event_args);

$news_args = array(
	'category_name' => 'news', 
	'posts_per_page' => 5
);

$news = new WP_Query($news_args);

carousel(); ?>

<section class="featured-bucket">
	<article>
		<section class="content">
			<h3>We Are GC4W</h3>
			<p>The Global Connections for Women Foundation is a non-profit organization that believes in all women and their right to create new opportunities for themselves and their communities.</p>
			<p class="learn"><a href="<?php echo esc_url(home_url('/about-us')); ?>">Learn More <span class="arrow">Arrow</span></a></p>
		</section>
	</article>

	<article>
		<section class="content">
			<h3>Get Involved</h3>
			<p>The connection, education and empowerment initiatives of the Global Connections for Women Foundation provide the opportunity to make a real difference in the lives of the women and youth we serve.</p>
			<p class="learn"><a href="<?php echo esc_url(home_url('/category/programs')); ?>">Learn More <span class="arrow">Arrow</span></a></p>
		</section>
	</article>

	<article>
		<section class="content">
			<h3>Donate To The Cause!</h3>
			<p>The lives we enjoy today are indisputably the result of people who either directly or indirectly influenced who we are and what we do. Here is your chance to influence someone’s life and make an indelible mark on their future.</p>
			<p class="learn"><a href="<?php echo esc_url(home_url('/donate')); ?>">Learn More <span class="arrow">Arrow</span></a></p>
		</section>
	</article>
</section>

<div class="main">
	<div class="post">
		<div class="header-roll">
			<h3>Upcoming Events</h3>
			<a class="arrow" href="<?php echo esc_url(home_url('/events')); ?>">Arrow</a><a href="<?php echo esc_url(home_url('/events')); ?>">View All Events</a>
		</div>
		<?php while ( $events->have_posts() ) : $events->the_post(); ?>
				<aside class="home">
					<div class="img"><a class="link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'carousel'); ?></a></div>
					<section class="content">
						<p class="post-date"><?php echo get_the_date(); ?></p>
						<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php truncate(get_the_title(), 0, 100); ?></a></h2>
						<a class="post-link" href="<?php the_permalink(); ?>">View Event</a>
						<a class="arrow" href="<?php the_permalink(); ?>">Arrow</a>
					</section>
				</aside>
			
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>

	<div class="post">
		<div class="header-roll">
			<h3>Latest News</h3>
			<a class="arrow" href="<?php echo esc_url(home_url('/news')); ?>">Arrow</a><a href="<?php echo esc_url(home_url('/news')); ?>">View All News</a>
		</div>

		<?php while ( $news->have_posts() ) : $news->the_post(); ?>
			<?php $cat = get_the_category(); ?>
			<aside class="home">
				<div class="img"><a class="link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'carousel'); ?></a></div>
				<section class="content">
					<p class="post-date"><?php echo get_the_date(); ?></p>
					<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php truncate(get_the_title(), 0, 100); ?></a></h2>
					<a class="post-link" href="<?php the_permalink(); ?>">
					<?php 
						$view = 'View Article';
						foreach ($cat as $key => $value) {
							if ($value->slug == 'gallery') {
								$view = 'View Gallery';	
							} else if($value->slug == 'video') {
								$view = 'View Video';
							} else if($value->slug == 'champion') {
								$view = "View Champion";
							}
						} 
						echo $view;
					?>
					</a>
					<a class="arrow" href="<?php the_permalink(); ?>">Arrow</a>
				</section>
			</aside>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>
</div>

<div class="sidebar">
	<?php dynamic_sidebar('frontpage-sidebar'); ?>
</div>
<?php get_footer(); ?>