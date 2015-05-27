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

	<?php if (isset($alert) && !empty($alert)) : ?>
	<p class="message <?= $alertClass; ?>"><?= $alert; ?></p>
	<?php endif; ?>
	
	<?php if ($posts) : ?>
	<section class="blog">
		<?php foreach ($posts as $post) : ?>
			<article>
				<h2 class="blog__title"><a href="single.php?id=<?= $post['id']; ?>"><?= $post['title']; ?></a></h2>
				<p class="blog__body"><?= substr($post['body'], 0, 50); ?></p>
				<ul class="blog__options">
					<li><a class="delete" href="delete.php?id=<?= $post['id']; ?>">Delete</a></li>
					<li><a class="edit" href="edit.php?id=<?= $post['id']; ?>">Edit</a></li>
				</ul>
			</article>
		<?php endforeach; ?>
	</section>
	<?php endif; ?>
</div>