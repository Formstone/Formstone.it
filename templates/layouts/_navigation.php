<?php
	foreach ($formstone->Navigation as $set) {
?>
<div class="nav_set">
	<h4 class="nav_heading"><?=$set["name"]?></h4>
	<div class="nav_children">
		<?php
			foreach ($set["children"] as $child) {
		?>
		<a class="nav_link" href="<?=$child["link"]?>"><?=$child["name"]?></a>
		<?php
			}
		?>
	</div>
</div>
<?php
	}
?>