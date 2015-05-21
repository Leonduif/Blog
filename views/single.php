<?php 
	require "../db/connect.php";
	require "../db/functions.php";

	$view_path = 'views/single.php';
	include "layout.php";

	$id   = htmlspecialchars($_GET['id']);
	$blog = Database::query("SELECT * FROM posts WHERE ID = :id LIMIT 1", ["id" => $id], $conn)[0];

	// Redirect to 404 page if article doesn't exist
	if (!$blog) {
		Header("Location: 404.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div class="container">
		<section class="blog">
			<article>
				<h1 class="blog__title">
					<a href="views/single.php?id=<?= $blog['id']; ?>"><?= $blog['title']; ?></a></h1>
				<p class="blog__body"><?= $blog['body']; ?></p>
			</article>
		</section>
	</div>
</body>
</html>