// /*-------------------------------------------
// 	Site
// -------------------------------------------*/
//
// 	// !IE
// 	var IE8 = IE8 || false,
// 	    IE9 = IE9 || false;
//
// 	// !Site
// 	var Site = (function($, window) {
//
// 		// !BaseController
// 		var BaseController = function() {
// 			this.namespace    = "";
//
// 			this.minWidth     = 320;
// 			this.maxWidth     = Infinity;
// 			this.scrollTop    = 0;
// 			this.windowHeight = 0;
// 			this.windowWidth  = 0;
//
// 			this.window       = null;
// 			this.doc          = null;
//
// 			this.$window      = null;
// 			this.$doc         = null;
// 			this.$body        = null;
//
// 			// Public modules
// 			this.modules      = [];
//
// 			this.onInit       = [];
// 			this.onRespond    = [];
// 			this.onResize     = [];
// 			this.onScroll     = [];
//
// 			this.minXS = "@mq_min_xs";
// 			this.minSM = "@mq_min_sm";
// 			this.minMD = "@mq_min_md";
// 			this.minLG = "@mq_min_lg";
// 			this.minXL = "@mq_min_xl";
//
// 			this.maxXS = this.minXS - 1;
// 			this.maxSM = this.minSM - 1;
// 			this.maxMD = this.minMD - 1;
// 			this.maxLG = this.minLG - 1;
// 			this.maxXL = this.minXL - 1;
//
// 			this.minHTsm = parseInt("@mq_min_ht_sm", 10);
// 			this.minHT   = parseInt("@mq_min_ht", 10);
//
// 			this.maxHTsm = this.minHTsm - 1;
// 			this.maxHT   = this.minHT - 1;
//
// 			this.touch = false;
// 		};
//
// 		$.extend(BaseController.prototype, {
// 			// Init
// 			init: function(namespace) {
// 				// Objects
// 				this.namespace = namespace;
// 				this.window    = window;
// 				this.doc       = document;
// 				this.$window   = $(window);
// 				this.$doc      = $(document);
// 				this.$body     = $("body");
// 				this.touch     = $("html").hasClass("touch");
//
// 				if ($.mediaquery) {
// 					$.mediaquery({
// 						minWidth: [ this.minXS, this.minSM, this.minMD, this.minLG, this.minXL ],
// 						maxWidth: [ this.maxXL, this.maxLG, this.maxMD, this.maxSM, this.maxXS ],
// 						minHeight: [ this.minHTsm, this.minHT ]
// 					});
// 				}
//
// 				if ($.cookie) {
// 					$.cookie({
// 						path: "/"
// 					});
// 				}
//
// 				// Init modules before scroll/resize/respond
// 				iterate(this.onInit);
//
// 				this.$window.on("mqchange.mediaquery", onRespond)
// 							.on(Controller.ns("resize"), onResize)
// 							.on(Controller.ns("scroll"), onScroll);
//
// 				this.resize();
// 			},
// 			// Namespace Text
// 			ns: function(text) {
// 				return text + "." + this.namespace;
// 			},
// 			// Resize Trigger
// 			resize: function() {
// 				this.$window.trigger(Controller.ns("resize"));
// 			},
// 			// Scroll Trigger
// 			scroll: function() {
// 				this.$window.trigger(Controller.ns("scroll"));
// 			},
// 			// Kill event
// 			killEvent: function(e) {
// 				if (e && e.preventDefault) {
// 					e.preventDefault();
// 					e.stopPropagation();
// 				}
// 			},
// 			// Start timer
// 			startTimer: function(timer, time, callback, interval) {
// 				this.clearTimer(timer);
// 				return (interval) ? setInterval(callback, time) : setTimeout(callback, time);
// 			},
// 			// Clear timer
// 			clearTimer: function(timer, interval) {
// 				if (timer) {
// 					if (interval) {
// 						clearInterval(timer);
// 					} else {
// 						clearTimeout(timer);
// 					}
//
// 					timer = null;
// 				}
// 			}
// 		});
//
// 		// Internal Instance
// 		var Controller = new BaseController();
//
// 		// Loop through callbacks
// 		function iterate(items) {
// 			for (var i in items) {
// 				if (items.hasOwnProperty(i)) {
// 					items[i].apply(Controller, Array.prototype.slice.call(arguments, 1));
// 				}
// 			}
// 		}
//
// 		// Media Query Change Handler
// 		function onRespond(e, state) {
// 			Controller.minWidth = state.minWidth;
//
// 			iterate(Controller.onRespond, state);
// 		}
//
// 		// Resize Handler
// 		function onResize() {
// 			Controller.windowWidth  = Controller.$window.width();
// 			Controller.windowHeight = Controller.$window.height();
//
// 			iterate(Controller.onResize);
// 		}
//
// 		// Scroll Handler
// 		function onScroll() {
// 			Controller.scrollTop = Controller.$window.scrollTop();
//
// 			iterate(Controller.onScroll);
// 		}
//
// 		// Return Internal Instance
// 		return Controller;
// 	})(jQuery, window);
//
// 	// !Ready
// 	$(document).ready(function() {
// 		Site.init("Namespace");
// 	});

/* ==========================================================================
  Site
============================================================================= */

  (function($, Formstone) {
    var $window,
        $body,
        opts = {};

    opts.minXS = parseInt("@mq_min_xs", 10);
    opts.minSM = parseInt("@mq_min_sm", 10);
    opts.minMD = parseInt("@mq_min_md", 10);
    opts.minLG = parseInt("@mq_min_lg", 10);
    opts.minXL = parseInt("@mq_min_xl", 10);

    opts.maxXS = opts.minXS - 1;
    opts.maxSM = opts.minSM - 1;
    opts.maxMD = opts.minMD - 1;
    opts.maxLG = opts.minLG - 1;
    opts.maxXL = opts.minXL - 1;

    opts.minHTsm = parseInt("@mq_min_ht_sm", 10);
    opts.minHT   = parseInt("@mq_min_ht", 10);

    opts.maxHTsm = opts.minHTsm - 1;
    opts.maxHT   = opts.minHT - 1;

    function init() {
      $window = $(window);
      $body   = $("body");

      if ($.mediaquery) {
        $.mediaquery({
          minWidth: [ opts.minXS, opts.minSM, opts.minMD, opts.minLG, opts.minXL ],
          maxWidth: [ opts.maxXL, opts.maxLG, opts.maxMD, opts.maxSM, opts.maxXS ],
          minHeight: [ opts.minHTsm, opts.minHT ],
          maxHeight: [ opts.maxHT, opts.maxHTsm ]
        });
      }

      if ($.cookie) {
        $.cookie({
          path: "/"
        });
      }

      buildDemoTabs();
      buildPlugins("fs-light");
    }

    function buildDemoTabs() {
      $(".demo_container").each(function(index) {
        var html     = "",
            $demo    = $(this),
            $example = $demo.find(".demo_example"),
            $code    = $demo.find(".demo_code");

        $example.attr("id", "example-" + index);
        $code.attr("id", "code-" + index);

        html += '<div class="demo_tabs contain">';
        html += '<a href="#example-' + index + '" class="demo_tab js-demo_tabs" data-tabs-group="demo-' + index + '">Demo</a>';
        html += '<a href="#code-' + index +    '" class="demo_tab js-demo_tabs" data-tabs-group="demo-' + index + '">Code</a>';
        html += '</div>';

        $demo.prepend(html);
      });
    }

    function buildPlugins(theme) {
      var options = {
        theme: theme
      };

      // Move the demo navs out

      $(".js-navigation_elements").appendTo("body");

      // Destroy

      $body.find(".js-background").background("destroy");
      $body.find(".js-carousel").carousel("destroy");
      $body.find(".js-checkbox, .js-radio, input[type=checkbox], input[type=radio]").checkbox("destroy");
      $body.find(".js-checkpoint").checkpoint("destroy");
      $body.find(".js-dropdown").dropdown("destroy");
      $body.find(".js-equalize").equalize("destroy");
      $body.find(".js-lightbox").lightbox("destroy");
      $body.find(".js-navigation").navigation("destroy");
      $body.find("input[type=number]").number("destroy");
      $body.find(".js-pagination").pagination("destroy");
      $body.find("input[type=range]").range("destroy");
      $body.find(".js-scrollbar").scrollbar("destroy");
      $body.find(".js-sticky").sticky("destroy");
      $body.find(".js-swap").swap("destroy");
      $body.find(".js-tabs").tabs("destroy");
      $body.find(".js-tooltip").tooltip("destroy");
      $body.find(".js-upload").upload("destroy");
      $body.find(".js-viewer").viewer("destroy");

      // Init

      $body.find(".js-background").background(options);
      $body.find(".js-carousel").carousel(options);
      $body.find(".js-checkbox, .js-radio, input[type=checkbox], input[type=radio]").checkbox(options);
      $body.find(".js-checkpoint").checkpoint();
      $body.find(".js-dropdown").dropdown(options);
      $body.find(".js-equalize").equalize(options);
      $body.find(".js-lightbox").lightbox(options);
      $body.find(".js-navigation").navigation(options);
      $body.find("input[type=number]").number(options);
      $body.find(".js-pagination").pagination(options);
      $body.find("input[type=range]").range(options);
      $body.find(".js-scrollbar").scrollbar(options);
      $body.find(".js-sticky").sticky(options);
      $body.find(".js-swap").swap(options);
      $body.find(".js-tabs").tabs(options);
      $body.find(".js-tooltip").tooltip(options);
      $body.find(".js-upload").upload(options);
      $body.find(".js-viewer").viewer(options);

      // Demo Tabs

      $body.find(".js-demo_tabs").off("update.tabs").tabs("destroy");

      $body.find(".js-demo_tabs").tabs({
        mobileMaxWidth: "0px",
        theme: "fs-demo"
      }).on("update.tabs", resetPlugins);
    }

    function resetPlugins() {
      var $tab     = $(this),
          $content = $( $tab.attr("href") );

      $content.find(".js-background").background("resize");
      $content.find(".js-carousel").carousel("resize");
      $content.find(".js-equalize").equalize("resize");
      $content.find("input[type=range]").range("resize");
      $content.find(".js-scrollbar").scrollbar("resize");

      $body.find(".js-checkpoint").checkpoint("resize");
      $body.find(".js-sticky").sticky("resize");
    }

    // Ready

    Formstone.Ready(init);

  })(jQuery, Formstone);
