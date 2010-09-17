$(function() {

	function ajaxCall(slug) {
		window.location.hash = slug;

		// GUI stuff
		$('#article').children().fadeTo(400, 0.01);

		// AJAX stuff
		url  = String(window.location);
		hash = window.location.hash;

		$.ajax({
			url		: url.replace(hash, ''),
			data	: {'do':'article', 'slug':slug}
		});
	}


	if (window.location.hash !== '') {
		var slug = window.location.hash.replace('#', '');
		ajaxCall(slug);
	}


	$('#main h3 a').click(function() {
		var slug = this.href.match(/slug=([a-z0-9-]+)/);
		ajaxCall(slug[1]);
		return false;
	});

});
