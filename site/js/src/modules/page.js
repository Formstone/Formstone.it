/*-------------------------------------------
	Page
-------------------------------------------*/

	/* global picturefill */

	Site.modules.Page = (function($, Site) {

		function init() {

			/* Plugin Defaults */

/*
			$.lightbox("defaults", {
				mobile: true
				// fixed: true
			});
*/


			/* Picturefill */

			picturefill();


			/* Analytics

			$.analytics({
				scrollDepth: true
			});
			*/


			/* Mobile Main Navigation */

			Site.$body.find(".js-mobile_navigation").navigation({
				maxWidth: "979px"
			});


			/* Mobile Subnavigation */

			Site.$body.find(".js-navigation")
				.navigation({
					maxWidth: "979px"
				})
				.on("open.navigation", function() {
					trackEvent( $(this).data("analytics-open") );
				}).on("close.navigation", function() {
					trackEvent( $(this).data("analytics-close") );
				});


			/* Plugins

			Site.$body.find(".js-background").background();
			Site.$body.find(".js-carousel").carousel();
			Site.$body.find(".js-checkbox, .js-radio, input[type=checkbox], input[type=radio]").checkbox();
			Site.$body.find(".js-dropdown").dropdown();
			Site.$body.find(".js-equalize").equalize();

			Site.$body.find("input[type=number]").number();
			Site.$body.find("input[type=range]").range();
			Site.$body.find(".js-tabs").tabs();
			*/

//			Site.$body.find(".js-lightbox").lightbox();
			Site.$body.find(".js-swap").swap();


/*
			Site.$body.find(".section_nav").navigation({
				maxWidth: "739px",
				labels: {
					open: "Close",
					closed: "Jump To"
				}
			});
*/


			/* Wrapper for Tables */

			Site.$body.find("table").wrap('<div class="table_wrapper"></div>');


			/* Pikaday Date Picker

			if (Site.touch) {
				Site.$body.find(".js-datepicker, input[type=date]")
					.attr("type", "date")
					.removeAttr("placeholder")
					.on("blur", function() {
						$(this).trigger("datepicker.change");
					});
			} else {
				Site.$body.find(".js-datepicker, input[type=date]")
					.attr("type", "text")
					.pikaday({
						firstDay: 0,
						minDate: new Date("2000-01-01"),
						maxDate: new Date("2020-12-31"),
						yearRange: [ 2000, 2020 ],
						format: "MM/DD/YYYY",
						position: 'bottom left',
						onSelect: function() {
							$(".js-datepicker").trigger("datepicker.change");
						}
					});
			}
			*/


			/* Generic Toggles */

			Site.$body.find(".js-toggle")
				.not(".js-bound")
				.on("click", ".js-toggle_handle", onToggleClick)
				.addClass("js-bound");


			/* Scroll Nav */

			Site.$body.find(".js-scroll_to")
				.not(".js-bound")
				.on("click", onScrollTo)
				.addClass("js-bound");


			/* Responsive Video */

			$("iframe[src*='vimeo.com'], iframe[src*='youtube.com']", ".typography").each(function() {
				$(this).wrap('<div class="video_frame"></div>');
			});


			/* Scrolling */

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

		function onToggleClick(e) {
			Site.killEvent(e);

			var $target     = $(e.delegateTarget),
				activeClass = "js-toggle_active";

			if ($target.hasClass(activeClass)) {
				$target.removeClass(activeClass);
			} else {
				$target.addClass(activeClass);
			}
		}

		function trackEvent(data) {
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
