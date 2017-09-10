/*-------------------------------------------
	Page
-------------------------------------------*/

	/* global picturefill */

	Site.modules.Page = (function($, Site) {

		function init() {

			picturefill();

			$.analytics({
				scrollDepth: true
			});

			Site.$body.find(".js-mobile_navigation").navigation({
				maxWidth: "979px"
			});

			Site.$body.find(".js-navigation")
				.navigation({
					maxWidth: "979px"
				})
				.on("open.navigation", function() {
					trackEvent( $(this).data("analytics-open") );
				}).on("close.navigation", function() {
					trackEvent( $(this).data("analytics-close") );
				});

			Site.$body.find("table").wrap('<div class="table_wrapper"></div>');

			Site.$body.find(".js-scroll_to")
				.not(".js-bound")
				.on("click", onScrollTo)
				.addClass("js-bound");

			Site.onScroll.push(scroll);
			Site.onResize.push(resize);
			Site.onRespond.push(respond);

			Site.scroll();
		}

		function scroll() {

		}

		function resize() {
			scroll();
		}

		function respond() {
			scroll();
		}

		function onScrollTo(e) {
			Site.killEvent(e);

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
			console.log($.type(data));

			if ($.type(data) === "string") {
				data = data.split(",");

				$.analytics.apply(this, data);
			}
		}

		/* Hook Into Main init Routine */

		Site.onInit.push(init);

		return {
			onScrollTo: onScrollTo
		};
	})(jQuery, Site);
