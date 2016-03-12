<?php
	$component = $formstone->Components[$bigtree["commands"][0]];

	$isDemo = (isset($bigtree["commands"][1]) && $bigtree["commands"][1] == "demo");

	if (!$component || (!$isDemo && isset($bigtree["commands"][1]))) {
		$cms->catch404();
	}

	if ($isDemo && $component["demo_html"]) {
		echo($component["demo_html"]);
		die();
	}

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
			<div class="fs-cell">
				<?=$component["content"]?>
			</div>
		</div>
	</div>
</div>