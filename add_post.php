<?php
$page_heading = "Add Post";
require_once 'inc/functions.inc.php';
require_once 'inc/header_admin.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$category = $_POST["category"];
	$title = $_POST["title"];
	$content = $_POST["post-content"];
	$summary = $_POST["post-summary"];

	$parameters = array($category, $title, $content, $summary);
	$sql = "INSERT INTO ";
	$sql .= "posts (";
	$sql .= "category, title, content, summary) VALUES (";
	$sql .= "?, ?, ?, ?)";

	$stmt = write_records($connection, $sql, $parameters);

}
 ?>

<form action="add_post.php" method="POST" name="add_post">
	<p>
		<label for="category">Category: </label>
		<select name="category">
			<option value="4">Health &amp; Fitness</option>
			<option value="5">Outfits</option>
			<option value="6">Home Decor</option>
		</select>
	</p>
	<p>
		<label for="title">Post Title: </label>
		<input type="text" name="title">
	</p>

	<p>
		<label for="post-content">Content: </label>
		<textarea name="post-content" cols="30" rows="10"></textarea>
	</p>

	<p>
		<label for="post-summary">Summary:</label>
		<textarea name="post-summary" cols="30" rows="10"></textarea>
	</p>

	<input type="submit" name="submit" value="Submit">
</form>

<?php require_once 'inc/footer.inc.php'; ?>