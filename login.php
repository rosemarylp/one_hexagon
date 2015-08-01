<?php 
	$page_heading = false;
	require_once 'inc/header.inc.php';

 ?>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

		<form action="login.php" method="post" id="login">
			<h2 class="page-heading">Admin Login</h2>
			<p>
				<input type="text" placeholder="Username" name="username" class="username">
			</p>

			<p>
				<input type="password" placeholder="Password" name="password" id="password">
			</p>

			<input type="submit" name="submit" id="submit-login">
		</form>

<?php require_once 'inc/footer.inc.php'; ?>