<?php
	if (isset($bigtree["commands"][0])) {
		include "../templates/routed/components/_detail.php";
	} else {
?>
<ul>
	<?php
		foreach ($formstone->Navigation as $set) {
	?>
	<li>
		<h4><?=$set["name"]?></h4>
		<ul>
			<?php
				foreach ($set["children"] as $child) {
			?>
			<li>
				<a href="<?=$child["link"]?>"><?=$child["name"]?></a>
			</li>
			<?php
				}
			?>
		</ul>
	</li>
	<?php
		}
	?>
</ul>
<?php
	}
?>