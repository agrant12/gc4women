<?php get_header(); ?>

<div class="news">
	<section class="news-feed">
		<article class="news-container">
			<header>
				<h1>Events</h1>
			</header>
			<?php $loop = new WP_Query(array('post_type' => 'Event', 'posts_per_page' => -1, 'orderby'=> 'ASC')); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<aside>
					<div class="img"><a class="link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'carousel'); ?></a></div>
					<section class="content">
						<h2 class="post-title"><?php truncate(get_the_title(), 0, 100); ?></h2>
						<p><?php truncate(get_the_excerpt(), 0, 100); ?></p>
						<a class="post-link" href="<?php the_permalink(); ?>">View Event</a>
						<a class="arrow" href="<?php the_permalink(); ?>">Arrow</a>
					</section>
				</aside>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</article>
	</section>
</div>

<?php get_sidebar(); ?>   
<?php get_footer(); ?>