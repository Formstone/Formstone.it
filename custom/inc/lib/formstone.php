<?php

	include_once SERVER_ROOT . "custom/inc/lib/parsedown/Parsedown.php";

	class Formstone {
		var $CacheID  = "formstone.it";
		var $CacheKey = "data";
		var $CacheAge = 604800;
		var $PageLink = "";

		var $Package = array();
		var $Navigation = array();
		var $Components = array();

		var $Parsedown;

		var $Debug = false;

		public function __construct($debug = false) {
			global $cms;

			$this->Debug = $debug;

			if (!$this->Parsedown) {
				$this->Parsedown = new Parsedown;
			}

			$this->PageLink = $cms->getLink(1);

			$cache = $this->expandRoots(BigTreeCMS::cacheGet($this->CacheID, $this->CacheKey, $this->CacheAge));

			if (!$this->Debug && array_filter((array)$cache)) {
				$this->Package    = $cache["package"];
				$this->Navigation = $cache["navigation"];
				$this->Components = $cache["components"];
				$this->Badges     = $cache["badges"];
				$this->Changelog  = $cache["changelog"];
			} else {
				$this->Package = json_decode(file_get_contents(SERVER_ROOT . "site/formstone/package.json"), true);

				$readme = explode("# Formstone", file_get_contents(SERVER_ROOT . "site/formstone/README.md"));
				$this->Badges = $readme[0];

				$changelog = explode("<!-- -->", $this->Parsedown->text(file_get_contents(SERVER_ROOT . "site/formstone/CHANGELOG.md")));
				$this->Changelog = $changelog[1];

				$index = json_decode(file_get_contents(SERVER_ROOT . "site/formstone/docs/json/index.json"), true);

				foreach ($index as $set => $components) {
					$children = array();

					foreach ($components as $component) {
						$route = str_ireplace("-", "", $cms->urlify($component));

						$children[] = array(
							"name" => $component,
							"link" => $this->PageLink . $route . "/"
						);

						$this->Components[$route] = $this->buildPage($route);
					}

					$this->Navigation[] = array(
						"name"     => $set,
						"children" => $children
					);
				}

				$cache = $this->cleanRoots(array(
					"navigation" => $this->Navigation,
					"components" => $this->Components,
				));

				$cache["package"]   = $this->Package;
				$cache["badges"] = $this->Badges;
				$cache["changelog"] = $this->Changelog;

				BigTreeCMS::cachePut($this->CacheID, $this->CacheKey, $cache);
			}
		}

		public function buildPage($route) {
			$data = $this->parseMarkdown(json_decode(file_get_contents(SERVER_ROOT . "site/formstone/docs/json/" . $route . ".json"), true));
			$data["link"] = $this->PageLink . $route . "/";

			$nav_start  = '<div class="section_nav_wrapper js-scroll_lock" data-scroll-offset="-100">';
			$nav_start .= '<div class="fs-row js-scroll_contents">';
			$nav_start .= '<nav class="fs-cell section_nav js-scroll_spy">';

			$nav_end    = '</nav>';
			$nav_end   .= '</div>';
			$nav_end   .= '</div>';


			$use_link  = '<li><a href="#use">Use</a></li>';
			$demo_link = '';
			$ad_block = file_get_contents(SERVER_ROOT . "templates/layouts/partials/ads.php");

			$data["demo_html"] = str_ireplace(array("../"), array(WWW_ROOT . "demo/"), file_get_contents(SERVER_ROOT . "site/formstone/demo/components/" . $route . ".html"));

			if (strpos(strtolower($data["demo_html"]), "no demo") !== false) {
				$data["demo_html"] = false;
			}

			if ($data["demo_html"]) {

				if (strpos($data["demo_html"], "<!-- START: FIRSTDEMO -->") !== false) {
					$demo_parts = explode('<!-- START: FIRSTDEMO -->', $data["demo_html"]);
					$demo_parts = explode('<!-- END: FIRSTDEMO -->', $demo_parts[1]);
					$data["demo_first"] = $demo_parts[0];
				}

				$use_link   = '<li><a href="#demo">Demo</a></li>' . $use_link;
				$demo_link .= '<h2><a name="demo"></a> Demo</h2>';
				$demo_link .= '<p>Demos are largely unstyled to give developers a better idea of how the plugin can drop into a new or existing project.</p>';

				if ($data["demo_first"]) {
					$demo_link .= '<div class="demo_content clear">';
					$demo_link .= $data["demo_first"];
					$demo_link .= '</div>';
					$demo_link .= '<a href="' . $data["link"] . 'demo/" class="button" target="_blank">View All Demos</a>';
				} else {
					$demo_link .= '<a href="' . $data["link"] . 'demo/" class="button" target="_blank">View Demo</a>';
				}
			}

			$demo_link .= $ad_block;

			$search = array(
				'<!-- NAV START -->',
				'<li><a href="#use">Use</a></li>',
				'<!-- NAV END -->',
				'<!-- DEMO BUTTON -->'
			);
			$replace = array(
				'<!-- NAV START -->' . $nav_start,
				$use_link,
				$nav_end . '<!-- NAV END -->',
				$demo_link
			);

			$parts = explode('<!-- HEADER END -->', str_ireplace($search, $replace, $data["document"]));
			$parts_2 = explode('<!-- NAV END -->', $parts[1]);

			$data["header"]  = $parts[0];
			$data["nav"]     = $parts_2[0];
			$data["content"] = $parts_2[1];

			return $data;
		}

		public function parseMarkdown($data) {
			if (!$this->Parsedown) {
				$this->Parsedown = new Parsedown;
			}

			if (is_array($data)) {
				foreach ($data as &$d) {
					if (is_array($d)) {
						$d = $this->parseMarkdown($d);
					} else {
						$d = $this->Parsedown->text($d);
					}
				}
			} else {
				$data = $this->Parsedown->text($data);
			}

			return $data;
		}

		public function cleanRoots($data) {
			if (is_array($data)) {
				foreach ($data as &$d) {
					if (is_array($d)) {
						$d = $this->cleanRoots($d);
					} else {
						$d = BigTreeCMS::replaceHardRoots($d);
					}
				}
			} else {
				$data = BigTreeCMS::replaceHardRoots($data);
			}

			return $data;
		}

		public function expandRoots($data) {
			if (is_array($data)) {
				foreach ($data as &$d) {
					if (is_array($d)) {
						$d = $this->expandRoots($d);
					} else {
						$d = BigTreeCMS::replaceRelativeRoots($d);
					}
				}
			} else {
				$data = BigTreeCMS::replaceRelativeRoots($data);
			}

			return $data;
		}

		public function clearCache() {
			BigTreeCMS::cacheDelete($this->CacheID, $this->CacheKey);
		}
	}