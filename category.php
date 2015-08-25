<?php
	require_once 'inc/functions.inc.php';
	if (isset($_GET["category_id"])) {
		$category_id = $_GET["category_id"];
		$sql = "SELECT title, summary FROM categories WHERE id=?";
		$parameters = [$category_id];
		$category_info = get_records($connection, $sql, $parameters);
		$page_heading = $category_info[0]["title"];
		require_once 'inc/header.inc.php';


 ?>

		<?php
		echo "<p>{$category_info[0]['summary']}</p>";
		//redefine sql query
		$sql = "SELECT id, title, date, summary FROM posts WHERE category=?";
		$posts = get_records($connection, $sql, $parameters);
		// $page_title = $posts[0]

		echo output_posts($posts);

	} else {
		redirect_to("index.php");
	}
		 ?>
<?php require_once 'inc/footer.inc.php'; ?>