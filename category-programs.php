<?php 

const Post_Type = 'programs';

$category = array('champion', 'campus-program', 'leadership', 'toy-drive');

get_header(); ?>

<div class="programs">
	<h4>Welcome to the Global Connections for Women foundation’s program page.</h4>
	<p><em><strong>Touching hearts. Lifting spirits. Changing lives.</strong></em>
	These actions embody the essence of the various programs here at the Global Connections for Women Foundation, where we strive to make real the dream of <em><strong>“improving the lives of women, youth and the communities in which they live.”</strong></em></p>
	<p>While the world changes around us, the mission and purpose of GC4W remains unwaveringly at the core of our programs and initiatives.  GC4W organizational activities (categorized in the 5 major pillars listed below) are the manifestation of our organizational efforts to connect, educate and empower underserved communities the world over.
	The following 5 major pillars and the programs within them serve as the foundation for achieving our stated goal of enriching the lives of 100,000 women and youth by the end of 2015.</p>
	<br />
	<?php foreach ($category as $key => $cat): ?> 
		<?php $loop = new WP_Query( array( 
			'post_type' => Post_Type,
			'posts_per_page' => -1,
			'category_name' => $cat,
			'order' => 'ASC'
		)); ?>
		<?php if ($loop->have_posts()): ?>
			<?php if($cat === 'champion'): ?>
				<ul class="program default">
					<p>GC4W offers the opportunity for select leading women to give back as a member of our <strong>Champions Program</strong>.  Champions are directly involved in mentoring, engaging and supporting the target constituents of the GC4W charter, women and youth. GC4W Champions includes Ivy League Alumni, MBA Graduates, Educators, Entrepreneurs, Industry Leaders and Social Innovators. </p>
				</ul>
			<?php endif; ?>
				<?php if($cat === 'campus-program'): ?>
				<ul class="program default">
					<p>As part of the GC4W commitment to advocate for the underserved youth population, the <strong>Campus Affiliate Program</strong> is designed to promote the importance of education and activism among our youth as well as provide an influential leading voice on the issues that impact their lives.</p>
				</ul>
			<?php endif; ?>
			<?php if($cat === 'leadership'): ?>
			<ul class="program">
				<p></p>
			</ul>
			<?php endif; ?>
			<?php if($cat === 'toy-drive'): ?>
				<ul class="program default">
					<p>GC4W is pleased to announce the <strong>2nd Annual Holiday Toy Drive</strong>. Last year, GC4W Foundation partnered with several leading organizations. Including <strong>Safeway Foods Company, Burlington Coat Factory, Makovsky Company, Levo League, NAAEP, Workingmomsin20s, The Virgin Hair Fantasy</strong>, and others – to conduct a holiday toys and books drive for Women in Need Inc. (WIN) and the Oakland Children’s Hospital. Over 1,000 toys and books were donated and presented to both partners. </p>
				</ul>
			<?php endif; ?>
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