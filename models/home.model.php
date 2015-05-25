<?php
	$db = new Post($conn);

	// On form submit
	if (isset($_POST['add-post'])) {
		$db->add($_POST['title'], $_POST['body']);
		$alert      = $db->message;
		$alertClass = $db->messageClass;
	}

	$posts = Database::fetch("SELECT * FROM posts ORDER BY id DESC", [], $conn);
?>