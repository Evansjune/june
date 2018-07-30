<?php
	
	define("HOST", "localhost");
	// Database user
	define("DBUSER", "root");
	// Database password
	define("PASS", "");
	// Database name
	define("DB", "bootstrap");

	############## Make the mysql connection ###########
	$conn = new mysqli(HOST, DBUSER, PASS,DB);
	if ($conn->connect_error)
	{
    		// the connection failed so quit the script
   		 die('Could not connect !' . $conn->connect_error );
	}

	$db = $conn->select_db(DB);
	if (!$db)
	{
    		// cannot connect to the database so quit the script
    		die('Could not connect to database !<br />Please contact the site\'s administrator.');
	}

	// $conn->close();

?>
