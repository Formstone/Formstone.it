<?php
	$posts = $posts_module->getRecent(5);

	if (isset($bigtree["commands"][0])) {
		include "../templates/routed/posts/_detail.php";
	} else {
		$local_title = $page_header;
?>
<div class="typography">
	<header class="page_header js-scroll_lock" data-scroll-offset="52">
		<div class="fs-row js-scroll_contents">
			<div class="fs-cell">
				<h1 class="page_heading"><?=$page_header?></h1>
				<div class="page_intro">
					Blog time!
				</div>
			</div>
		</div>
	</header>
	<div class="page_content">
		<div class="fs-row">
			<div class="fs-cell fs-xl-11">
				<?php
					foreach ($posts as $post) {
				?>
				<div class="post_listing">
					<h2 class="post_heading">
						<a href="<?=$post["link"]?>"><?=$post["title"]?></a>
					</h2>
					<time class="post_date"><?=date("F j, Y", strtotime($post["date"]))?></time>
					<p class="post_intro"><?=$post["intro"]?></p>
				</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>
</div>
<?php
	}