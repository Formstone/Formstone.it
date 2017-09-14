<?php
	if (!$formstone) {
		$formstone = new Formstone;
	}
?>
<div class="typography">
	<header class="page_header js-scroll_lock" data-scroll-offset="55">
		<div class="fs-row js-scroll_contents">
			<div class="fs-cell">
				<h1 class="page_heading">404 Error</h1>
			</div>
		</div>
	</header>
	<div class="page_content js-friends_container">
		<div class="fs-row page_row">
			<div class="fs-cell fs-lg-9 fs-xl-10">
				<p>The requested page was not found.</p>

				<?php include "../templates/layouts/partials/ads.php"; ?>

				<?php include "../templates/layouts/partials/features.php"; ?>
			</div>
		</div>
	</div>
</div>
