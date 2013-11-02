<?php
/**
 * Template Name:  Homepage
 */

get_header(); ?>

<div id="main">
		<section id="left_rail">
			<section id="intro_header">
				<h1>Intro Header</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu dui fringilla, rutrum ipsum id, consectetur nulla. Interdum et malesuada fames ac ante ipsum</p>
				<a href="#">Learn More ></a>
			</section>
			<section id="involved"><a href="#">Get <strong>Involved!</strong></a></section>
		</section>
		<section id="carousel"></section>

		<section id="events">
			<h1>Upcoming Events</h1>
			<?php 
				$category_id = get_cat_ID('events');
				$category_link = get_category_link($category_id);
			?>
			<a href="<?php echo esc_url( $category_link ); ?>" class="cal">The Events Calender ></a>
			<?php 
			$args = array( 'category' => 'events', 'posts_per_page' => 2 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div id="post-<?php the_ID(); ?>" class="entry">
			        <div class="thumbnail">
			        	<?php the_post_thumbnail('thumbnail'); ?>
			        </div>
			        <div class="excerpt">
			            <?php the_excerpt(); ?>
			            <a href="<?php the_permalink(); ?>">Learn More</a>
			        </div>
			    </div>
			<?php endwhile; ?>
			
		</section>


		<section id="spotlight">
			<h1>Spotlight</h1>
			<?php 
			$args = array( 'post_type' => 'spotlights', 'posts_per_page' => 1 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div id="post-<?php the_ID(); ?>" class="entry">
			        <div class="thumbnail">
			        	<?php the_post_thumbnail('thumbnail'); ?>
			        </div>
			        <div class="excerpt">
			            <?php the_excerpt(); ?>
			            <a href="<?php the_permalink(); ?>">Learn More</a>
			        </div>
			    </div>
			<?php endwhile; ?>

		</section>
</div><!-- #primary -->

<?php get_footer(); ?>