	</div>
	<?php wp_footer(); ?>
</body>

<footer>
	<div class="container">
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
		<div id="footer-sidebar-4">
			<?php
				if(is_active_sidebar('footer-sidebar-4')){
				dynamic_sidebar('footer-sidebar-4');
				}
			?>
		</div>
		<div id="footer-sidebar-3">
			<?php
				if(is_active_sidebar('footer-sidebar-3')){
				dynamic_sidebar('footer-sidebar-3');
				}
			?>
		</div>
		
	</div>
	<div class="clear"></div>
</footer>
<section id="copyright">
	<span>
		The Global Connections for Women Foundation is a 
		501(c)(3) not-for-profit organization | All Rights Reserved.
	</span>
</section>

