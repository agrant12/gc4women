	</div>
	<?php wp_footer(); ?>
</body>
<footer>
	<div id="footer-sidebar-1">
		<?php
			if(is_active_sidebar('footer-sidebar-1')){
			dynamic_sidebar('footer-sidebar-1');
			}
		?>
	</div>
	<div id="footer-sidebar-2">
		<?php
			if(is_active_sidebar('footer-sidebar-2')){
			dynamic_sidebar('footer-sidebar-2');
			}
		?>
	</div>
	<div id="footer-sidebar-3">
		<h3 class="widget-title">Stay Connected!</h3>
		<form>
			<input /><br />
			<input /><br />
			<button>Sign Up</button>
		</form>

		<h3 class="widget-title">Contact Us!</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eu </p>
		<a href="http://gc4w.org">www.gc4w.org</a><br />
		<a href="mailto:info@gc4w.org">info@gc4w.com</a>
		<?php
			if(is_active_sidebar('footer-sidebar-3')){
			dynamic_sidebar('footer-sidebar-3');
			}
		?>
	</div>
	<div class="clear"></div>
	<span id="copyright">The Global Connections for Women Foundation is a 501(c)(3) not-for-profit organization.</span><br />
	<span id="copyright">Copyrights © 2013 GC4W Foundation | Our<a href="#">Privacy Policy</a> </span>
</footer>