<?php
	include SERVER_ROOT . "custom/inc/lib/formstone.php";

	$formstone = new Formstone($bigtree["config"]["debug"]);

	$package = json_decode( file_get_contents( SERVER_ROOT . "site/package.json" ), true );

	$local_title = "";
	$is_home = false;
