<?php
	require 'blog.php';

	if (!$conn) {
		echo "No connection with DB";
	}

	view('home', ['conn' => $conn]);
?>