<?php 
	require 'blog.php';

	if (!$conn) {
		echo "No connection with DB";
	}

	viewModel('single', ['config' => $config]);
?>