<?php 

/*
Plugin Name: GC4W Custom Carousel
Version: 1.0
Plugin URI: http://gc4women.org
Description: Set carousel
Author: Alvin Grant
Author URI: http://alvingrant.com
*/

require_once 'carousel-settings.php';

function carousel() {

	$slides = array();

	$slide1 = GC4WCarousel::get_setting('slide1');
	$slide2 = GC4WCarousel::get_setting('slide2');
	$slide3 = GC4WCarousel::get_setting('slide3');
	$slide4 = GC4WCarousel::get_setting('slide4');

	if (!empty($slide1)) {
		$slides[] = $slide1;
	}
	if (!empty($slide2)) {
		$slides[] = $slide2;
	}
	if (!empty($slide3)) {
		$slides[] = $slide3;
	}
	if (!empty($slide4)) {
		$slides[] = $slide4;
	}

	$post = get_post($slide);

	?>
		<div class="flexslider">
			<ul class="slides">
				<?php foreach ($slides as $slide) :?>
					<?php 
						$post = get_post($slide);
						$post_type = $post->post_type;
					?>
					<li>
						<div class="thumbnail">
							<a href="<?php echo esc_url(get_permalink($slide)); ?>"><img src="<?php echo esc_url(MultiPostThumbnails::get_post_thumbnail_url($post_type, 'secondary-image', $post_id = $slide, 'carousel-image')); ?>" /></a>
						</div>
					</li>
				<?php endforeach; ?>
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