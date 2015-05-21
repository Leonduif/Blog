<?php 
	if (isset($_POST['add-post'])) {
		if (!empty($_POST['title']) && !empty($_POST['body'])) {
			$title = htmlspecialchars(trim($_POST['title']));
			$body  = htmlspecialchars(trim($_POST['body']));

			Database::add("INSERT INTO posts(title, body) VALUES(:title, :body)",
						 ["title" => $title, "body" => $body],
						 $conn);

			$message = "Form succesfully submitted";
			$messageClass = 'valid';
			$_POST = [];
		}
		else {
			$messageClass = 'error';
			$message = "Please fill in all forms plx";
		}
	}
?>