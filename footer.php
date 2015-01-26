		<footer>
			<div class="address">
				<h4>Contact Us</h4>
				<br />
				<p>
					Global Connections For Women<br />
					P.O. Box 1143<br/>
					New York, NY 10156
				</p>
				<br />
				<p>
					Email: info@gc4women.org<br />
					Phone: 1-800-000-0000
				</p>
			</div>
			<div class="menus">
				<h4>Menu</h4>
				<br />
				<?php wp_nav_menu( array('menu' => 'Footer Menu', 'container' => 'div')); ?>
				<?php wp_nav_menu( array('menu' => 'Copyright Menu', 'container' => 'div')); ?>
			</div>
			<div class="social-buttons">
				<h4>Follow Us</h4>
				<br />
				<?php gc4w_social_widget(); ?>
			</div>

			<!--<p><?php echo esc_html(GC4WSettings::get_setting('footer_text')); ?></p>-->
		</footer>
	</div>
	<?php wp_footer(); ?>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-51804637-1', 'gc4women.org');
		ga('require', 'displayfeatures');
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