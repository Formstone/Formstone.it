<?php
	if (isset($page_callouts) && array_filter($page_callouts)) {
		foreach ($page_callouts as $callout) {
			include "../templates/callouts/" . $callout["type"] . ".php";
		}
	}