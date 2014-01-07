<?php
/**
 * Template Name:  Full Width
 */

get_header(); ?>

	<div class="full">
		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

		<div class="post">
			<div class="entry">
				<?php the_content(); ?>
			</div>
		</div>

		<?php endwhile; ?>

		<?php endif; ?>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>