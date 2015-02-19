<?php 

/**
* Template Name:  News
*/

$paged = ( get_query_var('paged') ? get_query_var('paged') : 1);

$args = array(
	'post_type' => 'post',
	'category_name' => 'news',
	'posts_per_page' => 10,
	'paged' => $paged
);

$news = new WP_Query($args);

get_header(); ?>
<div class="main">
	<div class="post">
		<header>
			<h1>News</h1>
		</header>

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
							pauseOnHover: true,
							slideshowSpeed: 7000,
						});
					});
				</script>
			</div>
		<?php endif; ?>
		<?php
			echo paginate_links( array(
				'base' => home_url('/news/page/%#%'),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $loop->max_num_pages
			) );
		?>
		<?php wp_reset_postdata(); ?>
	</div>
</div>
<?php get_sidebar(); ?>   
<?php get_footer(); ?>