<?php
	$component = $formstone->Components[$bigtree["commands"][0]];

	$isDemo = (isset($bigtree["commands"][1]) && $bigtree["commands"][1] == "demo");

	if (!$component || (!$isDemo && isset($bigtree["commands"][1]))) {
		$cms->catch404();
	}
?>
<header class="page_header">
	<div class="fs-row">
		<div class="fs-cell fs-lg-3">
			<h1 class="page_heading"><?=strip_tags($component["name"])?></h1>
		</div>
		<div class="fs-cell-right fs-lg-9">
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
		<div class="fs-cell-centered fs-lg-9 typography">
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
		<aside class="fs-cell fs-sm-hide fs-md-hide fs-lg-2">
			<?php include "../templates/layouts/_navigation.php"; ?>
		</aside>
		<div class="fs-cell-right fs-lg-9 typography">
			<?=$component["content"]?>
		</div>
		<?php
			}
		?>
	</div>
</div>