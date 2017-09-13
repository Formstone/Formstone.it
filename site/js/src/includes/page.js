/* ==========================================================================
  Page
============================================================================= */

	/* global picturefill */

	(function($, Formstone) {

    var $body;

		function init() {
			picturefill();

      $body = $("body");

			$.analytics({
				scrollDepth: true
			});

			$body.find(".js-mobile_navigation").navigation({
				maxWidth: "979px"
			});

			$body.find(".js-navigation")
				.navigation({
					maxWidth: "979px"
				})
				.on("open.navigation", function() {
					trackEvent( $(this).data("analytics-open") );
				}).on("close.navigation", function() {
					trackEvent( $(this).data("analytics-close") );
				});

			$body.find("table").wrap('<div class="table_wrapper"></div>');

			$body.find(".js-scroll_to, .js-scroll_to_parent a")
				.not(".js-bound")
				.on("click", onScrollTo)
				.addClass("js-bound");
		}

		function onScrollTo(e) {
			e.preventDefault();
			e.stopPropagation();

			var $target = $(e.delegateTarget),
				id = $target.attr("href");

			scrollToElement(id);
		}

		function scrollToElement(id) {
			var $to = $(id);

			if (!$to.length) {
				$to = $("[name=" + id.replace("#", "") + "]");
			}

			if ($to.length) {
				var offset = $to.offset();

				scrollToPosition(offset.top);
			}
		}

		function scrollToPosition(top) {
			$("html, body").animate({ scrollTop: top });
		}

		function trackEvent(data) {
			if ($.type(data) === "string") {
				data = data.split(",");

				$.analytics.apply(this, data);
			}
		}

		// Init

		Formstone.Ready(init);

	})(jQuery, Formstone);
