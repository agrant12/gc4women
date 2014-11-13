<?php 

const Post_Type = 'programs';

$category = array('champion', 'campus-program', 'toy-drive', 'outreach', 'leadership',);

get_header(); ?>

<div class="programs">
	<h4>Welcome to the Global Connections for Women Foundation’s program page.</h4>
	<p><em><strong>Touching hearts. Lifting spirits. Changing lives.</strong></em>
	These actions embody the essence of the various programs here at the Global Connections for Women Foundation, where we strive to make real the dream of <em><strong>“improving the lives of women, youth and the communities in which <br />they live.”</strong></em></p>
	<p>While the world changes around us, the mission and purpose of GC4W remains unwaveringly at the core of our programs and initiatives.  GC4W organizational activities (categorized in the 5 major pillars listed below) are the manifestation of our organizational efforts to connect, educate and empower underserved communities the world over.
	The following 5 major pillars and the programs within them serve as the foundation for achieving our stated goal of enriching the lives of 100,000 women and youth by the end of 2015.</p>
	<p>If you are interested in working with GC4W Foundation or participating in any of our programs, please send an email to 
	<a href="mailto:info@gc4women.org">info@gc4women.org</a> for more information. </p>

	<div class="youtube">
		<iframe src="//www.youtube.com/embed/bx3nP5AocSE" width="650" height="366" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
	</div>
	
	<?php foreach ($category as $key => $cat): ?> 
		<?php $loop = new WP_Query( array( 
			'post_type' => Post_Type,
			'posts_per_page' => -1,
			'category_name' => $cat,
			'order' => 'ASC'
		)); ?>
		<?php if ($loop->have_posts()): ?>
			<?php switch ($cat) {
				case 'champion':
					$program_copy = 'GC4W offers the opportunity for select leading women to give back as a member of our <strong>Champions Program</strong>.  Champions are directly involved in mentoring, engaging and supporting the target constituents of the GC4W charter, women and youth. GC4W Champions includes Ivy League Alumni, MBA Graduates, Educators, Entrepreneurs, Industry Leaders and Social Innovators.';
					break;
				case 'campus-program':
					$program_copy = 'As part of the GC4W commitment to advocate for the underserved youth population, the <strong>Campus Affiliate Program</strong> is designed to promote the importance of education and activism among our youth as well as provide an influential leading voice on the issues that impact their lives.';
					break;
				case 'toy-drive':
					$program_copy = 'GC4W is pleased to announce the <strong>2nd Annual Holiday Toy Drive</strong>. Last year, GC4W Foundation partnered with several leading organizations. Including <strong>Safeway Foods Company, Burlington Coat Factory, Makovsky Company, Levo League, NAAEP, Workingmomsin20s, The Virgin Hair Fantasy</strong>, and others – to conduct a holiday toys and books drive for Women in Need Inc. (WIN) and the Oakland Children’s Hospital. Over 1,000 toys and books were donated and presented to both partners.';
					break;
				case 'outreach':
					$program_copy = 'At GC4W we recognize that we are not alone in our commitment to service and civic responsibility, as such we have partnered with an array of leading like-minded organizations (i.e. <strong>Clinton Foundation, Clinton Global Initiative, Women In Need Inc. (WIN), The Hope Program, Madison Square Boys & Girls Club, Delete Blood Cancer, Harvard Crimson Impact</strong>, etc) to increase our collective reach and impact on those who need help the most.';
					break;
				case 'leadership':
					$program_copy = 'True to its role as a forum for the exchange of ideas and values as well as a conduit for interpersonal connections, GC4W continues to invest in the important work of global leadership and empowerment for women.  This work includes noteworthy annual events such as the <strong><a href="http://gc4women.org/events/international-womens-event/">International Women’s Day Awards Gala</a></strong> and the upcoming <strong><a href="http://gc4women.org/events/working-moms-expo-wme/">GC4W Working Moms Expo</a></strong>.';
					break; 
				default:
					$programs_copy = '';
					break;
			} ?>
			<ul class="program default">
				<p><?php echo $program_copy; ?></p>
			</ul>
			<?php foreach($loop->posts as $post_item): ?> 
				<ul class="program">
					<div class="image"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id( $post_item->ID )); ?>" /></div>
					<?php if (!empty($post_item->post_content)) : ?>
						<div class="overlay">
							<p><?php echo $post_item->post_content; ?></p>
						</div>
					<?php endif; ?>
				</ul>
			<?php endforeach; ?>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
	<?php endforeach; ?>

</div>

<?php get_footer(); ?>