/**
 * AJAX Nette Framwork plugin for jQuery
 *
 * @copyright   Copyright (c) 2009 Jan Marek
 * @license     MIT
 * @link        http://nettephp.com/cs/extras/jquery-ajax
 * @version     0.2
 */

jQuery.extend({
	nette: {
		updateSnippet: function (id, html) {
			$("#" + id).html(html);
		},

		success: function (payload) {

			// redirect
			if (payload.redirect) {
				window.location.href = payload.redirect;
				return;
			}


			// GUI actions
			$('.spinner').fadeOut(400, function() {
				$(this).remove()

				$('header nav a').each(function(i, obj) {
					$obj = $(obj);
					objSlug = $obj.attr('href').match(/slug=([a-z0-9-]+)/);
					if (objSlug[1] == window.location.hash.replace('#', '')) {
						$obj.addClass('active');
					}
				});

				// snippets
				if (payload.snippets) {
					for (var i in payload.snippets) {
						jQuery.nette.updateSnippet(i, payload.snippets[i]);
					}
				}

				$('#articleContent').fadeTo(400, 1);
			});

		}
	}
});

jQuery.ajaxSetup({
	success: jQuery.nette.success,
	dataType: "json"
});
