<?php
	$post = $posts_module->getByRoute($bigtree["commands"][0]);

	if (!$post || isset($bigtree["commands"][1])) {
		$cms->catch404();
	}

	$local_title = $post["title"];
?>
<div class="typography">
	<header class="page_header js-scroll_lock" data-scroll-offset="52">
		<div class="fs-row js-scroll_contents">
			<div class="fs-cell">
				<h1 class="page_heading"><?=$post["title"]?></h1>
				<div class="page_intro">
					<time class="post_date"><?=date("F j, Y", strtotime($post["date"]))?></time>
				</div>
			</div>
		</div>
	</header>
	<div class="page_content">
		<div class="fs-row">
			<div class="fs-cell fs-xl-11">
				<?=$parsedown->text($post["content"])?>
			</div>
		</div>
	</div>
</div>