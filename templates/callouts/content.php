<?php
	if (!$parsedown) {
		$parsedown = new Parsedown;
	}
?>
<div class="fs-row">
	<div class="fs-cell">
		<?=$parsedown->text($callout["content"])?>
	</div>
</div>