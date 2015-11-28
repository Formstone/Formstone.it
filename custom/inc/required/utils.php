<?

	// Utilities

	class Utils {
		public static function jsonAttribute($data) {
			if (is_array($data)) {
				$data = json_encode($data);
			}
			return htmlspecialchars($data);
		}

		public static function formatDate($date) {
			return date(DATE_FORMAT, strtotime($date));
		}

		public static function formatDateURL($date) {
			return date(DATE_FORMAT_URL, strtotime($date));
		}

		public static function formatTime($time) {
			return date(TIME_FORMAT, strtotime($time));
		}

		public static function formatDateTime($start, $end = false) {
			$format = "Y-m-d\TH:i:sO";
			$return = date($format, strtotime($start));
			if ($end) {
				$return .= date($format, strtotime($start));
			}
			return $return;
		}

		public static function isExternalLink($url) {
			$find = array("http://", "https://");
			$replace = array("", "");
			$check = str_ireplace($find, $replace, $url);
			$www = str_ireplace($find, $replace, WWW_ROOT);

			return ((substr($url,0,7) === "http://" || substr($url,0,8) === "https://") && strpos($check, $www) === false);
		}

		public static function ticketButton($url) {
			if (strpos($url, "tickets.architecture.org") > -1) {
				return ' js-lightbox';
			} else {
				return Utils::isExternalLink($url) ? '" target="_blank' : '';
			}
		}

		public static function targetBlank($url, $force = false) {
			return ($force || Utils::isExternalLink($url)) ? ' target="_blank"' : '';
		}

		public static function buttonTitle($text) {
			return $text !== "" ? $text : "Learn More";
		}

		public static function getFirstPP($html) {
			$start = strpos($html, '<p');
			$end = strpos($html, '</p>', $start);
			$html = substr($html, $start, ($end - $start + 4));
			return $html;
		}

		public static function splitFirstPP($html) {
			$parts = explode("</p>", $html, 2);
			$first = $parts[0] . "</p>";
			$rest = $parts[1];
			return array($first, $rest);
		}

		public static function removeEmptyPP($html) {
			return preg_replace("/<p[^>]*>[\s|&nbsp;]*<\/p>/", '', $html);
		}

		public static function getGalleryCount() {
			global $bigtree;

			return $bigtree["caf"]["gallery_count"]++;
		}

		public static function videoLink($media) {
			return (($media["video_type"] === "youtube") ? "//www.youtube.com/embed/" : "//player.vimeo.com/video/") . $media["video"];
		}

		public static function outputASAP($data) {
			global $cms;

			foreach ($data as &$d) {
				if (!is_array($d)) {
					$d = $cms->secureContent($d);
				}
			}

			header("Content-Type: application/json");
			die(json_encode($data));
		}

		public static function joinGetParams($options, $page = false, $entities = true) {
			if ($page) {
				$options["page"] = $page;
			}

			if ($entities) {
				return htmlentities(http_build_query($options));
			} else {
				return http_build_query($options);
			}
		}

		public static function activePage($current, $url) {
			$find    = array("http://", "https://");
			$replace = array("", "");

			$current = str_ireplace($find, $replace, $current);
			$url	 = str_ireplace($find, $replace, $url);

			return (strpos($current, $url) > -1);
		}

		public static function allowTags($text) {
			// allow certain tags
			$find = array(
				"&lt;sup&gt;",
				"&lt;/sup&gt;",
				"&lt;i&gt;",
				"&lt;/i&gt;",
				"&lt;em&gt;",
				"&lt;/em&gt;",
				"&lt;b&gt;",
				"&lt;/b&gt;",
				"&lt;strong&gt;",
				"&lt;/strong&gt;"
			);
			$replace = array(
				"<sup>",
				"</sup>",
				"<i>",
				"</i>",
				"<em>",
				"</em>",
				"<b>",
				"</b>",
				"<strong>",
				"</strong>"
			);

			return str_ireplace($find, $replace, $text);
		}

		public static function time2str($ts) {
			if (!ctype_digit($ts)) {
				$ts = strtotime($ts);
			}
			$diff = time() - $ts;
			$day_diff = floor($diff / 86400);

			if ($day_diff == 0) {
				if ($diff < 60)         $return = '1 m';
				else if ($diff < 120)   $return = '1 m';
				else if ($diff < 3600)  $return = floor($diff / 60) . ' m';
				else if ($diff < 7200)  $return = '1 h';
				else                    $return = floor($diff / 3600) . ' h';
			} else {
				if ($day_diff == 1)     $return = '1 d';
				else if ($day_diff < 7) $return = $day_diff . ' d';
				else                    $return = ceil($day_diff / 7) . ' w';
			}

			return explode(" ", $return);
		}
	}

?>