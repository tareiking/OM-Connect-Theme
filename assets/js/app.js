
(function($) {
	$(document).foundation({
		topbar: {
			mobile_show_parent_link: true
		},
		equalizer: {
			equalize_on_stack: false
		}
	});
	var doc = document.documentElement;
	doc.setAttribute('data-useragent', navigator.userAgent);
})(jQuery);