<?php
	// if ($_SESSION["bigtree_admin"]["id"] && $_COOKIE["bigtree_admin"]["email"]) {
?>
<section class="pricing fs-row js-equalize" data-equalize-options='{"target":".js-equalize_child","minWidth":"500px"}'>
	<header class="fs-cell pricing_header <?php if ($callout["home"] != "on") echo "visually_hide"; ?>">
		<h2 class="pricing_heading">License Formstone</h2>
	</header>
	<article class="fs-cell fs-xs-full fs-sm-half fs-md-half fs-lg-half pricing_item">
		<header class="pricing_item_header">
			<h3 class="pricing_item_heading">Single</h3>
		</header>
		<div class="pricing_item_content">
			<div class="pricing_item_features contain js-equalize_child">
				<ul>
					<li><strong>Commercial use allowed</strong></li>
					<li><strong>Limited to 1 project</strong></li>
					<li>Future updates</li>
				</ul>
			</div>
			<p class="pricing_item_price">$50</p>
			<a href="http://www.site.uplabs.com/posts/formstone" class="button pricing_button" target="_blank">Purchase Single</a>
		</div>
	</article>
	<article class="fs-cell fs-xs-full fs-sm-half fs-md-half fs-lg-half pricing_item pricing_item_promoted">
		<header class="pricing_item_header">
			<h3 class="pricing_item_heading">Extended</h3>
		</header>
		<div class="pricing_item_content">
			<div class="pricing_item_features contain js-equalize_child">
				<ul>
					<li><strong>Commercial use allowed</strong></li>
					<li><strong>Unlimited projects</strong></li>
					<li><strong>Perfect for teams and agencies</strong></li>
					<li>Future updates</li>
				</ul>
			</div>
			<p class="pricing_item_price">$200</p>
			<a href="http://www.site.uplabs.com/posts/formstone" class="button pricing_button" target="_blank">Purchase Extended</a>
		</div>
	</article>
	<footer class="fs-cell pricing_footer">
		<?php if ($callout["home"] == "on") { ?>
		<p>
			Formstone is licensed under the GNU GPL v3 for all open source applications. A commercial license is required for all commercial applications. Read more about <a href="<?=WWW_ROOT?>license/">Formstone's license</a>.
		</p>
		<?php } ?>
	</footer>
</section>
<?php
	// }