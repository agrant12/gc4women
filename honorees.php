<?php
/**
* Template Name: Award Honoree
*/
get_header(); ?>

<section>

	<h3><?php the_title(); ?></h3>
	<?php
		$args = array( 'post_type' => 'honorees', 'order' => 'ASC', 'posts_per_page' => -1 );
		$loop = new WP_Query( $args ); ?>
		<div class="tabs">
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="photo"><a href="#<?php the_title(); ?>"><?php the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'category-thumb'); ?></a></div>
				<div id="<?php the_title(); ?>" class="tab_content">
					<div class="content">
						<?php the_content(); ?>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
		<?php wp_reset_query(); ?>
</section>

<?php get_footer(); ?>