<div class="container">
	<h1>Edit post</h1>
	<form method="post" class="form">
		<ul>
			<li>
				<label>Title</label>
				<input type="text" name="title" value="<?= $post['title']; ?>">
			</li>
			<li>
				<label>Body</label>
				<textarea name="body"><?= $post['body']; ?></textarea>
			</li>
			<li>
				<input type="submit" value="Edit post" name="edit-post">
			</li>
		</ul>
	</form>

	<a href="index.php">Home</a>
</div>