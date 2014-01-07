<?php
/**
* Template Name: Programs
*/

get_header(); ?>

<section class="full">
	<h3>GC4W Programs</h3>
	<p>The connection, education and empowerment initiatives of the Global Connections for Women Foundation provide the opportunity to make a real difference in the lives of the women and youth we serve.
	</p>
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