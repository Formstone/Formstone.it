<?php
	$post = $posts_module->getByRoute($bigtree["commands"][0]);

	if (!$post || isset($bigtree["commands"][1])) {
		$cms->catch404();
	}

	$local_title = $post["title"];
	$local_image = $post["cover"];
?>
<div class="typography">
	<header class="page_header js-scroll_lock" data-scroll-offset="52">
		<div class="fs-row js-scroll_contents">
			<div class="fs-cell">
				<h1 class="page_heading"><?=$post["title"]?></h1>
				<div class="page_intro">
					<p>
						<?=date("F j, Y", strtotime($post["date"]))?> by Ben Plum
					</p>
				</div>
			</div>
		</div>
	</header>
	<div class="page_content">
		<div class="fs-row">
			<div class="fs-cell fs-xl-11">

				<?=$parsedown->text($post["content"])?>

				<hr>

				<h2>Comments</h2>
				<div id="disqus_thread" class="margined_lg_bottom"></div>
				<script>
				var disqus_config = function () {
					this.page.url = "<?=$post["link"]?>";
					this.page.identifier = "post-<?=$post["id"]?>";
				};
				(function() {
					var d = document, s = d.createElement('script');
					s.src = '//formstone.disqus.com/embed.js';
					s.setAttribute('data-timestamp', +new Date());
					(d.head || d.body).appendChild(s);
				})();
				</script>
			</div>
		</div>
	</div>
</div>