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
    		$paramcount = 1;
    		$stmt = $connection->prepare($sql);

    		foreach ($parameters as $parameter) { 
    			$stmt->bindParam($paramcount++, $parameter);
    		}

			$stmt->setFetchMode (PDO::FETCH_ASSOC);
			$stmt->execute();
    		return $stmt;
    	} catch (Exception $e) {
    		echo '"error":"' . $e->getCode() . '","text":"' . $e->getMessage() . '"';
    		exit;
    	}
    } //end getRecordset

    function write_records($connection, $sql, $parameters) {
    	try {
    		$paramcount = 1;
    		$stmt = $connection->prepare($sql);
    		foreach ($parameters as $parameter) {
    			$parameter = $parameter . '';
    			$stmt->bindParam($paramcount++, $parameter);
    		}
    		$stmt->execute();
    		return $stmt;
    	}
    	catch (Exception $e) {
    		echo '"error":"' . $e->getCode() . '","text:"' . $e->getMessage() . '"';
    		exit;
    	}
    }

 ?>