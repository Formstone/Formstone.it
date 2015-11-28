<?php

	include SERVER_ROOT . "custom/inc/lib/parsedown/Parsedown.php";

	class Formstone {
		var $CacheID  = "formstone.it";
		var $CacheKey = "data";
		var $CacheAge = 604800;
		var $PageLink = "";

		var $Navigation = array();
		var $Components = array();

		var $Parsedown;

		var $Debug = false;

		public function __construct() {
			global $cms;

			$this->PageLink = $cms->getLink(1);

			$cache = $this->expandRoots(BigTreeCMS::cacheGet($this->CacheID, $this->CacheKey, $this->CacheAge));

			if (!$this->Debug && array_filter((array)$cache)) {
				$this->Navigation = $cache["navigation"];
				$this->Components = $cache["components"];
			} else {
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
					"components" => $this->Components
				));

				BigTreeCMS::cachePut($this->CacheID, $this->CacheKey, $cache);
			}
		}

		public function buildPage($route) {
			$data = $this->parseMarkdown(json_decode(file_get_contents(SERVER_ROOT . "site/formstone/docs/json/" . $route . ".json"), true));
			$data["link"] = $this->PageLink . $route . "/";

			$nav_start = '<nav class="section_nav">';
			$nav_end   = '</nav>';
			$use_link  = '<li><a href="#use">Use</a></li>';
			$demo_link = '';

			if ($child["demo"]) {
				$use_link   = '<li><a href="#demo">Demo</a></li>' . $use_link;
				$demo_link .= '<h2><a name="demo"></a> Demo</h2>';
				$demo_link .= '<a href="' . $data["link"] . 'demo/">View Demo</a>';
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
	}

?>