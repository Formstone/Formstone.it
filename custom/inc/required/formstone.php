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

		public function __construct() {
			global $cms;

			$this->PageLink = $cms->getLink(1);

			$cache = $this->expand(BigTreeCMS::cacheGet($this->CacheID, $this->CacheKey, $this->CacheAge));

			if (array_filter((array)$cache)) {
				$this->Navigation = $cache["navigation"];
				$this->Components = $cache["components"];
			} else {
				$file = file_get_contents(SERVER_ROOT . "site/formstone/docs/json/index.json");
				$contents = json_decode(file_get_contents(SERVER_ROOT . "site/formstone/docs/json/index.json"), true);

				foreach ($contents as $set) {
					$children = array();

					foreach ($set["components"] as $component) {
						$route = str_ireplace("-", "", $cms->urlify($component["name"]));
						$child = array(
							"title" => $component["name"],
							"link"  => $this->PageLink . $route . "/"
						);
						$data = json_decode(file_get_contents(SERVER_ROOT . "site/formstone/docs/json/" . $route . ".json"), true);

						$data = $this->parse($data);

						$children[] = $child;
						$this->Components[$route] = $data;
					}

					$this->Navigation[] = array(
						"name"     => $set["name"],
						"children" => $children
					);
				}

				$cache = $this->clean(array(
					"navigation" => $this->Navigation,
					"components" => $this->Components
				));

				BigTreeCMS::cachePut($this->CacheID, $this->CacheKey, $cache);
			}
		}

		public function parse($data) {
			if (!$this->Parsedown) {
				$this->Parsedown = new Parsedown;
			}

			if (is_array($data)) {
				foreach ($data as &$d) {
					if (is_array($d)) {
						$d = $this->parse($d);
					} else {
						$d = $this->Parsedown->text($d);
					}
				}
			}

			return $data;
		}

		public function clean($data) {
			if (is_array($data)) {
				foreach ($data as &$d) {
					if (is_array($d)) {
						$d = $this->clean($d);
					} else {
						$d = BigTreeCMS::replaceHardRoots($d);
					}
				}
			}

			return $data;
		}

		public function expand($data) {
			if (is_array($data)) {
				foreach ($data as &$d) {
					if (is_array($d)) {
						$d = $this->expand($d);
					} else {
						$d = BigTreeCMS::replaceRelativeRoots($d);
					}
				}
			}

			return $data;
		}
	}

?>