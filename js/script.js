jQuery(document).ready(function($){
	//$('.widget_twitter ul').totemticker({
	//row_height: '76px',
	//speed: 1000
	//});

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
});

