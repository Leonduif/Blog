<?php 
	require 'blog.php';

	if (!$conn) {
		echo "No connection with DB";
	}

	view('single', ['conn' => $conn]);
?>