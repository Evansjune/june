<?php
	// Database settings
	// database hostname or IP. default:localhost
	// localhost will be correct for 99% of times
	define("HOST", "localhost");
	// Database user
	define("DBUSER", "root");
	// Database password
	define("PASS", "Magezi@12");
	
	############## Make the mysql connection ###########
	$conn = new mysqli(HOST, DBUSER, PASS);
	if ($conn->connect_error)
	{
    	// the connection failed so quit the script
   		 die('Could not connect !' . $conn->connect_error );
	}

	// creating a database called pettycash
	$db_create =  "create database if not exists pettycash";

	if($conn->query($db_create)==true){
		echo "created pettycash database";
	}
	else{
		echo "Pettycash database not created";
	}

	if($conn->select_db("pettycash")==true){
		// connection to the database 
		$conn = new mysqli(HOST, DBUSER, PASS, "pettycash");

		$users = "CREATE TABLE if not exists users(
				  user_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				  fullname VARCHAR(255) NOT NULL,
				  emailaddress VARCHAR(255) NOT NULL,
				  password VARCHAR(255) NOT NULL,
				  created_at TIMESTAMP NOT NULL DEFAULT current_timestamp
				  
				)";
		if ($conn->query($users)=== TRUE){
   			echo " Table users created successfully";
		}else{
			echo " Table users could not be created.".$conn->error;
		}

		$department = "CREATE TABLE if not exists department(
						dept_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
						dept_name VARCHAR(255) NOT NULL,
						created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
						)";

		if ($conn->query($department)=== TRUE){
   			echo " Table department created successfully";
		}else{
			echo " Table department could not be created.".$conn->error;
		}

		$requisition = "CREATE TABLE if not exists requisition(
						requisition_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
						user_id INT(255) NOT NULL,
						requisition_date DATE NOT NULL,
						project VARCHAR(255) NOT NULL,
						sign VARCHAR(255) NOT NULL,
						quantity VARCHAR(255) NOT NULL,
						description VARCHAR(255) NOT NULL,
						unit_price INT(10) NOT NULL,
						amount INT(10) NOT NULL,
						total_in_words VARCHAR(255) NOT NULL,
						subtotal INT(255) NOT NULL,
						approval_remark VARCHAR(255) NOT NULL,
						created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
					)";

		if ($conn->query($requisition)=== TRUE){
   			echo " Table requisition created successfully";
		}else{
			echo " Table requisition could not be created.".$conn->error;
		}


		$conn->close();



	}
	else{
		echo "No database called pettycash";
	}

	$file = './install.php';
	
	if(unlink($file)){
	 echo sprintf("The file %s deleted successfully",$file);
	}else{
	 echo sprintf("An error occurred deleting the file %s",$file);
	}

	header("Location: index.php");
	
?>
