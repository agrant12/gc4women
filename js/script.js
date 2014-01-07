jQuery(document).ready(function($){
	$('.widget_twitter ul').totemticker({
	row_height: '76px',
	speed: 1000
	});

	var defaultHover = true;

	$('.overlay').on('hover', function(){
		if(defaultHover){
			$(this).animate({ opacity : 0 }, 'fast');
			
			defaultHover = false;
		} else{
			$(this).animate({ opacity : 0.5 }, 'fast');
			
			defaultHover = true;
		}
	});
});

