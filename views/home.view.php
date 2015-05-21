<?php 
	// Is this the model? I think so, maybe I can include it in a way so this view is as clean as possible
	include "db/add-post.php";
	$blogs = Database::query("SELECT * FROM posts", [], $conn);
?>
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
				<textarea name="body"><?= isOld('body'); ?></textarea>
			</li>
			<li>
				<input type="submit" value="Add blog" name="add-post">
			</li>
		</ul>
	</form>

	<?php if (isset($message) && !empty($message)) : ?>
	<p class="message <?= $messageClass; ?>"><?= $message; ?></p>
	<?php endif; ?>
	
	<?php if ($blogs) : ?>
	<section class="blog">
		<?php foreach ($blogs as $blog) : ?>
			<article>
				<h2 class="blog__title"><a href="single.php?id=<?= $blog['id']; ?>"><?= $blog['title']; ?></a></h2>
				<p class="blog__body"><?= substr($blog['body'], 0, 50); ?></p>
			</article>
		<?php endforeach; ?>
	</section>
	<?php endif; ?>
</div>