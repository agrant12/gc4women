<?php 
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header(); ?>
	<div class="main">
		<div class="post">
			<?php if ( have_posts() ) : ?>
				<header>
					<h1><?php printf( __( 'Search Results for: %s', 'twentyfourteen' ), get_search_query() ); ?></h1>
				</header>
					<?php
						// Start the Loop.
						while ( have_posts() ) : the_post();

							/*
							 * Include the post format-specific template for the content. If you want to
							 * use this in a child theme, then include a file called called content-___.php
							 * (where ___ is the post format) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );

						endwhile;

					else :
						// If no content, include the "No posts found" template.
						echo '<p>Sorry your query produced no results. Please try again!</p>';

					endif;
				?>
		</div>
	</div>
	<?php get_sidebar(); ?> 
<?php get_footer(); ?>