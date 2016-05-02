<?php
	if (!$parsedown) {
		$parsedown = new Parsedown;
	}

	if (!$posts_module) {
		$posts_module = new FSPosts;
	}