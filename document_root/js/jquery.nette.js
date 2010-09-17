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

			// snippets
			if (payload.snippets) {
				for (var i in payload.snippets) {
					jQuery.nette.updateSnippet(i, payload.snippets[i]);
				}
			}

			// GUI actions
			$('#article').children().fadeTo(400, 1);
			$('#article').append('<span class="spinner"></span>');
			$('#main h3').each(function(i, obj) {
				$obj = $(obj)
				$obj.removeClass('active');

				objSlug = $obj.children('a').attr('href').match(/slug=([a-z0-9-]+)/);
				if (objSlug[1] == window.location.hash.replace('#', '')) {
					$obj.addClass('active');
				}

			});
		}
	}
});

jQuery.ajaxSetup({
	success: jQuery.nette.success,
	dataType: "json"
});
