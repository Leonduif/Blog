<?php
	$id   = htmlspecialchars($_GET['id']);
	$blog = Database::query("SELECT * FROM posts WHERE ID = :id LIMIT 1", ["id" => $id], $conn)[0];

	// Redirect to 404 page if article doesn't exist
	if (!$blog) {
		Header("Location: views/404.view.php");
	}
?>
<div class="container">
	<section class="blog">
		<article>
			<h1 class="blog__title"><?= $blog['title']; ?></h1>
			<p class="blog__body"><?= $blog['body']; ?></p>
		</article>
		<a href="./">Home</a>
	</section>
</div>