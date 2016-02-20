<?
	class FSComponents extends BigTreeModule {
		var $Table = "";

		public function getSitemap($page) {
			global $formstone;

			if (!$formstone) {
				$formstone = new Formstone;
			}

			$sitemap = array();

			foreach ($formstone->Navigation as $group) {
				foreach ($group["children"] as $child) {
					$sitemap[] = array(
						"link" => $child["link"]
					);
				}
			}

			return $sitemap;
		}
	}