jQuery(document).ready(function($){

	var defaultHover = true;

	$('.flexslider').on('hover', function(){
		if(defaultHover){
			$('.slides .slide_info').animate({ opacity: 1 }, 'fast');

			defaultHover = false;
		} else {
			$('.slides .slide_info').animate({ opacity: 0 }, 'fast');

			defaultHover = true;
		}
	});

	//@TODO Remove Tab code
	$('.select1').on("click", function(e){
		e.preventDefault();
		$('.tab_content_1').toggle();
	});

	$('.select2').on("click", function(e){
		e.preventDefault();
		$('.tab_content_2').toggle();
	});

	$('.select3').on("click", function(e){
		e.preventDefault();
		$('.tab_content_3').toggle();
	});

	/* Mobile Menu */
	$('.hamburger a').on('click', function(e){
		e.preventDefault();
		
		$('#navigation').slideToggle('fast', function() {

		});
	});

	// Search Hover

	$('.search, .search-box').on("hover", function(e) {
		e.preventDefault();
		$('.search-box').toggle();

		if ($('.search-box').is(':visible')) {
			$('.icon-search').css({
				'background-color': '#1A374D'
			}).css({
				'color': '#FFF'
			});
		} else {
			$('.icon-search').css({
				'background-color': '#FFF'
			}).css({
				'color': '#000'
			});
		}
	});
});

