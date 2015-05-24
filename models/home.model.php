<?php

	$db    = new Post($config);

	// On form submit
	if (isset($_POST['add-post'])) {
		$db->add($_POST['title'], $_POST['body']);
		$alert      = $db->message;
		$alertClass = $db->messageClass;
	}

	$posts = $db->fetch("SELECT * FROM posts");


	// $posts = Database::fetch("SELECT * FROM posts", [], $conn);
?>