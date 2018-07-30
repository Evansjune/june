<?php
	
	define("HOST", "localhost");
	// Database user
	define("DBUSER", "root");
	// Database password
	define("PASS", "");
	
	############## Make the mysql connection ###########
	$conn = new mysqli(HOST, DBUSER, PASS);
	if ($conn->connect_error)
	{
    	// the connection failed so quit the script
   		 die('Could not connect !' . $conn->connect_error );
	}else{
		echo "connected successfully";
	}

	// 	$conn->close();
?>