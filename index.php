<?php 
	require "db/connect.php";
	require "db/functions.php";
	include "db/add-post.php";

	$blogs = Database::query("SELECT * FROM posts", [], $conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My first blog</title>
	<link rel="stylesheet" type="text/css" href="dist/style.css">
</head>
<body>
	<div class="container">
		<h1>My first blog</h1>
		<form method="post" class="form">
			<ul>
				<li>
					<label>Title</label>
					<input type="text" name="title" value="<?= isOld('title'); ?>">
				</li>
				<li>
					<label>Body</label>
					<textarea name="body" value="<?= isOld('body'); ?>"></textarea>
				</li>
				<li>
					<input type="submit" value="Add blog" name="add-post">
				</li>
			</ul>
		</form>

		<p class="message"><?= $message; ?></p>
		
		<?php if ($blogs) : ?>
		<section class="blog">
			<?php foreach ($blogs as $blog) : ?>
				<article>
					<h2 class="blog__title"><?= $blog['title']; ?></h2>
					<p class="blog__body"><?= $blog['body']; ?></p>
				</article>
			<?php endforeach; ?>
		</section>
		<?php endif; ?>
	</div>
</body>
</html>