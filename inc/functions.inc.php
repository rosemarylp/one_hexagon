<?php 

	//Connect to database
	require_once('../hexagonconfig.php');
	$connection = @new PDO("$driver:host=$server;dbname=" . $db, $user, $pwd);

	function redirect_to($new_location) {
        header("Location: " . $new_location);
        exit;
    }

    function get_records($connection, $sql, $parameters) {
    	try {
    		$stmt = $connection->prepare($sql);

			$stmt->setFetchMode (PDO::FETCH_ASSOC);
			$stmt->execute($parameters);
			//returns associative array
    		return $stmt->fetchAll();
    	} catch (Exception $e) {
    		echo '"error":"' . $e->getCode() . '","text":"' . $e->getMessage() . '"';
    		exit;
    	}
    } //end getRecordset

    function write_records($connection, $sql, $parameters) {
    	try {
    		$stmt = $connection->prepare($sql);
    		$stmt->execute($parameters);
    		return $stmt;
    	}
    	catch (Exception $e) {
    		echo '"error":"' . $e->getCode() . '","text:"' . $e->getMessage() . '"';
    		exit;
    	}
    }

    function output_posts($posts) {
    	//outputs HTML for post feed
    	$output = "";
    	foreach ($posts as $post) {
	    	$output .= "<article class=\"post-text\">";
	    	$output .= "<h2><a href=\"#\">{$post['title']}</a></h2>";
	    	$output .= "<h3>{$post['date']}</h3>";
	    	$output .= "<p class=\"feed-description\">
					{$post['summary']}
				</p>";
			$output .= "<figure class=\"img-text-featured\">
					<img src=\"images/lorem_small.jpg\" alt=\"\" class=\"img-text-featured\">
				</figure>";
			$output .= "<div class=\"clear-fix\"></div>";
			$output .= "<a href=\"post.php?post_id={$post['id']}\" class=\"link-more\">Read More</a>";
			$output .= "</article>";
			$output .= "<div class=\"clear-fix\"></div>";
		}
		return $output;
    }

 ?>