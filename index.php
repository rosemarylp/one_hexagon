<?php
$page_heading = false;
require_once 'inc/header.inc.php';
require_once 'inc/functions.inc.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
//resource: http://www.w3schools.com/php/php_ajax_database.asp
	function get_posts(category) {
		console.log(category);
		if (category == "") {
			$("#post_container").innerHTML = "fuck";
			return;
		} else {
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("post_container").innerHTML = xmlhttp.responseText;
				}
			}
		}
		xmlhttp.open("GET","get_post.php?category="+category,true);
		xmlhttp.send();
	}
</script>

		<section class="categories-container">
			<section class="category-health category-unselected">
				<a href="category.php?category_id=4"><span></span></a>
				<h2><a href="category.php?category_id=4">Health &amp; Fitness</a></h2>
			</section>

			<section class="category-outfits, category-selected">
				<a href="category.php?category_id=5"><span class="hexagon"></span></a>
				<h2><a href="category.php?category_id=5">Outfits</a></h2>
			</section>

			<section class="category-decor category-unselected">
				<a href="category.php?category_id=6"><span></span></a>
				<h2><a href="category.php?category_id=6">Home Decor</a></h2>
			</section>
			<div class="clear-fix"></div>
			<!-- Category Radio Buttons -->
				<input type="radio" name="category" class="category" value="4">Health &amp; Fitness<br/>
				<input type="radio" class="category" name="category" value="5">Outfits<br/>
				<input type="radio" class="category" name="category" value="6">Home Decor

				<script>
				//When a new category is checked, update the posts displayed
				$(".category").change(function() {
					console.log("This is: "+this.value);
					get_posts(this.value);
				});
				</script>

			<hr/>

		</section>
		<div class="clear-fix"></div>
		<div id="post_container">
			<?php
			//Shows posts from all categories by date
			$sql = "SELECT id, title, date_updated, summary FROM posts ORDER BY date_updated DESC";
			$parameters = [];
			$posts = get_records($connection, $sql, $parameters);
			echo output_posts($posts);
			 ?>
		</div>

<?php require_once 'inc/footer.inc.php'; ?>