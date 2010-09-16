$(function() {

	function ajaxCall(slug) {
		window.location.hash = slug;

		$('#article').children().fadeTo(400, 0.01);

		$.ajax({
			data : {'do':'article', 'slug':slug}
		});
	}

	if (window.location.hash !== '') {

	}

	$('#main h3 a').click(function() {
		var url = this.href;
		var match = url.match(/slug=([a-z0-9-]+)/);

		ajaxCall(match[1]);
		return false;
	});


});
