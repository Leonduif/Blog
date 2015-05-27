<?php
	// Home controller
	require 'blog.php';
	model(['post']);

	if (!$conn) {
		echo "No connection with DB";
	}

	$alert      = '';
	$alertClass = '';

	// On form submit
	if (isset($_POST['add-post']) && isset($_POST['title']) && isset($_POST['body'])) {
		echo "form submitted";
		$db = new Post($conn);

		$db->add($_POST['title'], $_POST['body']);

		$alert      = $db->message;
		$alertClass = $db->messageClass;
	}

	$posts = Database::fetch("SELECT * FROM posts ORDER BY id DESC", [], $conn);

	view('home', ['alert' => $alert,
				  'alertClass' => $alertClass,
				  'posts' => $posts]);
?>