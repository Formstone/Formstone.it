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