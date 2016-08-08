<?php
	$description  = "A Collection of Modular Front End Components.";

	$social_image = WWW_ROOT . "images/social.jpg";

	if ($local_image) {
		$social_image = $local_image;
	}

	$site_title = $formstone->Package["realname"];
	$page_title = array();

	if ($local_title) {
		$page_title[] = $local_title;
	} else if ($page["title"] && !$is_home) {
		$page_title[] = $page["title"];
	}

	if (!$is_home) {
		$description = $site_title . " &middot; " . $description;
	}

	if ($local_description) {
		$description = $local_description;
	}

	$page_title[] = $site_title;

?><!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">

		<!-- Page Attributes -->
		<title><?=implode(" &middot; ", $page_title)?></title>
		<meta name="description" content="<?=$description?>">

		<!-- Favions / Touch Icons -->
		<link rel="apple-touch-icon" sizes="57x57" href="<?=WWW_ROOT?>images/favicons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?=WWW_ROOT?>images/favicons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?=WWW_ROOT?>images/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?=WWW_ROOT?>images/favicons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?=WWW_ROOT?>images/favicons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?=WWW_ROOT?>images/favicons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?=WWW_ROOT?>images/favicons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?=WWW_ROOT?>images/favicons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?=WWW_ROOT?>images/favicons/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="<?=WWW_ROOT?>images/favicons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="<?=WWW_ROOT?>images/favicons/android-chrome-192x192.png" sizes="192x192">
		<link rel="icon" type="image/png" href="<?=WWW_ROOT?>images/favicons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="<?=WWW_ROOT?>images/favicons/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="<?=WWW_ROOT?>images/favicons/manifest.json">
		<link rel="mask-icon" href="<?=WWW_ROOT?>images/favicons/safari-pinned-tab.svg" color="#00bcd4">
		<link rel="shortcut icon" href="<?=WWW_ROOT?>images/favicons/favicon.ico">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="msapplication-TileImage" content="<?=WWW_ROOT?>images/favicons/mstile-144x144.png">
		<meta name="msapplication-config" content="<?=WWW_ROOT?>images/favicons/browserconfig.xml">
		<meta name="theme-color" content="#455a64">

		<!-- G+ & Facebook -->
		<meta property="og:title" content="<?=$page_title[0]?>">
		<meta property="og:url" content="<?=BigTree::currentURL()?>">
		<meta property="og:type" content="website">
		<meta property="og:image" content="<?=$social_image?>">
		<meta property="og:description" content="<?=$description?>">
		<meta property="og:site_name" content="<?=$site_title?>">

		<!-- Twitter -->
		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="@formstoneit">
		<meta name="twitter:creator" content="@formstoneit">
		<meta name="twitter:url" content="<?=WWW_ROOT?>">
		<meta name="twitter:title" content="<?=$page_title[0]?>">
		<meta name="twitter:description" content="<?=$description?>">
		<meta name="twitter:image" content="<?=$social_image?>">

		<!-- Modernizer -->
		<script src="<?=WWW_ROOT?>js/modernizr.js?v=<?=$package["version"]?>"></script>

		<!-- Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:Fira+Mono">

		<!--[if gt IE 8]><!-->
			<link rel="stylesheet" href="<?=WWW_ROOT?>formstone/demo/css/demo.css?v=<?=$package["version"]?>">
			<link rel="stylesheet" href="<?=WWW_ROOT?>css/site.css?v=<?=$package["version"]?>">

			<script src="<?=WWW_ROOT?>js/site.js?v=<?=$package["version"]?>"></script>
			<script src="<?=WWW_ROOT?>formstone/demo/js/demo.js?v=<?=$package["version"]?>"></script>
			<script src="<?=WWW_ROOT?>js/site-prism.js?v=<?=$package["version"]?>"></script>
		<!--<![endif]-->

		<!--[if IE 8]>
			<script>var IE8 = true;</script>
			<script src="<?=WWW_ROOT?>js/site-ie8.js?v=<?=$package["version"]?>"></script>
			<link rel="stylesheet" href="<?=WWW_ROOT?>css/site-ie8.css?v=<?=$package["version"]?>">
		<![endif]-->
		<!--[if IE 9]>
			<script>var IE9 = true;</script>
			<script src="<?=WWW_ROOT?>js/site-ie9.js?v=<?=$package["version"]?>"></script>
			<link rel="stylesheet" href="<?=WWW_ROOT?>css/site-ie9.css?v=<?=$package["version"]?>">
		<![endif]-->
		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?=WWW_ROOT?>css/site-ie.css?v=<?=$package["version"]?>">
		<![endif]-->
	</head>
	<body class="fs-grid fs-grid-fluid">

		<?php include "../templates/layouts/partials/js-header.php"; ?>

		<a href="#page" id="skip_to_content" class="offscreen">Skip to Main Content</a>

		<div class="page_wrapper js-mobile_navigation_content">

			<header class="header">
				<div class="fs-row">
					<div class="fs-cell">
						<?php include "../templates/layouts/_branding.php"; ?>
						<span class="header_handle js-mobile_navigation_handle icon-menu">Menu</span>
					</div>
				</div>
			</header>