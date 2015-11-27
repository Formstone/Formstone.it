<?php
	$component = $formstone->Components[$bigtree["commands"][0]];

	if (!$component || isset($bigtree["commands"][1])) {
		$cms->catch404();
	}
?>
<pre>
	<?php print_r($component); ?>
</pre>