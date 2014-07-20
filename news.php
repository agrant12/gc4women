<?php
/**
 * Template Name:  News
 */

get_header(); ?>
	<div class="container">
		<div class="main">
			<?php $loop = new WP_Query(array('post_type' => 'News', 'posts_per_page' => 7, 'orderby'=> 'ASC')); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<article>
					<a class="link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'category-thumb'); ?></a>
					<section class="content">
						<h3><?php truncate(get_the_title(), 0, 25); ?></h3>
						<p><?php the_excerpt(); ?></p>
					</section>
				</article>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</div>        
		<?php get_sidebar(); ?> 
    </div>  
<?php get_footer(); ?>