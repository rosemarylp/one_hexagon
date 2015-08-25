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
			<h3><?php echo $post_content["date"]; ?></h3>
			<div class="col-seventy">
				<?php echo $post_content["content"]; ?>
			</div>
			<figure>
				<img src="images/lorem_small.jpg" alt="" class="img-text-featured">
			</figure>
			<div class="clear-fix"></div>

			<a href="#" class="link-more">More Category Name</a>
		</article>
<?php }} else {
		// redirect_to("index.php");
	} ?>

<?php require_once 'inc/footer.inc.php'; ?>