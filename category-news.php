<?php

$paged = ( get_query_var('paged') ? get_query_var('paged') : 1);

$args = array(
	'post_type' => 'post',
	'category_name' => 'news',
	'posts_per_page' => 1,
	'paged' => $paged
);

$loop = new WP_Query($args);

get_header(); ?>

<div class="news">
	<section class="news-feed">
		<article class="news-container">
			<header>
				<h1>News</h1>
			</header>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<aside>
					<div class="img"><a class="link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'carousel'); ?></a></div>
					<section class="content">
						<h2 class="post-title"><?php truncate(get_the_title(), 0, 100); ?></h2>
						<p><?php truncate(get_the_excerpt(), 0, 100); ?></p>
						<a class="post-link" href="<?php the_permalink(); ?>">Read Article</a>
						<a class="arrow" href="<?php the_permalink(); ?>">Arrow</a>
					</section>
				</aside>
			<?php endwhile; ?>
			<?php
			$big = 999999999; // need an unlikely integer
				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $loop->max_num_pages
				) );
			?>
			<?php wp_reset_postdata(); ?>
		</article>
	</section>
</div>
<?php get_sidebar(); ?>   
<?php get_footer(); ?>