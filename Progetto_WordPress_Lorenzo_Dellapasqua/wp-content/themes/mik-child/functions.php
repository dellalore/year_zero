<?php
	//connetto theme -> theme-child
	add_action('wp_enqueue_scripts', 'connectChildBlossomTravel');
	function connectChildBlossomTravel(){
	wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
	}
?>