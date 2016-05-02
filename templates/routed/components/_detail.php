<?php
	$component = $formstone->Components[$bigtree["commands"][0]];

	$isDemo = (isset($bigtree["commands"][1]) && $bigtree["commands"][1] == "demo");

	if (!$component || (!$isDemo && isset($bigtree["commands"][1]))) {
		$cms->catch404();
	}

	if ($isDemo && $component["demo_html"]) {
		$js_header = file_get_contents(SERVER_ROOT . "templates/layouts/partials/js-header.php");
		$js_footer = file_get_contents(SERVER_ROOT . "templates/layouts/partials/js-footer.php");

		$output = $component["demo_html"];
		$output = str_ireplace("<!-- JSHEADER -->", $js_header, $output);
		$output = str_ireplace("<!-- JSFOOTER -->", $js_footer.'<br clear="both">', $output);

		$bigtree["layout"] = "empty";
		echo $output;
	} else {

		$local_title = strip_tags($component["name"]);
?>
<div class="typography">
	<header class="page_header js-scroll_lock" data-scroll-offset="52">
		<div class="fs-row js-scroll_contents">
			<div class="fs-cell">
				<h1 class="page_heading"><?=strip_tags($component["name"])?></h1>
				<div class="page_intro">
					<?=$component["description"]?>
				</div>
			</div>
		</div>
	</header>
	<div class="page_content">
		<div class="fs-row">
			<div class="fs-cell fs-xl-11">
				<?=$component["content"]?>
			</div>
		</div>
	</div>
</div>
<?php
	}
?>