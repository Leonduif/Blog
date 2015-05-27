<?php 
	require 'blog.php';
	model(['post']);
	
	$post = new Post($conn);
	$id = $_GET['id'];

	if ($post->delete($id)) {
		header("Location: index.php");
	}
	else {
		echo "Post doesn't exist so cannot delete";
	}
?>