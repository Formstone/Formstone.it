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
					<p>Tutorials, updates, and more.</p>
				</div>
			</div>
		</div>
	</header>
	<div class="page_content">
		<div class="fs-row page_row">
			<div class="fs-cell fs-lg-9 fs-xl-10">

				<?php
					$i = 0;
					foreach ($posts as $post) {
						$i++;
						if ($i == 2) {
							echo '<div class="blog_landing_friends">';
							include "../templates/layouts/partials/ads.php";
							echo '</div>';
						}
				?>
				<div class="post_listing">
					<div class="post_image responsive_image">
						<img src="<?=$post["cover"]?>" alt="">
					</div>
					<div class="post_wrapper">
						<h2 class="post_heading">
							<a href="<?=$post["link"]?>"><?=$post["title"]?></a>
						</h2>
						<span class="post_meta">
							<time><?=date("F j, Y", strtotime($post["date"]))?></time>
						</span>
						<p class="post_intro"><?=$post["intro"]?></p>
						<a href="<?=$post["link"]?>" class="button button_small">Read More</a>
					</div>
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