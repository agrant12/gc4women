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
			
		</section>

		<section id="events">
			<h1>Upcoming Events</h1>
			
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