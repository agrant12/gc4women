<?php 

/*
Plugin Name: GC4W Custom Carousel
Version: 1.0
Plugin URI: http://gc4women.org
Description: Set carousel
Author: Alvin Grant
Author URI: http://alvingrant.com
*/

include_once 'carousel-settings.php';

function carousel() {

	$slides = array();

	$slide1 = GC4WCarousel::get_setting('slide1');
	$slide2 = GC4WCarousel::get_setting('slide2');
	$slide3 = GC4WCarousel::get_setting('slide3');
	$slide4 = GC4WCarousel::get_setting('slide4');

	if ($slide1 != '') {
		$slides[] = $slide1;
	}
	if ($slide2 != '') {
		$slides[] = $slide2;
	}
	if ($slide3 != '') {
		$slides[] = $slide3;
	}
	if ($slide4 != '') {
		$slides[] = $slide4;
	}
	?>

		<div class="flexslider">
			<ul class="slides">
				<?php $loop = new WP_Query(array('post_type' => array('event', 'post'), 'post__in' => $slides, 'posts_per_page' => 4)); ?>
				<?php while ($loop->have_posts() ) : $loop->the_post(); ?>
					<li>
						<div class="thumbnail">
							<a href="<?php the_permalink(); ?>"><?php MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'carousel-image'); ?></a>
						</div>
					</li>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</ul>
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

	<?php 
	}
?>