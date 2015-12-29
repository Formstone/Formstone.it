<?php
	$navigation_options = array(
		"gravity" => "right",
		"type"    => "reveal"
	);
?>
			<footer id="footer" class="footer" role="contentinfo">
				<div class="fs-row">
					<div class="fs-cell fs-md-half fs-lg-half footer_meta">
						<a href="<?=$formstone->Package["repository"]["url"]?>" class="footer_link icon_link icon-github">GitHub</a>
						<a href="#" class="footer_link icon_link icon-twitter">Twitter</a>
						<p class="footer_copyright">&copy; <?=date("Y")?> <?=$formstone->Package["formstone"]?></p>
					</div>
					<div class="fs-cell fs-md-half fs-lg-half footer_ads">
						<!-- BuySellAds Zone -->
						<div id="bsap_1296027" class="bsarocks bsap_c5d0dbd4698a2fc9419d663ba33e37cb"></div>
						<!-- End BuySellAds Zone -->
					</div>
				</div>
			</footer>
		</div>

		<aside class="navigation js-mobile_navigation" aria-hidden="true" data-navigation-handle=".js-mobile_navigation_handle" data-navigation-content=".js-mobile_navigation_content" data-navigation-options="<?=Utils::jsonAttribute($navigation_options)?>">
			<?php include "../templates/layouts/_navigation.php"; ?>
		</aside>

		<!-- Grid Bookmarklet -->
		<script>
			(function(){if(typeof FSGridBookmarklet==='undefined'){document.body.appendChild(document.createElement('script')).src='http://formstone.it/js/bookmarklet/grid.js';}else{FSGridBookmarklet();}})();
		</script>

	</body>
</html>