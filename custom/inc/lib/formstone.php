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
				$this->Changelog  = $cache["changelog"];
			} else {
				$this->Package   = json_decode(file_get_contents(SERVER_ROOT . "site/formstone/package.json"), true);

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

			$data["demo_html"] = str_ireplace(array("../"), array(WWW_ROOT . "demo/"), file_get_contents(SERVER_ROOT . "site/formstone/demo/components/" . $route . ".html"));

			if (strpos(strtolower($data["demo_html"]), "no demo") !== false) {
				$data["demo_html"] = false;
			}

			if ($data["demo_html"]) {
				$use_link   = '<li><a href="#demo">Demo</a></li>' . $use_link;
				$demo_link .= '<h2><a name="demo"></a> Demo</h2>';
				$demo_link .= '<p>Demos are largely unstyled to give developers a better idea of how the plugin can drop into a new or existing project.</p>';

				// $demo_link .= '<a href="' . WWW_ROOT . 'site/formstone/demo/components/' . $route . '.html" class="button" target="_blank">View Demo</a>';
				$demo_link .= '<a href="' . $data["link"] . 'demo/" class="button" target="_blank">View Demo</a>';
				// $demo_link .= $data["demo"];


			}

			$search = array(
				'<!-- NAV START -->',
				'<li><a href="#use">Use</a></li>',
				'<!-- NAV END -->',
				'<!-- DEMO BUTTON -->'
			);
			$replace = array(
				$nav_start,
				$use_link,
				$nav_end,
				$demo_link
			);

			$parts = explode('<!-- HEADER END -->', str_ireplace($search, $replace, $data["document"]));

			$data["header"]  = $parts[0];
			$data["content"] = $parts[1];

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