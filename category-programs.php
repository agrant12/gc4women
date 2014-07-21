<?php 

$tab_content = 1;
$select = 1;

get_header(); ?>

<div class="programs">
	<h4><em>Welcome to the Global Connections for Women foundation’s program page… </em></h4>
	<p><em>Touching hearts. Lifting spirits. Changing lives.</em></p>
	<p>These actions embody the essence of the various programs here at the Global Connections for Women Foundation, where we strive to make real the dream of <em>“improving the lives of women, youth and the communities in which they live.”</em></p>
	<p>While the world changes around us, the mission and purpose of GC4W remains unwaveringly at the core of our programs and initiatives.  GC4W organizational activities (categorized in the 4 major pillars listed below) are the manifestation of our organizational efforts to connect, educate and empower underserved communities the world over.</p>
	<p>The following 4 major pillars and the programs within them serve as the foundation for achieving our stated goal of enriching the lives of 100,000 women and youth by the end of 2015.</p>
	
	<?php $loop = new WP_Query(array('post_type' => 'Programs', 'posts_per_page' => 6, 'orderby'=> 'DESC')); ?>
		<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<ul class="program">
				<div class="title"><?php the_title(); ?></div>
				<div class="image"><?php the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'homepage-thumb'); ?></div>
				<p class="learn"><a class="<?php echo 'select' . $select++; ?>" href="#">Learn More <span class="arrow">Arrow</span></a></p>
				<div class="more <?php echo 'tab_content_' . $tab_content++; ?>"><?php the_content(); ?></div>
			</ul>
		<?php endwhile; ?>
	<?php wp_reset_query(); ?>
	<div class="clearfix"></div>
	<p>If you are interested in working with GC4W Foundation or participating in any of our programs, please send an email to 
	<a href="mailto:info@gc4women.org">info@gc4women.org</a> for more information. </p>

</div> 

<?php get_footer(); ?>