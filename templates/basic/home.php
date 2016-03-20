<?php
	$is_home = true;

	if (!$parsedown) {
		$parsedown = new Parsedown;
	}
?>
<div class="typography home">
	<header class="page_header js-scroll_lock" data-scroll-offset="52">
		<div class="fs-row js-scroll_contents">
			<div class="fs-cell">
				<h1 class="page_heading home_heading">Formstone <span>is a collection<br>of front end components.</span></h1>
			</div>
		</div>
	</header>
	<div class="page_content">
		<div class="fs-row">
			<div class="fs-cell page_intro">
				<div class="fs-row">
					<div class="fs-cell fs-xl-11">
						<?=$parsedown->text($page_content)?>
					</div>
				</div>
			</div>
		</div>

		<div class="fs-row">
			<div class="fs-cell fs-md-half fs-lg-half home_feature">
				<h2 class="icon_heading icon-extension">Modular</h2>
				<p>Components are name-spaced for minimal overlap with your existing styles and scripts.</p>
			</div>
			<div class="fs-cell fs-md-half fs-lg-half home_feature">
				<h2 class="icon_heading icon-devices">Responsive</h2>
				<p>Components are designed mobile-first to ensure fast, usable interfaces, no matter the screen size.</p>
			</div>
			<div class="fs-cell fs-md-half fs-lg-half home_feature clear">
				<h2 class="icon_heading icon-palette">Customizable</h2>
				<p>Bundled themes work out of the box while custom themes can be styled to match the look and feel of any project.</p>
			</div>
			<div class="fs-cell fs-md-half fs-lg-half home_feature">
				<h2 class="icon_heading icon-settings">Automated</h2>
				<p>Compiled with Grunt to ensure code quality and deployable with Bower to maintain simple implementation.</p>
			</div>
		</div>

		<div class="fs-row">
			<div class="fs-cell features">
				<header class="features_header">
					<h3 class="features_heading">Explore Formstone</h3>
				</header>
				<ul class="features_list">
					<?php
						foreach ($formstone->Navigation as $set) {
							foreach ($set["children"] as $child) {
					?>
					<li>
						<a class="" href="<?=$child["link"]?>"><?=$child["name"]?></a>
					</li>
					<?php
							}
						}
					?>
				</ul>
			</div>
		</div>

		<?php include "../templates/layouts/partials/callouts.php"; ?>
	</div>
</div>