jQuery(document).ready(function($) {

	if (!$('dl#accordion').length) {
		return; 
	}
	
	$('dl#accordion').each(function() {
		$(this).find('dt:first a').addClass('accordion_expanded')
		.end().find('dd:first').show();

		$(this).find('dt:last').addClass('last');
		$(this).find('dd:last').hide(); 
	});

	$('dl#accordion dt a').click(function() {
		var $dl = $(this).parents('dl:first');
		var $dd = $(this).parent('dt').next('dd');

		function findLast() {
			if ($dl.find('dd:last').is(':hidden')) {
				$dl.find('dt:last').addClass('last'); 
			}
		}

		if ($dd.is(':hidden')) {
			$dd.slideDown('fast').siblings('dd:visible').slideUp('fast', findLast);

			$(this).addClass('accordion_expanded').parent('dt')
			.removeClass('last').siblings('dt').find('a') 
			.removeClass('accordion_expanded');
		}

		this.blur(); 
		return false;
	}); 
	
});