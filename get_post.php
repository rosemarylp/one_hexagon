<?php

require_once 'inc/functions.inc.php';

// Get and output posts from a specific category
$category = $_GET["category"];
$parameters = [$category];
$sql = "SELECT id, title, date_updated, summary FROM posts WHERE category = ?";
$posts = get_records($connection, $sql, $parameters);
echo output_posts($posts);

 ?>