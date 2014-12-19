<div class="sidebar">
	<?php if ( is_active_sidebar('homepage-sidebar') ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'homepage-sidebar' ); ?>
		</div>
	<?php elseif ( is_active_sidebar('frontpage-sidebar') ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'frontpage-sidebar' ); ?>
		</div>
	<?php endif; ?>

</div>

