<?php
	$navigation_options = array(
		"gravity" => "right",
		"type"    => "reveal"
	);
?>
			<footer id="footer" class="footer" role="contentinfo">
				Content!
			</footer>
		</div>

		<aside class="mobile_navigation js-mobile_navigation" aria-hidden="true" data-navigation-handle=".js-mobile_navigation_handle" data-navigation-content=".js-mobile_navigation_content" data-navigation-options="<?=Utils::jsonAttribute($navigation_options)?>">
			<?php include "../templates/layouts/_navigation.php"; ?>
		</aside>

		<!-- Grid Bookmarklet -->
		<script>
			(function(){if(typeof FSGridBookmarklet==='undefined'){document.body.appendChild(document.createElement('script')).src='http://formstone.it/js/bookmarklet/grid.js';}else{FSGridBookmarklet();}})();
		</script>

	</body>
</html>