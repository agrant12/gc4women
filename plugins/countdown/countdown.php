<?php

/* countdown clock for posts and events */

class GC4W_Countdown_Widget extends WP_Widget {
	const WIDGET_ID = 'countdown';

	function __construct() {
		$widget_ops = array('description' => 'Displays countdown for events');
		$control_ops = array('width' => 308, 'height' => 208);
		parent::__construct(
			self::WIDGET_ID,
			'Countdown Clock',
			$widget_ops,
			$control_ops
		);
	}

	function form($instance) {
		$instance = wp_parse_args((array) $instance, array(
			// Defaults
			'title'=> 'Countdown'
			));

			$title = $instance['title'];
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title:</label><br />
			<input id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" style="width:100%;" />
		</p>
		<?php
	}
}

?>
