<?php
	include SERVER_ROOT . "custom/inc/lib/formstone.php";

	$formstone = new Formstone;

	$package = json_decode( file_get_contents( SERVER_ROOT . "site/package.json" ), true );

	$local_title = "";
	$is_home = false;