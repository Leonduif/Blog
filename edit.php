<?php 
	require 'blog.php';

	model(['post']);
	$id = $_GET['id'];

	$post = Database::fetch("SELECT * FROM posts WHERE id = :id", ['id' => $id], $conn)[0];

	// On form submit
	if (isset($_POST['edit-post']) && isset($_POST['title']) && isset($_POST['body'])) {
		echo "form submitted";
		$db = new Post($conn);

		$db->edit($id, $_POST['title'], $_POST['body']);

		Header("Location: index.php");
	}

	view('edit', ['conn' => $conn, 
				  'post' => $post]);

?>