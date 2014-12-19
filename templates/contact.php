<?php
/**
 * Template Name:  Contact
 */

get_header(); ?>

<style type="text/css">
	#map-canvas { height: 150px; width: 100%;}
</style>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBc1a9MASa_R2hVIK_oMgcHi-vWpboEcIU&sensor=false">
</script>

<script type="text/javascript">
	var center = new google.maps.LatLng(40.7078, -74.0129);

	function initialize() {
		var mapOptions = {
			center: center,
			zoom: 9,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		
	};

	var map = new google.maps.Map(document.getElementById("map-canvas"),
	mapOptions);

	var marker = new google.maps.Marker({
		position: center,
		draggable: false
	});

	marker.setMap(map);ß
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>

<section id="contact">
	<div id="map-canvas"></div>
	<aside>
		<h3>Get In Touch</h3>

		<p><strong>For more information, please contact us at:</strong><br />
		Global Connections for Women Foundation (GC4W)<br />
		P.O. Box 1143<br />
		New York, NY 10156</p>

		<a href="http://gc4women.org">www.gc4women.org</a><br /> 
		<a href="mailto:info@gc4women.org">info@gc4women.org</a> 

		<p>Please direct any media-related inquiries to:<br />
		<a href="mailto:press@gc4women.org">press@gc4women.org</a></p>

		<?php gc4w_social_widget(); ?>
		
	</aside>
	<aside id="form">
		<h3>Leave a Reply</h3>
		<?php echo do_shortcode("[contact-form-7 id='32' title='Contact form 1']"); ?>
	</aside>
</section>

<?php get_footer(); ?>