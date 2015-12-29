<?php
	if (isset($bigtree["commands"][0])) {
		include "../templates/routed/components/_detail.php";
	} else {
		BigTree::redirect(WWW_ROOT . "components/core/");
	}