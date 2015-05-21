<?php
	// Specific
	$view_path = 'views/home.php';

	// Always there
	require "db/connect.php";
	require "db/functions.php";
	include "views/layout.php";

	// Specific
	include "db/add-post.php";
?>