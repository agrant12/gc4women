	</div>
	<?php wp_footer(); ?>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-51804637-1', 'gc4women.org');
		ga('send', 'pageview');
	</script>
</body>

<footer>
	<?php wp_nav_menu( array('menu' => 'Footer Menu', 'container' => 'nav' )); ?>
	<p><?php echo esc_html(GC4WSettings::get_setting('footer_text')); ?></p>
	<?php wp_nav_menu( array('menu' => 'Copyright Menu', 'container' => 'nav' )); ?>
</footer>

