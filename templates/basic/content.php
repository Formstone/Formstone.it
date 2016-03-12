<?php
	if (!$parsedown) {
		$parsedown = new Parsedown;
	}
?>
<div class="typography">
	<header class="page_header js-scroll_lock" data-scroll-offset="52">
		<div class="fs-row js-scroll_contents">
			<div class="fs-cell">
				<h1 class="page_heading"><?=$page_header?></h1>
				<div class="page_intro">
					<?=$component["description"]?>
				</div>
			</div>
		</div>
	</header>
	<div class="page_content">
		<div class="fs-row">
			<div class="fs-cell">
				<?=$parsedown->text($page_content)?>
			</div>
		</div>
		<?php include "../templates/layouts/partials/callouts.php"; ?>
	</div>
</div>