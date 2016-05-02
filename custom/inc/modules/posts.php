<?
	class FSPosts extends BigTreeModule {
		var $Table = "fs_posts";
		var $PageLink;

		public function __construct() {
			global $cms;

			$this->PageLink = $cms->getLink(7);
		}

		public function get($item) {
			$item = parent::get($item);

			$item["link"] = $this->PageLink . $item["route"] . "/";

			return $item;
		}
	}
?>
