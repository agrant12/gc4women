jQuery(document).ready(function($){
	$('.widget_twitter ul').totemticker({
	row_height: '76px',
	speed: 1000
	});

	var defaultHover = true;

	$('.flexslider').on('hover', function(){
		if(defaultHover){
			$('.slide_info').animate({ opacity: 1 }, 'fast');

			defaultHover = false;
		} else {
			$('.slide_info').animate({ opacity: 0 }, 'fast');

			defaultHover = true;
		}
	});
});

