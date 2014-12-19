		<footer>
			<?php wp_nav_menu( array('menu' => 'Footer Menu', 'container' => 'nav' )); ?>
			<p><?php echo esc_html(GC4WSettings::get_setting('footer_text')); ?></p>
			<?php wp_nav_menu( array('menu' => 'Copyright Menu', 'container' => 'nav' )); ?>
		</footer>
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
	<!-- Quantcast Tag -->
	<script type="text/javascript">
		var _qevents = _qevents || [];

		(function() {
			var elem = document.createElement('script');
			elem.src = (document.location.protocol == "https:" ? "https://secure" : "http://edge") + ".quantserve.com/quant.js";
			elem.async = true;
			elem.type = "text/javascript";
			var scpt = document.getElementsByTagName('script')[0];
			scpt.parentNode.insertBefore(elem, scpt);
			})();

		_qevents.push({
			qacct:"p-RfbVxdVqDLpWj"
		});
	</script>

	<noscript>
		<div style="display:none;">
			<img src="//pixel.quantserve.com/pixel/p-RfbVxdVqDLpWj.gif" border="0" height="1" width="1" alt="Quantcast"/>
		</div>
	</noscript>
	<!-- End Quantcast tag -->

</body>