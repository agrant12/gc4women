<?php
/**
 * Template Name:  Home
 */

get_header();

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

<section class="news-feed">
	<article class="news-container">
		<header>
			<h1>Upcoming Events</h1>
			<a class="arrow" href="<?php echo esc_url(home_url('/category/events')); ?>">Arrow</a><a href="<?php echo esc_url(home_url('/category/events')); ?>">View All Events</a>
		</header>
		<?php $loop = new WP_Query(array('post_type' => 'Event', 'scope' => 'upcoming', 'posts_per_page' => 3)); ?>
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<?php if (strtotime(get_the_date()) > time()): ?>
				<aside>
					<div class="img"><a class="link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'carousel'); ?></a></div>
					<section class="content">
						<p class="post-date"><?php echo get_the_date(); ?></p>
						<h2 class="post-title"><?php truncate(get_the_title(), 0, 100); ?></h2>
						<a class="post-link" href="<?php the_permalink(); ?>">View Event</a>
						<a class="arrow" href="<?php the_permalink(); ?>">Arrow</a>
					</section>
				</aside>
			<?php endif; ?>
		<?php endwhile; ?>
		<?php wp_reset_query(); ?>
	</article>
</section>

<div class="home-sidebar"><?php dynamic_sidebar('frontpage-sidebar'); ?></div>

<!-- <hr noshade style="width:615px;float:left;border:2px solid #eee;" /> -->

<section class="news-feed">
	<article class="news-container">
		<header>
			<h1>Latest News</h1>
			<a class="arrow" href="<?php echo esc_url(home_url('/category/news')); ?>">Arrow</a><a href="<?php echo esc_url(home_url('/category/news')); ?>">View All News</a>
		</header>
		<?php $loop = new WP_Query(array('category_name' => 'news', 'posts_per_page' => 5)); ?>
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<?php $cat = get_the_category(); ?>
			<aside>
				<div class="img"><a class="link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'carousel'); ?></a></div>
				<section class="content">
					<p class="post-date"><?php echo get_the_date(); ?></p>
					<h2 class="post-title"><?php truncate(get_the_title(), 0, 100); ?></h2>
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
		<?php wp_reset_query(); ?>
	</article>
</section>
<?php get_footer(); ?>