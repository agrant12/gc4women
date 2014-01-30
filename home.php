<?php
/**
 * Template Name:  Home
 */


// Get the ID of a given category
$features_id = get_cat_ID( 'Features' );
$events_id = get_cat_ID( 'Events' );
$champions_id = get_cat_ID( 'Champions' );

// Get the URL of this category
$features_link = get_category_link( $features_id );
$events_link = get_category_link( $events_id );
$champions_link = get_category_link( $champions_id );

get_header(); ?>
	<div class="flexslider">
		<ul class="slides">
			<?php 
				$args = array();
				$loop = new WP_Query(array('category_name' => 'lead', 'posts_per_page' => 4, 'orderby'=> 'ASC')); 
			?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<li>
				<div id="post-<?php the_ID(); ?>" class="entry">
					<div class="thumbnail">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured-image'); ?></a>
					</div>
					<div class="slide_info">
						<div class="container">
							<div class="title">
								<?php the_title(); ?>
							</div>
							<div class="excerpt">
								<em><?php the_excerpt(); ?></em>
							</div>
						</div>
					</div>
				</div>
			</li>
			<?php endwhile; ?>
	    </ul>
		<?php wp_reset_query(); ?> 
	</div>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			$('.flexslider').flexslider({
				animation: "fade",
				animationLoop: true,
				animationSpeed: 500,
				easing: 'swing',
				slideshowSpeed: 6000,
				pauseOnHover: true, 
				maxItems: 4
			});
		});
	</script>
<div id="home">
	<section class="home_content">
	<aside class="about">
		<h3><strong>Who We Are</strong></h3>
		<p>
			The <strong>Global Connections for Women Foundation</strong> is a non-profit organization that believes in all women and their right to create new opportunities for themselves and their communities.
			<br /><br />
			Our mission is to connect women in underserved communities in Africa and serve the women of the larger <strong>Global Diaspora</strong>.
		</p>
		<a href="#">Learn More ></a>
	</aside>
	<aside class="programs">
		<div class="banner">
			<span class="title"><strong>GC4W Programs</strong></span><br />
			<a class="link" href="#"><em>View Programs ></em></a>
		</div>

	</aside>
	<aside>
		<?php $loop = new WP_Query(array('category_name' => 'Founder', 'posts_per_page' => 1, 'orderby'=> 'ASC')); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<div class="banner">
				<span class="title"><strong><?php the_title(); ?></strong></span><br />
				<a class="link" href="<?php the_permalink(); ?>"><em>Meet Her ></em></a>
			</div>
			<div class="thumbnail"><?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'category-thumb'); ?></div>
			
		<?php endwhile; ?>
		<?php wp_reset_query(); ?>
	</aside>
	
	<aside>
		<?php $loop = new WP_Query(array('category_name' => 'Events', 'posts_per_page' => 1, 'orderby'=> 'ASC')); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="banner">
					<span class="title"><strong><?php the_title(); ?></strong></span><br />
					<a class="link" href="<?php the_permalink(); ?>"><em>View This Event ></em></a>
					<a class="all" href="<?php echo esc_url( $events_link ); ?>">More Events ></a>
				</div>
				<div class="thumbnail"><?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'homepage-thumb'); ?></div>
				
			<?php endwhile; ?>
		<?php wp_reset_query(); ?>
	</aside>

	<aside>
		<?php $loop = new WP_Query(array('category_name' => 'features', 'posts_per_page' => 1, 'orderby'=> 'ASC')); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="banner">
					<span class="title"><strong><?php the_title(); ?></strong></span><br />
					<a class="link" href="<?php the_permalink(); ?>"><em>Read This Feature ></em></a>
					<a class="all" href="<?php echo esc_url( $features_link ); ?>">More Features ></a>
				</div>
				<div class="thumbnail"><?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'category-thumb'); ?></div>
				
			<?php endwhile; ?>
		<?php wp_reset_query(); ?>
	</aside>

	<aside>
		<?php $loop = new WP_Query(array('category_name' => 'Champions', 'posts_per_page' => 1, 'orderby'=> 'ASC')); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="banner">
					<span class="title"><strong>GC4W Champion: <?php the_title(); ?></strong></span><br />
					<a class="link" href="<?php the_permalink(); ?>"><em>Meet This Champion ></em></a>
					<a class="all" href="<?php echo esc_url( $champions_link ); ?>">More Champions ></a>
				</div>
				<div class="thumbnail"><?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'category-thumb'); ?></div>
				
			<?php endwhile; ?>
		<?php wp_reset_query(); ?>
	</aside>
	<div class="clear"></div>
	<div class="clear"></div>
	<br /><br />
	</section>
</div><!-- #primary -->

<?php get_footer(); ?>