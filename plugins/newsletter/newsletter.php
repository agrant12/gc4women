<?php
/*
* Widget for newsletter sign up
*/

class GC4W_Newsletter_Widget extends WP_Widget {

	const WIDGET_ID = 'newsletter';

	function __construct() {
		$widget_ops = array('description' => 'Displays form for newsletter sign up');
		$control_ops = array('width' => 308, 'height' => 208);
		parent::__construct(
			self::WIDGET_ID,
			'Newsletter Sign Up',
			$widget_ops,
			$control_ops
		);

		wp_register_style('paywall', $css_src, array(), '1.0.0');
	}

	function form($instance) {
		$instance = wp_parse_args((array) $instance, array(
			// Defaults
			'title' => 'Newsletter',
			'submit_url' => '',
			'message' => '',
		));

		$title = $instance['title'];
		$submit_url = $instance['submit_url'];
		$message = $instance['message'];
	?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title:</label><br />
			<input id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('message')); ?>">Message:</label><br />
			<input id="<?php echo esc_attr($this->get_field_id('message')); ?>" name="<?php echo esc_attr($this->get_field_name('message')); ?>" type="text" value="<?php echo esc_attr($message); ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('submit_url')); ?>">Form Action:</label><br />
			<input id="<?php echo esc_attr($this->get_field_id('submit_url')); ?>" name="<?php echo esc_attr($this->get_field_name('submit_url')); ?>" type="text" value="<?php echo esc_attr($submit_url); ?>" style="width:100%;" />
		</p>
		<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['submit_url'] = strip_tags($new_instance['submit_url']);
		$instance['message'] = strip_tags($new_instance['message']);

		return $instance;
	}

	function widget($args, $instance) {
		$instance = wp_parse_args((array)$instance, array(
			'title' => 'Follow Us',
			'submit_url' => '',
			'message' => '',
		));
		echo $args['before_widget'];
		?>
		<h1><?php echo esc_html($instance['title']); ?></h1>
		<p><?php echo esc_html($instance['message']); ?></p>
		<form action="<?php echo esc_url($instance['submit_url']); ?>" method="POST" target="_blank">
			<input type="email" placeholder="Your Email Address..." name="email" />
			<input type="submit" value="submit" />
		</form>
		<?php
		echo $args['after_widget'];
	}
}

?>