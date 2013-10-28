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
			<section id="involved"><a href="#">Get <b>Involved!</b></a></section>
		</section>
		<section id="carousel"><?php wp_carousel(0); ?></section>

		<section id="events">
			<h1>Upcoming Events</h1>
			<a href="#" class="cal">The Events Calender ></a>
			<?php query_posts(array('category'=>'Events', 'posts_per_page' => 2)); ?>
			    <?php if(have_posts()) while(have_posts()) : the_post(); ?>
			    <div class="entry">
					<div class="date"><span><?php echo the_event_start_date(); ?></span></div>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?> ></a>
					<div class="excerpt">
						<?php the_excerpt(); ?>
					</div>
				</div>
		    <?php endwhile; ?>
		</section>


		<section id="spotlight">
			<h1>Spotlight</h1>
			<?php query_posts(array('post_type'=>'spotlight', 'posts_per_page' => 1)); ?>
			    <?php if(have_posts()) while(have_posts()) : the_post(); ?>
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