<?php 
	// Single post controller
	require 'blog.php';

	if (!$conn) {
		echo "No connection with DB";
	}

	$id   = htmlspecialchars($_GET['id']);
	$blog = Database::fetch("SELECT * FROM posts WHERE ID = :id LIMIT 1", ["id" => $id], $conn)[0];

	// Redirect to 404 page if article doesn't exist
	if (!$blog) {
		Header("Location: views/404.view.php");
	}

	view('single', ['conn' => $conn,
					'blog' => $blog]);
?>