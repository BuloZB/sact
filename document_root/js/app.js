$(function() {

	function ajaxCall(slug) {
		window.location.hash = slug;

		// GUI stuff
		$('#articleContent').fadeTo(400, 0.01, function() {
				$('header nav a').each(function(i, obj) {
					$obj = $(obj);
					$obj.removeClass('active');
				});

			$('#article').append('<div class="spinner"></div>')
			$('#article .spinner').fadeIn(400, function() {

				// AJAX stuff
				url  = String(window.location);
				hash = window.location.hash;

				$.ajax({
					url		: url.replace(hash, ''),
					data	: {'do':'article', 'slug':slug}
				});

			});
		});
	}


	if (window.location.hash !== '') {
		var slug = window.location.hash.replace('#', '');
		ajaxCall(slug);
	}


	$('header nav a').click(function(e) {
		e.preventDefault();
		var slug = this.href.match(/slug=([a-z0-9-]+)/);
		ajaxCall(slug[1]);
	});

});
