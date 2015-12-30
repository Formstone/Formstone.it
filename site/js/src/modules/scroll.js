/*-------------------------------------------
	Page
-------------------------------------------*/

	/* global picturefill */

	Site.modules.Scroll = (function($, Site) {

		var $Instances,
			$SpyItems,
			$SpyBlocks;

		function init() {
			$Instances = $(".js-scroll_lock").each(createInstance);

			$SpyItems  = $(".js-scroll_spy").find("a").on("click", Site.modules.Page.onScrollTo);
			$SpyBlocks = $SpyItems.map(function(){
				var id    = $(this).attr("href"),
					$item = $(id);

				if (!$item.length) {
					$item = $("[name=" + id.replace("#", "") + "]");
				}

				if ($item.length) {
					return $item;
				}
			});

			Site.onScroll.push(scroll);
			Site.onResize.push(resize);

			scroll();
		}

		function scroll() {
			$Instances.each(checkInstance);

			// Spy

			var $current = [];

			$SpyBlocks.each(function() {
				var $block = $(this);

				if (Site.scrollTop >= $block.offset().top - 10) {
					$current = $block;
				}
			});

			$SpyItems.removeClass("js-active");

			if ($current.length) {
				$SpyItems.filter("[href=#" + $current.attr("name") + "]").addClass("js-active");
			}
		}

		function resize() {
			$Instances.each(cacheInstance);

			scroll();
		}

		function createInstance() {
			var $target  = $(this),
				$clone   = $target.clone(),
				offset   = parseInt($target.data("scroll-offset"), 10),
				position = $target.position();

			$target.addClass("js-scroll_ready");
			$clone.addClass("js-scroll_clone");

			$target.data("scroll", {
				$el:    $target,
				$clone: $clone,
				$locks: $().add($target).add($clone),
				locked: false,
				offset: offset,
				top:    position.top
			}).after($clone);
		}

		function cacheInstance() {
			var data = $(this).data("scroll"),
				position;

			if (data.locked) {
				position = data.$clone.position();
			} else {
				position = data.$el.position();
			}

			data.top = position.top;
		}

		function checkInstance() {
			var data = $(this).data("scroll");

			if ((Site.scrollTop - data.top) > data.offset) {
				data.locked = true;
				data.$locks.addClass("js-scroll_locked");
			} else {
				data.locked = false;
				data.$locks.removeClass("js-scroll_locked");
			}
		}

		/* Hook Into Main init Routine */

		Site.onInit.push(init);

		return {

		};
	})(jQuery, Site);