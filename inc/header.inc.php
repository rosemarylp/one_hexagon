<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $page_heading; ?></title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<h1><a href="index.php">OneHexagon</a></h1>
	<?php require_once 'inc/nav.inc.php'; ?>
	</header>

	<main>
			<?php
				if ($page_heading != false) {
					echo "<h2 class=\"page-heading\">" . $page_heading . "</h2>"; 
				}
			?>