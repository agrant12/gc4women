<?php 

/**
* Template Name:  News
*/

$paged = ( get_query_var('paged') ? get_query_var('paged') : 1);

$args = array(
	'post_type' => 'post',
	'category_name' => 'news',
	'posts_per_page' => 2,
	'paged' => $paged
);

$loop = new WP_Query($args);

get_header(); ?>
<div class="main">
	<div class="post">
		<?php breadcrumb_trail(); ?>
		<header>
			<h1>News</h1>
		</header>
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<aside>
				<div class="img"><a class="link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'carousel'); ?></a></div>
				<section class="content">
					<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php truncate(get_the_title(), 0, 100); ?></a></h2>
					<p><?php truncate(get_the_excerpt(), 0, 100); ?></p>
					<a class="post-link" href="<?php the_permalink(); ?>">Read Article</a>
					<a class="arrow" href="<?php the_permalink(); ?>">Arrow</a>
				</section>
			</aside>
		<?php endwhile; ?>
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