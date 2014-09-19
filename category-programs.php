<?php 

const Post_Type = 'programs';

$category = array('champion', 'campus-program', 'leadership', 'toy-drive');

get_header(); ?>

<div class="programs">
	<h4><em>Welcome to the Global Connections for Women foundation’s program page… </em></h4>
	<p><em>Touching hearts. Lifting spirits. Changing lives.</em></p>
	<p>These actions embody the essence of the various programs here at the Global Connections for Women Foundation, where we strive to make real the dream of <em>“improving the lives of women, youth and the communities in which they live.”</em></p>
	<p>While the world changes around us, the mission and purpose of GC4W remains unwaveringly at the core of our programs and initiatives.  GC4W organizational activities (categorized in the 5 major pillars listed below) are the manifestation of our organizational efforts to connect, educate and empower underserved communities the world over.</p>
	<p>The following 5 major pillars and the programs within them serve as the foundation for achieving our stated goal of enriching the lives of 100,000 women and youth by the end of 2015.</p>


	<?php foreach ($category as $key => $cat): ?> 
		<?php $loop = new WP_Query( array( 
			'post_type' => Post_Type,
			'posts_per_page' => -1,
			'category_name' => $cat
		)); ?>
		<?php if ($loop->have_posts()): ?>
			<?php foreach($loop->posts as $post_item): ?> 
				<ul class="program">
					<div class="image"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id( $post_item->ID )); ?>" /></div>
					<div class="overlay">
						<p><?php echo $post_item->post_content; ?></p>
					</div>
				</ul>
			<?php endforeach; ?>
			<?php if ($cat == 'campus-program'): ?>
				<div class="stjohns"></div>
				<div class="nyu"></div>
				<div class="nyu-stern"></div>
			<?php endif; ?>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
	<?php endforeach; ?>

</div>

<?php get_footer(); ?>