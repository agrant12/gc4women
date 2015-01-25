<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<aside id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="img"><a class="link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
	<section class="content">
		<h2 class="post-title"><?php truncate(get_the_title(), 0, 100); ?></h2>
		<p><?php truncate(get_the_excerpt(), 0, 100); ?></p>
		<a class="post-link" href="<?php the_permalink(); ?>">Read</a>
		<a class="arrow" href="<?php the_permalink(); ?>">Arrow</a>
	</section>
</aside><!-- #post -->

