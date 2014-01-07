<?php
/**
 * Template Name:  Home
 */

get_header(); ?>


	<div class="flexslider">
		<ul class="slides">
			<?php 
				$args = array();
				$loop = new WP_Query(array('category_name' => 'features', 'posts_per_page' => 4, 'orderby'=> 'ASC')); 
			?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<li>
				<div id="post-<?php the_ID(); ?>" class="entry">
					<div class="thumbnail">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured-image'); ?></a>
					</div>
					<div class="slide_info">
						<div class="container">
							<div class="title">
								<?php the_title(); ?>
							</div>
							<div class="excerpt">
								<?php the_excerpt(); ?>
							</div>
						</div>
					</div>
				</div>
			</li>
			<?php endwhile; ?>
	    </ul>
		<?php wp_reset_query(); ?> 
	</div>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			$('.flexslider').flexslider({
				animation: "fade",
				animationLoop: true,
				animationSpeed: 500,
				easing: 'swing',
				slideshowSpeed: 6000,
				pauseOnHover: true, 
				maxItems: 4
			});
		});
	</script>
<div id="home">
	<section class="home_content">
		<?php action_call(); ?>
		<section class="row1">
			<aside class="programs">
				<div class="info">
					<h3>GC4W Programs</h3>
				</div>
				<a href="<?php the_permalink(); ?>"><img class="overlay" /></a>
			</aside>
			<aside></aside>
			<aside class="founder">
				<?php $loop = new WP_Query(array('category_name' => 'founder', 'posts_per_page' => 1, 'orderby'=> 'ASC')); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<div class="thumbnail"><?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'category-thumb'); ?></div>
					<a href="<?php the_permalink(); ?>"><img class="overlay" /></a>
					<div class="info">
						<h3><?php the_title(); ?></h3>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</aside>
		</section>
		<section id="the-latest" class="news"><h3>Latest News</h3></section>
		<aside class="events">
				<?php $loop = new WP_Query(array('category_name' => 'events', 'posts_per_page' => 1)); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<div class="thumbnail"><?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'homepage-thumb'); ?></div>
					<a href="<?php the_permalink(); ?>"><img class="overlay" /></a>
					<div class="info">
						<h3><?php the_title(); ?></h3>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</aside>
		
		<div class="clear"></div>
	</section>
</div><!-- #primary -->

<?php get_footer(); ?>