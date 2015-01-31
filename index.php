<?php 

get_header();

$event_args = array(
	'post_type' => 'event', 
	'posts_per_page' => 1
);

$events = new WP_Query($event_args);

$news_args = array(
	'category_name' => 'news', 
	'posts_per_page' => 4
);

$news = new WP_Query($news_args);

carousel(); 

?>

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
			<h3>Latest News</h3>
			<a href="<?php echo esc_url(home_url('/news')); ?>">All News</a>
		</div>

		<?php if (!empty($news)): ?>
			<div id="news-flex" class="news-flex">
				<ul class="slides">
					<?php while ( $news->have_posts() ) : $news->the_post(); ?>
						<li>
						<?php $cat = get_the_category(); ?>
						<aside class="home">
							<div class="img"><a class="link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'carousel'); ?></a></div>
							<section class="content">
								<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php truncate(get_the_title(), 0, 100); ?></a></h2>
								<p><?php truncate(get_the_content(), 0, 200); ?></p>
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
							</section>
						</aside>
						</li>
					<?php 
						endwhile;
						wp_reset_postdata();
					?>
				</ul>
				<script type="text/javascript">
					jQuery(document).ready(function($){
						$('#news-flex').flexslider({
							animation: "slide",
							animationLoop: true,
							animationSpeed: 500, 
							maxItems: 4,
							pauseOnHover: true,
							slideshowSpeed: 7000,
						});
					});
				</script>
			</div>
		<?php endif; ?>
		<div id"social-block">
			<h3>Connect with Us!</h3>
			<div class="twitter-block">
				<i class="icon-twitter twitter"></i>
				<div class="twitter-feed">
					<a href="#">Follow Us on Twitter</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="sidebar sidebar-home">
	<div class="events">
		<h3 class="title">Upcoming Events</h3>
		<a class="view-all" href="<?php echo esc_url(home_url('/events')); ?>">All Events</a>
		<?php while ($events->have_posts()) : $events->the_post(); ?>
			<div class="thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'carousel'); ?></a></div>
			<div class="title"><p><a href="<?php the_permalink(); ?>"><?php truncate(get_the_title(), 0, 100); ?></a></p></div>
			<div class="date"><p><?php echo get_the_date(); ?></p></div>
			<!--<div class="location"><?php echo do_shortcode('[locations_list]'); ?></div>-->
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>
</div>
<script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/signup-forms/popup/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script>
<script type="text/javascript">require(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us5.list-manage.com","uuid":"c62795cc02f512b80877ea1ec","lid":"296cb94ad0"}) })</script>
<?php get_footer(); ?>