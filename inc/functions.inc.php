<?php 

	//Connect to database
	require_once('../hexagonconfig.php');
	$con = @new PDO("$driver:host=$server;dbname=" . $db, $user, $pwd);

	function redirect_to($new_location) {
        header("Location: " . $new_location);
        exit;
    }

 ?>