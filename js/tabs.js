jQuery(document).ready(function($) {
	if (!$('div.tabs').length) {
		return; 
	}
	
	$('div.tabs').each(function() {
		$(this).find('.tab_content:first').show();
		$(this).find('a:first').addClass('current');
	});

	$('div.tabs a').click(function() {
		if(!$(this).hasClass('current')) {
			$(this).addClass('current').parent('div').siblings('div')
				.find('a.current').removeClass('current');

			$($(this).attr('href')).fadeIn().siblings('div.tab_content').fadeOut();
		}

		this.blur(); 
		return false;
	}); 
});