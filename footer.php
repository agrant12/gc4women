	</div>
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
		<?php
			if(is_active_sidebar('footer-sidebar-3')){
			dynamic_sidebar('footer-sidebar-3');
			}
		?>
	</div>
	<div class="clear"></div>
	<a href="#" id="copyright">Copyright &copy 2013 - GC4Women - All Rights Reserved.</a>
</footer>