<?php get_header(); ?>

<div class="main">
	<h2>GC4W Champions</h2>
		<?php $loop = new WP_Query(array('category_name' => 'Champions', 'posts_per_page' => -1, 'orderby'=> 'ASC')); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<aside>
				<div class="banner">
					<span class="title"><strong><?php the_title(); ?></strong></span><br />
					<a class="link" href="<?php the_permalink(); ?>"><em>View This Champion ></em></a>
				</div>
				<div class="thumbnail"><a href="<?php the_permalink(); ?>"><?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'homepage-thumb'); ?></a></div>
				</aside>
			<?php endwhile; ?>
		<?php wp_reset_query(); ?>
</div>
<?php get_sidebar(); ?>   
<?php get_footer(); ?>