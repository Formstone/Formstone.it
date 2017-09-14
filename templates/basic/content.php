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
					<? // $component["description"] ?>
				</div>
			</div>
		</div>
	</header>
	<div class="page_content js-friends_container">
		<div class="fs-row page_row">
			<div class="fs-cell fs-lg-9 fs-xl-10">
				<?php
					$content = $parsedown->text($page_content);
					$parts = Utils::splitFirstPP($content);

					echo $parts[0];
					include "../templates/layouts/partials/ads.php";
					echo $parts[1];
				?>
			</div>
		</div>
		<?php include "../templates/layouts/partials/callouts.php"; ?>
	</div>
</div>
