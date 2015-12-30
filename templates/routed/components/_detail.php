<?php
	$component = $formstone->Components[$bigtree["commands"][0]];

	$isDemo = (isset($bigtree["commands"][1]) && $bigtree["commands"][1] == "demo");

	if (!$component || (!$isDemo && isset($bigtree["commands"][1]))) {
		$cms->catch404();
	}
?>
<div class="typography">

	<header class="page_header js-scroll_lock" data-scroll-offset="55">
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
			<?php
				if ($isDemo) {
			?>
			<div class="fs-cell">
				<div class="section_nav">
					<ul>
						<li>
							<a href="<?=$component["link"]?>">Back to Documentation</a>
						</li>
					</ul>
				</div>
				<h2>Demo</h2>
				<?=$component["demo"]?>
			</div>
			<?php
				} else {
			?>
			<div class="fs-cell">
				<?=$component["content"]?>
			</div>
			<?php
				}
			?>
		</div>
	</div>

</div>