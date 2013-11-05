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
		<section id="carousel">
			<div id="slides">
				<div class="slides_container">
					<?php 
						$loop = new WP_Query(array('post_type' => 'features', 'posts_per_page' => 2, 'orderby'=> 'ASC')); 
					?>
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<div class="slide">
							<?php $url = get_post_meta($post->ID, "url", true);
							if($url!='') { 
								echo '<a href="'.$url.'">';
								echo the_post_thumbnail('full');
								echo '</a>';
							} else {
								echo the_post_thumbnail('full');
							} ?>
							<div class="caption">
								<h5><?php the_title(); ?></h5>	
								<?php the_content();?>
								<a href="<?php the_permalink(); ?>">See Post</a>
							</div>
						</div>
					<?php endwhile; ?>
					<?php wp_reset_query(); ?> 
				</div>
			</div>
		</section>

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