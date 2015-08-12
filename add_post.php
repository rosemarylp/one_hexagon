<?php
$page_heading = "Add Post";
require_once 'inc/functions.inc.php';
require_once 'inc/header_admin.inc.php';
 ?>

<form action="add_post.php">
	<p>
		<label for="category">Category: </label>
		<select name="category">
			<option value="health">Health &amp; Fitness</option>
			<option value="outfits">Outfits</option>
			<option value="decor">Home Decor</option>
		</select>
	</p>
	<p>
		<label for="title">Post Title: </label>
		<input type="text" name="title">
	</p>

	<p>
		<label for="post-content">Content: </label>
		<textarea name="post-content" id="" cols="30" rows="10"></textarea>
	</p>

	<input type="submit" name="submit" value="Submit">
</form>

<?php require_once 'inc/footer.inc.php'; ?>