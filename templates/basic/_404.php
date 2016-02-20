<?php
	if (!$formstone) {
		$formstone = new Formstone;
	}
?>
<div class="typography">

	<header class="page_header js-scroll_lock" data-scroll-offset="55">
		<div class="fs-row js-scroll_contents">
			<div class="fs-cell">
				<h1 class="page_heading">404</h1>
				<div class="page_intro">
					<p>The requested page was not found.</p>
				</div>
			</div>
		</div>
	</header>

	<div class="page_content">
		<div class="fs-row">
			<div class="fs-cell">
				<? //$parsedown->text($page_content)?>
			</div>
		</div>
	</div>

</div>