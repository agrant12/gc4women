<?php

/*
Plugin Name: GC4W Custom Carousel
Version: 1.0
Plugin URI: http://gc4women.org
Description: Set carousel
Author: Alvin Grant
Author URI: http://alvingrant.com
*/

class GC4WCarousel {
	
	const Slides = 4;

	function add_admin_page() {
		add_menu_page('GC4W Carousel', 'GC4W Carousel', 'manage_options', 'gc4w-carousel', array($this, 'display_page'));
	}

	function display_page() {
	?>
		<div class="wrap">
			<div id="icon-options-general" class="icon32"><br></div>
			<h2>GC4W Carousel</h2>

			<form action="options.php" method="post">
				<?php settings_fields('gc4w_carousel'); ?>
				<?php do_settings_sections('gc4w-carousel'); ?>

				<p><input name="Submit" type="submit" value="Save Changes" /></p>
			</form>
		</div>
	<?php
	}

	function admin_init() {
		register_setting('gc4w_carousel', 'gc4w_carousel');

		// LFM section
		add_settings_section('gc4w_slide', 'Carousel Slides', array($this, 'section_gc4w_carousel'), 'gc4w-carousel');

		for ($i = 1; $i <= self::Slides; $i++) { 
			add_settings_field('slide' + $i, 'Slide ' . $i, array($this, 'slide' . $i), 'gc4w-carousel', 'gc4w_slide');
		}

	}

	private function set_defaults($name = '') {
		$defaults = array();

		// if no $name, then this call is to reset all defaults
		if ( ! $name) {
		update_option('gc4w_carousel', $defaults);
			return;
		}


		$options = get_option('gc4w_carousel');

		// if no $options, then no settings have been set; set defaults
		if ( ! $options) {
			self::set_defaults();
		}

		// if item exists in options, return it (though, if this function is being called, then this check should have already been done)
		if (array_key_exists($name, $options)) {
			return $options[$name];
		}

		// if no default exists for $name, return null
		if ( ! array_key_exists($name, $defaults)) {
			return;
		}

		// add new default value and return it
		$options[$name] = $defaults[$name];
		update_option('gc4w_settings', $options);

		return $defaults[$name];
	}


	function section_gc4w_carousel() {}

	function slide1() {
			$loop = new WP_Query(array('post_type' => array('post','event','page'), 'posts_per_page' => -1));
			$posts = $loop->posts;
			wp_reset_postdata();

			$reg_post = array();
			$event = array();
			$page = array();
			
			foreach ($posts as $key => $post) {
				switch ($post->post_type) {
					case 'post':
						$reg_posts[] = $post;
						break;
					case 'event':
						$event[] = $post;
						break;
					case 'page':
						$page[] = $post; 
					default:
						# code...
						break;
				}
			}
		?>
			<select name="gc4w_carousel[slide1]" value="<?php echo esc_attr(self::get_setting('slide1')); ?>">
				<option value="">-------</option>
				<?php if(!empty($reg_posts)): ?>
					<optgroup label="Posts">
						<?php foreach ($reg_posts as $key => $value): ?>
								<option value="<?php echo esc_attr($value->ID); ?>" <?php echo selected(self::get_setting('slide1'), $value->ID); ?>><?php echo esc_html($value->post_title); ?></option>
						<?php endforeach; ?>
					</optgroup>
				<?php endif; ?>
				<?php if(!empty($event)): ?>
					<optgroup label="Events">
						<?php foreach ($event as $key => $value): ?>
								<option value="<?php echo esc_attr($value->ID); ?>" <?php echo selected(self::get_setting('slide1'), $value->ID); ?>><?php echo esc_html($value->post_title); ?></option>
						<?php endforeach; ?>
					</optgroup>
				<?php endif; ?>
				<?php if(!empty($page)): ?>
					<optgroup label="Pages">
						<?php foreach ($page as $key => $value): ?>
								<option value="<?php echo esc_attr($value->ID); ?>" <?php echo selected(self::get_setting('slide1'), $value->ID); ?>><?php echo esc_html($value->post_title); ?></option>
						<?php endforeach; ?>
					</optgroup>
				<?php endif; ?>
			</select>
		<?php
	}

	function slide2() {
			$loop = new WP_Query(array('post_type' => array('post','event','page'), 'posts_per_page' => -1));
			$posts = $loop->posts;
			wp_reset_postdata();

			$reg_post = array();
			$event = array();
			$page = array();
			
			foreach ($posts as $key => $post) {
				switch ($post->post_type) {
					case 'post':
						$reg_posts[] = $post;
						break;
					case 'event':
						$event[] = $post;
						break;
					case 'page':
						$page[] = $post; 
					default:
						# code...
						break;
				}
			}
		?>
			<select name="gc4w_carousel[slide2]" value="<?php echo esc_attr(self::get_setting('slide2')); ?>">
				<option value="">-------</option>
				<?php if(!empty($reg_posts)): ?>
					<optgroup label="Posts">
						<?php foreach ($reg_posts as $key => $value): ?>
								<option value="<?php echo esc_attr($value->ID); ?>" <?php echo selected(self::get_setting('slide2'), $value->ID); ?>><?php echo esc_html($value->post_title); ?></option>
						<?php endforeach; ?>
					</optgroup>
				<?php endif; ?>
				<?php if(!empty($event)): ?>
					<optgroup label="Events">
						<?php foreach ($event as $key => $value): ?>
								<option value="<?php echo esc_attr($value->ID); ?>" <?php echo selected(self::get_setting('slide2'), $value->ID); ?>><?php echo esc_html($value->post_title); ?></option>
						<?php endforeach; ?>
					</optgroup>
				<?php endif; ?>
				<?php if(!empty($page)): ?>
					<optgroup label="Pages">
						<?php foreach ($page as $key => $value): ?>
								<option value="<?php echo esc_attr($value->ID); ?>" <?php echo selected(self::get_setting('slide2'), $value->ID); ?>><?php echo esc_html($value->post_title); ?></option>
						<?php endforeach; ?>
					</optgroup>
				<?php endif; ?>
			</select>
		<?php
	}

	function slide3() {
			$loop = new WP_Query(array('post_type' => array('post','event','page'), 'posts_per_page' => -1));
			$posts = $loop->posts;
			wp_reset_postdata();

			$reg_post = array();
			$event = array();
			$page = array();
			
			foreach ($posts as $key => $post) {
				switch ($post->post_type) {
					case 'post':
						$reg_posts[] = $post;
						break;
					case 'event':
						$event[] = $post;
						break;
					case 'page':
						$page[] = $post; 
					default:
						# code...
						break;
				}
			}
		?>
			<select name="gc4w_carousel[slide3]" value="<?php echo esc_attr(self::get_setting('slide3')); ?>">
				<option value="">-------</option>
				<?php if(!empty($reg_posts)): ?>
					<optgroup label="Posts">
						<?php foreach ($reg_posts as $key => $value): ?>
								<option value="<?php echo esc_attr($value->ID); ?>" <?php echo selected(self::get_setting('slide3'), $value->ID); ?>><?php echo esc_html($value->post_title); ?></option>
						<?php endforeach; ?>
					</optgroup>
				<?php endif; ?>
				<?php if(!empty($event)): ?>
					<optgroup label="Events">
						<?php foreach ($event as $key => $value): ?>
								<option value="<?php echo esc_attr($value->ID); ?>" <?php echo selected(self::get_setting('slide3'), $value->ID); ?>><?php echo esc_html($value->post_title); ?></option>
						<?php endforeach; ?>
					</optgroup>
				<?php endif; ?>
				<?php if(!empty($page)): ?>
					<optgroup label="Pages">
						<?php foreach ($page as $key => $value): ?>
								<option value="<?php echo esc_attr($value->ID); ?>" <?php echo selected(self::get_setting('slide3'), $value->ID); ?>><?php echo esc_html($value->post_title); ?></option>
						<?php endforeach; ?>
					</optgroup>
				<?php endif; ?>
			</select>
		<?php
	}

	function slide4() {
			$loop = new WP_Query(array('post_type' => array('post','event','page'), 'posts_per_page' => -1));
			$posts = $loop->posts;
			wp_reset_postdata();

			$reg_post = array();
			$event = array();
			$page = array();
			
			foreach ($posts as $key => $post) {
				switch ($post->post_type) {
					case 'post':
						$reg_posts[] = $post;
						break;
					case 'event':
						$event[] = $post;
						break;
					case 'page':
						$page[] = $post; 
					default:
						# code...
						break;
				}
			}
		?>
			<select name="gc4w_carousel[slide4]" value="<?php echo esc_attr(self::get_setting('slide4')); ?>">
				<option value="">-------</option>
				<?php if(!empty($reg_posts)): ?>
					<optgroup label="Posts">
						<?php foreach ($reg_posts as $key => $value): ?>
								<option value="<?php echo esc_attr($value->ID); ?>" <?php echo selected(self::get_setting('slide4'), $value->ID); ?>><?php echo esc_html($value->post_title); ?></option>
						<?php endforeach; ?>
					</optgroup>
				<?php endif; ?>
				<?php if(!empty($event)): ?>
					<optgroup label="Events">
						<?php foreach ($event as $key => $value): ?>
								<option value="<?php echo esc_attr($value->ID); ?>" <?php echo selected(self::get_setting('slide4'), $value->ID); ?>><?php echo esc_html($value->post_title); ?></option>
						<?php endforeach; ?>
					</optgroup>
				<?php endif; ?>
				<?php if(!empty($page)): ?>
					<optgroup label="Pages">
						<?php foreach ($page as $key => $value): ?>
								<option value="<?php echo esc_attr($value->ID); ?>" <?php echo selected(self::get_setting('slide4'), $value->ID); ?>><?php echo esc_html($value->post_title); ?></option>
						<?php endforeach; ?>
					</optgroup>
				<?php endif; ?>
			</select>
		<?php
	}  

	function get_setting($name = '') {
		if ( ! $name) {
			return;
		}

		$options = get_option('gc4w_carousel');

		if ( ! $options) {
			self::set_defaults();
		}

		if (array_key_exists($name, $options)) {
		    return $options[$name];
		}

		return self::set_defaults($name);
		}
	}

function gc4w_get_carousel_option($key) {
	return GC4WCarousel::get_setting($key);
}

$gc4w_carousel = new GC4WCarousel();
add_action('admin_init', array($gc4w_carousel, 'admin_init'));
add_action('admin_menu', array($gc4w_carousel, 'add_admin_page'));
