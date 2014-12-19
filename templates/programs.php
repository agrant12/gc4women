<?php
/**
* Template Name: Programs
*/

get_header(); ?>

<section class="full">
	<h3>GC4W Programs</h3>
	<p>Welcome to the Global Connections for Women foundation’s program page…</p>

	<ul class="tile">
		<?php
			$args = array( 'category_name' => 'programs', 'order' => 'ASC', 'posts_per_page' => 6 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<li>
				<div id="post-<?php the_ID(); ?>" class="entry">
					<div class="icon"><?php the_post_thumbnail('thumbnail'); ?></div>
					<div class="title"><?php the_title(); ?></div>
					<div class="excerpt">
						<?php the_excerpt(); ?>
						<a href="http://gc4women.org/contact-us/">More Info</a>
					</div>
				</div>
			</li>
		<?php endwhile; ?>
	</ul>
	<?php wp_reset_query(); ?>
</section>

<?php get_footer(); ?>