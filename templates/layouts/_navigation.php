<?php
	$current_url = BigTree::currentURL();

	$i = 0;
	foreach ($formstone->Navigation as $set) {
		$i++;
?>
<div class="nav_set js-nav_set_<?=$i?>">
	<h4 class="nav_heading js-swap" data-swap-target=".js-nav_set_<?=$i?>"><?=$set["name"]?></h4>
	<div class="nav_children">
		<?php
			foreach ($set["children"] as $child) {
				$class = '';
				if ($current_url == $child["link"]) {
					$class = ' nav_link_active';
				}
		?>
		<a class="nav_link<?=$class?>" href="<?=$child["link"]?>"><?=$child["name"]?></a>
		<?php
			}
		?>
	</div>
</div>
<?php
	}