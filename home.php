<?php
/**
 * Template Name:  Home
 */


// Get the ID of a given category
$special_id = get_cat_ID( 'Special' );
$events_id = get_cat_ID( 'Events' );
$champions_id = get_cat_ID( 'Champions' );

// Get the URL of this category
$special_link = get_category_link( $special_id );
$events_link = get_category_link( $events_id );
$champions_link = get_category_link( $champions_id );

get_header(); ?>
	<div class="flexslider">
		<ul class="slides">
			<?php 
				$args = array();
				$loop = new WP_Query(array('category_name' => 'features', 'posts_per_page' => 4, 'orderby'=> 'ASC')); 
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
								<?php the_excerpt(); ?>
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
		<h3><strong>Connect. Educate. Empower.</strong></h3>
		<p>The Global Connections for Women Foundation is a non-profit organization that believes in all women and their right to create new opportunities for themselves and their communities.</p>
		<a href="#">Learn More</a>
	</aside>
	<aside class="programs">
		<div class="banner">
			<span class="title"><strong>GC4W Programs</strong></span><br />
			<a class="link" href="#"><em>View Programs ></em></a>
		</div>
		<div class="overlay">
				<div class="info">
					<h3>GC4W Programs</h3>
					<p>The connection, education and empowerment initiatives of the Global Connections for Women Foundation provide the opportunity to make a real difference in the lives of the women and youth we serve.</p>
					<a class="link" href="<?php the_permalink(); ?>">View Programs ></a>
				</div>
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
			<div class="overlay">
				<div class="info">
					<p><?php the_excerpt(); ?></p>
				</div>
			</div>
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
				<div class="overlay">
					<div class="info"></div>
				</div>
			<?php endwhile; ?>
		<?php wp_reset_query(); ?>
	</aside>
	<aside>
		<?php $loop = new WP_Query(array('category_name' => 'Special', 'posts_per_page' => 1, 'orderby'=> 'ASC')); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="banner">
					<span class="title"><strong><?php the_title(); ?></strong></span><br />
					<a class="link" href="<?php the_permalink(); ?>"><em>View This Feature ></em></a>
					<a class="all" href="<?php echo esc_url( $special_link ); ?>">More Features ></a>
				</div>
				<div class="thumbnail"><?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'category-thumb'); ?></div>
				<div class="overlay">
					<div class="info">
						<h3><?php the_title(); ?></h3>
						<p><?php the_excerpt(); ?></p>
						<a href="<?php the_permalink(); ?>">View This Feature</a>
						<a href="<?php echo esc_url( $special_link ); ?>">More Features ></a>
					</div>
				</div>
			<?php endwhile; ?>
		<?php wp_reset_query(); ?>
	</aside>
	<aside>
		<?php $loop = new WP_Query(array('category_name' => 'Champions', 'posts_per_page' => 1, 'orderby'=> 'ASC')); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="banner">
					<span class="title"><strong>GC4W Champion: <?php the_title(); ?></strong></span><br />
					<a class="link" href="<?php the_permalink(); ?>"><em>View This Champion ></em></a>
					<a class="all" href="<?php echo esc_url( $champions_link ); ?>">More Champions ></a>
				</div>
				<div class="thumbnail"><?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'category-thumb'); ?></div>
				<div class="overlay">
					<div class="info">
						<h3><?php the_title(); ?></h3>
						<p><?php the_excerpt(); ?></p>
						<a href="<?php the_permalink(); ?>">Alana Taylor</a>
						<a href="<?php echo esc_url( $champions_link ); ?>">Meet the Champions ></a>
					</div>
				</div>
			<?php endwhile; ?>
		<?php wp_reset_query(); ?>
	</aside>
	<div class="clear"></div>
	<div class="clear"></div>
	<br /><br />
	</section>
</div><!-- #primary -->

<?php get_footer(); ?>