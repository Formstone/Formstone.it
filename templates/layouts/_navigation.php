<?php
	$current_url = BigTree::currentURL();

	$i = 0;
	foreach ($formstone->Navigation as $set) {
		$i++;
		$open = false;

		ob_start();

		foreach ($set["children"] as $child) {
			$class = '';
			if ($current_url == $child["link"]) {
				$class = ' nav_link_active';
				$open = true;
			}
			?>
			<a class="nav_link<?=$class?>" href="<?=$child["link"]?>"><?=$child["name"]?></a>
			<?php
		}

		$children = ob_get_clean();
		$attr = '';
		$class = '';

		if ($open) {
			$attr = ' data-swap-active="true"';
			$class = ' fs-swap-active';
		}
?>
<div class="nav_set js-nav_set_<?=$i?><?=$class?>">
	<h4 class="nav_heading js-swap<?=$class?>" data-swap-target=".js-nav_set_<?=$i?>"<?=$attr?>><?=$set["name"]?></h4>
	<div class="nav_children">
		<?=$children?>
	</div>
</div>
<?php
	}