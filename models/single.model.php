<?php 
	$id   = htmlspecialchars($_GET['id']);
	$blog = Database::query("SELECT * FROM posts WHERE ID = :id LIMIT 1", ["id" => $id], $conn)[0];

	// Redirect to 404 page if article doesn't exist
	if (!$blog) {
		Header("Location: views/404.view.php");
	}
?>