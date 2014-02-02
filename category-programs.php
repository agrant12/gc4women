<?php get_header(); ?>

<h2>GC4W Programs</h2>
<strong><?php echo category_description( $category_id ); ?></strong>
<div id="programs" class="main">
		<?php $loop = new WP_Query(array('category_name' => 'Programs', 'posts_per_page' => 6, 'orderby'=> 'DESC')); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<aside>
				<div class="banner">
					<span class="title"><strong><?php the_title(); ?></strong></span><br />
					<a class="link" href="<?php the_permalink(); ?>"><em>View Program ></em></a>
				</div>
				<div class="thumbnail"><a href="<?php the_permalink(); ?>"><?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'homepage-thumb'); ?></a></div>
				</aside>
			<?php endwhile; ?>
		<?php wp_reset_query(); ?>
</div> 
<?php get_footer(); ?>