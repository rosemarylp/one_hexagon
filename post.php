<?php 
	require_once 'inc/functions.inc.php';

	if (isset($_GET["post_id"])) {
		$post_id = $_GET["post_id"];
		$sql = "SELECT * FROM posts WHERE id=?";
		$parameters = [$post_id];
		$post = get_records($connection, $sql, $parameters);
		$page_heading = $post[0]["title"];
		require_once 'inc/header.inc.php';


		foreach ($post as $post_content) {

 ?>
		<article class="post-text">
			<h3><?php echo date('n/j/y - g:i a',strtotime($post_content["date_updated"])); ?></h3>
			<div class="col-seventy">
				<?php echo $post_content["content"]; ?>
			</div>
			<figure>
				<img src="images/lorem_small.jpg" alt="" class="img-text-featured">
			</figure>
			<div class="clear-fix"></div>

			<?php //get category info
				$category_id = $post_content["category"];
				$sql = "SELECT title FROM categories WHERE id = ?";
				$parameters = [$category_id];
				$category = get_records($connection, $sql, $parameters);

			 ?>

			<a href="category.php?category_id=<?php echo $category_id ?>" class="link-more">More <?php echo $category[0]["title"]; ?></a>
		</article>
<?php }} else {
		// redirect_to("index.php");
	} ?>

<?php require_once 'inc/footer.inc.php'; ?>